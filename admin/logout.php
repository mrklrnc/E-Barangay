<?php
// Include configuration and functions
require_once '../includes/config.php';
require_once '../includes/functions.php';

// Start session
startSession();

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
?>
