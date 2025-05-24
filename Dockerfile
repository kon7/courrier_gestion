FROM php:8.2-apache

# Installer les dépendances système + extensions PHP requises
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    git \
    curl \
    zip \
    libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

# Activer mod_rewrite pour Laravel
RUN a2enmod rewrite

# Corriger le DirectoryIndex
RUN echo "<IfModule dir_module>\nDirectoryIndex index.php index.html\n</IfModule>" > /etc/apache2/conf-available/serve-index.conf \
    && a2enconf serve-index

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier le code Laravel dans le conteneur
COPY . .

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installer les dépendances PHP via Composer
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Droits d'accès complets
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 775 /var/www/html && \
    chown -R www-data:www-data /var/www/html/public && \
    chmod -R 775 /var/www/html/public && \
    chown -R www-data:www-data /var/www/html/storage && \
    chmod -R 775 /var/www/html/storage && \
    chown -R www-data:www-data /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/bootstrap/cache && \
    chown -R www-data:www-data /var/www/html/vendor && \
    chmod -R 775 /var/www/html/vendor && \
    chown -R www-data:www-data /var/www/html/public/storage/courriers && \
    chmod -R 775 /var/www/html/public/storage/courriers && \
    chown -R www-data:www-data /var/www/html/public/storage/documents && \
    chmod -R 775 /var/www/html/public/storage/documents


# Copier le script keep-alive
COPY keep-alive.sh /keep-alive.sh
RUN chmod +x /keep-alive.sh

# Copier la configuration Apache
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Copier le script de démarrage
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Lancer le script au démarrage
CMD ["/start.sh"]
