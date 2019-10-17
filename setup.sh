sudo apt-get update
sudo apt-get install apache2

sudo apt-get install mysql-server -y
sudo /usr/bin/mysql_secure_installation

sudo apt-get install php -y
sudo apt-get install -y php-{bcmath,bz2,intl,gd,mbstring,mcrypt,mysql,zip} && sudo apt-get install
sudo apt-get install php-mysql

systemctl restart apache2.service