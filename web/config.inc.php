<?php
/**
 * Created by PhpStorm.
 * User: puteulanus
 * Date: 15/12/3
 * Time: 上午2:51
 */

// 设置OAuth相关信息
define('CONSUMER_KEY', getenv('_CONSUMER_KEY_'));
define('CONSUMER_SECRET', getenv('_CONSUMER_KEY_'));
define('USER_TOKEN', getenv('_CONSUMER_KEY_'));
define('USER_SECRET', getenv('_CONSUMER_KEY_'));
define("TL_COUNT",getenv('_TL_COUNT_'));
// 设置cron相关信息
define("CRON_TIME",getenv('_CRON_TIME_'));
// 设置告警相关
define("KEY_110",getenv('_CRON_TIME_'));
define("KEY_MAILGUN",getenv('_CRON_TIME_'));
define("DOMAIN_MAILGUN",getenv('_CRON_TIME_'));
define("MAIL_139",getenv('_MAIL_139_'));