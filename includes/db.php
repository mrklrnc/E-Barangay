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

    if ($result === false) {
        die("Query execution failed: " . $conn->error);
    }

    closeDB($conn);
    return $result;
}

// Execute query and return inserted ID
function executeInsert($sql) {
    $conn = connectDB();

    if ($conn->query($sql) === false) {
        die("Insert query failed: " . $conn->error);
    }

    $lastId = $conn->insert_id;
    closeDB($conn);

    return $lastId;
}

// Execute prepared statement with parameters
function executePrepared($sql, $types, $params) {
    $conn = connectDB();
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Preparing statement failed: " . $conn->error);
    }

    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }

    if ($stmt->execute() === false) {
        die("Executing statement failed: " . $stmt->error);
    }

    $result = $stmt->get_result();
    $stmt->close();
    closeDB($conn);

    return $result;
}

// Fetch all rows from a result set
function fetchAll($result) {
    $rows = array();

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    return $rows;
}

// Fetch a single row from a result set
function fetchOne($result) {
    return $result->fetch_assoc();
}

// Count rows in a result set
function countRows($result) {
    return $result->num_rows;
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
?>
