#!/bin/sh
set -e

# Génère la clé d'application si elle n'existe pas encore (sécurité, normalement déjà fournie via les variables d'environnement Render)
if [ -z "$APP_KEY" ]; then
  echo "ATTENTION : APP_KEY n'est pas définie dans les variables d'environnement Render."
fi

# Lance les migrations de la base de données (Neon/PostgreSQL)
php artisan migrate --force

# Met en cache la config pour de meilleures performances
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Démarre php-fpm en arrière-plan
php-fpm -D

# Démarre nginx au premier plan (garde le conteneur actif)
nginx -g "daemon off;"
