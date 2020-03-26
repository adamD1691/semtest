FROM php:7.2-fpm

RUN apt-get update && apt-get install -y zlib1g-dev libicu-dev g++ libcurl4-openssl-dev libpng-dev libjpeg-dev libmcrypt-dev less vim libpq-dev libxml2-dev gnumeric
RUN docker-php-ext-install pdo pdo_mysql intl curl gd zip mbstring tokenizer xml bcmath pcntl
RUN pecl install mcrypt-1.0.1 && pecl install xdebug

## Configure PHP CLI
#COPY ./docker-conf/php/conf/php.ini /etc/php/conf.d/custom.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer config --global github-oauth.github.com 95b651e1d43110b5fdf050d78b67eed3a5f3aeac

RUN echo 'alias pp="./phpunit"' >> ~/.bashrc

