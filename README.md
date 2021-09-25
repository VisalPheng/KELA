![KELA](https://user-images.githubusercontent.com/75899547/132091369-9aee9c86-f730-4b75-97ef-88155837cf5f.png)


# KELA (Sport Booking System)

KELA (Sport Booking System) ⚽ - A platform that allows user to search venues close to their current location and booking those venue based on their need. 🙌⛹️

## Features

- Authentication 🔒
- Venue Booking 🎫
- Locations Management 🌎
- Venues Management 🏞
- Timeslots Management ⏰
- Booking Management 🎟
- Events and Offers Management 🎁
- Partner Management 🤝
- F.A.Qs Management 💻
- Contact Us Management 📱

# Getting started

## Installation

Clone the repository

    git clone https://github.com/CSG6Project1/Sport-booking-system.git

Switch to the repo folder

    cd sport-booking-system

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

If you have error while composer install you need to enable ext-gd extension in XAMPP. Here is the guide how to enable it!
- Click on `Config` on Apache Column in XAMPP Control Panel
- Select `PHP (php.ini)`
- Search for `;extension=gd`
- Remove `;` Then Restart The Server

## Database Seeding

Run the database seeder and you're done

    php artisan migrate:fresh --seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh

## Setup Mailtrap in .env

Get your SMTP settings from your mailtrap and paste in into your .env

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=xxxxxxxxxxxxxx
MAIL_PASSWORD=xxxxxxxxxxxxxx
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=admin@kela.com
MAIL_FROM_NAME="${APP_NAME}"
```

# Code overview

## Dependencies

- [Laravel-UI](https://github.com/laravel/ui) - For provides the login and registration scaffolding with Bootstrap layouts.
- [Laravel-Permission](https://github.com/spatie/laravel-permission) - For associate users with permissions and roles
- [Simple-Qrcode](https://github.com/SimpleSoftwareIO/simple-qrcode) - For generating QR Code for receipt
- [Laravel-Excel](https://github.com/Maatwebsite/Laravel-Excel) - For exporting data as XLSX and CSV

## Folders

- `app` - Contains all the Eloquent models
- `config` - Contains all the application configuration files
- `app\Http\Controllers` - Contains all the controllers
- `app\Http\Controllers\Auth` - Contains all the auth controllers
- `database\migrations` - Contains all the database migrations
- `database\seeders` - Contains all the database seeders
- `routes` - Contains all the routes defined in web.php
- `resources` - Contains all the resources for blade files

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

# Screenshots

![7YePkeV3RF](https://user-images.githubusercontent.com/75899547/134770417-0f19f470-73d4-424a-b4d5-9e0ef40da86c.gif)

![75UbSKgyrG](https://user-images.githubusercontent.com/75899547/134770552-98e7a371-2279-4f5d-aaf6-548298878956.gif)

![MRzgpSdsqW](https://user-images.githubusercontent.com/75899547/134770477-2e0e19d3-0170-4953-8c25-871733a02230.gif)
