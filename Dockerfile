FROM gregorip02/laravel-fpm:mysql

RUN install-php-extensions "redis"
