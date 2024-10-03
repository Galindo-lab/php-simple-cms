#!/bin/bash

# Actualizar el repositorio de paquetes e instalar dependencias
apt-get update && apt-get install -y libpng-dev libjpeg-dev

# Configurar y habilitar GD con soporte para JPEG
docker-php-ext-configure gd --with-jpeg

# Instalar las extensiones necesarias como GD y mysqli
docker-php-ext-install gd mysqli

# Habilitar el módulo rewrite de Apache
a2enmod rewrite

# Establecer ServerName para evitar el mensaje de advertencia
echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Añadir permisos para el directorio uploads
chown -R www-data:www-data /var/www/html/uploads
chmod -R 777 /var/www/html/uploads  

# Ejecutar Apache en primer plano
apache2-foreground
