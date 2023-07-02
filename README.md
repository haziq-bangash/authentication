# Secure PHP Login & Registration System

This is a secure PHP login system that utilizes password hashing for enhanced security. The system connects to a MySQL database to handle user registration and login.

## Features

- User registration with password hashing
- Secure login with password verification
- Session management for user authentication
- MySQL database integration

## Installation
Clone the repository:

   ```bash
   git clone https://github.com/your-username/secure-php-login-system.git

<ol>
<li>Import the database structure by executing the database.sql file on your MySQL server. This will create the necessary users table.</li>
<li>Configure the database connection in the PHP files: <br>
Open register.php, login.php, and index.php files and update the following line with your MySQL database credentials: <br>
```php
$conn = mysqli_connect("localhost", "root", "", "authentication");
Replace "localhost" with your database host, "root" with your database username, "" with your database password, and "authentication" with your database name.
</li>
<li>Upload the PHP files to your web server.</li>
<li>Access the application through your web server's URL. </li>
</ol>

## Usage
### User Registration
<ol>
<li>Visit the registration page.</li>
<li>Fill out the registration form with your name, email, and password.</li>
<li>Click on the "Register" button.</li>
<li>If the registration is successful, you will be redirected to the login page.</li>
</ol>

### User Login
<ol>
<li>Visit the login page.</li>
<li>Enter your registered email and password.</li>
<li>Click on the "Login" button.</li>
<li>If the login is successful, you will be redirected to the authenticated page.</li>
</ol>

## Contributing
Contributions are welcome! If you find any issues or have suggestions for improvements, please create an issue or submit a pull request.

## License
This project is licensed under the MIT License.



