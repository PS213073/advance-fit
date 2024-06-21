# Advance Fit

Advance Fit is a comprehensive gym management system built with Laravel. It provides a user-friendly interface for gym members and a powerful admin panel for managing various aspects of the gym.

## Screenshots
![home](https://github.com/PS213073/advance-fit/assets/107118950/a2169802-6c56-42a6-86c1-625131bf2595)

![subscriptions](https://github.com/PS213073/advance-fit/assets/107118950/95f7b27c-a076-460e-a328-c7b735029705)

![exercises](https://github.com/PS213073/advance-fit/assets/107118950/1adbf82a-b790-40e4-a735-3977a9797ff7)

![contact](https://github.com/PS213073/advance-fit/assets/107118950/65a2ec93-a0ed-4287-a9c1-fe74f500b800)

![login](https://github.com/PS213073/advance-fit/assets/107118950/fdf5bade-1255-4ee9-bc0c-97ce70fdac7c)

![admin-dashboard](https://github.com/PS213073/advance-fit/assets/107118950/2fb7c73f-83e9-4dd3-b412-083c2f264132)


## Table of Contents

- [Features](#features)
    - [User Features](#user-features)
    - [Admin Features](#admin-features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Default User Credentials](#default-user-credentials)
- [Eloquent Relationships](#eloquent-relationships)

## Features

### User Features

- User registration and authentication
- Check-in system for gym members
- Can add Subscription to his account.

### Admin Features

- Role and permission management
- Employee management
- Shift management
- Subscription management
- Exercise and muscle group management
- Client management
- Check-in tracking

## Technologies Used

- Laravel 11.x
- Laravel Breeze (for authentication)
- Spatie Laravel Roles and Permissions (for authorization)
- Tailwind CSS (for styling)
- Font Awesome (for icons)

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/your-username/advance-fit.git
    ```
2. Install dependencies:
    ```bash
    cd advance-fit
    composer install
    npm install
    ```
3. Create a copy of the .env.example file and rename it to .env. Then, generate an application key:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
4. Configure your database credentials in the .env file.
5. Run migrations and seed the database:
    ```bash
    php artisan migrate --seed
    ```
6. Build frontend assets:
    ```bash
    npm run dev
    ```
7. Start the development server:
    ```bash
    php artisan serve
    ```
The application should now be accessible at http://localhost:8000.

## Default User Credentials

For testing purposes, you can use the following credentials:

- Normal User:
    - Username: test@test.com
    - Password: test

- Admin User:
    - Dashboard URL: http://127.0.0.1:8000/admin/dashboard
    - Username: admin@admin.com
    - Password: admin

## Eloquent Relationships

This project makes extensive use of Laravel's Eloquent relationships, including many-to-many relationships, to manage the complex data interactions required for a gym management system.

## Additional Information

This project is a gym website, and at the backend, the admin can manage roles, permissions, employees, shifts, subscriptions, exercises, muscle groups, clients, and check-ins. It has a multi-auth system (Breeze package) and uses the Spatie Roles and Permissions package for authorization. Tailwind CSS is used for styling, and Font Awesome icons are used.

Users can register an account and check-in when they are signed in.
