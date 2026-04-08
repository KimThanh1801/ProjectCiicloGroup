FROM php:8.2-fpm

# Cài dependencies cần thiết
RUN apt-get update && apt-get install -y \
    git curl zip unzip \
    libpng-dev libonig-dev libxml2-dev \
    libzip-dev

# Cài extension PHP
RUN docker-php-ext-install \
    pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy source
COPY . .

# Cài backend
RUN composer install --no-dev --optimize-autoloader

# Cài frontend
RUN npm install
RUN npm run build

# Phân quyền
RUN chown -R www-data:www-data /var/www

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000