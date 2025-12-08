FROM php:8.0-apache

RUN apt-get update && apt-get install -y \
    git \
    zip \
    curl \
    sudo \
    unzip \
    libzip-dev \
    libicu-dev \
    libbz2-dev \
    libpng-dev \
    libjpeg-dev \
    libmcrypt-dev \
    libreadline-dev \
    libfreetype6-dev \
    g++

ENV APACHE_DOCUMENT_ROOT=/var/www/html
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN a2enmod rewrite headers
RUN echo "ServerTokens Prod" >> /etc/apache2/apache2.conf && echo "ServerSignature Off" >> /etc/apache2/apache2.conf

RUN docker-php-ext-install mysqli pdo_mysql zip

COPY php.ini /usr/local/etc/php/conf.d/custom.ini

COPY . /var/www/html
