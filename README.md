# Laravel books API

This is a backend made using laravel which includes books and their comments
The frontend of this application is available on [here](https://github.com/FarukIm/vue-books)

## Installation

-   Before installing make sure you laravel & its' dependencies installed on your machine, visit [the official documentation](https://laravel.com/docs/11.x/installation)

-   To check out this project you first need to clone the repository:

```
git clone https://github.com/FarukIm/vue-books.git
```

-   Next navigate to the project directory using you preferred CLI and use the following command to install project dependencies:

```
composer install
```

-   Next you need to initialize the .env file, you can do that with the following commands:

```
cp .env.example .env
php artisan key:generate
```

-   Now you need to run the migrations and seed the data:

```
php artisan migrate --seed
```

-   Finally you can run the application using:

```
php artisan serve
```
