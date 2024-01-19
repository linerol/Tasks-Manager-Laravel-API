FROM php:8.1.0-fpm

# Install dependencies
RUN apt-get update -y && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip-dev \
    libpq-dev \
    libonig-dev \
    default-mysql-client

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install zip
RUN docker-php-ext-install exif
RUN docker-php-ext-install pcntl


# RUN docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl  # Modified this line
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
ADD . /var/www
WORKDIR /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www


USER www

RUN chown -R www:www /var/www/storage /var/www/bootstrap/cache
RUN chown -R www:www /var/www/storage/framework/views


# Expose port 9000 and start php-fpm server
EXPOSE 9000

CMD ["/bin/bash", "-c", "php-fpm; php artisan serve --host=0.0.0.0"]