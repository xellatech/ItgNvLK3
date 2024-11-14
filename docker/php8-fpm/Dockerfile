# See https://github.com/docker-library/php/blob/master/7.2/fpm/Dockerfile
FROM php:8.2-fpm-buster
ARG TIMEZONE

RUN apt-get update || apt-get update
RUN apt-get install -y \
    openssl \
    git \
    unzip \
    procps \
    acl \
    zlib1g-dev \
    gnupg \
    apt-transport-https \
    jpegoptim \
    optipng \
    wkhtmltopdf \
    libzip-dev \
    zip \
    nginx \
    cron

EXPOSE 80

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
# https://getcomposer.org/doc/03-cli.md#composer-allow-superuser
ENV COMPOSER_ALLOW_SUPERUSER=1
ENV COMPOSER_MEMORY_LIMIT=-1

# Set timezone
RUN ln -snf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime && echo ${TIMEZONE} > /etc/timezone
RUN printf '[PHP]\ndate.timezone = "%s"\n', ${TIMEZONE} > /usr/local/etc/php/conf.d/tzone.ini
RUN "date"

# Type docker-php-ext-install to see available extensions
RUN docker-php-ext-install pdo pdo_mysql opcache exif zip

#install soap
RUN apt-get update && \
    apt-get install -y libxml2-dev && \
    docker-php-ext-install soap

# install php intl
RUN apt-get install -y zlib1g-dev libicu-dev g++
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

# Install GD
RUN apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
     && docker-php-ext-configure gd \
          --with-freetype \
          --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-enable gd


# install yarn TODO: separate container
RUN apt-get update || apt-get update
RUN apt-get install -y \
    gnupg \
    apt-transport-https
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list

RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs \
        yarn

RUN useradd -ms /bin/bash www
RUN usermod -aG sudo www

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html
