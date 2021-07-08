FROM lorisleiva/laravel-docker:7.2
EXPOSE 8000

WORKDIR /var/www
COPY .  /var/www
RUN composer install
RUN cp .env.example .env
RUN php artisan cache:clear
RUN php artisan config:clear
RUN php artisan cache:clear
RUN php artisan key:generate
# CMD php artisan --host=0.0.0.0 serve

