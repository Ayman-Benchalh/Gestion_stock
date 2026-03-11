# 📦 Gestion_stock — Inventory & Sales Management System

A complete **inventory and sales management web application** built using **Laravel, PHP, and MySQL**.

The system helps businesses manage products, suppliers, clients, purchases, sales, payments, and stock levels through a centralized dashboard.

---

## 🔗 Project Overview

Gestion_stock is a business management application designed to simplify stock monitoring and commercial operations.

The system allows companies to:

- Manage product inventory
- Track purchases and suppliers
- Manage clients and sales
- Monitor stock levels
- Handle payments and credits
- Generate invoices and documents

This project demonstrates **full business workflow implementation using Laravel MVC architecture.**

---

## ✨ Key Features

### 📦 Inventory Management
- Add new products
- Update stock quantities
- View all products
- Monitor low stock alerts

### 👥 Client Management
- Register new clients
- View client list
- Manage client orders

### 🏭 Supplier Management
- Add suppliers
- Manage supplier purchases
- Track supplier payments

### 💰 Sales System
- Create product sales
- Sell single or multiple products
- Automatically update stock
- Track sales history

### 🛒 Purchase System
- Record product purchases
- Update stock quantities
- Link purchases to suppliers

### 💳 Payment Management
- Client payment tracking
- Supplier payment tracking
- Credit / debt management

### 📄 Invoice & PDF
- Generate invoices
- Export documents as PDF

---

## 🧰 Tech Stack

Backend
- Laravel 11
- PHP 8.2

Database
- MySQL

Frontend
- Blade Templates
- HTML5
- CSS3
- JavaScript

Libraries & Tools
- Laravel Sanctum
- DomPDF
- Snappy PDF
- Vite

---

## 📸 Screenshots

Create a folder named **screenshots** inside the project and add your images.
### Auth
![Dashboard](public/img/GST_Auth.png)

### Dashboard
![Dashboard](screenshots/GST_dashboard.png)

### Products Management
![Products](screenshots/02-products.png)

### Sales System
![Sales](screenshots/03-sales.png)

### Stock Overview
![Stock](screenshots/04-stock.png)

---

## 📂 Project Structure

```
Gestion_stock/

app/
database/
resources/
routes/
public/
screenshots/
config/
README.md
```

---

## 🚀 Installation

Clone the repository

```
git clone https://github.com/Ayman-Benchalh/Gestion_stock.git
```

Move the project to your server directory

Example (XAMPP)

```
xampp/htdocs/
```

Install dependencies

```
composer install
```

Create environment file

```
cp .env.example .env
```

Generate application key

```
php artisan key:generate
```

Configure database in `.env`

Run migrations

```
php artisan migrate
```

Start the server

```
php artisan serve
```

Open in browser

```
http://localhost:8000
```

---

## 🎯 What I Learned

- Laravel MVC architecture
- Inventory management systems
- Sales and purchase workflows
- Payment tracking systems
- Database relationship design
- PDF invoice generation

---

## 🔮 Future Improvements

- Advanced reporting dashboard
- Product barcode system
- Multi-user role management
- REST API for mobile applications
- Improved security and validation

---

## 👨‍💻 Author

Ayman Benchalh

GitHub  
https://github.com/Ayman-Benchalh
