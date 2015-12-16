<?php
/**
 * Created by PhpStorm.
 * User: puteulanus
 * Date: 15/12/3
 * Time: 上午2:46
 */
require_once('tmhOAuth.php');// 导入OAuth库
require_once('config.inc.php');// 导入配置文件

// 获取用户时间线
function get_twitter_timeline($user){
    //global $user;
    $tmhOAuth = new tmhOAuth(array(
        'consumer_key' => CONSUMER_KEY,
        'consumer_secret' => CONSUMER_SECRET,
        'token' => USER_TOKEN,
        'secret' => USER_SECRET,
    ));
    if ($tmhOAuth -> request('GET',$tmhOAuth -> url('1.1/statuses/user_timeline.json'),array(
            'include_entities' => 'false',
            'include_rts' => 'false',
            'trim_user' => 'true',
            'screen_name' => $user,
            'exclude_replies' => 'false',
            'count' => TL_COUNT), true) != 200){
        header("Content-Type: text/html; charset=utf-8");
        die('Could not connect to Twitter');
    }
    return json_decode($tmhOAuth -> response['response'],true);
}

// 获取物品列表
function get_item_list(){
    $file_list = scandir('list');
    unset($file_list[0],$file_list[1]);
    $item_list = array();
    foreach($file_list as $file){
        $tmp_list = preg_split('/\n/',file_get_contents('list/'.$file));
        foreach($tmp_list as $id => $item){
            if(strlen(trim($item))==0){
                unset($tmp_list[$id]);
            }
        }
        $item_list = array_merge($item_list,$tmp_list);
    }
    return $item_list;
}

// 获取当前时间
function get_currect_time(){
    $ch = curl_init('http://gb.weather.gov.hk/cgi-bin/hko/localtime.pl');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT,5);
    $html = curl_exec($ch);
    $html = preg_split("/\n/",trim($html));
    $html = "${html[0]}/${html[1]}/${html[2]} ${html[3]}:${html[4]}:${html[5]}";
    curl_close($ch);
    date_default_timezone_set('Asia/Shanghai');
    return strtotime($html);
}

// 通知函数
function call_me_please($info){
    $ch = curl_init('https://api.mailgun.net/v3/'.DOMAIN_MAILGUN.'/messages');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT,10);
    curl_setopt($ch, CURLOPT_USERPWD, 'api:'.KEY_MAILGUN);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, array(
        'from' => 'smz <smzdm@'.DOMAIN_MAILGUN.'>',
        'to' => MAIL_139,
        'subject' => 'smz',
        'text' => $info,
    ));
    curl_exec($ch);
    curl_close($ch);
}

/**
// 通知函数
function call_me_please($info){
    $post_array = array(
        'app' => KEY_110,
        'eventId' => rand(10000,99999),
        'eventType' => 'trigger',
        'alarmName' => $info,
    );
    $ch = curl_init('http://api.110monitor.com/alert/api/event');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT,10);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_array));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
    curl_exec($ch);
    curl_close($ch);
}
**/