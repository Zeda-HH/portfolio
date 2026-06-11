#!/bin/bash
set -e

echo "Creating .env file..."
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

echo "Running migrations..."
php artisan migrate --force

echo "Seeding database..."
php artisan db:seed --force

echo "Linking storage..."
php artisan storage:link || true

echo "Starting server..."
php -S 0.0.0.0:${PORT:-8080} -t public