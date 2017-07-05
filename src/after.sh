#!/bin/sh

# If you would like to do some extra provisioning you may
# add any commands you wish to this file and they will
# be run after the Homestead machine is provisioned.
cd /home/vagrant/Code/src
composer install
npm install
npm run dev
mkdir public/storage
chmod -R 777 public/storage
cp .env.example .env
php artisan key:generate
php artisan config:cache
php artisan migrate
