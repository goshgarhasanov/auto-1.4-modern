# Arxitektura qərarları (ADR)

Bu sənəd **auto 1.4 — Modern Edition** layihəsinin əsas memarlıq qərarlarını və onların arxasındakı motivasiyanı izah edir.

---

## 1. Ümumi baxış

Layihə **klassik MVC** üzərində qurulan, lakin **clean architecture** prinsiplərindən sadələşdirilmiş şəkildə bəhrələnən bir tətbiqdir. Üç əsas qat ayrılır:

```
┌─────────────────────────────────────────────────────────┐
│  Presentation        (Http\Controllers, Middleware,     │
│                       Twig views, public/index.php)     │
├─────────────────────────────────────────────────────────┤
│  Application         (Services — use-case orchestrators)│
├─────────────────────────────────────────────────────────┤
│  Domain & Infra      (Models, Database\Repositories,    │
│                       Support\Csrf, Env, Container)     │
└─────────────────────────────────────────────────────────┘
```

- **Presentation** — Slim 4 router HTTP request-i alır, middleware silsiləsi keçir, controller-ə ötürür. Controller yalnız **giriş validasiyası + uyğun service çağırışı + view render** məsələləri ilə məşğuldur.
- **Application** — `App\Services` altındakı use-case sinifləri biznes əməliyyatlarını koordinasiya edir. Heç bir HTTP detalı bilməz.
- **Domain & Infrastructure** — `Models` saf data strukturunu, `Database\Repositories` isə PDO-ya bağlı persistent qatı təmsil edir. Service-lər repository **interface**-ləri ilə işləyə bilər (gələcəkdə inversion of control üçün hazır).

---

## 2. Niyə Slim 4? (Laravel deyil)

| Meyar | Slim 4 | Laravel |
|:---|:---|:---|
| Layihə ölçüsü | ~30 MB vendor | ~250 MB vendor |
| Boot vaxtı | ~5 ms | ~80 ms |
| Öyrənmə əyrisi | Çox aşağı (1 fayl-da app boot) | Yüksək (servis konteyner, eloquent, facades) |
| Legacy köprü | Asan — `index.php`-də fallback | Mürəkkəb — middleware/exception handler |
| 181 spagetti faylla yaşamaq | Mümkündür | Demək olar mümkünsüz |
| Hosting tələbi | Standart shared hosting | VPS / dedicated tövsiyə olunur |

**Qərar:** Slim 4 — minimal, mikro-framework yanaşması bu legacy migrasiya ssenarisinə tam uyğundur. PHP-DI 7 ilə autowire, Twig 3 ilə view, Monolog 3 ilə log əlavə olunduqda Laravel-in böyük hissə funksionallığı, lakin onun ağırlığı olmadan əldə edilir.

---

## 3. Legacy bridge (strangler fig pattern)

`public/index.php` aşağıdakı qaydaya görə işləyir:

```php
try {
    $app->run();                    // 1) Slim router-i çalışdır
} catch (HttpNotFoundException $e) {
    $legacyFile = legacy_path($_SERVER['REQUEST_URI']);
    if (is_file($legacyFile)) {
        require $legacyFile;        // 2) Legacy fayl mövcuddursa yüklə
    } else {
        throw $e;                   // 3) Həqiqi 404
    }
}
```

Bu yanaşma Martin Fowler-in **"strangler fig"** patterndinin sadələşdirilmiş tətbiqidir:

- Yeni route-lar Slim router-ə əlavə edilir → həmin URL artıq legacy-yə düşmür.
- Köhnə URL-lər toxunulmur, istifadəçi heç bir fərq hiss etmir.
- Hər sprintdə bir-iki legacy fayl yenidən yazılaraq Slim-ə daşınır; nəticədə legacy qovluğu zaman keçdikcə "boğulur" və yox olur.

---

## 4. Dependency Injection

`config/dependencies.php` faylında **PHP-DI 7** bütün konkret sinifləri autowire edir. Konfiqurasiyada yalnız:

- **interface → implementation** bağlamaları
- **scalar parametr** (məsələn DB DSN, log path) injection-ları

göstərilir. Controller, service, repository konstruktorları öz asılılıqlarını birbaşa elan edir; konteyner avtomatik həll edir. Bu Laravel-in service container-inin sadə, lakin tam funksional analoqudur.

---

## 5. Loglama strategiyası

Monolog 3 iki kanal istifadə edir:

- **app** kanalı — `storage/logs/app-YYYY-MM-DD.log` — gündəlik rotasiya, INFO və yuxarı.
- **error** kanalı — `storage/logs/error-YYYY-MM-DD.log` — yalnız ERROR/CRITICAL.

Loglar **strukturlu** (kontekst array) yazılır ki, gələcəkdə Loki / Elasticsearch kimi sistemlərə birbaşa export oluna bilsin.

---

## 6. Test strategiyası

| Tip | Yer | Məqsəd |
|:---|:---|:---|
| **Unit** | `tests/Unit/` | Service, Support sinifləri — saf məntiq, mock repository |
| **Feature** | `tests/Feature/` | HTTP simulyasiyası ilə end-to-end — Slim app birbaşa çağırılır, real DB (test schemas) işlədilir |

CI pipeline-da hər iki dəstə icra olunur. Code coverage hədəfi: **service qatı üçün 80%+**.

---

## 7. Gələcək miqrasiyalar

- **Eloquent / Doctrine?** — Hələ ki, sadə PDO repository-lərlə davam edirik. Schema mürəkkəbləşərsə Doctrine DBAL nəzərdən keçirilə bilər.
- **Queue?** — Ağır işlər (məsələn şəkil resize, mass mail) gələcəkdə **Symfony Messenger** + Redis transport ilə həll oluna bilər.
- **Real-time?** — WebSocket layer üçün **Ratchet** və ya ayrıca **Node.js + socket.io** servisi düşünülür.
- **API qatı?** — Mobil tətbiq üçün eyni service-ləri JSON controller-lər vasitəsilə təkrar istifadə edəcəyik.

---

## 8. Qərarlar siyahısı (ADR cədvəli)

| # | Qərar | Status |
|:---|:---|:---|
| 001 | Slim 4 (Laravel deyil) | Qəbul edildi |
| 002 | Twig 3 view layer | Qəbul edildi |
| 003 | PHP-DI 7 autowire konteyneri | Qəbul edildi |
| 004 | PDO + repository pattern (Eloquent yox) | Qəbul edildi |
| 005 | Legacy strangler fig fallback | Qəbul edildi |
| 006 | PHPUnit 11 + Unit/Feature ayrımı | Qəbul edildi |
| 007 | PSR-12 code style + phpcs CI yoxlaması | Qəbul edildi |
