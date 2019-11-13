### BASE IMAGE ###
FROM php:7.3-fpm-alpine

### SET DIRECTORY ###
WORKDIR /var/www

### INSTALL LIBS ###
RUN \
  docker-php-ext-install pdo_mysql

### INSTALL COMPOSER ###
RUN \
  php -r "readfile('http://getcomposer.org/installer%27);" | php -- --install-dir=/usr/bin/ --filename=composer

### COPY DIRECTORY ###
COPY . /var/www