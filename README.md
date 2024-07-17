# Lucky Wheel

A laravel application for lottery

## Project setup using Docker

1. Clone the repository:
    ```bash
    git clone https://github.com/smrh68/lucky_wheel.git
    ```

2. Navigate to the project directory:
    ```bash
    cd lucky_wheel
    ```

3. Copy the example environment file and create your own `.env` file:
    ```bash
    cp .env.example .env
    ```

4. Create SQLite Database File:
    ```bash
    touch database/database.sqlite
    ```

5. Build and start the Docker containers:
    ```bash
    docker-compose up --build -d
    ```

6. Open a shell inside the Laravel app container and install the Composer dependencies:
    ```bash
    docker-compose exec app bash
    composer install
    exit
    ```

7. Run the Laravel migrations and seeds to set up the database:
    ```bash
    docker-compose exec app php artisan migrate:fresh --seed
    ```

8. Generate the application key for your Laravel application:
    ```bash
    docker-compose exec app php artisan key:generate
    ``` 

9. Access the api in your web browser:
    ```bash
    http://localhost:8080/api/v1/lucky-wheel
    ```

## Troubleshooting

- If you encounter permission issues, check the following:

    ```bash
  
    # Set the correct ownership
    docker-compose exec app chown -R www-data:www-data *
    # Set the correct permissions
    docker-compose exec app chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
    ```
- Check Apache Logs:
    ```bash
    docker-compose logs -f app
    ```
    
