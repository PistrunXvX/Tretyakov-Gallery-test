FROM php:8.2-apache
COPY ./api/php /var/www/html/
COPY ./api/apache/apache2.conf /etc/apache2/apache2.conf
RUN docker-php-ext-install pdo_mysql
RUN a2enmod rewrite && service apache2 restart