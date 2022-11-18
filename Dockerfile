FROM php:8.1-apache
RUN apt update && apt upgrade -y && apt install default-mysql-server -y
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
EXPOSE 80
COPY index.php /var/www/html
CMD ["/bin/bash", "-c", "service mariadb start;apache2-foreground"]
