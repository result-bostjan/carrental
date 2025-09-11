# 🚗 Car Booking App (Laravel 12)

## 📘 Overview
This is a **Laravel 12 web application** where users can register, search for available cars, and make bookings.  
Admins can manage cars (create, edit, delete).  

---

## ⚙️ Installation

### 1. Clone Repository
```bash
git clone https://github.com/result-bostjan/carrental.git
cd carrental
```

### 2. Install Dependencies
```bash
composer install
npm install
npm run build
```

### 3. Configure Environment
Update .env with your MySQL setup:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=carrental
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 4. Run Migrations & Seeders
```bash
php artisan migrate --seed
```

This will be created all tables and seed an admin user.<br>
You can also see data and structure into DB/carrental.sql

### 5. Start the Server

```bash
php artisan serve
```
Visit http://localhost:8000
If you want other port then 8000 you can write:

```bash
php artisan serve --port=8080
```

Visit http://localhost:8080


## 🔑 Login Details

### Admin user

```bash
Email: admin@example.com
Password: password
```

### Regular User
Register via the Register page


## 👥 Roles

- **Admin**
  - Create, edit, delete cars.

- **User**
  - Search cars by date range.
  - Book available cars.
  - View “My Bookings” page.

---
  ## 📂 Database Structure

### `users`
- id
- name
- email
- password
- role (`admin` or `user`)
- timestamps

### `cars`
- id  
- make (string)  
- model (string)  
- year (integer)  
- daily_price (decimal)  
- available (boolean)  
- timestamps  

### `bookings`
- id  
- user_id (FK → users)  
- car_id (FK → cars)  
- start_date (date)  
- end_date (date)  
- total_price (decimal)  
- timestamps 