# The challenge

Imagine a world where all robots have only one goal - to win the Robo-Dance competition! As you know, all robots love dancing and regularly battle each other in fabulous dancing competitions. We would like to ask you to create a simple REST API to provide the robots with the stage they were always dreaming about.
Design the API in a way that a frontend application could consume it.

## Features

-   Provide an endpoint to retrieve all /robots
    -   The robots should come from a persisted data source
    -   Provide an option to retrieve an individual robot as well
    -   You can find the schema for a robot on the next page
-   Robots need to be able to share their /danceoffs results - Robots battle each other in teams of 5. Each member of every team battles one
    member of the opposing team in a dance-off - this should lead to 5 battles in
    total. A battle between two robots has one winner. - This endpoint should receive the teams from the client - Think of and implement reasonable validation - Optionally, this endpoint can be protected
-   Allow retrieving a list of all previous /danceoffs to see who is the real dance champion
    -   Ideally, provide an order so a leaderboard can be shown

# Requirements

-   PHP 7.3 or above
-   MySQL 5.7

# Installation

After cloning the app, please run the following commands

## Install dependencies

```
$ composer install
```

## Generate .env app key

```
$ cp .env.example .env
```

Generate an application key and place it in `APP_KEY` variable. Typically, this string should be 32 characters long.

## Migrate the database

```
$ php artisan migrate
```

## Seed the database

```
$ php artisan db:seed
```

# API Documentation

The app uses REST API full details on how that works in the link below:

[Full API documentation](markdown).

# Stack

This app was built using Lumen.

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).
