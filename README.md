Running the App

1. Clone this repository and ensure php and mysql are installed
2. Copy the .env.example file to a new .env file
3. Set the env var DB_PASSWORD= to your mysql password
4. Run php artisan artisan key:generate
5. In the project root directory run php artisan serve
6. In Mysql create the DATABASE 'pollapp'
7. Run php artisan migrate:fresh --seed
8. Run php artisan serve
9. Navigate to http://127.0.0.1:8000 in your browser
    Enjoy!

