#!/bin/bash

source /root/config.sh

cd /root/web/

while true
do
	php cron.php
	date
	sleep ${_CRON_TIME_}
done