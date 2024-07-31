# Laravel 11 with Livewire 3 and Tailwind CSS

This project is built with Laravel 11, Livewire 3 and Tailwind CSS.

## Local Setup Instructions

1. **Clone the repository**
    ```php
    git clone <repository-url>
    ```
   
2. **Navigate to the project directory**
    ```php
    cd <project-directory>
    ```
   
3. **Install dependencies**
    Laravel, Livewire, and Tailwind have their dependencies that can be installed using composer and npm. Run these commands:
    ```php
    composer install
    npm install
    ```

    You also need to compile your CSS with Tailwind, run this command:

    ```php
    npm run dev
    ```

4. **Setup Environment**
    Copy the `.env.example` file to a new file called `.env`. You can do this with the following command:
    ```php
    cp .env.example .env
    ```
    Open the .env file and set up your database information.

5. **Generate Application Key**
    ```php
    php artisan key:generate
    ```
    
6. **Run database migrations**
    This will create the necessary tables in your database.
    ```php
    php artisan migrate
    ```

7. **Start the Local Development Server**
    You can start the Laravel development server by running:
    ```php
    php artisan serve
    ```

   Open your web browser and visit the local development server at `http://localhost:8000`.
