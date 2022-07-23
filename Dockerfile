FROM amd64/php:7.0.19-apache

RUN docker-php-pecl-install xdebug
RUN docker-php-ext-install mysqli && exec docker-php-entrypoint apache2-foreground
