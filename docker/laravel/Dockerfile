FROM php:8.0.2-fpm

WORKDIR /var/www/html

RUN apt-get update -y \
    && apt-get install libzip-dev libicu-dev libpq-dev libmcrypt-dev libonig-dev libsodium-dev git -y \
    && rm -r /var/lib/apt/lists/* \
    && docker-php-ext-install \
        zip \
        mbstring \
        pdo \
        pdo_mysql \
        zip \
        opcache \
        sodium

# Install xdebug
RUN pecl install xdebug-3.1.5
RUN docker-php-ext-enable xdebug
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_host=127.0.0.1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.remote_port=9000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.coverage_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN echo "upload_max_filesize=100M" >> /usr/local/etc/php/conf.d/php.ini
RUN echo "post_max_size=100M" >> /usr/local/etc/php/conf.d/php.ini
RUN echo "memory_limit=512M" >> /usr/local/etc/php/conf.d/php.ini

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

RUN chown -R www-data:www-data /var/www/html

EXPOSE 9090

CMD ["php-fpm"]
