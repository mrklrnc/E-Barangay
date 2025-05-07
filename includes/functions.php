<?php
// E-Barangay Management System - Helper Functions

// Include database connection
require_once 'db.php';

// Start session if not already started
function startSession() {
    if (session_status() == PHP_SESSION_NONE) {
        session_name(SESSION_NAME);
        session_start();
        session_regenerate_id();
    }
}

// Check if user is logged in
function isLoggedIn() {
    startSession();
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

// Redirect to a specific page
function redirect($url) {
    header("Location: $url");
    exit();
}

// Display alert message
function showAlert($message, $type = 'info') {
    $_SESSION['alert_message'] = $message;
    $_SESSION['alert_type'] = $type;
}

// Display alert if exists and clear it
function displayAlert() {
    startSession();

    if (isset($_SESSION['alert_message'])) {
        $message = $_SESSION['alert_message'];
        $type = $_SESSION['alert_type'];

        echo "<div class='alert alert-$type alert-dismissible fade show' role='alert'>
                $message
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";

        unset($_SESSION['alert_message']);
        unset($_SESSION['alert_type']);
    }
}

// Format date to Philippine format
function formatDate($date) {
    return date("F j, Y", strtotime($date));
}

// Format date and time to Philippine format
function formatDateTime($datetime) {
    return date("F j, Y g:i A", strtotime($datetime));
}

// Generate random string
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

// Get recent announcements
function getRecentAnnouncements($limit = 5) {
    $sql = "SELECT * FROM announcements ORDER BY created_at DESC LIMIT $limit";
    $result = executeQuery($sql);

    $announcements = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $announcements[] = $row;
        }
    }

    return $announcements;
}

// Get user by ID
function getUserById($userId) {
    $sql = "SELECT * FROM users WHERE id = ?";
    $result = executePrepared($sql, [$userId]);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    }

    return null;
}

// Log user activity
function logActivity($userId, $action, $details = '') {
    $sql = "INSERT INTO activity_logs (user_id, action, details, ip_address) VALUES (?, ?, ?, ?)";
    $ipAddress = $_SERVER['REMOTE_ADDR'];

    executePrepared($sql, [$userId, $action, $details, $ipAddress]);
}
?>
