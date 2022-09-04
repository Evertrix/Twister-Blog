<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# About

Twister Blog is a paid blog platform using Stripe's sandbox payment process. It can be used to create content that can be published on the platform. 
Every post can have a category and can be searched for from the search bar. 
The payment is processed with Stripe. The User must pay a monthly subscription in order to be allowed to make publications.
Users free of charge are only allowed to read and comment under a certain post.

## Installation

Clone the repository

    git clone https://github.com/Evgeni-Georgiev/Platform-for-hiring-part-time-developers.git

Switch to the repo folder

    cd Platform-for-hiring-part-time-developers

Update and install all the dependencies using composer

    composer update

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan storage:link

and

    php artisan key:generate

Make sure you set the correct database connection information before running the migrations.<br />
Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/Evgeni-Georgiev/Platform-for-hiring-part-time-developers.git
    cd Platform-for-hiring-part-time-developers
    composer install
    cp .env.example .env
    php artisan storage:link

**Make sure you set the correct database connection information before running the migrations**

    php artisan migrate
    php artisan serve

## Database seeding

Run the database seeder

    php artisan db:seed

**_Note_** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh

The api can be accessed at [http://localhost:8000/api](http://localhost:8000/api).

---

# Code overview

## Frameworks & Tools

-   [TailwindCSS](https://tailwindcss.com/) - Utility-first CSS framework. You can use utility classes to control the layout, color, spacing, typography, shadows, and more to create a completely custom component design
-   [SCSS](https://sass-lang.com/) - Style sheets in the advanced syntax are processed by the program, and turned into regular CSS style sheets.
-   [Alpine.js](https://alpinejs.dev/) - Small and lightweight JavaScript tool. It enables adding JavaScript behavior to HTML markups at a much lower cost.

## Dependencies

-   [Breeze](https://github.com/laravel/breeze) - Kit for implementation of application authentication.
-   [smknstd/fakerphp-picsum-images](https://packagist.org/packages/smknstd/fakerphp-picsum-images) - For generating fake images

## Integrations

-   [Stripe, Payment Processing Platform](https://stripe.com/en-bg)
-   [MailChimp](https://mailchimp.com/)

## Environment variables

-   `.env` - Environment variables can be set in this file

**_Note_** : You can quickly set the database information and other variables in this file and have the application fully working.

---

# Testing API

The application has a simple REST API

Run the laravel development server

    php artisan serve

The api can be accessed at

    http://localhost:8000/api

    http://localhost:8000/api/posts/1

---

# Performing Unit tests

Unit tests were made for testing the functionalities of the application.

    php artisan test
