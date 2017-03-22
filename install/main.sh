#!/usr/bin/env bash

DOCUMENT_ROOT="/var/www/test/public"
apt-get update
apt-get install -y apache2 git curl php5-cli php5 php5-intl libapache2-mod-php5 php5-sqlite sqlite3 libsqlite3-dev
echo "
<VirtualHost *:80>
    ServerName test.local
    DocumentRoot $DOCUMENT_ROOT
    <Directory $DOCUMENT_ROOT>
        DirectoryIndex index.php
        AllowOverride All
        Order allow,deny
        Allow from all
    </Directory>
</VirtualHost>
" > /etc/apache2/sites-available/test.conf
a2enmod rewrite
a2dissite 000-default
a2ensite test
service apache2 restart
cd /var/www/test
curl -Ss https://getcomposer.org/installer | php