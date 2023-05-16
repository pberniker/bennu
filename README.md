# Bennu

1. Clone repository.
2. Execute `sudo cp ./backend/.env.example ./backend/.env`
3. Execute `sudo docker-compose up -d --build`
4. Execute `sudo docker-compose exec backend bash`
5. Execute `chmod 777 ./storage -R`
6. Execute `composer install`
7. Execute `php artisan migrate`
8. Execute `php artisan db:seed`
9. Open `http://localhost:88`