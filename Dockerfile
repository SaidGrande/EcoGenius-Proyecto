# Imagen base con Apache + PHP
FROM php:8.2-apache

# Instalar dependencias necesarias
RUN apt-get update && apt-get install -y \
    swi-prolog \
    && apt-get clean

# Habilitar módulos de Apache
RUN docker-php-ext-install mysqli

# Copiar archivos del proyecto al servidor
COPY src/ /var/www/html/

# Dar permisos correctos
RUN chown -R www-data:www-data /var/www/html

# Exponer el puerto
EXPOSE 80
