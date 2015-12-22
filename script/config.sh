#!/bin/bash

if [ -d "/mnt/volume/smzdm_monitor" ]; then
	ln -s /mnt/volume/smzdm_monitor /root/conf
fi

if [ -f "/root/conf/config.php" ]; then
	cp /root/conf/config.php /root/web/config.php
fi

if [ -f "/root/conf/main.txt" ]; then
	cp /root/conf/main.txt /root/web/list/main.txt
fi