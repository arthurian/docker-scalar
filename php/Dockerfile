FROM php:7.2-fpm-alpine3.9

ARG WITH_XDEBUG=false

RUN apk update; \
    apk upgrade; \
    apk add --no-cache mysql-client libmcrypt-dev libltdl $PHPIZE_DEPS

# install GD imaging library for PHP (required by scalar)
RUN apk add --no-cache freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev && \
    docker-php-ext-configure gd \
        --with-gd \
        --with-freetype-dir=/usr/include/ \
        --with-png-dir=/usr/include/ \
        --with-jpeg-dir=/usr/include/ && \
    NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
    docker-php-ext-install -j${NPROC} gd && \
    apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev

# install mcrypt for PHP (required by scalar)
RUN docker-php-ext-install mysqli \
    && pecl install mcrypt-1.0.2 \
    && docker-php-ext-enable mcrypt

# install exif for working with image metadata (required by scalar)
RUN docker-php-ext-install exif && \
     docker-php-ext-enable exif

# optionally install xdebug library for development/debugging
RUN if [ $WITH_XDEBUG = "true" ] ; then \
        pecl install xdebug-2.7.2; \
        docker-php-ext-enable xdebug; \
        echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
        echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
    fi ;