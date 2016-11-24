FROM ubuntu:16.04

MAINTAINER Roman Sereda <roman.sereda@kiron.ngo>
#mainwebsite app

#install php
RUN apt-get update && apt-get install -y \
        software-properties-common \
        git \
        curl \
        wget \
        zip && \
        locale-gen en_US.UTF-8 && export LANG=en_US.UTF-8 && \
        add-apt-repository ppa:ondrej/php -y && \
        apt-get update && \ 
        apt-get -yqq install \
        php7.0 \
        php7.0-fpm \
        php7.0-mysql \
        php7.0-xml \
        php7.0-curl \
        php7.0-gd \
        php7.0-intl \
        php7.0-json \
        php7.0-mbstring \
        php7.0-mcrypt \
        php7.0-pgsql \
        php7.0-zip \
        php-apcu \
        php-redis \
        php-yaml 
        
#install nginx

RUN echo 'deb http://nginx.org/packages/ubuntu/ xenial nginx' | tee --append /etc/apt/sources.list.d/nginx
RUN echo 'deb-src http://nginx.org/packages/ubuntu/ xenial nginx' | tee --append /etc/apt/sources.list.d/nginx
RUN curl  https://nginx.org/keys/nginx_signing.key >> /tmp/nginx_signing.key
RUN apt-key add /tmp/nginx_signing.key
RUN apt-get update
RUN apt-get -yqq install nginx

RUN rm /etc/nginx/sites-enabled/default

COPY main-website.conf /etc/nginx/sites-enabled/main-website.conf


#Copy app source

COPY . /var/www/html/main-website/


RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=/usr/bin --filename=composer
RUN php -r "unlink('composer-setup.php');"
RUN sed -i -e "s|listen = /run/php/php7.0-fpm.sock|listen = 0.0.0.0:9000|g"  /etc/php/7.0/fpm/pool.d/www.conf 
RUN sed -i -e "s|user = www-data|user = webapp|g"  /etc/php/7.0/fpm/pool.d/www.conf 
RUN sed -i -e "s|group = www-data|group = webapp|g"  /etc/php/7.0/fpm/pool.d/www.conf 



#create webapp user


ARG PUID=1000
ARG PGID=1000
RUN groupadd -g $PGID webapp && \
    useradd -u $PUID -g webapp -m webapp


# Run composer for prod build 
RUN chown -R webapp: /var/www/html/main-website/
RUN su webapp -c 'cd  /var/www/html/main-website/ && composer  install' 

COPY startup.sh /main-website/startup.sh
WORKDIR  /main-website
EXPOSE 9000
EXPOSE 80
CMD /main-website/startup.sh
