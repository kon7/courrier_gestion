# Étape 1 : Base PHP avec Apache
FROM php:8.2-apache

# Étape 2 : Installer les dépendances système
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpq-dev \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_pgsql zip

# Étape 3 : Activer mod_rewrite pour Laravel
RUN a2enmod rewrite

RUN echo "ServerName localhost" > /etc/apache2/conf-available/servername.conf \
    && a2enconf servername


# Étape 4 : Définir le répertoire de travail
WORKDIR /var/www/html

# Étape 5 : Copier les fichiers du projet Laravel dans l'image
COPY . .

# Étape 6 : Copier automatiquement le .env si absent
RUN if [ ! -f .env ]; then cp .env.example .env; fi

# Étape 7 : Installer les dépendances PHP
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    composer install --no-interaction --no-scripts --optimize-autoloader

# Étape 8 : Fixer les permissions
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Étape 9 : Lancer les scripts Laravel au démarrage
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Étape 10 : Définir le script de démarrage
CMD ["/start.sh"]
