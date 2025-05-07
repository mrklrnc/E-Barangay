<?php
// E-Barangay Management System - Configuration File

// Database Configuration
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'ebarangay_db');

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
