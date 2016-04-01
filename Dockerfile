FROM tutum/apache-php
#COPY config/php.ini /usr/local/etc/php
RUN apt-get update && apt-get install -yq vim && rm -rf /var/lib/apt/lists/*
RUN rm -fr /app
ADD ./test* /app
#RUN composer install
