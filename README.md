# auto 1.4 — Modern Edition

Azərbaycan dilli onlayn çat skripti — qeydiyyat, mesajlaşma, otaqlar, forum, oyunlar, foto albom və admin paneli.

**Müəllif:** Goshgar Hasanzadeh

## Kurulum

```bash
git clone https://github.com/goshgarhasanov/auto-1.4-modern
cd auto-1.4-modern

# DB
mysql -uroot -e "CREATE DATABASE chat CHARACTER SET utf8 COLLATE utf8_general_ci"
mysql -uroot chat < sql.sql
```

DB parametrləri `chat/BAZA.php` içində.

## Çalıştır

```bash
php -S localhost:8000 -t chat
```

Aç: http://localhost:8000

## Tələblər

- PHP 5.6 — 8.3
- MySQL 5.7+ / MariaDB 10.4+
