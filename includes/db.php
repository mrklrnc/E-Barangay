<?php
// E-Barangay Management System - Database Connection (SQL Server)

// Include configuration file
require_once 'config.php';

// Establish database connection
function connectDB() {
    $connectionInfo = array(
        "Database" => DB_NAME,
        "UID" => DB_USERNAME,
        "PWD" => DB_PASSWORD,
        "CharacterSet" => "UTF-8"
    );
    $conn = sqlsrv_connect(DB_SERVER, $connectionInfo);
    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    return $conn;
}

// Close database connection
function closeDB($conn) {
    sqlsrv_close($conn);
}

// Execute query and return result
function executeQuery($sql, $params = array()) {
    $conn = connectDB();
    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    closeDB($conn);
    return $stmt;
}

// Execute query and return inserted ID
function executeInsert($sql, $params = array()) {
    $conn = connectDB();
    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    // Get last inserted ID
    $query = sqlsrv_query($conn, "SELECT SCOPE_IDENTITY() AS id");
    $row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
    $lastId = $row['id'];
    closeDB($conn);
    return $lastId;
}

// Execute prepared statement with parameters
function executePrepared($sql, $params = array()) {
    $conn = connectDB();
    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    closeDB($conn);
    return $stmt;
}

// Fetch all rows from a result set
function fetchAll($result) {
    $rows = array();
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        $rows[] = $row;
    }
    return $rows;
}

// Fetch a single row from a result set
function fetchOne($result) {
    return sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
}

// Count rows in a result set
function countRows($result) {
    $count = 0;
    while (sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        $count++;
    }
    return $count;
}

// Sanitize input data
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    // SQLSRV does not have real_escape_string, use parameterized queries instead
    return $data;
}

// Check if a user exists with the given credentials
function checkUserCredentials($username, $password) {
    $conn = connectDB();
    $sql = "SELECT id, username, password, first_name, last_name FROM admins WHERE username = ?";
    $params = array($username);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    $user = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    if ($user && $password === $user['password']) { // Plain text comparison
        sqlsrv_free_stmt($stmt);
        closeDB($conn);
        return $user;
    }
    sqlsrv_free_stmt($stmt);
    closeDB($conn);
    return false;
}
?>
