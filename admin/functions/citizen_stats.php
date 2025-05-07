<?php
require_once '../includes/db.php';

function getCitizenCount() {
    $sql = "SELECT COUNT(*) AS total FROM citizens";
    $resultAndConn = executeQuery($sql);
    if ($resultAndConn === false) {
        return 0;
    }
    $row = fetchOne($resultAndConn);
    return $row ? (int)$row['total'] : 0;
} 