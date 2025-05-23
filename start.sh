#!/bin/bash

# Générer la clé si manquante
if [ ! -f /var/www/html/storage/oauth-private.key ]; then
  php artisan key:generate --force
fi

# Nettoyage et cache de configuration
php artisan config:clear
php artisan config:cache

# Migration de la base
php artisan migrate --force

# Lancer Apache
apache2-foreground
