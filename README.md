# Laravel 8 SOA, Json-rpc client

Для установки выполните следующие шаги:

+ Склонируйте репозиторий
+ Перейдите в консоли в директорию с проектом
+ `composer install`
+ `cp .env-example .env`
+ В файле .env замените параметр DATA_BASE_URI на свой путь к SOA Json-rpc server
+ `php artisan key:generate`
+ Настройте ваш веб-сервер для работы с сайтом
+ Выполните тесты (перед выполнением тестов должен быть настроен SOA Json-rpc server) `php artisan test`
