# Legacy → Modern MVC miqrasiyası

Bu sənəd `legacy/` qovluğundakı köhnə spagetti PHP fayllarının yeni `app/` MVC strukturuna **mərhələli, təhlükəsiz** köçürülməsi üçün rəhbərdir.

---

## 1. Niyə legacy/ saxlanılır?

`legacy/` qovluğunda **181 PHP faylı** var. Bu fayllar onilliklər boyu istifadə olunan, real istifadəçi trafiği qəbul edən kodu təmsil edir. Onları bir gecədə yenidən yazmaq:

- Çox sayda regression riski yaradar
- Aylarla yayım dondurmağa məcbur edər
- Real istifadəçilər üçün mütləq bug doğurar

Bunun əvəzinə **strangler fig** patterndindən istifadə edirik: yeni kod köhnəni **qat-qat** əhatə edir, hər sprintdə bir-iki route köhnədən yeniyə "boğularaq" köçürülür. `public/index.php` front controller-i hər iki sistemin birgə işləməsini təmin edir:

```
HTTP request
    ↓
public/index.php
    ↓
Slim router → tapıldı? → MVC controller (yeni kod)
    ↓
Slim 404 → legacy/<path>.php var? → require (köhnə kod)
    ↓
yox → həqiqi 404
```

---

## 2. Port pattern (addım-addım)

Tutaq ki, `legacy/forum.php` faylını portlamaq istəyirik. Aşağıdakı 7 addımı izlə:

### Addım 1 — Köhnə faylı oxu və xəritələ

`legacy/forum.php` faylını oxu, aşağıdakıları qeyd et:

| Aspect | Qeyd nümunəsi |
|:---|:---|
| URL pattern | `GET /forum.php`, `GET /forum.php?id=42` |
| DB cədvəlləri | `forum_topics`, `forum_replies` |
| Sessiya tələbi | `$_SESSION['user_id']` lazımdır |
| Output | HTML — header, body, navbar daxil |
| Yan effektlər | view_count++ artırır |

### Addım 2 — Repository sinifi yarat

`app/Database/Repositories/ForumTopicRepository.php`:

```php
<?php

declare(strict_types=1);

namespace App\Database\Repositories;

use PDO;

final class ForumTopicRepository
{
    public function __construct(private readonly PDO $pdo) {}

    public function latest(int $limit = 25): array
    {
        $stmt = $this->pdo->prepare(
            'SELECT id, title, author_id, created_at
             FROM forum_topics
             ORDER BY created_at DESC
             LIMIT :limit'
        );
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM forum_topics WHERE id = :id');
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row ?: null;
    }

    public function incrementViewCount(int $id): void
    {
        $this->pdo->prepare('UPDATE forum_topics SET view_count = view_count + 1 WHERE id = :id')
            ->execute([':id' => $id]);
    }
}
```

### Addım 3 — Service yarat (use-case)

`app/Services/ForumService.php`:

```php
<?php

declare(strict_types=1);

namespace App\Services;

use App\Database\Repositories\ForumTopicRepository;

final class ForumService
{
    public function __construct(
        private readonly ForumTopicRepository $topics,
    ) {}

    public function listLatest(int $limit = 25): array
    {
        return $this->topics->latest($limit);
    }

    public function viewTopic(int $id): ?array
    {
        $topic = $this->topics->findById($id);
        if ($topic !== null) {
            $this->topics->incrementViewCount($id);
        }
        return $topic;
    }
}
```

### Addım 4 — Controller yarat

`app/Http/Controllers/ForumController.php`:

```php
<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\ForumService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpNotFoundException;
use Slim\Views\Twig;

final class ForumController
{
    public function __construct(
        private readonly ForumService $forum,
        private readonly Twig $view,
    ) {}

    public function index(Request $request, Response $response): Response
    {
        return $this->view->render($response, 'forum/index.twig', [
            'topics' => $this->forum->listLatest(25),
        ]);
    }

    public function show(Request $request, Response $response, array $args): Response
    {
        $topic = $this->forum->viewTopic((int) $args['id']);
        if ($topic === null) {
            throw new HttpNotFoundException($request);
        }

        return $this->view->render($response, 'forum/show.twig', [
            'topic' => $topic,
        ]);
    }
}
```

### Addım 5 — Twig şablonları yarat

`views/forum/index.twig`:

