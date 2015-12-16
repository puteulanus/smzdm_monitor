#!/bin/bash

cd /root/web/

while true
do
	php cron.php
	sleep ${_CRON_TIME_}
done