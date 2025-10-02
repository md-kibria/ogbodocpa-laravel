<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel Website


### 1. Get the Project

Clone the repository using Git:

```bash
git clone https://github.com/md-kibria/ogbodocpa-laravel.git
```

Or download the ZIP file from GitHub and extract it.

### 2. Install Dependencies

Make sure [Composer](https://getcomposer.org/) and [PHP](https://www.php.net/) are installed on your PC. Then, install PHP dependencies:

```bash
composer install
```

### 3. Set Up Environment

Copy `.env.example` to `.env` and update your database credentials.

```bash
cp .env.example .env
```

Generate the application key:

```bash
php artisan key:generate
```

### 4. Run Migrations

Run the following command to set up the database tables:

```bash
php artisan migrate
```

### 5. Serve the Application

Start the local development server:

```bash
php artisan serve
```

Visit [http://localhost:8000](http://localhost:8000) in your browser to view the project.