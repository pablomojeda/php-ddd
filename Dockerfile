FROM php:8.1-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN chown -R www-data:www-data /var/www/html/
RUN chmod -R 777 /var/www/html/

# Crear el directorio de la aplicación
WORKDIR /var/www/html

# Copiar archivos de la aplicación
COPY . .



# Copiar y configurar el script de inicio
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh
ENTRYPOINT ["docker-entrypoint.sh"]

# Puerto expuesto
EXPOSE 9000

# Comando por defecto
CMD ["php-fpm"]

