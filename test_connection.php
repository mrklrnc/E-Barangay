<?php
require_once 'includes/db_connect.php';

if ($conn) {
    echo "Connected to SQL Server successfully!";
    
    // Test query
    $sql = "SELECT @@version as version";
    $stmt = sqlsrv_query($conn, $sql);
    
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }
    
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    echo "<br>SQL Server Version: " . $row['version'];
} else {
    echo "Connection failed!";
}
?> 