# AdvancedClassicWhiteWeb
A website for the Advanced Classic White skincare brand, offering personalized skincare routines, product recommendations, and an easy-to-use shopping experience. The site is fully responsive and designed to enhance user engagement with skincare solutions.

# Advanced Classic White - Skincare Website

This is a Laravel-based skincare website that includes product listings, user authentication, quizzes for skincare recommendations, and an admin dashboard for management.

---

## 📌 Requirements

- PHP 8.1 or later
- Composer
- Node.js & npm
- MySQL or any other supported database
- Laravel 11
- Filament Admin (for admin dashboard)

---

## 🚀 Getting Started

### 1️⃣ Clone the Repository

```sh
git clone <repository-url>
cd <project-folder>
2️⃣ Install Dependencies
sh
Copy
Edit
composer install
npm install
3️⃣ Set Up Environment
sh
Copy
Edit
cp .env.example .env
php artisan key:generate
Update the .env file with your database credentials and other necessary configurations.

4️⃣ Set Up the Database
sh
Copy
Edit
php artisan migrate
5️⃣ Seed the Database
Run the following commands to seed the database with necessary data:

sh
Copy
Edit
php artisan db:seed --class=ProductSeeder
php artisan db:seed --class=AdminUserSeeder
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=ReviewsSeeder
php artisan db:seed --class=DermatologistSeeder
Alternatively, if all seeders are registered in DatabaseSeeder.php, run:

sh
Copy
Edit
php artisan db:seed
6️⃣ Create Storage Link (for images/files)
sh
Copy
Edit
php artisan storage:link
7️⃣ Build Frontend Assets
For production:

sh
Copy
Edit
npm run build
For development mode:

sh
Copy
Edit
npm run dev
8️⃣ Serve the Application
sh
Copy
Edit
php artisan serve
This will start the application at http://127.0.0.1:8000/
