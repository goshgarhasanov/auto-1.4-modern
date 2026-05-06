# auto 1.4 — Modern Edition

Klassik **auto 1.4** Azərbaycan dilli WAP çat skriptinin müasir HTML5 standartlarına uyğunlaşdırılmış, təhlükəsizlik baxımından gücləndirilmiş və mobil cihazlar üçün uyğunlaşan interfeyslə tamamilə yenilənmiş versiyası.

## Müəlliflər

- **Orijinal:** ChatN!ck (auto 1.4)
- **Modern Edition:** Goshgar Hasanzadeh

## Repo Strukturu

```
auto1.4/
├── chat/           # Legacy auto 1.4 — modernize edilmiş (HTML5, bcrypt, PDO)
├── chat-app/       # Sıfırdan yenidən yazılmış modern PHP 8.3 / Slim 4 stack
├── chat2/          # Köhnə ay_chat 1.2 referans variantı (geliştirme yapmıyoruz)
└── sql.sql         # MySQL/MariaDB sxema və başlanğıc məlumatları
```

### `chat/` — Legacy Modernized

Orijinal **auto 1.4** kodu, aşağıdakılar əlavə edilmiş:
- `<?xml WML>` → modern HTML5 doctype
- `vista1/vista2/vista3/win` çoxlu skin → tək `modern.css` mövzusu
- `mysql_*` çağrıları + paralel **PDO** əlaqəsi
- **Bcrypt** parol heşləməsi (köhnə base64 parollar avtomatik bcrypt-ə keçirilir)
- `register_globals` dövründən qalan `$HTTP_USER_AGENT` → `$_SERVER` ilə bootstrap
- HTTP `<?xml>` prologue WML modunda emit edilir, modern modunda emit edilmir
- Düzgün UTF-8 əlifba dəstəyi

**Servis:**
```bash
php -S localhost:8000 -t chat
```

### `chat-app/` — Yeni Modern Stack

PHP 8.3 + **Slim 4** + **Twig 3** + **PHP-DI** + **Monolog** + **phpdotenv**.

**Klasör mantığı:** Hexagonal / Clean Architecture
```
chat-app/
├── public/index.php             # front controller
├── src/
│   ├── Application/             # Actions (Controller eşdeğeri), Middleware
│   ├── Domain/                  # User, Auth — pure business logic
│   └── Infrastructure/          # PDO, Twig, external
├── templates/                   # Twig
├── config/                      # routes, dependencies, settings
└── var/                         # cache, log
```

**Kurulum:**
```bash
cd chat-app
composer install
cp .env.example .env
# .env içindəki DB parametrlərini doldur
php -S localhost:8002 -t public
```

### `chat2/` — Referans

Eski WML `ay_chat 1.2` skripti, yalnız tarixi referans olaraq saxlanır. Bu kod üzərində geliştirme yapılmır.

## Verilənlər bazası

MariaDB 10.6+ və ya MySQL 5.7+. Şəma və başlanğıc data `sql.sql`-də.

```bash
mysql -uroot < sql.sql
```

İki dəstə də **eyni** `chat` DB-sini paylaşır.

## Tələblər

- PHP 5.6 (legacy `chat/` üçün) — və ya 7.4+
- PHP 8.2+ (modern `chat-app/` üçün)
- MariaDB 10.4+ / MySQL 5.7+
- Composer (chat-app üçün)
- Apache 2.4+ / Nginx (production üçün)

## Geliştirme

Hər iki app eyni DB-ni paylaşır, paralel çalışır. `chat-app/` yeni özelliklərin getdiyi yerdir; `chat/` mövcud istifadəçi bazasını qoruyur.

Geliştirme yol haritası:
1. ✅ Faz 1 — Görsel modernizasiya (chat klasörü, modern.css, HTML5)
2. ✅ Faz 2 — Backend güvenlik (PDO, bcrypt)
3. 🚧 Faz 3 — Yeni stack (chat-app — Slim 4)
4. 📋 Faz 4 — Realtime (WebSocket / SSE)
5. 📋 Faz 5 — Mobile app / Telegram bot

## License

Müəllif hüquqları qorunur. Skripti istifadə etmək üçün müəllifdən icazə alınmalıdır. Detalları üçün bax: `chat/license.php`
