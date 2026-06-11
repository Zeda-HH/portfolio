FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpq-dev \
    unzip \
    zip \
    && docker-php-ext-install pdo pdo_pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN mkdir -p storage/framework/sessions \
    storage/framework/views \
    storage/framework/cache/data \
    storage/logs \
    bootstrap/cache \
    && chmod -R 777 storage bootstrap/cache

EXPOSE 8080

ENTRYPOINT ["/bin/sh", "-c", "echo \"APP_NAME=Portfolio\nAPP_ENV=production\nAPP_DEBUG=true\nAPP_KEY=$APP_KEY\nAPP_URL=$APP_URL\nDB_CONNECTION=pgsql\nDB_HOST=$DB_HOST\nDB_PORT=$DB_PORT\nDB_DATABASE=$DB_DATABASE\nDB_USERNAME=$DB_USERNAME\nDB_PASSWORD=$DB_PASSWORD\nCACHE_DRIVER=file\nSESSION_DRIVER=file\nQUEUE_CONNECTION=sync\nADMIN_EMAIL=$ADMIN_EMAIL\nADMIN_PASSWORD=$ADMIN_PASSWORD\" > /app/.env && php artisan migrate --force && php artisan db:seed --force && php artisan storage:link || true && php artisan config:clear && php -S 0.0.0.0:${PORT:-8080} -t public"]