FROM php:8.1-fpm

# Instalacja zależności
RUN apt-get update && apt-get install -y \
    curl \
    zip \
    unzip \
    git \
    libicu-dev \
    libonig-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev

# Instalacja rozszerzeń PHP
RUN docker-php-ext-install \
    pdo_mysql \
    opcache \
    intl \
    mbstring \
    zip \
    gd

# Ustawienie katalogu roboczego
WORKDIR /var/www/html
