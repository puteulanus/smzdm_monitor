#!/bin/bash

source /root/config.sh

cd /root/web/

while true
do
	php cron.php
	date
	sleep 60
done