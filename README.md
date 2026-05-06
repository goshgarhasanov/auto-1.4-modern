# auto 1.4 — Modern Edition

Klassik **auto 1.4** Azərbaycan dilli WAP çat skriptinin müasir HTML5 standartlarına uyğunlaşdırılmış, təhlükəsizlik baxımından gücləndirilmiş və mobil cihazlar üçün uyğunlaşan interfeyslə tamamilə yenilənmiş versiyası.

## Müəlliflər

- **Müəllif:** Goshgar Hasanzadeh ([GitHub](https://github.com/goshgarhasanov))

## Repo Strukturu

```
auto1.4/
├── chat/        # auto 1.4 — modernize edilmiş ana proje
├── chat2/       # ay_chat 1.2 referans (geliştirme yapılmıyor)
└── sql.sql      # MariaDB şema və başlanğıc məlumatları
```

## Modernizasiya nələri əhatə edir

`chat/` klasöründə əsas dəyişikliklər:

- ✅ WML 1.2 çıkışı → modern **HTML5**
- ✅ Çoxlu skin (vista1/vista2/vista3/wml) → tək **modern** mövzu
- ✅ Köhnə `mysql_*` əlavə olaraq paralel **PDO** əlaqəsi
- ✅ Base64 parol → **Bcrypt** heşləməsi (köhnə parollar avtomatik miqrasiya olunur)
- ✅ `register_globals` qalığı `$HTTP_USER_AGENT` → `$_SERVER` ilə düzgün bootstrap
- ✅ Modern, gradient, responsive CSS (`css/modern.css`)
- ✅ Düzgün UTF-8 əlifba dəstəyi
- ✅ HTTP `<?xml>` prologue yalnız WML modunda göndərilir
- ✅ Tüm 181 modul (məsajlaşma, forum, oyunlar, foto albom, admin paneli...) saxlanılıb

## Sistem Tələbləri

- **PHP** 5.6 — 8.3 (tövsiyə olunan 7.4+)
- **MariaDB** 10.4+ və ya **MySQL** 5.7+
- **PHP modulları:** mysqli, pdo_mysql, gd, mbstring, curl, openssl, fileinfo
- **Server:** Apache 2.4+ və ya Nginx (production üçün)

## Kurulum

```bash
git clone https://github.com/goshgarhasanov/auto-1.4-modern
cd auto-1.4-modern
```

### Verilənlər bazası
```bash
mysql -uroot -e "CREATE DATABASE chat CHARACTER SET utf8 COLLATE utf8_general_ci"
mysql -uroot chat < sql.sql
```

### DB parametrləri
`chat/BAZA.php` faylında bağlantı parametrlərini düzəlt:
```php
define('hostname','localhost');
define('username','root');
define('password','');
define('dbname','chat');
```

### Çalıştır
```bash
php -S localhost:8000 -t chat
```
Aç: http://localhost:8000

## Geliştirme yol haritası

- [x] **Faz 1** — Görsel modernizasiya (HTML5, modern.css, gradient)
- [x] **Faz 2** — Backend güvenlik (PDO, bcrypt, session)
- [ ] **Faz 3** — UI/UX iyileştirme (Inter font, Lucide icons, dark mode)
- [ ] **Faz 4** — Real-time messaging (WebSocket / SSE)
- [ ] **Faz 5** — Mobile responsive deep-pass
- [ ] **Faz 6** — Telegram bot integrasyon

## License

Müəllif hüquqları qorunur. Detallar üçün bax: `chat/license.php`
