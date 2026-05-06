# Geliştirmə (Development) bələdçisi

Lokal mühitdə layihəni qurub işə salmağın detallı təlimatı və tez-tez rastlanan problemlərin həlli.

---

## 1. Tələblər

| Komponent | Versiya | Yoxlamaq |
|:---|:---|:---|
| PHP | 8.2+ | `php -v` |
| Composer | 2.x | `composer --version` |
| MariaDB / MySQL | 10.4+ / 5.7+ | `mysql --version` |
| Git | 2.x | `git --version` |

### Tələb olunan PHP genişlənmələri

```bash
php -m | grep -E "pdo_mysql|mbstring|gd|intl|fileinfo|openssl|tokenizer"
```

Hamısı görünməlidir. Çatışmırsa:

- **Linux (Debian/Ubuntu):** `sudo apt install php8.2-mysql php8.2-mbstring php8.2-gd php8.2-intl php8.2-xml php8.2-curl`
- **Windows:** `php.ini` faylında müvafiq sətirlərdən `;` simvolunu sil
- **macOS (Homebrew):** standart paketdə hamısı var

---

## 2. İlk quraşdırma — addım-addım

```bash
# 1. Klonla
git clone https://github.com/goshgarhasanov/auto-1.4-modern.git
cd auto-1.4-modern

# 2. Asılılıqlar
composer install

# 3. Mühit faylı
cp .env.example .env

# 4. DB yaratma
mysql -uroot -e "CREATE DATABASE chat CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci"
mysql -uroot chat < database/sql.sql

# 5. Storage icazələri (Linux/macOS)
chmod -R 0775 storage/

# 6. Serveri işə sal
composer serve
```

Brauzerdə **http://localhost:8000** açıldıqda ana səhifə görsənməlidir.

---

## 3. Composer skriptləri

| Əmr | Funksiyası |
|:---|:---|
| `composer serve` | `php -S localhost:8000 -t public` |
| `composer test` | Bütün PHPUnit testləri |
| `composer test:unit` | Yalnız `tests/Unit` |
| `composer test:feature` | Yalnız `tests/Feature` |
| `composer cs` | PSR-12 yoxlaması (phpcs) |
| `composer cs:fix` | Avtomatik formatlama (phpcbf) |
| `composer test:coverage` | Coverage hesabatı |

---

## 4. Tez-tez rastlanan problemlər

### `composer install` xəta verir — `Class App\... not found`

**Səbəb:** autoload məlumatları köhnəlib.

```bash
composer dump-autoload -o
```

### `Connection refused` və ya `SQLSTATE[HY000] [2002]`

**Səbəb:** MariaDB işləmir və ya `.env` parametrləri yanlışdır.

```bash
# MariaDB-nin işlədiyini yoxla:
sudo systemctl status mariadb       # Linux
# və ya
mysqladmin -uroot ping
```

`.env` faylında:

```dotenv
DB_HOST=localhost
DB_PORT=3306
DB_USER=root
DB_PASS=
DB_NAME=chat
```

### `vendor/autoload.php not found`

**Səbəb:** `composer install` icra olunmayıb.

```bash
composer install
```

### `Twig_Error_Loader: Unable to find template`

**Səbəb:** Şablon yolu səhvdir və ya yeni template Twig önbəlləyinə düşməyib.

```bash
rm -rf storage/cache/twig/*
```

### `Permission denied` — storage/logs

**Səbəb:** PHP-nin `storage/` qovluğuna yazma icazəsi yoxdur.

```bash
chmod -R 0775 storage/
chown -R $USER:www-data storage/        # Linux production
```

### Səhifə açıldıqda CSS yüklənmir

- DevTools → Network tab → `/assets/css/app.css` 404 alırmı?
- `public/assets/css/app.css` mövcuddurmu?
- Slim built-in server **public/** qovluğundan başlamalıdır:
  ```bash
  php -S localhost:8000 -t public
  ```

### Legacy URL açılmır

- `public/index.php` faylında legacy fallback mövcuddurmu?
- `legacy/<file>.php` faylı həqiqətən mövcuddurmu?
- `storage/logs/app-*.log` faylına bax — orada xəta detalı olacaq.

---

## 5. Debug ipuçları

### Loglara baxış

```bash
tail -f storage/logs/app-$(date +%Y-%m-%d).log
tail -f storage/logs/error-$(date +%Y-%m-%d).log
```

### Symfony VarDumper

`composer require --dev symfony/var-dumper` quraşdırılıbsa:

```php
dump($variable);    // davam edir
dd($variable);      // dump və exit
```

Çıxış brauzerdə rəngli, oxunaqlı şəkildə görünəcək.

### Klassik var_dump / print_r

Şəbəkə və ya CLI mühitində:

```php
echo '<pre>'; var_dump($value); echo '</pre>'; exit;
```

> Bu cür debug çağırışlarını **commit etmə** — `composer cs` PR-ı geri qaytaracaq.

### Slim route-larını siyahıla

```bash
php -r "require 'vendor/autoload.php'; \$app = require 'public/bootstrap.php'; foreach (\$app->getRouteCollector()->getRoutes() as \$r) echo \$r->getMethods()[0].' '.\$r->getPattern().PHP_EOL;"
```

### DB sorğuları

`config/database.php` faylında PDO `ATTR_EMULATE_PREPARES = false` olduğundan binding sorğuları gerçək prepared statement-dir. Sorğunu görmək üçün repository-də müvəqqəti olaraq:

```php
$this->logger->debug('SQL', ['sql' => $sql, 'params' => $params]);
```

---

## 6. IDE konfiqurasiyası

### PhpStorm

1. **Settings → PHP → CLI Interpreter** — PHP 8.2 göstər
2. **Settings → PHP → Quality Tools → PHP_CodeSniffer** — `vendor/bin/phpcs` yolunu göstər, ruleset: `phpcs.xml`
3. **Run → Edit Configurations → PHPUnit** — `phpunit.xml.dist` istinad et

### VS Code

Tövsiyə olunan extension-lar:

- **Intelephense** (PHP intelligence)
- **PHP DocBlocker**
- **Twig Language 2**
- **EditorConfig**

`.vscode/settings.json` (opsional):

```json
{
  "php.suggest.basic": false,
  "intelephense.environment.phpVersion": "8.2.0",
  "[php]": {
    "editor.defaultFormatter": "bmewburn.vscode-intelephense-client"
  }
}
```

---

## 7. Hot reload

Slim built-in server hot reload dəstəkləmir. `php -S` faylı hər request-də yenidən yükləyir, ona görə kod dəyişikliyi ən pis halda **brauzeri F5 ilə yeniləməklə** görünür. Twig şablonu üçün isə `app.debug=true` olduqda önbəllək hər dəfə təzələnir.

---

## 8. Production deployment qısa qeydləri

Production üçün:

```bash
composer install --no-dev --optimize-autoloader
APP_ENV=production
APP_DEBUG=false
```

`storage/cache/twig/` önbəlləyini önəmli edən `OPCACHE` aktivləşdirilməlidir. Detallı deployment bələdçisi gələcək `docs/DEPLOYMENT.md` sənədinə əlavə olunacaq.
