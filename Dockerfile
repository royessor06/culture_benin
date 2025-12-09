# Utilise PHP 8.2 avec Apache
FROM php:8.2-apache

# Installer les extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copier les fichiers du projet
COPY . /var/www/html

WORKDIR /var/www/html

RUN php artisan key:generate

# Installer les dépendances Laravel
RUN composer install

# Donner les droits nécessaires
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Exposer le port d'Apache
EXPOSE 80

# Commande par défaut
CMD ["apache2-foreground"]
