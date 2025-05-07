<?php
// Include configuration and functions
require_once '../includes/config.php';
require_once '../includes/functions.php';

// Start session
startSession();

// Set admin session for development purposes
$_SESSION['user_id'] = 1;
$_SESSION['username'] = 'admin';
$_SESSION['role'] = 'admin';

// Redirect directly to dashboard
redirect('dashboard.php');
?>
