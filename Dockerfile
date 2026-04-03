FROM php:8.2-cli
ENV BUILD_VERSION=2026.04.03.12.02

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    curl \
    zip \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

# Install NodeJS and NPM
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# Copy application files
COPY . /var/www/html/
WORKDIR /var/www/html/

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-interaction --optimize-autoloader --no-dev --ignore-platform-reqs

# Clear old assets and Re-build
RUN rm -rf public/build && npm install && npm run build

# Fix permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public/build

# Port is provided by Railway
EXPOSE 8000

# Clear caches and set up DB
CMD php artisan view:clear && \
    php artisan config:clear && \
    php artisan cache:clear && \
    php artisan migrate --force && \
    php artisan db:seed --force && \
    php artisan serve --host=0.0.0.0 --port=$PORT
