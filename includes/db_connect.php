<?php
// Database connection for SQL Server
require_once 'config.php';

try {
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
} catch (Exception $e) {
    die("Connection failed: " . $e->getMessage());
}
?> 