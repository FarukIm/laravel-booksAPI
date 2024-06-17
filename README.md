# Laravel books API

This is a backend made using laravel which includes books and their comments
The frontend of this application is available on [here](https://github.com/FarukIm/vue-books)

## Installation

-   Before installing make sure you php & composer installed on your machine, I recommend using [herd](https://herd.laravel.com/windows)

-   To check out this project you first need to clone the repository:

```
git clone https://github.com/FarukIm/laravel-booksAPI
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

If you have issues with this final step I recommend [editing your php.ini file](https://stackoverflow.com/questions/63955357/laravel-failed-to-listen-on-127-0-0-18000-reason)