```twig
{% extends 'layouts/base.twig' %}

{% block title %}Forum{% endblock %}

{% block content %}
    <h1>Forum</h1>
    <ul class="topic-list">
        {% for topic in topics %}
            <li>
                <a href="/forum/{{ topic.id }}">{{ topic.title }}</a>
                <small>{{ topic.created_at }}</small>
            </li>
        {% endfor %}
    </ul>
{% endblock %}
```

### Addım 6 — Route əlavə et

`routes/web.php`:

```php
use App\Http\Controllers\ForumController;

$app->get('/forum',         [ForumController::class, 'index'])->setName('forum.index');
$app->get('/forum/{id:\d+}', [ForumController::class, 'show'])->setName('forum.show');
```

> Köhnə URL geriyə uyğunluğu üçün:
> ```php
> $app->get('/forum.php', fn ($req, $res) =>
>     $res->withHeader('Location', '/forum')->withStatus(301));
> ```

### Addım 7 — Test yaz

`tests/Feature/ForumIndexTest.php`:

```php
<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\Feature\TestCase;

final class ForumIndexTest extends TestCase
{
    public function test_forum_index_returns_200_and_lists_topics(): void
    {
        $response = $this->get('/forum');

        $this->assertSame(200, $response->getStatusCode());
        $this->assertStringContainsString('Forum', (string) $response->getBody());
    }
}
```

---

## 3. Legacy faylı silmək?

**Hələ ki, silmə.** Aşağıdakı yoxlama siyahısı keçməyincə legacy fayl saxlanılır:

- [ ] Yeni route Slim-də işləyir (manual smoke test)
- [ ] Feature test yaşıldır
- [ ] Köhnə URL `/forum.php` 301 redirect edir
- [ ] Production-da 1 həftə müşahidə olunub, error log-da nəsə yoxdur

Bu meyarlar tamamlandıqda `legacy/forum.php` faylı silinə bilər və PR mesajında qeyd olunur:

```
refactor(forum): remove legacy/forum.php (replaced by ForumController)
```

---

## 4. Tez-tez rastlanan tələlər

### Sessiya formatı

Köhnə kod bəzən birbaşa `$_SESSION` yazır. Yeni kod **session middleware** üzərindən gedir. Ortaq `$_SESSION` strukturu saxlanılır ki, hibrid mərhələdə login state hər iki sistemdə işləsin.

### Cədvəl adları və qeyri-standart sahələr

Köhnə DB sxeması bəzən qarışıq adlandırma istifadə edir (`top_5_user`, `xon_top` və s.). Repository-lərdə bu adları **dəyişmə**, lakin metoda **mənalı ad** ver:

```php
// SQL-də original ad — köhnə cədvəl
SELECT * FROM xon_top
// PHP method — sənaye standartı
public function fetchUserRanking(): array
```

### Output buffering

Bəzi legacy fayllar `header()` çağırışı edir, bəziləri birbaşa echo-layır. Yeni controller-lər `$response` obyekti qaytardığına görə bu konflikt törətmir — legacy fallback öz nizamlamasında qalır.

### Global dəyişənlər

`legacy/` qovluğundakı bəzi fayllar `$site_url`, `$user`, `$db` kimi globallarla işləyir. Yeni kodda **bunları qətiyyən** istifadə etmə — DI vasitəsilə servisləri inject et.

---

## 5. Miqrasiya qrafiki

| Legacy fayl | Yeni controller | Status |
|:---|:---|:---:|
| `legacy/index.php` | `HomeController` | ✅ |
| `legacy/login.php` | `AuthController@login` | ✅ |
| `legacy/forum.php` | `ForumController` | 🔄 |
| `legacy/profile.php` | `ProfileController` | ⏳ |
| `legacy/mafia.php` | `Game\MafiaController` | ⏳ |
| `legacy/cards.php` | `Game\CardsController` | ⏳ |
| `legacy/messages.php` | `MessageController` | ⏳ |
| ... | ... | ⏳ |

Legenda: ✅ tamamlandı · 🔄 davam edir · ⏳ planda

---

## 6. Yardım

Hər portu üçün suallar yarana bilər. Belə hallarda **Issue aç** və `legacy-port` etiketi qoy. Köhnə kodun davranışına dair dialoqu PR-da deyil, Issue-da aparmaq daha rahatdır.
