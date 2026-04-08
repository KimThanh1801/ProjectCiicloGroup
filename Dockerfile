FROM php:8.2-fpm

# Cài package cần thiết
RUN apt-get update && apt-get install -y \
    git curl zip unzip \
    libpng-dev libonig-dev libxml2-dev \
    libzip-dev libpq-dev

# Cài extension PHP (QUAN TRỌNG: có PostgreSQL)
RUN docker-php-ext-install \
    pdo pdo_mysql pdo_pgsql pgsql mbstring exif pcntl bcmath gd zip

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set thư mục làm việc
WORKDIR /var/www

# Copy source code
COPY . .

# Cài Laravel dependencies
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Phân quyền
RUN chown -R www-data:www-data /var/www

# Port Render dùng
EXPOSE 10000

# Chạy Laravel + migrate
CMD php artisan config:clear && php artisan migrate --force && php artisan config:cache && php artisan serve --host=0.0.0.0 --port=10000