## Turbo Laravel Kanban App

This is an example app of that uses [Turbo Laravel](https://turbo-laravel.com).

### Running it Locally

To run this app locally, you must:

1. Create the `.env` file, install the Composer dependencies, and generate the app key:

```bash
cp .env.example .env
composer install
php artisan key:generate
php artisan storage:link
```

2. You're going to have to start 3 processes (from different terminals), the local web server, the queue worker process, and the Reverb WebSockets server:

```bash
php artisan serve
php artisan queue:work --tries=1 --sleep=0
php artisan reverb:start
```

