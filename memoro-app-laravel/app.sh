#!/bin/bash
apt update && apt install -y curl unzip git default-mysql-client

curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

docker-php-ext-install pdo pdo_mysql mbstring zip gd

chown -R www-data:www-data /memoro-app-laravel/storage
chown -R www-data:www-data /memoro-app-laravel/bootstrap/cache
chmod -R 775 /memoro-app-laravel/storage
chmod -R 775 /memoro-app-laravel/bootstrap/cache

sleep 10

composer install --no-interaction --prefer-dist

php artisan migrate

php artisan config:cache
php artisan route:cache
php artisan key:generate
php artisan storage:link# Inicia o servidor Laravel

php artisan serve --host=0.0.0.0 --port=80
