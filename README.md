# Dynamic Web Application
# By. Xavier Alers
# July 3rd, 2024

This project is a dynamic web application I built using PHP and MySQL, designed to demonstrate my skills as a PHP Developer.

The application includes user authentication, CRUD operations for posts, and secure coding practices.

## Table of Contents
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Setup Instructions](#setup-instructions)
- [Security Measures](#security-measures)
- [Project Structure](#project-structure)
- [Usage](#usage)
- [Future Enhancements](#future-enhancements)

## Features
- User Registration and Login
- Create, Read, Update, and Delete (CRUD) Posts
- View individual posts
- Secure coding practices including prevention of SQL Injection, XSS (Cross-Site Scripting), and CSRF (Cross-Site Request Forgery) attacks.

## Technologies Used
- PHP
- MySQL
- HTML
- CSS (Future Design Use)
- JavaScript
- XAMPP (Local Development)

## Setup Instructions
### Prerequisites
- XAMPP (Or any other PHP and MySql development environment)

### Steps
1. **Clone the Repository**:
    ```bash
    git clone https://github.com/CrunchyTaconess/dynamic-web-app.git
    ```

2. **Move the project to the XAMPP `htdocs` directory**:
    ```bash
    mv dynamic-web-app /path/to/xampp/htdocs/
    Example: "C:\xampp\htdocs\PHP_Interview_Projects\Dynamic_Web_App"
    ```

3. **Start Apache and MySQL in XAMPP**.

4. **Create the database and tables**.
    - Open phpMyAdmin and create a new database named `dynamic_web_app`.
    -Import the SQL schema:
    ```sql
    CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(100) NOT NULL
    );

    CREATE TABLE posts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        title VARCHAR(255) NOT NULL,
        body TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id)
    );
    ```
5. **Configure the database connection**:
    -Open `includes/db.php` and update the database connection details if necessary:
    ```php
    <?php
    $host = 'localhost';
    $db = 'dynamic_web_app';
    $user = 'root';
    $pass = '';

    $dsn = "mysql:host=$host;dbname=$db;charset=utf8";
    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
    ?>
    ```

6.**Access the application**:
    - Open your web browser and navigate to:
    ```
    http://localhost/dynamic-web-app/
    ```

    In my case, of being in a file folder:
    ```
    http://localhost/PHP_Interview_Projects/Dynamic_Web_App/
    ```

## Security Measuresa
- **SQL Injection**: All SQL queries use prepared statements.
- **Cross-Site Scripting (XSS)**: Output is sanitized using `htmlspecialchars`.
- **Cross-Site Request Forgery (CSRF)**: CSRF tokens are implemented for all forms.

## Project Structure
dynamic-web-app/
|--css/
|  --styles.css
|--js/
|  --scripts.js
|--includes/
|  --db.php
|--templates/
|  --header.php
|  --footer.php
|--index.php
|--register.php
|--login.php
|--logout.php
|--create_post.php
|__view_post.php

## Usage
### User Registration
- Navigate to `register.php` to create a new account.

### User Login
- Navigate to `login.php` to log in with your credentials.

### Create a Post
-After logging in, navigate to `create_post.php` to create a new post.

### View Posts
- The homepage (`index.php`) lists all posts. Click on a post title to view the details.

## Future Enhancements
- Enhancing the UI with CSS frameworks
- Implementing user roles and permissions
- Adding post categories and tags
- Implementing full-text search functionality

---

This project showcases my ability to develop a full-stack web application using PHP and MySQL, with a focus on security and best practices. Feel free to reach out with any questions or feedback.
