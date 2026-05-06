# chat-app

Modern PHP 8.3 chat application skeleton. Runs in parallel to the legacy `chat/`
folder and shares the same MariaDB `chat` database.

Author: Goshgar Hasanzadeh

## Stack

- PHP 8.3
- Slim 4 (HTTP / routing)
- PHP-DI 7 (dependency injection)
- Twig 3 (templates)
- Monolog 3 (logging)
- vlucas/phpdotenv (env loading)

## Setup

```powershell
cd chat-app
composer install
copy .env.example .env
# Edit .env if your DB credentials differ from defaults.
```

Default DB config (matches the legacy app):

```
DB_HOST=localhost
DB_NAME=chat
DB_USER=root
DB_PASS=
```

## Run (development)

```powershell
php -S localhost:8002 -t public
```

Then open http://localhost:8002/.

The home page displays an online-user count which doubles as a database
connectivity check. Routes available out of the box:

| Method | Path        | Description                                 |
|--------|-------------|---------------------------------------------|
| GET    | `/`         | Home: online count, news, login form        |
| GET    | `/login`    | Login form                                  |
| POST   | `/login`    | Login submit                                |
| GET    | `/register` | Registration form                           |
| POST   | `/register` | Registration submit                         |
| GET    | `/logout`   | Destroy session                             |
| GET    | `/profile`  | Profile (requires authentication)           |

## Folder layout (Hexagonal / Clean Architecture)

```
chat-app/
  public/            <- web root, only index.php is exposed
    index.php
    assets/css/app.css
  src/
    Application/     <- HTTP layer (Actions = controllers, Middleware)
    Domain/          <- business logic & interfaces (User, Auth)
    Infrastructure/  <- adapters: PDO, Twig, etc.
  templates/         <- Twig templates
  config/            <- settings, dependencies, routes
  var/cache/         <- compiled twig cache
  var/log/           <- application log
```

## Adding a new endpoint

1. Create an action class in `src/Application/Actions/<Group>/<Name>Action.php`.
   Use constructor property promotion to inject services. The action's
   `__invoke(ServerRequestInterface $req, ResponseInterface $res)` method must
   return a `ResponseInterface`.
2. Register the route in `config/routes.php`:
   ```php
   $app->get('/foo', App\Application\Actions\FooAction::class)->setName('foo');
   ```
3. If the action needs auth, append `->add(AuthMiddleware::class)`.
4. Add a Twig template under `templates/` if needed and render it via
   `$this->twig->render($response, 'path.html.twig', [...])`.

## Adding a new domain

1. Create a folder under `src/Domain/<Aggregate>/`.
2. Define the entity (plain PHP class with readonly properties).
3. Define the repository **interface** in the same folder.
4. Implement the repository under `src/Infrastructure/Database/Pdo<Aggregate>Repository.php`.
5. Register the binding in `config/dependencies.php`:
   ```php
   YourRepository::class => \DI\autowire(PdoYourRepository::class),
   ```
6. Inject the interface (not the concrete class) into your services / actions.

## Legacy password compatibility

`PasswordHasher` accepts modern bcrypt hashes (`password_hash`) **and** the
legacy `base64_encode($plain)` format used by `chat/`. On a successful login
against a legacy hash, the password is transparently rehashed with bcrypt and
written back to the `users.pass` column.

## Notes

- The legacy `chat/` folder is untouched and continues to work on its own.
- Both apps point at the same MariaDB `chat` database so user accounts created
  by either side are usable in either app (after the password format is
  migrated on first login).
- CSRF protection is on by default for state-changing methods. Forms must
  include `<input type="hidden" name="csrf_token" value="{{ csrf_token }}">`.
