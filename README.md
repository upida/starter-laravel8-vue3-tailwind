# Stater Laravel 8 using Vue 3

- [Stater Laravel 8 using Vue 3](#stater-laravel-8-using-vue-3)
  - [Requirements](#requirements)
  - [Features](#features)
  - [Installation](#installation)
  - [Configuration](#configuration)
  - [Database migration](#database-migration)
  - [Running](#running)

## Requirements

- PHP ^7.4
- MySQL ^5.7
- Composer
- NPM ^9.1
- PNPM ^7.23

## Features

1. Login Page
2. Show Product Page
3. Create Product Page
4. Edit Product Page
5. Delete Product Page
6. Many vue components
7. CRUD RestAPI

## Installation

Run command berikut untuk menginstall package-package composer:
```
composer install
```

Run command berikut untuk menginstall package-package vue:
```
pnpm install
```

## Configuration

Set nilai pada environment variables di file .env untuk APP_NAME dan DB_* untuk konfigurasi DB.

## Database migration

Run command berikut untuk melakukan migrasi database
```
php artisan migrate
```

## Running

Untuk menjalankan web server PHP CLI, run command

```
php artisan serve
```

Untuk menjalankan vite, run command

```
# development
pnpm run dev
# preview
pnpm run watch
# build
pnpm run build
```