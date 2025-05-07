<?php
// E-Barangay Management System - Database Connection

// Include configuration file
require_once 'config.php';

// Establish database connection
function connectDB() {
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}

// Close database connection
function closeDB($conn) {
    $conn->close();
}

// Execute query and return result
function executeQuery($sql) {
    $conn = connectDB();
    $result = $conn->query($sql);
    closeDB($conn);
    return $result;
}

// Execute query and return inserted ID
function executeInsert($sql) {
    $conn = connectDB();
    $conn->query($sql);
    $lastId = $conn->insert_id;
    closeDB($conn);
    return $lastId;
}

// Execute prepared statement
function executePrepared($sql, $types, $params) {
    $conn = connectDB();
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    closeDB($conn);
    
    return $result;
}

// Sanitize input data
function sanitizeInput($data) {
    $conn = connectDB();
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = $conn->real_escape_string($data);
    closeDB($conn);
    return $data;
}
?>
