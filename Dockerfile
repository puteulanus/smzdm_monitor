FROM centos:centos6.7
# 更新软件包
RUN yum update -y
# 安装PHP
ADD script/php.sh /tmp/php.sh
RUN bash /tmp/php.sh
# 添加代码文件
ADD web /root/web
# 初始化设定
ADD script/config.sh /root/config.sh
RUN chmod +x /root/config.sh
# 添加启动脚本
ADD script/run.sh /root/run.sh
RUN chmod +x /root/run.sh
CMD /root/run.sh