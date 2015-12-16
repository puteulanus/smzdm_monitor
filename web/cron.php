<?php
/**
 * Created by PhpStorm.
 * User: puteulanus
 * Date: 15/12/3
 * Time: 下午12:34
 */
// 非命令行执行则退出
if(!isset($argc)){exit;}

// 一些准备
require_once 'function.inc.php';
date_default_timezone_set('Asia/Shanghai');
$item_list = get_item_list();

// 获取张大妈时间线
$currect_time = get_currect_time();
$time_line = get_twitter_timeline('smzBot');
// 清除Cron间隔以外的推文
foreach($time_line as $id => $t){
    if(strtotime($t['created_at'])<($currect_time - CRON_TIME)){
        unset($time_line[$id]);
    }
}
// 对比列表
if(count($time_line)){
    foreach($time_line as $t){
        $item_info = preg_split('/促销详情/',$t['text']);
        $item_info = $item_info[0];
        foreach($item_list as $item){
            if(strstr($item_info,$item)){
                call_me_please($item_info);
                exit;
            }
        }
    }
}