# Запуск проекта

***

1. назовите проект **_laravel-products-2_**
   - это нужно, чтобы корректно работали маршруты и пути в файлах для работы докера
2. Нужно создать Docker Compose. Если есть плагин Docker в PhpStorm (или в другой IDE), то нужно указать сервисы:
   php-fpm, nginx, postgres
3. создайте копии файлов .env.example в корне (для docker) и в папке src/ (для laravel)
4. запустить docker через плагин в IDE (или командой: docker compose up -d сервисы...)

Запуск миграций с сидрами (в терминале сервиса php-fpm):
`php artisan migrate:fresh -seed`