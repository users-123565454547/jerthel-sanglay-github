# Student Management System - Simple CRUD Application

## 📋 Project Overview
A simple yet functional CRUD (Create, Read, Update, Delete) web application for managing student records. Built with PHP, MySQL, HTML, CSS, and vanilla JavaScript.

## ✨ Features
- *Create*: Add new student records with name, email, and course
- *Read*: View all student records in a responsive table
- *Update*: Edit existing student information
- *Delete*: Remove student records with confirmation
- *Validation*: Client-side and server-side form validation
- *Responsive Design*: Works on desktop and mobile devices
- *Modern UI*: Clean, professional interface with smooth animations

## 🛠️ Technologies Used
- *Backend*: PHP 7.4+
- *Database*: MySQL
- *Frontend*: HTML5, CSS3, Vanilla JavaScript
- *Architecture*: MVC-inspired structure

## 📁 Project Structure
student-crud/
├── index.php          # Main application file
├── style.css          # Styling and layout
├── script.js          # Client-side functionality
├── database.sql       # Database schema and setup
└── README.md          # Project documentation

## 🚀 Installation & Setup

### Prerequisites
- XAMPP, WAMP, or MAMP installed
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web browser (Chrome, Firefox, Safari, Edge)

### Step-by-Step Installation

1. *Install XAMPP/WAMP/MAMP*
   - Download and install from official website
   - Start Apache and MySQL services

2. *Create Project Directory*
   
   # Navigate to htdocs folder (XAMPP) or www folder (WAMP)
   cd C:\xampp\htdocs
   mkdir student-crud
   cd student-crud
   

3. *Add Project Files*
   - Copy all project files (index.php, style.css, script.js) to the folder
   - Ensure all files are in the same directory

4. *Setup Database*
   - Open phpMyAdmin: http://localhost/phpmyadmin
   - Create new database: student_crud
   - Import database.sql or run the SQL commands:
   
   CREATE DATABASE student_crud;
   USE student_crud;
   CREATE TABLE students (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100) NOT NULL,
       email VARCHAR(100) NOT NULL UNIQUE,
       course VARCHAR(100) NOT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
       updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
   );
   

5. *Configure Database Connection*
   - Open index.php
   - Update database credentials if needed (lines 3-6):
   
   $host = 'localhost';
   $dbname = 'student_crud';
   $username = 'root';
   $password = '';
   

6. *Access Application*
   - Open browser
   - Navigate to: http://localhost/student-crud/

## 📖 How to Use

### Adding a Student
1. Fill in the form fields:
   - Student Name
   - Email Address
   - Course
2. Click "Add Student" button
3. Student will appear in the table below

### Editing a Student
1. Click "Edit" button next to student record
2. Form will populate with student data
3. Modify the information
4. Click "Update Student"

### Deleting a Student
1. Click "Delete" button next to student record
2. Confirm deletion in popup
3. Student will be removed from database

## 🔧 Configuration

### Database Settings
Located in index.php (lines 3-6):
$host = 'localhost';        // Database host
$dbname = 'student_crud';   // Database name
$username = 'root';         // Database username
$password = '';             // Database password

### Customization
- *Colors*: Modify gradient colors in style.css (line 😎
- *Table Fields*: Add columns in database.sql and update forms in index.php
- *Validation*: Edit validation rules in script.js (lines 7-23)

## 🎯 Key Features Explained

### Form Validation
- Required field checking
- Email format validation
- Real-time error messages
- Server-side validation for security

### Security Features
- PDO prepared statements (SQL injection prevention)
- Input sanitization with htmlspecialchars()
- CSRF protection ready
- XSS prevention

### User Experience
- Smooth animations
- Responsive design
- Confirmation dialogs
- Visual feedback

## 🐛 Troubleshooting

### Connection Failed Error
*Solution*: Check if MySQL is running and credentials are correct

### Blank Page
*Solution*: Enable PHP error reporting in php.ini or add to index.php:
error_reporting(E_ALL);
ini_set('display_errors', 1);

### Table Not Found
*Solution*: Ensure database and table are created properly

### Styling Issues
*Solution*: Verify style.css is in same directory as index.php

## 📊 Database Schema

### Students Table
| Column | Type | Constraints |
|--------|------|-------------|
| id | INT | PRIMARY KEY, AUTO_INCREMENT |
| name | VARCHAR(100) | NOT NULL |
| email | VARCHAR(100) | NOT NULL, UNIQUE |
| course | VARCHAR(100) | NOT NULL |
| created_at | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP |
| updated_at | TIMESTAMP | ON UPDATE CURRENT_TIMESTAMP |

## 🔐 Security Best Practices
- Never commit database credentials to Git
- Use environment variables for sensitive data
- Always validate and sanitize user input
- Use HTTPS in production
- Implement proper error handling

## 🌟 Future Enhancements
- User authentication system
- Search and filter functionality
- Pagination for large datasets
- Export to CSV/PDF
- File upload for student photos
- Email notifications

## 📝 Git Commands Used

# Initialize repository
git init

# Add files
git add .

# Commit changes
git commit -m "Initial commit: Student CRUD system"

# Add remote repository
git remote add origin https://github.com/yourusername/student-crud.git

# Push to GitHub
git push -u origin main

## 👨‍💻 Author
Created for Software Engineering 1 - Output-Based Examination

## 📄 License
This project is created for educational purposes.

## 🤝 Contributing
This is an academic project. Feedback and suggestions are welcome!

## 📧 Support
For issues or questions, please create an issue in the GitHub repository.

---

*Version*: 1.0.0  
*Last Updated*: November 2025  
*Status*: ✅ Completed
