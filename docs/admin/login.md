# Admin Login Implementation

This document provides detailed information about the implementation of the admin login system in the E-Barangay Management System.

## Overview

The admin login system provides secure authentication for administrators to access the admin dashboard and perform administrative tasks. The system uses database authentication to verify admin credentials against the `admins` table in the database.

## Implementation Details

### Files Involved

1. **admin/index.php**: Admin login page with login form
2. **includes/db.php**: Contains database functions including `checkUserCredentials()`
3. **includes/functions.php**: Contains helper functions including `isLoggedIn()`
4. **admin/logout.php**: Handles user logout
5. **admin/includes/header.php**: Checks login status before displaying admin interface

### Database Schema

The admin login system uses the `admins` table in the database:

```sql
CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

A default admin user is created during database initialization:
- Username: admin
- Password: admin123

### Authentication Flow

1. User visits admin/index.php
2. System checks if user is already logged in using `isLoggedIn()`
3. If logged in, redirects to dashboard.php
4. If not logged in, displays login form
5. User submits login form with username and password
6. System sanitizes input and checks credentials using `checkUserCredentials()`
7. If credentials are valid:
   - Sets session variables (user_id, username, first_name, last_name, role)
   - Logs the login activity
   - Redirects to dashboard.php
8. If credentials are invalid:
   - Displays error message
   - Keeps user on login page

### Code Walkthrough

#### 1. Login Form (admin/index.php)

The login form collects username and password:

```php
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="needs-validation" novalidate>
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
            <input type="text" class="form-control" id="username" name="username" required>
            <div class="invalid-feedback">
                Please enter your username.
            </div>
        </div>
    </div>
    
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            <input type="password" class="form-control" id="password" name="password" required>
            <div class="invalid-feedback">
                Please enter your password.
            </div>
        </div>
    </div>
    
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
        <label class="form-check-label" for="rememberMe">Remember me</label>
    </div>
    
    <div class="d-grid">
        <button type="submit" class="btn btn-primary">Login</button>
    </div>
</form>
```

#### 2. Form Processing (admin/index.php)

When the form is submitted, the system processes the login:

```php
// Process login form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitizeInput($_POST['username']);
    $password = $_POST['password']; // Password will be sanitized in the checkUserCredentials function
    
    // Check user credentials against database
    $user = checkUserCredentials($username, $password);
    
    if ($user) {
        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['role'] = 'admin';
        
        // Log activity
        logActivity($user['id'], 'Login', 'Admin logged in');
        
        // Redirect to dashboard
        redirect('dashboard.php');
    } else {
        showAlert('Invalid username or password. Please try again.', 'danger');
    }
}
```

#### 3. Credential Verification (includes/db.php)

The `checkUserCredentials()` function verifies the username and password against the database:

```php
// Check if a user exists with the given credentials
function checkUserCredentials($username, $password) {
    $conn = connectDB();
    
    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, username, password, first_name, last_name FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // In a real application, you would use password_verify() with hashed passwords
        // For this demo, we're using plain text comparison
        if ($password === $user['password']) {
            $stmt->close();
            closeDB($conn);
            return $user;
        }
    }
    
    $stmt->close();
    closeDB($conn);
    return false;
}
```

#### 4. Login Status Check (includes/functions.php)

The `isLoggedIn()` function checks if a user is currently logged in:

```php
// Check if user is logged in
function isLoggedIn() {
    startSession();
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}
```

#### 5. Session Management (includes/functions.php)

The `startSession()` function manages the session:

```php
// Start session if not already started
function startSession() {
    if (session_status() == PHP_SESSION_NONE) {
        session_name(SESSION_NAME);
        session_start();
        session_regenerate_id();
    }
}
```

#### 6. Logout (admin/logout.php)

The logout script destroys the session:

```php
// Check if user is logged in
if (isLoggedIn()) {
    // Log activity
    logActivity($_SESSION['user_id'], 'Logout', 'User logged out');
    
    // Destroy session
    session_unset();
    session_destroy();
    
    // Show success message
    showAlert('You have been successfully logged out.', 'success');
}

// Redirect to login page
redirect('index.php');
```

## Security Considerations

The current implementation provides basic authentication but has several areas for improvement:

### Current Security Measures

1. **Input Sanitization**: Username is sanitized using `sanitizeInput()`
2. **Prepared Statements**: Database queries use prepared statements to prevent SQL injection
3. **Session Management**: Sessions are managed with unique names and regeneration
4. **Activity Logging**: Login and logout activities are logged

### Security Improvements for Production

1. **Password Hashing**: Implement password hashing using PHP's `password_hash()` and `password_verify()` functions
2. **HTTPS**: Use HTTPS to encrypt data transmission
3. **Brute Force Protection**: Implement login attempt limits and delays
4. **Two-Factor Authentication**: Add an additional layer of security
5. **Password Policies**: Enforce strong password requirements
6. **Session Timeout**: Implement automatic logout after inactivity
7. **IP Logging**: Log IP addresses for security monitoring

## Example: Implementing Password Hashing

To improve security, password hashing should be implemented:

### 1. Creating a User with Hashed Password

```php
// When creating a new admin user
$username = 'admin';
$password = 'admin123';
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO admins (username, password, email, first_name, last_name) 
        VALUES (?, ?, ?, ?, ?)";
$params = ["s", "s", "s", "s", "s"];
$values = [$username, $hashedPassword, $email, $firstName, $lastName];
executePrepared($sql, $params, $values);
```

### 2. Verifying Password During Login

```php
// Modified checkUserCredentials function
function checkUserCredentials($username, $password) {
    $conn = connectDB();
    
    $stmt = $conn->prepare("SELECT id, username, password, first_name, last_name FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Use password_verify to check hashed password
        if (password_verify($password, $user['password'])) {
            $stmt->close();
            closeDB($conn);
            return $user;
        }
    }
    
    $stmt->close();
    closeDB($conn);
    return false;
}
```

## Conclusion

The admin login system provides basic authentication for administrators to access the admin dashboard. While the current implementation is functional for development purposes, several security improvements should be implemented before deploying to a production environment.
