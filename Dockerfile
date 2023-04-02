FROM php:8.2-apache

RUN apt-get update

# 1. development packages
RUN apt-get install -y \
    git \
    zip \
    curl \
    cron \
    sudo \
    nano \
    unzip \
    libicu-dev \
    libbz2-dev \
    libpng-dev \
    libjpeg-dev \
    libmcrypt-dev \
    libreadline-dev \
    libfreetype6-dev \
    libzip-dev \
    libpq-dev \
    libmemcached-dev \
    supervisor \
    g++

# 2. apache configs + document root
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 3. mod_rewrite for URL rewrite and mod_headers for .htaccess extra headers like Access-Control-Allow-Origin-
RUN a2enmod rewrite headers

# 4. start with base php config, then add extensions
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN docker-php-ext-install \
    gd \
    bz2 \
    intl \
    exif  \
    iconv  \
    bcmath  \
    opcache  \
    calendar  \
    pdo_mysql  \
    zip

# 5. composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


# 7. node/npm
RUN curl -sL https://deb.nodesource.com/setup_12.x | sudo -E bash -
RUN sudo apt -y install nodejs

# 10. cron
# Create the log file to be able to run tail
RUN touch /var/log/cron.log

# Setup cron job
RUN crontab
#/var/spool/crontab/root
RUN (crontab -l ; echo "* * * * * /usr/local/bin/php /var/www/html/artisan schedule:run >> /dev/null 2>&1") | crontab
