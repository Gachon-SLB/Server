Create server in aws

1. Apache2

$ sudo apt-get install apache2

2. Mysql 5

$ sudo apt-get install mysql-server mysql-client

3. PHP5


$ sudo apt-get install php5 php5-common

4. connect Apache and PHP


$ sudo apt-get install libapache2-mod-php5

5. connet PHP and Mysql

$ sudo apt-get install php5-mysql


6. Restart apache and mysql


$ sudo /etc/init.d/apache2 restart

$ sudo /etc/init.d/mysql restart


7. Confirm apache server and  mysql server

$ sudo netstat -atp | grep apache2

$ sudo netstat -atp | grep mysqld

8.  Check your web server in a web browser

http://ip_address/phpinfo.php
