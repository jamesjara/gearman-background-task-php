# gearman-background-task-php
gearman php background tasking

Usefull to run parallel background tasks 
"extension=gearman.so" in both php.ini files.


======= Installing Job Server =======
yum install gearmand

======= Compiling from source =======
tar xzf gearmand-X.Y.tar.gz
cd gearmand-X.Y
./configure
make
make install

======= starting =======
 gearmand -d
 
======= install gearman client  PHP extension. =======
yum install gearman-php OR compile from PECL

tar xzf gearman-X.Y.tgz
cd gearman-X.Y
phpize
./configure
make
make install

VI  /etc/php
extension="gearman.so"

======= EDIT WORKER.PHP AND CLIENT.PHP =======
