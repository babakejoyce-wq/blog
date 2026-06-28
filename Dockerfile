# ---- Étape 1 : dépendances PHP (Composer) ----
FROM composer:2 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --ignore-platform-reqs

# ---- Étape 2 : image finale PHP + Nginx ----
FROM php:8.3-fpm

# Dépendances système nécessaires à Laravel + extensions PHP courantes
RUN apt-get update && apt-get install -y \
    nginx \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    libonig-dev \
    && docker-php-ext-install pdo pdo_pgsql pdo_mysql mbstring zip bcmath \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

# Copie le code de l'application
COPY . .

# Copie les dépendances installées à l'étape 1
COPY --from=vendor /app/vendor ./vendor

# Génère l'autoloader complet maintenant que tout le code est présent
RUN composer dump-autoload --optimize --no-dev

# Permissions nécessaires pour Laravel (storage, cache)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Configuration Nginx
COPY docker/nginx.conf /etc/nginx/sites-available/default

# Script de démarrage : lance migrations + php-fpm + nginx
COPY docker/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

EXPOSE 10000

CMD ["/usr/local/bin/start.sh"]
