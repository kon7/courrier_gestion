#!/bin/bash

echo "➡️  Vérification des extensions PHP..."
php -m | grep -i pdo

echo "📂 Attribution des permissions sur storage et bootstrap/cache..."
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

echo "🔐 Génération de la clé d'application..."
php artisan key:generate

echo "⚙️ Mise en cache de la configuration..."
php artisan config:cache

echo "🛠️ Exécution des migrations..."
php artisan migrate --force || true

echo "🌱 Exécution des seeders..."
php artisan db:seed --force || true

echo "🚀 Lancement du serveur Apache..."
exec apache2-foreground
