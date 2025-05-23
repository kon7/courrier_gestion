#!/bin/bash

# Crée un fichier .env à partir des variables d'environnement Render
printenv | grep -E "^(APP_|DB_)" > .env

# Laravel setup (fait à l'exécution du container)
php artisan key:generate
php artisan config:cache
php artisan migrate --force || true
php artisan db:seed --force || true

# Lancer Apache en mode foreground
exec apache2-foreground
