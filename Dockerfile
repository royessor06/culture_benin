# Utilise PHP 8.2 avec Apache
FROM php:8.2-apache

# Installer les extensions PHP nécessaires et PostgreSQL
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libpq-dev \
    && docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copier les fichiers du projet
COPY . /var/www/html

# Définir le dossier public comme racine pour Apache
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

# Installer les dépendances Laravel
WORKDIR /var/www/html
RUN composer install --optimize-autoloader --no-dev
RUN composer dumpautoload -o

# Donner les droits nécessaires
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Ne PAS faire migrate ici ! (la DB n'est pas encore prête sur Render)
# Les migrations seront lancées via Render "Post Deploy Command"

# Exposer le port d'Apache
EXPOSE 80

# Commande par défaut
CMD ["apache2-foreground"]
