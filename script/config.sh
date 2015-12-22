#!/bin/bash

if [ -d "/mnt/volume/smzdm_monitor" ]; then
	ln -s /mnt/volume/smzdm_monitor /root/conf
fi

if [ -x "/root/conf/base.sh" ]; then
	/root/conf/base.sh
fi

if [ -f "/root/conf/main.txt" ]; then
	mv /root/conf/main.txt /root/web/list/main.txt
fi