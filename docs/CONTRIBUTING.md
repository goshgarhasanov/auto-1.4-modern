# Töhfəçi bələdçisi

Layihəyə töhfə vermək istəyən hər kəs üçün rəhbər. Bu sənəddəki qaydalara riayət etmək Pull Request-in tez nəzərdən keçirilməsini və qəbul edilməsini asanlaşdırır.

---

## 1. Branch adlandırma

Branch adları aşağıdakı şablona uyğun olmalıdır:

```
<type>/<qısa-təsvir-kebab-case>
```

Tipləri:

| Prefix | İstifadə |
|:---|:---|
| `feat/` | Yeni xüsusiyyət |
| `fix/` | Səhv düzəlişi |
| `refactor/` | Davranış dəyişmir, struktur yenilənir |
| `chore/` | Build, asılılıqlar, CI |
| `docs/` | Yalnız sənədləşmə |
| `test/` | Test əlavə / dəyişiklik |
| `legacy/` | Legacy port işi |

**Nümunələr:**

```
feat/forum-topic-pagination
fix/csrf-token-expiry
refactor/user-repository-extract-interface
legacy/port-mafia-game-controller
```

---

## 2. Commit konvensiyası

[**Conventional Commits**](https://www.conventionalcommits.org/) standartına riayət edirik:

```
<type>(<scope>): <qısa təsvir>

[opsional uzun gövdə]

[opsional footer]
```

| type | Mənası |
|:---|:---|
| `feat` | Yeni xüsusiyyət |
| `fix` | Bug fix |
| `refactor` | Davranışı dəyişməyən struktur yeniləməsi |
| `perf` | Performans yaxşılaşdırması |
| `test` | Test əlavəsi / düzəlişi |
| `docs` | Sənəd |
| `chore` | Tooling, asılılıq, CI |
| `style` | Format, boşluq (kod məntiqi dəyişmir) |

**Nümunələr:**

```
feat(forum): add topic pagination with 25 items per page
fix(auth): correct CSRF token regeneration after login
refactor(users): extract UserRepositoryInterface
docs(readme): update installation steps for PHP 8.3
test(forum): add feature test for guest read access
```

Breaking change üçün footer:

```
feat(api): change /users response shape

BREAKING CHANGE: `name` field renamed to `display_name`
```

---

## 3. Pull Request şablonu

PR yaradan zaman aşağıdakı bölmələri doldur:

```markdown
## Nə dəyişdi?
<2-4 cümlə ilə dəyişikliyin xülasəsi>

## Niyə?
<problem və ya tələb>

## Necə yoxlamalı?
- [ ] Addım 1
- [ ] Addım 2

## Checklist
- [ ] PSR-12 yoxlanışı keçdi (`composer cs`)
- [ ] Bütün testlər yaşıldır (`composer test`)
- [ ] Yeni kod üçün test əlavə olundu
- [ ] Sənədləşmə (lazımdırsa) yeniləndi
- [ ] Heç bir secret commit-ə düşmədi
```

---

## 4. Code style

### PSR-12

Bütün PHP kodu **PSR-12** uyğun olmalıdır. Yoxlamaq:

```bash
composer cs           # phpcs
composer cs:fix       # phpcbf — avtomatik düzəliş
```

### Əlavə qaydalar

- `declare(strict_types=1);` — bütün yeni `app/` fayllarında məcburi
- `final class` — controller, service, repository default `final` olmalıdır (extension lazımdırsa açıqla)
- `readonly` — DI ilə injection olunan property-lər `readonly` olmalıdır
- `private` namespace — yeni siniflər `App\` altında düzgün ölçülmüş namespace-də yerləşməlidir
- Maksimum sətir uzunluğu: **120 simvol**
- Heç vaxt `var_dump`, `dd`, `print_r` kommit etmə — `composer cs` bunu yaxalayır

### Adlandırma

| Element | Konvensiya | Nümunə |
|:---|:---|:---|
| Sinif | `PascalCase` | `ForumController` |
| Method | `camelCase` | `latestTopics()` |
| Sabit | `SCREAMING_SNAKE` | `MAX_UPLOAD_SIZE` |
| Twig fayl | `kebab-case.twig` | `forum/topic-list.twig` |
| Route adı | `dot.notation` | `forum.topic.show` |

---

## 5. Test öncəliyi

PR qəbul olunmaq üçün:

1. **Yeni service** üçün **Unit test** mütləqdir.
2. **Yeni HTTP route** üçün ən azı bir **Feature test** olmalıdır (status code + response body assertion).
3. **Bug fix** üçün — əvvəlcə bug-u **göstərən test** yazılmalı, sonra fix edilməlidir (regression-proof).
4. Code coverage qatında geri-getmə (drop) qəbul edilmir.

```bash
composer test                     # bütün dəstə
composer test -- --filter ForumTest    # konkret sinif
composer test:coverage            # coverage hesabatı (storage/coverage/)
```

---

## 6. Legacy port qaydaları

Legacy fayl portu üçün ayrıca prosedur var — detal: [`MIGRATION_FROM_LEGACY.md`](MIGRATION_FROM_LEGACY.md).

Qısa şəkildə:

1. `legacy/<file>.php` faylını **silmə** — Slim route-u əlavə et, fayl avtomatik bypass olunacaq.
2. Eyni URL-i Slim controller ilə cavablayan PR yarat.
3. Manual smoke test (brauzerdən URL-i aç) məcburidir.

---

## 7. Müzakirə və dəstək

- **Issue açma** — bug, feature request, sual
- **PR review** — ən azı bir təsdiq lazımdır

Töhfəniz üçün təşəkkür edirik!
