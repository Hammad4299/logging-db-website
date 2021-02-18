FROM richarvey/nginx-php-fpm:1.9.1
RUN rm -r /usr/share/nginx/html/*
ENV WEBROOT /var/www/html/public
#env MYSQL_HOST
#env MYSQL_USERNAME
#env MYSQL_PASSWORD
#env MYSQL_DBNAME
COPY ./ /var/www/html