# Use the official PHP image as the base image
FROM php:8.1-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Copy existing application directory contents
COPY . /var/www/html

# Added for deployment on cloud run
# Copy your local .env file if needed
COPY .env.example /var/www/html/.env

# Install PHP dependencies (MISSING step you need)
RUN composer install --no-dev --optimize-autoloader

# Generate Laravel APP_KEY
RUN php artisan key:generate

# (Optional) Cache Laravel config to speed up
RUN php artisan config:cache
# Added for deployment on cloud run

# Copy existing application directory permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port 9000 and start php-fpm server
# EXPOSE 9000
# CMD ["php-fpm"]
EXPOSE 8080
CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]