# Laravel Contact Form

A simple **Contact Us** feature built with **Laravel 11**, demonstrating clean architecture with a service layer.  
Includes validation, database storage, queued email notifications, rate limiting, feature tests, and Bootstrap styling.  

---

## 🚀 Features
- Contact form with validation (Name, Email, Subject, Message)  
- Stores messages in database (`contacts` table)  
- Queued email notifications to admin (configurable via `.env`)  
- Rate limiting (max 5 submissions per hour per IP)  
- Feature tests with `Mail::fake()`  
- Basic Bootstrap styling  

---

## ⚙️ Requirements
- PHP 8.2+  
- Composer  
- MySQL or any supported database  
- Node.js & npm (for frontend assets, optional)  

---

## 📦 Installation

```bash
# Clone repository
https://github.com/zainqayyum/laravel-contact-form.git

cd laravel-contact-form

# Create .env
rename the env file with .env

# Setup database and mail configurations in .env file
MAIL_ADMIN=
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_FROM_ADDRESS=

DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

# Install dependencies
composer install

# Generate app key
php artisan key:generate

# Run migrations
php artisan migrate

# Run the project
php artisan serve

# Run the queue worker
php artisan queue:work
