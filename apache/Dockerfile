FROM httpd:2.4.39-alpine
RUN apk update; \
    apk upgrade;
# Copy apache vhost file to proxy php requests to php-fpm container
COPY scalar.apache.conf /usr/local/apache2/conf/scalar.apache.conf
RUN echo "Include /usr/local/apache2/conf/scalar.apache.conf" \
    >> /usr/local/apache2/conf/httpd.conf
