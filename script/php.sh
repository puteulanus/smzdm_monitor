#!/bin/bash
# 安装MariaDB
cat << _EOF_ >/etc/yum.repos.d/MariaDB.repo
[mariadb]
name = MariaDB
baseurl = http://yum.mariadb.org/10.0/centos6-amd64
gpgkey=https://yum.mariadb.org/RPM-GPG-KEY-MariaDB
gpgcheck=1
_EOF_
yum install -y MariaDB-server MariaDB-client
# 安装PHP
rpm -Uvh http://dl.fedoraproject.org/pub/epel/6/x86_64/epel-release-6-8.noarch.rpm
rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-6.rpm
sed -i -e '/\[remi\]/,/^\[/s/enabled=0/enabled=1/' /etc/yum.repos.d/remi.repo
sed -i -e '/\[remi\-php56\]/,/^\[/s/enabled=0/enabled=1/' /etc/yum.repos.d/remi.repo
yum install -y php-fpm php-cli php-mysql php-gd php-imap \
php-ldap php-odbc php-pear php-xml php-xmlrpc \
php-magickwand php-mbstring php-mcrypt php-devel \
php-mssql php-shout php-snmp php-soap php-tidy