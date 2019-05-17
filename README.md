# LoL Personal Data

## Download Homestead

https://readouble.com/laravel/5.8/ja/homestead.html

## Getting Started

```sh
cp .env.example .env 
composer install 
yarn install --no-bin-links 
php artisan key:generate 
```

## Database

migrate

```sh
php artisan migrate
```

check migarete result

```sh
$ psql -U homestead -h localhost

homestead=# \d
                 List of relations
 Schema |       Name        |   Type   |   Owner
--------+-------------------+----------+-----------
 public | champion          | table    | homestead
 public | migrations        | table    | homestead
 public | migrations_id_seq | sequence | homestead
(3 rows)

homestead=# \d champion
                           Table "public.champion"
   Column   |              Type              | Collation | Nullable | Default
------------+--------------------------------+-----------+----------+---------
 id         | bigint                         |           | not null |
 name       | character varying(255)         |           | not null |
 icon_url   | character varying(255)         |           | not null |
 created_at | timestamp(0) without time zone |           |          |
 updated_at | timestamp(0) without time zone |           |          |
```
