# Utiliser l'image officielle PHP avec Apache
FROM php:8.2-apache

# Installer les extensions nécessaires
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpq-dev libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

# Activer le module Apache Rewrite
RUN a2enmod rewrite

# Copier les fichiers de l'application
COPY . /var/www/html

# Travailler depuis le dossier de Laravel
WORKDIR /var/www/html

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer les dépendances Laravel
RUN composer install --optimize-autoloader --no-dev

# Définir les permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Exposer le port 80
EXPOSE 80
