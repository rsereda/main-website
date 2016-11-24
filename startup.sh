#!/bin/bash +x

service php7.0-fpm start 
if [[ $APP_ENV ]]; then
rm /var/www/html/main-website/.env
cat >> /var/www/html/main-website/.env << EOT
DB_HOST="$POSTGRESQL_URL"
DB_USERNAME="$POSTGRESQL_USER"
DB_PASSWORD="$POSTGRESQL_PASSWD"
DB_NAME="$POSTGRESQL_DB"
REDIS_HOST="$REDIS_HOST"

URL="$URL"
DOMAIN="$DOMAIN"
EOT
chown webapp: /var/www/html/main-website/.env
echo "enviroment fole writed"
service nginx start
echo "nginx started"



fi

ps -ax | grep nginx
ps -ax | grep php

while true; 
	do sleep 1000; 
	echo "ping - pong"
	date
done
