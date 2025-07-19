# 🚗 Laravel-Based Car Rental Reservation Application

**Group 3 - Web-Based Car Reservation and Booking System**
A modern digital platform designed to simplify the process of finding, booking, and managing vehicle rentals online. The system supports two main user roles: **renters**, who can browse and book available cars; and **providers**, who manage vehicle listings, respond to reservations, and handle transactions through an intuitive dashboard.

---

## 👨‍💻 Development Team

| Full Name                      | Student ID |
| ------------------------------ | ---------- |
| Kharina Shinta Jakti Pamungkas | 3312401067 |
| Lathifah Khalifatunnisa        | 3312401059 |
| Titho Putra Pratama            | 3312401071 |
| Ameylia Sandy Putri Azzahra    | 3312401081 |

---

## 📝 Application Description

This application is built to help users reserve rental cars efficiently without the need to visit rental offices. Renters can browse available cars, view details, and make bookings online. Providers can manage vehicle data, respond to booking requests, and process transactions in a streamlined way. The overall experience is designed to be fast, user-friendly, and secure.

---

## 📩 Contact Information

* Email: [kharinashinta@gmail.com](mailto:kharinashinta@gmail.com)
* WhatsApp: [Click to chat](https://wa.me/6289520428618)

We welcome your feedback and suggestions!

---

## 📌 Key Features

* User registration and login (renter and provider)
* Car search and online booking
* Upload proof of payment
* Booking and car management for provider/admin
* Booking history and real-time status tracking
* Review and rating system
* Edit user profile
* Internal messaging between users

---

## 🔗 Important Links

| Description           | Link                                                                                                    |
| --------------------- | ------------------------------------------------------------------------------------------------------- |
| 📄 Final Report       | [Download Final Report](./AAS_Final_Pagi_Kel_3_Aplikasi_Reservasi_dan_Pemesanan_Mobil_Berbasis_Web.pdf) |
| 🎥 App Tutorial Video | [Watch Tutorial](https://youtu.be/isffQQlN994?si=Uex0GVpjsA250xUm)                                      |
| 🎥 Presentation Video | [Watch Presentation](https://youtu.be/BHlAcS4xSG8?si=ak9b2N0Rh5NVEcQN)                                  |
| 📘 Manual Book        | [Download Manual Book](./MANUAL%20BOOK.pdf)                                                             |

---

## 📂 How to Download & Open the PDF Files

1. Click on the desired document link above.
2. The file will open in your browser.
3. Click the "Download" button.
4. Open the PDF using any browser or PDF reader.

---

## ⚙️ System Requirements

* PHP >= 8.1
* Composer
* MySQL or MariaDB
* Node.js & NPM
* Git

---

## 🚀 How to Install the Application

### 1. Clone the Repository

```bash
git clone https://github.com/kaxrinn/rentalmobil.git
cd rentalmobil
```

### 2. Install Laravel Dependencies

```bash
composer install
```

### 3. Copy the .env File

```bash
cp .env.example .env
```

### 4. Generate the Application Key

```bash
php artisan key:generate
```

### 5. Configure the Database

Edit the `.env` file and update the following:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dbrservasimobil
DB_USERNAME=root
DB_PASSWORD=        # fill in your password if needed
```

### 6. Run Migrations and Seeders

```bash
php artisan migrate --seed
```

### 7. Install Frontend Dependencies

```bash
npm install
npm run build
```

### 8. Run the Development Server

```bash
php artisan serve
```

---

### ➕ Additional Note

To enable PDF receipt generation:

```bash
composer require barryvdh/laravel-dompdf
```
