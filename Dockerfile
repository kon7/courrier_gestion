# Utiliser l'image officielle PHP avec Apache
FROM php:8.2-apache

# Installer les extensions nécessaires
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpq-dev libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

# Activer le module Apache Rewrite
RUN a2enmod rewrite

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier tous les fichiers de l'application
COPY . .

# Copier la config Apache personnalisée
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Copier Composer depuis l'image officielle
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer les dépendances Laravel
RUN composer install --optimize-autoloader --no-dev

# Définir les permissions correctes
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Copier le script de démarrage personnalisé
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Utiliser le script comme point d'entrée
CMD ["/start.sh"]

# Exposer le port 80
EXPOSE 80
