# Administrador Consultas

## Install
composer update
php artisan key:generate
php artisan serve

## Migrate
php artisan db:seed --class=ConsultasSeeder 

php artisan migrate --step=3