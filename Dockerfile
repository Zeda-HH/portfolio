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

CMD php -r "file_put_contents('.env', 'APP_NAME=\"Portfolio\"\nAPP_ENV=production\nAPP_DEBUG=false\nAPP_KEY=' . getenv('APP_KEY') . '\nAPP_URL=' . getenv('APP_URL') . '\nDB_CONNECTION=pgsql\nDB_HOST=' . getenv('DB_HOST') . '\nDB_PORT=' . getenv('DB_PORT') . '\nDB_DATABASE=' . getenv('DB_DATABASE') . '\nDB_USERNAME=' . getenv('DB_USERNAME') . '\nDB_PASSWORD=' . getenv('DB_PASSWORD') . '\nCACHE_DRIVER=file\nSESSION_DRIVER=file\nQUEUE_CONNECTION=sync\nADMIN_EMAIL=' . getenv('ADMIN_EMAIL') . '\nADMIN_PASSWORD=' . getenv('ADMIN_PASSWORD') . '\n');" && php artisan migrate --force && php artisan db:seed --force && php artisan storage:link && php artisan config:cache && php artisan route:cache && php -S 0.0.0.0:8080 -t public