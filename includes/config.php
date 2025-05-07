<?php
// E-Barangay Management System - Configuration File

// Database Configuration
// To find your server name:
// 1. Open SSMS
// 2. Look at the server name in the connection window
// 3. Common names are: localhost, .\SQLEXPRESS, or your computer name
define('DB_SERVER', 'localhost'); // Replace with your SQL Server instance name

// To set up credentials:
// 1. In SSMS, go to Security > Logins
// 2. Right-click > New Login
// 3. Create a new SQL Server authentication login
define('DB_USERNAME', 'admin'); // Replace with your SQL Server login name
define('DB_PASSWORD', 'password'); // Replace with your SQL Server password
define('DB_NAME', 'ebarangay_db');
define('DB_PORT', '1433'); // Default SQL Server port

// Application Configuration
define('SITE_NAME', 'E-Barangay Management System');
define('BARANGAY_NAME', 'Barangay Sample');
define('BARANGAY_ADDRESS', '1 J. Basa, San Juan, 1500 Metro Manila');
define('BARANGAY_CONTACT', '+63 912 345 6789');
define('BARANGAY_EMAIL', 'info@barangaysample.gov.ph');

// File Upload Configuration
define('UPLOAD_DIR', 'uploads/');
define('MAX_FILE_SIZE', 5 * 1024 * 1024); // 5MB

// Session Configuration
define('SESSION_NAME', 'ebarangay_session');
define('SESSION_LIFETIME', 3600); // 1 hour

// Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Time Zone
date_default_timezone_set('Asia/Manila');
?>
