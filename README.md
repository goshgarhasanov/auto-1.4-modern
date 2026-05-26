<div align="center">

# Goshgar.Az — auto 1.4 Modern Edition

### A classic Azerbaijani online chat script, rebuilt on a modern MVC architecture

![PHP](https://img.shields.io/badge/PHP-8.3-777BB4?logo=php&logoColor=white)
![Slim](https://img.shields.io/badge/Slim-4-6db317)
![License](https://img.shields.io/badge/license-MIT-green)

</div>

---

## Overview

**auto 1.4 — Modern Edition** is a ground-up modernization of a classic, legacy WAP-era Azerbaijani chat script. The old code is preserved under `legacy/`, while the new application is rebuilt on a clean **MVC architecture** with modern PHP practices — prepared statements (PDO), `bcrypt` password hashing, routing, templating and tests.

## Highlights

- 🏗️ **Modern MVC** — controllers, routing, views, config separation
- 🔐 **Security** — `bcrypt` password hashing, PDO prepared statements (no more raw SQL)
- 🧩 Built on a **Slim 4 / Twig / PHP-DI** style stack
- 🗄️ Database migrations/schema under `database/`
- 🧪 PHPUnit tests + PHP_CodeSniffer (`phpcs`)
- 🕰️ Original legacy script kept in `legacy/` for reference

## Tech Stack

**PHP 8.3**, Slim-style routing, Twig templating, PDO, Composer.

## Getting Started

```bash
git clone https://github.com/goshgarhasanov/auto-1.4-modern.git
cd auto-1.4-modern
composer install
cp .env.example .env        # configure DB credentials
php -S localhost:8000 -t public
```

## Project Structure

```
auto-1.4-modern/
├── app/            # MVC application (controllers, models, services)
├── routes/         # route definitions
├── views/          # Twig templates
├── config/
├── database/       # schema / migrations
├── public/         # web root (front controller)
├── legacy/         # original WAP-era script
└── tests/          # PHPUnit
```

## License

MIT © Goshgar Hasanzadeh
