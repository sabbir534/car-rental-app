## Quick Project Tour

[Click here to view the video tour](https://drive.google.com/file/d/1oFiCXYRDjLcmApqfe-ZpGOdrazskEkLh/view?usp=sharing)

## Car Rental Project

This is a car rental project built using Laravel framework. It allows users to rent cars from a database of cars. The project has the following features:

-   User registration and login
-   User can view all available cars
-   User can search for cars by brand, model, year, and price
-   User can rent a car by selecting the car and the rental period
-   User can view their rental history
-   Admin can add, edit, and delete cars from the database
-   Admin can view all rentals and rental history

## Requirements

-   PHP >= 8.1
-   Node.js >= 16.13.0
-   Laravel >= 11.0
-   Composer
-   MySQL

## Installation

1. Clone the repository

```
git clone https://github.com/sabbir534/car-rental-app.git
```

2. Install dependencies

```
composer install
```

```
npm install
```

3. Copy the `.env.example` file to `.env` and update the database credentials

```
cp .env.example .env
```

4. Generate the application key

```
php artisan key:generate
```

5. Run the migrations

```
php artisan migrate
```

6. Run the seeders

```
php artisan db:seed
```

7. Start the server

```
npm run dev
```

```
php artisan serve
```

8. Open your browser and go to `http://localhost:8000`

## Admin Panel

To access the admin panel, go to `http://localhost:8000/login` and login with the following credentials:

-   Email: `admin@example.com`
-   Password: `password`

## User Panel

To access the admin panel, go to `http://localhost:8000/login` and login with the following credentials:

-   Email: `customer1@example.com`
-   Password: `00000000`

-   Email: `customer2@example.com`
-   Password: `00000000`

-   Email: `customer3@example.com`
-   Password: `00000000`

## Built With

-   [Laravel](https://laravel.com/) - The web framework used
-   Tailwind CSS - A utility-first CSS framework for rapidly building custom designs
-   Breeze - A Laravel authentication scaffolding package
-   MySQL - A relational database management system
