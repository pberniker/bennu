# Bennu

1. Clone repository.
2. Execute `cd bennu`.
3. Execute `sudo cp ./backend/.env.example ./backend/.env`
4. Execute `sudo docker-compose up -d --build`
5. Execute `sudo docker-compose exec backend bash`
6. Execute `chmod 777 ./storage -R`
7. Execute `composer install`
8. Execute `php artisan migrate`
9. Execute `php artisan db:seed`
10. Open `http://localhost:88`