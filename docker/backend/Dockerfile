FROM php:8.0-apache

# Install libs needed
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip

RUN docker-php-ext-install mysqli pdo pdo_mysql

# Composer install
COPY --from=composer:2.3 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Setup www-data user
# RUN chown -R www-data:www-data ./

RUN a2enmod rewrite