FROM php:8.2-fpm

# Cài các thư viện cần thiết
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev \
    nodejs npm

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Thư mục làm việc
WORKDIR /var/www

# Copy toàn bộ source code
COPY . .

# Cài backend (Laravel)
RUN composer install --no-dev --optimize-autoloader

# Cài frontend (Vue)
RUN npm install
RUN npm run build

# Phân quyền
RUN chown -R www-data:www-data /var/www

# Mở port
EXPOSE 10000

# Chạy Laravel
CMD php artisan serve --host=0.0.0.0 --port=10000