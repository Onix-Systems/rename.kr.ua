FROM php:7.0-apache

LABEL maintainer="devops@onix-systems.com"

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    MYSQL_HOSTNAME=localhost \
    MYSQL_USER=user \
    MYSQL_PASSWORD=123456 \
    MYSQL_DATABASE=rename \
    CONFIG_FILE=/var/www/html/config/config.php \
    PHINX_CONFIG_FILE=/var/www/html/phinx.yml

RUN apt-get -y update && \
    apt-get install -y \
      curl \
      git \
      unzip \
      wget && \
    docker-php-ext-install pdo_mysql && \
    a2enmod rewrite && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ \
    --filename=composer

COPY . ./

RUN composer install

RUN echo "#!/bin/bash \n\
set -e \n\
cp \${CONFIG_FILE}.example \${CONFIG_FILE} \n\
sed -i \"s/'server' => 'localhost'/'server' => '\${MYSQL_HOSTNAME}'/\" \${CONFIG_FILE} \n\
sed -i \"s/'username' => 'root'/'username' => '\${MYSQL_USER}'/\" \${CONFIG_FILE} \n\
sed -i \"s/'password' => '123456'/'password' => '\${MYSQL_PASSWORD}'/\" \${CONFIG_FILE} \n\
sed -i \"s/'database_name' => 'rename'/'database_name' => '\${MYSQL_DATABASE}'/\" \${CONFIG_FILE} \n\
\
set -e \n\
cp \${PHINX_CONFIG_FILE}.example \${PHINX_CONFIG_FILE} \n\
sed -i \"s/name:/name: \${MYSQL_DATABASE}/\" \${PHINX_CONFIG_FILE} \n\
sed -i \"s/user:/user: \${MYSQL_USER}/\" \${PHINX_CONFIG_FILE} \n\
sed -i \"s/pass: ''/pass: '\${MYSQL_PASSWORD}'/\" \${PHINX_CONFIG_FILE} \n\
" > /container-configurator.sh

RUN chmod +x /container-configurator.sh
CMD /container-configurator.sh && apache2-foreground
