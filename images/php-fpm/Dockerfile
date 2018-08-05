FROM php:7.1-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev unzip \
    sqlite3 libsqlite3-dev libmagickwand-dev \
    && docker-php-ext-install mcrypt

RUN echo 'date.timezone="Africa/Cairo"' >>  /usr/local/etc/php/conf.d/date.ini

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer
RUN curl -sSL https://phar.phpunit.de/phpunit.phar -o /usr/bin/phpunit && chmod +x /usr/bin/phpunit