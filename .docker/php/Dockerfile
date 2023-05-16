FROM php:8.2-fpm

RUN apt update \
    && apt install -y zip libicu-dev libzip-dev zlib1g-dev libpq-dev git \
    && docker-php-ext-install intl pdo pdo_pgsql pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip \
    && rm -rf /var/lib/apt/lists/*

RUN apt-get -q update && apt-get -qy install netcat \
    jpegoptim optipng pngquant gifsicle webp \
    imagemagick libfreetype6-dev libjpeg62-turbo-dev libgd-dev libjpeg-dev libpng-dev libwebp-dev libonig-dev libxpm-dev \
    libmagickwand-dev libxml2-dev libxslt-dev \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) gd exif \
    && rm -rf /var/lib/apt/lists/* \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN apt-get update \
    && apt-get install -y \
        librabbitmq-dev \
        libssh-dev \
    && docker-php-ext-install \
        bcmath \
        sockets \
    && pecl install amqp \
    && docker-php-ext-enable amqp

WORKDIR /var/www/app/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version 2.5.5
RUN curl -sS --fail --location https://github.com/symfony/cli/releases/download/v4.28.1/symfony_linux_amd64.gz |gunzip > /usr/local/bin/symfony  \
    && chmod +x /usr/local/bin/symfony \
    && mkdir /.symfony/ && chmod 0777 /.symfony/ \
    && mkdir var && chmod -R 0777 var/ \
