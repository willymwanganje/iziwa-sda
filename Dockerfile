FROM php:8.1-apache

# Enable Apache Rewrite module
RUN a2enmod rewrite

# Install required packages and PHP extensions
RUN apt-get update && apt-get install -y \
    git zip unzip curl libpq-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Set working directory
WORKDIR /var/www/html

# Copy the project into the image
COPY . /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html

# Set Apache to serve from Yii2 frontend/web
RUN sed -i 's!/var/www/html!/var/www/html/frontend/web!g' /etc/apache2/sites-available/000-default.conf
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Install Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader
