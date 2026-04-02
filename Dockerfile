FROM richarvey/php-fpm-nginx:latest

# Copy application files
COPY . /var/www/html

# Environment variables for Nginx and PHP
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Install dependencies if not already there
RUN composer install --no-interaction --optimize-autoloader --no-dev --ignore-platform-reqs

# Fix permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Port is handled automatically by Railway
EXPOSE 80
