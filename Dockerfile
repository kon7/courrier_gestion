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

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier Composer depuis l'image officielle
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer les dépendances Laravel
RUN composer install --optimize-autoloader --no-dev

# Définir les permissions correctes
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Générer la clé, cacher la config, migrer la DB, puis seed
RUN php artisan key:generate \
    && php artisan config:cache \
    && php artisan migrate --force || true \
    && php artisan db:seed --force || true

# Exposer le port 80
EXPOSE 80
