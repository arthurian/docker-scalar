FROM php:7.3.4-fpm-alpine3.9

ARG WITH_XDEBUG=false

RUN apk update; \
    apk upgrade; \
    apk add --no-cache mysql-client libmcrypt-dev libltdl $PHPIZE_DEPS

RUN docker-php-ext-install mysqli \
    && pecl install mcrypt-1.0.2 && docker-php-ext-enable mcrypt

RUN if [ $WITH_XDEBUG = "true" ] ; then \
        pecl install xdebug-2.7.2; \
        docker-php-ext-enable xdebug; \
        echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
    fi ;