Incident Reporter

A web-based incident management system built with PHP and MySQL. This project demonstrates authentication, session management, relational databases, CRUD operations, and basic authorization concepts commonly used in real-world backend applications.

Features
Authentication
User registration
Secure password hashing
User login
Session-based authentication
Logout functionality
Incident Management
Create incidents
View personal incidents
Edit incidents
Delete incidents
Update incident status
Status Workflow
Open
In Progress
Resolved
Technologies
PHP 8+
MySQL
PDO
HTML
CSS
Sessions
Database Schema
Users Table
CREATE TABLE users
(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) UNIQUE,
    password VARCHAR(255)
);
Incidents Table
CREATE TABLE incidents
(
    id INT AUTO_INCREMENT PRIMARY KEY,

    title VARCHAR(255),

    description TEXT,

    status VARCHAR(50),

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    user_id INT,

    FOREIGN KEY(user_id)
        REFERENCES users(id)
);
Project Structure
IncidentReporter/

├── index.php
├── login.php
├── register.php
├── logout.php
│
├── config/
│   └── database.php
│
├── models/
│   ├── User.php
│   └── Incident.php
│
├── services/
│   └── AuthService.php
│
├── pages/
│   ├── dashboard.php
│   ├── create_incident.php
│   ├── edit_incident.php
│   ├── delete_incident.php
│   └── change_status.php
│
└── assets/
    └── style.css
Installation
1. Clone the repository
git clone https://github.com/yourusername/IncidentReporter.git
2. Create the database
CREATE DATABASE incident_reporter;
3. Create the tables

Run the SQL scripts provided above.

4. Configure database connection

Update:

config/database.php
$host = "localhost";
$dbname = "incident_reporter";
$user = "root";
$password = "";

with your local database credentials.

5. Start the PHP development server
php -S localhost:8000
6. Open in browser
http://localhost:8000
Application Flow
User Registration

Users can create an account using:

/register.php

Passwords are securely stored using:

password_hash()
User Login

Users authenticate through:

/login.php

Credentials are validated using:

password_verify()
Dashboard

Authenticated users can:

View incidents
Create incidents
Edit incidents
Update status
Delete incidents
Security Concepts
Password Hashing

Passwords are never stored in plain text.

password_hash(
    $password,
    PASSWORD_DEFAULT
);
Password Verification
password_verify(
    $password,
    $hash
);
Session Authentication
$_SESSION['user_id']
$_SESSION['username']
Authorization

Users can only access their own incidents through ownership validation.

Example:

findByIdAndUser(
    $incidentId,
    $userId
);
Learning Objectives

This project was created to practice:

Authentication
Authorization
Sessions
Password Security
CRUD Operations
Relational Databases
Foreign Keys
PDO
Prepared Statements
SQL Queries
PHP Application Structure
Future Improvements
CSRF Protection
Input Validation Layer
Flash Messages
Search and Filters
Pagination
User Roles (Admin/User)
REST API Version
Docker Support
Unit Tests
Laravel Migration
Screenshots

Future improvement:

Login Page
Registration Page
Dashboard
Incident Creation Form
Author

Mariana Lúcio Maroja

Backend Developer focused on building practical projects with multiple technologies including PHP, Java, C#, Python, Spring Boot, FastAPI, and relational databases.

What I learned

Through this project I practiced:

Building a complete web application from scratch
Managing user authentication securely
Working with MySQL relationships
Protecting routes with sessions
Implementing full CRUD functionality
Organizing backend code using models and services

This project represents a solid foundation for more advanced PHP frameworks such as Laravel.
