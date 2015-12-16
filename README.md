# smzdm_monitor
监控根据关键词列表监控什么值得买并使用mailgun与139邮箱给自己发短信

####环境变量列表
\_CONSUMER\_KEY\_ 推特应用key
\_CONSUMER\_SECRET\_ 推特应用secret
\_USER\_TOKEN\_ 推特账户key
\_USER\_SECRET\_ 推特账户secret
\_TL\_COUNT\_ 获取推文数量，10就行
\_CRON\_TIME\_ 执行cron的间隔秒数，60就行
\_KEY\_110\_ 通知时回调的110monitor的key，默认不启用
\_KEY\_MAILGUN\_ 发信用的mailgun的key
\_DOMAIN\_MAILGUN\_ 发信用的mailgun的发信域名
\_MAIL\_139\_ 收信用的139邮箱

####139邮箱设置
139邮箱请把 smzdm@domain 加入收信短信提示的列表里，推荐建立文件夹以及收信规则，将此发件人的邮件自动移入并标为已读