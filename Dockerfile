FROM ubuntu:latest

RUN apt-get update

RUN apt-get install curl -y

RUN apt-get install vim -y

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get install apache2 -y

RUN apt-get install -y \
    curl \
    vim \
    php \
    libapache2-mod-php \
    php-mysql \
    php-sqlite3 \
    php-pgsql \
    php-curl \
    php-gd \
    php-mbstring \
    php-xml \
    php-xmlrpc \
    php-soap \
    php-intl \
    php-zip
   
RUN apt-get install -y php-xdebug

RUN apt-get install -y composer   

WORKDIR /var/www/html

RUN rm -f /var/www/html/index.html

COPY index.php  /var/www/html

COPY php.ini  /etc/php/7.4/apache2

RUN chown -R www-data:www-data /var/www/html/*

RUN chmod -R 777 /var/www/html/*

CMD ["apachectl", "-D", "FOREGROUND"]