# Base image: PHP 8.0 with Apache web server
FROM php:8.0-apache

# Install system dependencies required for PHP extensions and development tools
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

# Configure Apache document root
ENV APACHE_DOCUMENT_ROOT=/var/www/html
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Enable Apache modules: rewrite (for .htaccess) and headers (for security headers)
RUN a2enmod rewrite headers

# Install PHP extensions: MySQLi, PDO MySQL, and ZIP support
RUN docker-php-ext-install mysqli pdo_mysql zip

# Copy custom PHP configuration
COPY php.ini /usr/local/etc/php/conf.d/custom.ini

# Copy application files to web root
COPY . /var/www/html
