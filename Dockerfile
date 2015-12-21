FROM tutum/centos:centos6
RUN yum update -y
ADD script/php.sh /tmp/php.sh
RUN bash /tmp/php.sh
ADD web /root/web
ADD script/run.sh /root/run.sh
RUN chmod +x /root/run.sh
#RUN sed -i '1 i\bash /root/run.sh &' /run.sh
EXPOSE 22