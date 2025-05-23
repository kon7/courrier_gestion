#!/bin/bash

echo "➡️  Vérification des extensions PHP..."
php -m | grep -E 'PDO|pdo_pgsql|pdo_sqlite'

echo "📂 Attribution des permissions sur storage et bootstrap/cache..."
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

echo "🔐 Génération de la clé d'application..."
if [ ! -f .env ]; then
    cp .env.example .env
fi
php artisan key:generate

echo "⚙️ Mise en cache de la configuration..."
php artisan config:clear
php artisan config:cache

echo "🛠️ Exécution des migrations..."
php artisan migrate --force || echo "❌ Migration échouée, vérifie ta connexion DB."

echo "🌱 Exécution des seeders..."
php artisan db:seed --force || echo "❌ Seeder échoué."

echo "🚀 Lancement du serveur Apache..."
apache2-foreground
