FROM php:8.3-apache

RUN docker-php-ext-install pdo pdo_pgsql

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

EXPOSE 80

CMD ["apache2-foreground"]
