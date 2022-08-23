#!/bin/bash
cp .env.example .env
sed -i 's/DB_HOST=127.0.0.1/DB_HOST=127.0.0.1/g' .env
sed -i 's/DB_DATABASE=laravel/DB_DATABASE=eletrodomesticos_projeto/g' .env
sed -i 's/DB_USERNAME=root/DB_USERNAME=wesley/g' .env
sed -i 's/DB_PASSWORD=/DB_PASSWORD=root/g' .env
composer install
#npm install
php artisan key:generate
php artisan config:cache
php artisan storage:link
sleep 10
php artisan migrate --path=database/migrations/tables
php artisan migrate --path=database/migrations/constraints
#php artisan migrate --path=database/migrations/procedures
php artisan db:seed
npm run dev 1>/dev/null 2>/dev/null
php artisan config:clear
php artisan cache:clear
chmod -R 777 storage/
php artisan serve --host=0.0.0.0 --port=8001