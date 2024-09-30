# Usa la imagen base de PHP con Apache
FROM php:8.1-apache

# Habilitar mod_rewrite en Apache
RUN a2enmod rewrite

# Copiar el contenido del directorio local `src` a /var/www/html dentro del contenedor
COPY ./src /var/www/html

# Cambiar la propiedad de los archivos a www-data (usuario que corre Apache)
RUN chown -R www-data:www-data /var/www/html

# Dar permisos de lectura y escritura a los archivos
RUN chmod -R 755 /var/www/html

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

RUN service apache2 restart

# Exponer el puerto 80
EXPOSE 80

# Iniciar Apache en modo foreground
CMD ["apache2-foreground"]
