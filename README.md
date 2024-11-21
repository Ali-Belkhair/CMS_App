# Mini CMS App

A simple Laravel-based content management system (CMS) designed for managing users and posts with CRUD functionalities. This app features an admin panel with authentication and authorization, allowing only admins to manage users.

## Features

- **Admin Panel**: Allows admins to manage users and posts.
- **User Authentication**: Login and register system for users.
- **CRUD Operations**: Full Create, Read, Update, Delete functionality for both posts and users.
- **Role-Based Access Control**: Admins can perform actions related to user management and posts, while regular users can only access posts.
- **Responsive Design**: Admin panel is designed with Bootstrap, making it mobile-friendly.

## Installation

### Prerequisites

- PHP >= 8.0
- Composer
- MySQL or another relational database
- Laravel 11.x

### 1. Clone the Repository

```bash
git clone https://github.com/Ali-Belkhair/CMS_App.git
cd mini-cms-app

composer install
cp .env.example .env
php artisan key:generate

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

php artisan migrate
php artisan db:seed
php artisan serve

Ali : IWA BISA7A ta7iyati 😉