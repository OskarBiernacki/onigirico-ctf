FROM ubuntu/apache2:latest

RUN apt-get update && apt-get install -y php libapache2-mod-php
RUN apt-get install -y adduser

RUN adduser --disabled-password --gecos "" bob
COPY secret.txt /home/bob/secret.txt
RUN chmod 777 /home/bob/secret.txt
RUN chmod 777 /home/bob
RUN chmod 777 /home

WORKDIR /var/www/html
COPY html/ .
RUN chmod -R a+r /var/www/html

RUN echo "AddDefaultCharset UTF-8" > /etc/apache2/conf-available/charset.conf && \
    a2enconf charset

EXPOSE 80