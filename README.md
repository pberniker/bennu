# Bennu

1. Execute `sudo docker-compose up -d --build`
2. Execute `sudo docker-compose exec backend bash`
3. Execute `chmod 777 ./storage -R`
4. Execute `composer install`
5. Execute `php artisan migrate`
6. Execute `php artisan db:seed`
7. Open `http://localhost:88`