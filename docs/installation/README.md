# Installation Guide

This guide provides detailed instructions for installing and configuring the E-Barangay Management System.

## System Requirements

### Server Requirements
- Web server (Apache, Nginx, etc.)
- PHP 7.4 or higher
- MySQL 5.7 or higher
- PHP Extensions:
  - mysqli
  - json
  - session
  - mbstring

### Recommended Software
- XAMPP, WAMP, or MAMP for local development
- Git for version control
- Web browser (Chrome, Firefox, Edge, etc.)

## Installation Steps

### 1. Clone the Repository

```bash
git clone https://github.com/mrklrnc/E-Barangay.git
```

### 2. Set Up Web Server

#### Using XAMPP
1. Download and install XAMPP from [https://www.apachefriends.org/](https://www.apachefriends.org/)
2. Start Apache and MySQL services
3. Clone or extract the E-Barangay project to the `htdocs` directory:
   ```
   C:\xampp\htdocs\E-Barangay\  # Windows
   /Applications/XAMPP/xamppfiles/htdocs/E-Barangay/  # macOS
   /opt/lampp/htdocs/E-Barangay/  # Linux
   ```

#### Using WAMP
1. Download and install WAMP from [https://www.wampserver.com/](https://www.wampserver.com/)
2. Start all services
3. Clone or extract the E-Barangay project to the `www` directory:
   ```
   C:\wamp64\www\E-Barangay\
   ```

### 3. Configure Database Connection

1. Open the configuration file:
   ```
   includes/config.php
   ```

2. Update the database connection settings:
   ```php
   // Database Configuration
   define('DB_SERVER', 'localhost');     // Your database server
   define('DB_USERNAME', 'root');        // Your database username
   define('DB_PASSWORD', '');            // Your database password
   define('DB_NAME', 'ebarangay_db');    // Your database name
   ```

### 4. Initialize the Database

#### Option 1: Using the Initialization Script
1. Access the database initialization script through your web browser:
   ```
   http://localhost/E-Barangay/database/init_db.php
   ```
2. The script will create the database, tables, and insert initial data automatically.
3. You should see confirmation messages for each step of the initialization process.

#### Option 2: Manual Database Setup
1. Create a new database named `ebarangay_db` in your MySQL server
2. Import the database schema:
   - Open phpMyAdmin (http://localhost/phpmyadmin)
   - Select the `ebarangay_db` database
   - Click on the "Import" tab
   - Choose the SQL file: `database/ebarangay_db_mysql.sql`
   - Click "Go" to import the schema

### 5. Access the Application

1. Public Dashboard:
   ```
   http://localhost/E-Barangay/
   ```

2. Admin Dashboard:
   ```
   http://localhost/E-Barangay/admin/
   ```
   - Default admin credentials:
     - Username: admin
     - Password: admin123

## Configuration Options

### Barangay Information

You can customize the barangay information in the configuration file:

```php
// Application Configuration
define('SITE_NAME', 'E-Barangay Management System');
define('BARANGAY_NAME', 'Barangay Sample');
define('BARANGAY_ADDRESS', '123 Main Street, City, Province');
define('BARANGAY_CONTACT', '+63 912 345 6789');
define('BARANGAY_EMAIL', 'info@barangaysample.gov.ph');
```

### File Upload Settings

Configure file upload settings:

```php
// File Upload Configuration
define('UPLOAD_DIR', 'uploads/');
define('MAX_FILE_SIZE', 5 * 1024 * 1024); // 5MB
```

### Session Configuration

Adjust session settings:

```php
// Session Configuration
define('SESSION_NAME', 'ebarangay_session');
define('SESSION_LIFETIME', 3600); // 1 hour
```

## Troubleshooting

### Database Connection Issues
- Verify that MySQL service is running
- Check database credentials in `includes/config.php`
- Ensure the database `ebarangay_db` exists

### Permission Issues
- Make sure the web server has read/write permissions to the project directory
- For file uploads, ensure the `uploads` directory has write permissions

### PHP Version Issues
- Verify PHP version with `phpinfo()` function
- Update PHP if needed to meet the minimum requirements

## Next Steps

After successful installation:
1. Change the default admin password
2. Configure barangay information
3. Start adding citizens and document types
4. Explore the admin dashboard features
