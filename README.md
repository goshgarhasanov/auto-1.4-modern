<div align="center">

# Goshgar.Az — auto 1.4 Modern Edition

### Müasir MVC arxitekturası ilə yenidən qurulmuş Azərbaycan dilli onlayn söhbət (çat) skripti

[![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![Slim](https://img.shields.io/badge/Slim-4.x-68B604?style=for-the-badge&logo=slickpic&logoColor=white)](https://www.slimframework.com/)
[![Twig](https://img.shields.io/badge/Twig-3.x-1E874B?style=for-the-badge&logo=twig&logoColor=white)](https://twig.symfony.com/)
[![PHP-DI](https://img.shields.io/badge/PHP--DI-7.x-005CB9?style=for-the-badge)](https://php-di.org/)
[![Monolog](https://img.shields.io/badge/Monolog-3.x-0E5C2F?style=for-the-badge)](https://github.com/Seldaek/monolog)
[![MariaDB](https://img.shields.io/badge/MariaDB-10.4%2B-003545?style=for-the-badge&logo=mariadb&logoColor=white)](https://mariadb.org/)
[![PHPUnit](https://img.shields.io/badge/PHPUnit-11.x-7F2D2D?style=for-the-badge&logo=php&logoColor=white)](https://phpunit.de/)
[![License](https://img.shields.io/badge/License-Proprietary-EC4899?style=for-the-badge)](#-lisenziya)

[![Author](https://img.shields.io/badge/Müəllif-Goshgar_Hasanzadeh-6366F1?style=flat-square&logo=github)](https://github.com/goshgarhasanov)
[![PSR-12](https://img.shields.io/badge/Code_Style-PSR--12-8892BF?style=flat-square)](https://www.php-fig.org/psr/psr-12/)
[![PSR-4](https://img.shields.io/badge/Autoload-PSR--4-8892BF?style=flat-square)](https://www.php-fig.org/psr/psr-4/)

</div>

---

## Mündəricat

- [Skript haqqında](#-skript-haqqında)
- [Əsas xüsusiyyətlər](#-əsas-xüsusiyyətlər)
- [Texnologiya stack](#-texnologiya-stack)
- [Quraşdırma](#-quraşdırma)
- [Layihə strukturu](#-layihə-strukturu)
- [MVC anatomiyası](#-mvc-anatomiyası)
- [Legacy köprüsü](#-legacy-köprüsü)
- [Test](#-test)
- [İnkişaf yolu](#-i̇nkişaf-yolu)
- [Lisenziya](#-lisenziya)
- [Müəllif](#-müəllif)

---

## 📖 Skript haqqında

**Goshgar.Az (auto 1.4 — Modern Edition)** — istifadəçilərin qeydiyyatdan keçdiyi, otaqlarda və şəxsi məktublarla mesajlaşdığı, foto albom yaradıb hədiyyə göndərdiyi, forumda mövzu açdığı və oyunlar (Mafiya, kart oyunları, lotereya, bilik yarışı) oynadığı tam funksiyalı çat platformasıdır. Layihə klassik **auto 1.4** WAP skriptinin kökündən yenidən qurulmuş varisidir.

Bu versiyada köhnə spagetti kod təbəqəsi tədricən **Slim 4 + Twig 3 + PHP-DI 7** üzərində qurulu müasir **MVC** arxitekturasına köçürülür. Eski 181 PHP faylı `legacy/` qovluğunda qorunur və **front controller fallback** mexanizmi sayəsində istifadəçi tərəfindən hər hansı kəsilmə hiss olunmadan işləməyə davam edir. Yeni funksiyalar isə təmiz **PSR-4** namespace-ləri (`App\`) altında, repozitoriya, servis və controller laylarına bölünmüş şəkildə yazılır.

> 🎯 **Məqsəd:** uzun illərdir aktiv olan bir çat skriptini sıfırdan yazmadan, mərhələli şəkildə müasir veb standartlarına və PHP 8.2+ ekosisteminə uyğunlaşdırmaq.

---

## ✨ Əsas xüsusiyyətlər

| Xüsusiyyət | Təsvir |
|:---|:---|
| 🏗 **MVC arxitekturası** | Slim 4 router, controller, repository, service, view ayrımı |
| 🧩 **PSR-4 autoload** | `App\` namespace altında təmiz, modul-dostu kod təşkilatı |
| 🎨 **Twig şablonları** | Məntiq və görüntü ayrılığı, layout inheritance, auto-escape |
| 🔌 **DI konteyneri** | PHP-DI 7 ilə autowire, controller və servis injection |
| 📜 **Strukturlu loglar** | Monolog 3 — gündəlik fayl rotasiyası, kontekstli mesajlar |
| 🔐 **CSRF qoruması** | Hər form üçün token, middleware ilə yoxlanılır |
| ⚙️ **Mühit dəyişənləri** | `phpdotenv` ilə `.env` faylı; sirlər repozitoridə qalmır |
| 🧪 **PHPUnit testləri** | Unit + Feature qatları; CI mühitində avtomatik icra |
| 🌉 **Legacy körpü** | Köhnə URL-lər `legacy/` üzərindən qırılmadan işləyir |
| 📱 **Responsive UI** | Mobil cihazlardan masaüstünə qədər tam uyğun interfeys |
| 🌗 **Tünd rejim** | Sistem rəng üstünlüyünə avtomatik uyğunlaşır |

---

## 🛠 Texnologiya stack

| Qat | Texnologiya | Versiya |
|:---|:---|:---|
| Dil | **PHP** | 8.2+ |
| HTTP / Routing | **Slim Framework** | 4.x |
| Şablon mühərriki | **Twig** | 3.x |
| DI Konteyneri | **PHP-DI** | 7.x |
| Loglama | **Monolog** | 3.x |
| Mühit | **vlucas/phpdotenv** | 5.x |
| Test çərçivəsi | **PHPUnit** | 11.x |
| Verilənlər bazası | **MariaDB / MySQL** | 10.4+ / 5.7+ |
| Asılılıq idarəsi | **Composer** | 2.x |

---

## 📦 Quraşdırma

### Tələblər

- PHP **8.2** və ya yuxarı (`pdo_mysql`, `mbstring`, `gd`, `intl`, `fileinfo`, `openssl`)
- **Composer 2.x**
- **MariaDB 10.4+** və ya **MySQL 5.7+**

### Addım 1 — Repozitoriyanı klonla

```bash
git clone https://github.com/goshgarhasanov/auto-1.4-modern.git
cd auto-1.4-modern
```

### Addım 2 — Asılılıqları yüklə

```bash
composer install
```

### Addım 3 — Mühit faylını hazırla

```bash
cp .env.example .env
```

Sonra `.env` faylını redaktə edib öz mühitinə uyğunlaşdır:

```dotenv
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_HOST=localhost
DB_PORT=3306
DB_NAME=chat
DB_USER=root
DB_PASS=
```

### Addım 4 — Verilənlər bazasını yarat və idxal et

```bash
mysql -uroot -e "CREATE DATABASE chat CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci"
mysql -uroot chat < database/sql.sql
```

### Addım 5 — Daxili serveri işə sal

```bash
composer serve
# və ya birbaşa:
php -S localhost:8000 -t public
```

### Addım 6 — Brauzerdə aç

🌐 **http://localhost:8000**

---

## 📂 Layihə strukturu

```
auto-1.4-modern/
├── public/                    # Web root, front controller
│   ├── index.php              # Slim app boot + legacy fallback
│   └── assets/css/app.css
├── app/                       # PSR-4: App\ namespace
│   ├── Http/
│   │   ├── Controllers/       # HTTP controller-lər
│   │   ├── Middleware/        # CSRF, Auth, Session və s.
│   │   └── Requests/          # Request validation
│   ├── Models/                # Domain modelləri
│   ├── Services/              # Biznes məntiqi (use-case)
│   ├── Database/
│   │   └── Repositories/      # PDO repository-ləri
│   ├── Support/               # Helpers, Csrf, Env, Container
│   └── Exceptions/            # Custom exception sinifləri
├── views/                     # Twig şablonları
├── routes/
│   └── web.php                # Slim route təyinatları
├── config/
│   ├── app.php
│   ├── database.php
│   └── dependencies.php       # PHP-DI bindings
├── database/
│   ├── sql.sql                # Tam sxema
│   ├── migrations/
│   └── seeds/
├── storage/
│   ├── logs/                  # Monolog gündəlik faylları
│   ├── cache/                 # Twig + opcache fayl önbəlləyi
│   ├── sessions/
│   └── uploads/
├── tests/
│   ├── Unit/
│   └── Feature/
├── legacy/                    # Köhnə 181 PHP faylı (qorunur)
├── docs/                      # Memarlıq və töhfə bələdçiləri
├── composer.json
├── .env.example
└── README.md
```

---

## 🧩 MVC anatomiyası

Yeni funksiya əlavə etmək üçün addımlar:

### 1. Route təyin et — `routes/web.php`

```php
$app->get('/forum', [\App\Http\Controllers\ForumController::class, 'index'])
    ->setName('forum.index');
```

### 2. Controller yarat — `app/Http/Controllers/ForumController.php`

```php
<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\ForumService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

final class ForumController
{
    public function __construct(
        private readonly ForumService $forum,
        private readonly Twig $view,
    ) {
    }

    public function index(Request $request, Response $response): Response
    {
        $topics = $this->forum->latestTopics(limit: 25);

        return $this->view->render($response, 'forum/index.twig', [
            'topics' => $topics,
        ]);
    }
}
```

### 3. Service / Repository qatı

```php
// app/Services/ForumService.php
namespace App\Services;

use App\Database\Repositories\ForumTopicRepository;

final class ForumService
{
    public function __construct(private readonly ForumTopicRepository $topics) {}

    public function latestTopics(int $limit): array
    {
        return $this->topics->latest($limit);
    }
}
```

### 4. View — `views/forum/index.twig`

```twig
{% extends 'layouts/base.twig' %}

{% block content %}
    <h1>Forum</h1>
    <ul>
        {% for topic in topics %}
            <li><a href="/forum/{{ topic.id }}">{{ topic.title }}</a></li>
        {% endfor %}
    </ul>
{% endblock %}
```

DI konteyneri (`config/dependencies.php`) bütün asılılıqları autowire edir — controller-ə əl ilə servis ötürmək lazım deyil.

---

## 🌉 Legacy köprüsü

Layihə **legacy/** qovluğunda **181 PHP faylı** saxlayır. Bu fayllar köhnə spagetti strukturda işləyir və minlərlə istifadəçi tərəfindən hələ də istifadə olunur.

`public/index.php` front controller-i belə işləyir:

1. Gələn URL Slim router-də qeydiyyatdan keçibsə → yeni MVC kontroller işə salınır.
2. Slim **404** qaytararsa → URL-ə uyğun fayl `legacy/` qovluğunda axtarılır.
3. Tapılarsa → həmin fayl `require` edilir; istifadəçi heç bir fərq hiss etmir.
4. Tapılmasa → həqiqi **404** səhifəsi göstərilir.

Bu yanaşma **"strangler fig"** patterndir: yeni kod köhnəni yavaş-yavaş əhatə edir, hər mərhələdə müəyyən bir route köhnədən yeniyə "boğularaq" köçürülür. Detallar üçün bax: [`docs/MIGRATION_FROM_LEGACY.md`](docs/MIGRATION_FROM_LEGACY.md).

---

## 🧪 Test

```bash
composer test          # bütün testlər
composer test:unit     # yalnız Unit
composer test:feature  # yalnız Feature
composer cs            # PSR-12 yoxlaması (phpcs)
```

Testlər `tests/Unit/` və `tests/Feature/` qovluqlarında yerləşir. `Feature` testləri Slim app-ı sahə HTTP simulyasiyası ilə yoxlayır.

---

## 🚀 İnkişaf yolu

- [x] **Faz 1** — Vizual modernizasiya (HTML5, modern CSS, gradient interfeys)
- [x] **Faz 2** — Backend təhlükəsizlik (PDO, bcrypt parol, sessiya bootstrap)
- [x] **Faz 3** — Vibrant UI dizayn sistemi (Inter, ikonlar, tünd rejim)
- [x] **Faz 4** — **PSR-4 + Slim 4 + Twig** miqrasiyasının başlanması ✅
- [ ] **Faz 5** — Bütün legacy route-ların controller-lərə köçürülməsi
- [ ] **Faz 6** — Real vaxt mesajlaşma (WebSocket / Server-Sent Events)
- [ ] **Faz 7** — Telegram bot inteqrasiyası və PWA dəstəyi

---

## 📜 Lisenziya

Müəllif hüquqları qorunur. Skripti **istifadə**, **dəyişiklik** və ya **paylaşmaq** üçün müəllifdən icazə alınmalıdır. Skriptdəki müəllif imzası silinə bilməz.

Detallar üçün bax: [`legacy/license.php`](legacy/license.php) və [`docs/CONTRIBUTING.md`](docs/CONTRIBUTING.md).

---

## 👤 Müəllif

<div align="center">

### Goshgar Hasanzadeh

[![GitHub](https://img.shields.io/badge/GitHub-goshgarhasanov-181717?style=for-the-badge&logo=github&logoColor=white)](https://github.com/goshgarhasanov)
[![Website](https://img.shields.io/badge/Goshgar.Az-EC4899?style=for-the-badge&logo=googlechrome&logoColor=white)](https://goshgar.az)

**© 2017–2026** · Bütün hüquqlar qorunur

</div>
