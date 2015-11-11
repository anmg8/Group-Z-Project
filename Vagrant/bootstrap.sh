#!/usr/bin/env bash

#install apache webserver
sudo apt-get update
sudo apt-get install -y apache2
if ! [ -L /var/www ]; then
  rm -rf /var/www
  ln -fs /vagrant /var/www
fi

#install vim
sudo apt-get install -y vim

#install php
sudo apt-get install -q -y php5-dev php5-cli php5-curl php5-xdebug

#install mysql
#default password for the database is groupz
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password groupz'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password groupz'
sudo apt-get -y install mysql-server

#install git
sudo apt-get install -y git

echo "bootstrap.sh complete"
