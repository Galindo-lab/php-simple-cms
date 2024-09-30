#!/bin/bash

# Habilitar mod_rewrite en Apache
echo "Habilitando mod_rewrite..."
a2enmod rewrite

# Corregir los permisos si es necesario
echo "Corregir permisos de archivos si es necesario..."
chown -R www-data:www-data /var/www/html
chmod -R 755 /var/www/html

# Iniciar Apache en modo foreground
echo "Iniciando Apache..."
apache2-foreground
