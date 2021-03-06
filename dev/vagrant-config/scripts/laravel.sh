#!/usr/bin/env bash

echo " "
echo "LARAVEL"
echo " "

apt-get install -y git

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === trim(file_get_contents('https://composer.github.io/installer.sig'))) { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
php -r "unlink('composer-setup.php');"

cd /vagrant
composer install

# sort out Laravel environment

cp /vagrant/dev/vagrant-config/laravel/.env /vagrant/.env

# Set up DB
# php artisan migrate -vv --seed

# need to install node
# # set gulp to watch, etc
