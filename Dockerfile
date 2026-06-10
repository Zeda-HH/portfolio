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

CMD php artisan config:clear && \
    php artisan migrate --force && \
    php artisan db:seed --force && \
    php artisan storage:link && \
    php artisan config:cache && \
    php artisan route:cache && \
    php -S 0.0.0.0:8080 -t public