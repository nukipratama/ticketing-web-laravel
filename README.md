1. composer install
2. create db named 'db_ticketapp'
3. php artisan migrate
4. php artisan db:seed --class=UsersTableSeeder (credentials for /more-priv-plz)
5. php artisan db:seed --class=TicketSeeder (optional)
6. php artisan db:seed --class=BookParticipantSeeder (optional)
7. php artisan queue:listen --queue=high,medium
8. php artisan serve
9. php artisan route:list (for route info)
