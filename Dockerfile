# Utilise PHP 8.2 avec Apache
FROM php:8.2-apache

# Installer les dépendances système nécessaires
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip unzip git curl \
    libpq-dev libjpeg-dev libfreetype6-dev \
    postgresql-client \
    && rm -rf /var/lib/apt/lists/*

# Configurer GD pour JPEG/Freetype
RUN docker-php-ext-configure gd --with-freetype --with-jpeg

# Installer les extensions PHP nécessaires
RUN docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copier le projet
COPY . /var/www/html

# Définir le dossier public comme racine pour Apache
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

# Définir le dossier de travail
WORKDIR /var/www/html

# Installer les dépendances Laravel
RUN composer install --optimize-autoloader --no-dev
RUN composer dumpautoload -o

# Nettoyer les caches Laravel
RUN php artisan config:clear || true
RUN php artisan cache:clear || true

# Donner les droits nécessaires
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Exposer le port d'Apache
EXPOSE 80

# Commande par défaut : lancer migrations + seeders puis Apache
CMD ["apache2-foreground"]
