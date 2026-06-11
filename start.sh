#!/bin/bash

cat > /app/.env << ENVEOF
APP_NAME="Portfolio"
APP_ENV=production
APP_DEBUG=true
APP_KEY=${APP_KEY}
APP_URL=${APP_URL}
DB_CONNECTION=pgsql
DB_HOST=${DB_HOST}
DB_PORT=${DB_PORT}
DB_DATABASE=${DB_DATABASE}
DB_USERNAME=${DB_USERNAME}
DB_PASSWORD=${DB_PASSWORD}
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
ADMIN_EMAIL=${ADMIN_EMAIL}
ADMIN_PASSWORD=${ADMIN_PASSWORD}
ENVEOF

php artisan migrate --force
php artisan db:seed --force
php artisan storage:link
php artisan config:clear
sleep 2
php -S 0.0.0.0:${PORT:-8080} -t public