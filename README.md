<div align="center">

# 💬 auto 1.4 — Modern Edition

### Azərbaycan dilli onlayn söhbət (çat) skripti

[![PHP](https://img.shields.io/badge/PHP-5.6_%E2%80%94_8.3-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MariaDB](https://img.shields.io/badge/MariaDB-10.4%2B-003545?style=for-the-badge&logo=mariadb&logoColor=white)](https://mariadb.org/)
[![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![License](https://img.shields.io/badge/License-Proprietary-EC4899?style=for-the-badge)](#-lisenziya)

[![GitHub Stars](https://img.shields.io/github/stars/goshgarhasanov/auto-1.4-modern?style=social)](https://github.com/goshgarhasanov/auto-1.4-modern)
[![Author](https://img.shields.io/badge/Müəllif-Goshgar_Hasanzadeh-6366F1?style=flat-square)](https://github.com/goshgarhasanov)

</div>

---

## 📖 Skript haqqında

**auto 1.4 — Modern Edition** — istifadəçilərin qeydiyyatdan keçdiyi, otaqlarda və şəxsi məktublarla mesajlaşdığı, foto albom yaradıb hədiyyə göndərdiyi, forumda mövzu açdığı, oyunlar oynadığı (Mafiya, kart oyunları, lotereya, bilik yarışı və s.) tam funksiyalı çat platformasıdır.

Klassik **auto 1.4** WAP skriptinin müasir HTML5 standartlarına uyğunlaşdırılmış, təhlükəsizlik baxımından gücləndirilmiş və mobil cihazlar üçün uyğun (responsive) interfeyslə yenilənmiş versiyasıdır.

> 🎯 **Məqsəd:** köhnə WAP dövründən qalan funksional bir çat skriptini müasir veb standartları və təhlükəsizlik tələbləri ilə uyğunlaşdıraraq bu günün cihazlarında istifadəyə yararlı hala gətirmək.

---

## ✨ Əsas xüsusiyyətlər

| Xüsusiyyət | Təsvir |
|:---|:---|
| 💬 **Söhbət otaqları** | Real vaxt yenilənən qrup mesajlaşma; istifadəçi və admin idarəli otaqlar |
| 📨 **Şəxsi mesajlar** | Daxili məktub qutusu, oxundu indikatoru, mesaj arxivi |
| 👥 **Profil və albom** | Genişləndirilmiş profil, foto albom, status, ləqəb rəngi |
| 🎁 **Hədiyyə sistemi** | İstifadəçilər bir-birinə virtual hədiyyə göndərə bilər |
| 🎮 **Oyunlar** | Mafiya, kart oyunları (777, 21), düel (X-O), lotereya, bilik yarışı |
| 💭 **Forum** | Mövzular, rəylər, smiley dəstəyi |
| 🏆 **Reytinq** | Aktivlik, top istifadəçilər, bal sistemi |
| 🔐 **Təhlükəsizlik** | Bcrypt parol, SQL injection filtri, XSS qoruması, anti-bot |
| 📱 **Responsive** | Mobil cihazlardan masaüstünə qədər tam uyğun interfeys |
| 🌗 **Tünd rejim** | Sistem rəng üstünlüyünə avtomatik uyğunlaşır |

---

## 🛠 Texniki stack

- **Server:** PHP 5.6 — 8.3 (tövsiyə olunan PHP 7.4 və ya yuxarı)
- **Verilənlər bazası:** MariaDB 10.4+ və ya MySQL 5.7+
- **Önə dizayn:** Vanilla CSS3 (Inter font, gradient palette, dizayn token sistemi)
- **Mərkəzi modullar:** PDO, mbstring, GD, cURL, OpenSSL, fileinfo

---

## 📦 Kurulum

### 1. Repozitoriyanı klonla

```bash
git clone https://github.com/goshgarhasanov/auto-1.4-modern.git
cd auto-1.4-modern
```

### 2. Verilənlər bazasını yarat və idxal et

```bash
mysql -uroot -e "CREATE DATABASE chat CHARACTER SET utf8 COLLATE utf8_general_ci"
mysql -uroot chat < sql.sql
```

### 3. Bağlantı parametrlərini düzəlt

`chat/BAZA.php` faylını aç və öz mühitinə uyğun dəyişdir:

```php
define('hostname', 'localhost');
define('username', 'root');
define('password', '');
define('dbname',   'chat');
$site_url   = 'localhost:8000';
$site_url_2 = 'localhost:8000';
```

### 4. PHP-nin daxili serverini işə sal

```bash
php -S localhost:8000 -t chat
```

### 5. Brauzerdə aç

🌐 **http://localhost:8000**

---

## 📂 Repo strukturu

```
auto-1.4-modern/
├── chat/        # Əsas skript (181 PHP modulu, modernizə edilmiş)
├── chat2/       # Köhnə ay_chat 1.2 referansı (yalnız müqayisə üçün)
├── sql.sql      # MariaDB sxema və başlanğıc məlumatları
└── README.md    # Bu sənəd
```

---

## 🎨 Dizayn sistemi

Modern Edition-da yenidən qurulan vizual qat:

- 🎨 **Inter** mətn şrifti — Google Fonts CDN ilə yüklənir
- 🌈 **Vibrant gradient palette** — primary, sunset, ocean, aurora, forest
- ✨ **Dizayn tokenlər** — rəng, məsafə, kölgə, tipoqrafiya CSS dəyişənlərində
- 🎯 **44px+ toxunma sahələri** — mobil interfeys üçün
- 🎬 **Yumşaq animasiyalar** — `prefers-reduced-motion` üstünlüyünə hörmət
- ♿ **Əlçatanlıq** — `:focus-visible` rings, AA kontrast nisbəti
- 🌙 **Tünd rejim** — sistem üstünlüyünə avtomatik uyğunlaşma

---

## 🚀 İnkişaf yolu

- [x] **Faz 1** — Vizual modernizasiya (HTML5, modern CSS, gradient interfeys)
- [x] **Faz 2** — Backend təhlükəsizlik (PDO, bcrypt parol, sessiya bootstrap)
- [x] **Faz 3** — Vibrant UI dizayn sistemi (Inter, ikonlar, tünd rejim)
- [ ] **Faz 4** — Real vaxt mesajlaşma (WebSocket / Server-Sent Events)
- [ ] **Faz 5** — Mobil app (PWA + offline dəstəyi)
- [ ] **Faz 6** — Telegram bot inteqrasiyası
- [ ] **Faz 7** — Spagetti kodun **PSR-4 + Slim 4** strukturuna miqrasiyası

---

## 📜 Lisenziya

Müəllif hüquqları qorunur. Skripti **istifadə**, **dəyişiklik** və ya **paylaşmaq** üçün müəllifdən icazə alınmalıdır. Skriptdəki müəllif imzası silinə bilməz.

Detallı qaydalar: [`chat/license.php`](chat/license.php)

---

<div align="center">

### Hazırladı

[![Goshgar Hasanzadeh](https://img.shields.io/badge/Goshgar_Hasanzadeh-181717?style=for-the-badge&logo=github&logoColor=white)](https://github.com/goshgarhasanov)

**© 2017–2026** · Bütün hüquqlar qorunur

</div>
