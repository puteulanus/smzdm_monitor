#!/bin/bash

if [ -x "/root/conf/base.sh"]; then
	/root/conf/base.sh
fi

if [ -d "/root/conf/main.txt"]; then
	mv /root/conf/main.txt /root/web/list/main.txt
fi