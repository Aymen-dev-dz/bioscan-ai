FROM php:8.2-apache

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libsqlite3-dev \
    zip \
    unzip \
    git \
    && rm -rf /var/lib/apt/lists/*

# Configurer PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql pdo_sqlite

# Activer le mod_rewrite d'Apache pour Laravel
RUN a2enmod rewrite

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier le projet
COPY . .

# Installer les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# Préparer le fichier .env et générer la clé
RUN cp .env.example .env && php artisan key:generate

# S'assurer que la base sqlite existe
RUN mkdir -p database && touch database/database.sqlite && chmod 777 database/database.sqlite

# Fixer les permissions
RUN chown -R www-data:www-data storage bootstrap/cache database

# Configurer Apache pour pointer vers /public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

EXPOSE 80
CMD rm -rf public/storage && php artisan storage:link && php artisan migrate --force && php artisan db:seed --force && apache2-foreground
