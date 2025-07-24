FROM php:8.2-apache

# Habilita o mod_rewrite (se precisar)
RUN a2enmod rewrite

# Instala extensões do PHP
RUN docker-php-ext-install pdo pdo_mysql

# Copia os arquivos para dentro do container
COPY . /var/www/html/

# Altera o DocumentRoot para a pasta public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf
