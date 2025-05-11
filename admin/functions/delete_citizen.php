<?php
// Include header and functions
include_once 'includes/header.php';
require_once 'functions/citizen_functions.php';

// Check if ID is provided
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    showAlert('Invalid citizen ID', 'danger');
    header('Location: citizens.php');
    exit;
}

$id = (int)$_GET['id'];

try {
    if (deleteCitizen($id)) {
        showAlert('Citizen deleted successfully', 'success');
    } else {
        showAlert('Failed to delete citizen', 'danger');
    }
} catch (Exception $e) {
    showAlert($e->getMessage(), 'danger');
}

// Redirect back to citizens list
header('Location: citizens.php');
exit; 