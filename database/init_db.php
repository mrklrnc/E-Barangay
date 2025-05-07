<?php
// Database Initialization Script

// Include configuration
require_once '../includes/config.php';

// Create database connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected to MySQL server successfully.<br>";

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
if ($conn->query($sql) === TRUE) {
    echo "Database created or already exists.<br>";
} else {
    die("Error creating database: " . $conn->error);
}

// Select the database
$conn->select_db(DB_NAME);

// Create admins table
$sql = "CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Admins table created or already exists.<br>";
} else {
    die("Error creating admins table: " . $conn->error);
}

// Check if default admin exists
$stmt = $conn->prepare("SELECT id FROM admins WHERE username = ?");
$adminUsername = 'admin';
$stmt->bind_param("s", $adminUsername);
$stmt->execute();
$stmt->store_result();

// Insert default admin if not exists
if ($stmt->num_rows == 0) {
    $stmt->close();
    
    $stmt = $conn->prepare("INSERT INTO admins (username, password, email, first_name, last_name) VALUES (?, ?, ?, ?, ?)");
    $adminUsername = 'admin';
    $adminPassword = 'admin123';
    $adminEmail = 'admin@example.com';
    $adminFirstName = 'Admin';
    $adminLastName = 'User';
    
    $stmt->bind_param("sssss", $adminUsername, $adminPassword, $adminEmail, $adminFirstName, $adminLastName);
    
    if ($stmt->execute()) {
        echo "Default admin user created.<br>";
    } else {
        echo "Error creating default admin user: " . $stmt->error . "<br>";
    }
} else {
    echo "Default admin user already exists.<br>";
}

$stmt->close();

// Create citizens table
$sql = "CREATE TABLE IF NOT EXISTS citizens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    middle_name VARCHAR(50),
    last_name VARCHAR(50) NOT NULL,
    birth_date DATE,
    gender VARCHAR(10),
    civil_status VARCHAR(20),
    address VARCHAR(255) NOT NULL,
    contact_number VARCHAR(20),
    email VARCHAR(100),
    occupation VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Citizens table created or already exists.<br>";
} else {
    die("Error creating citizens table: " . $conn->error);
}

// Create document_types table
$sql = "CREATE TABLE IF NOT EXISTS document_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    requirements TEXT,
    fee DECIMAL(10, 2) DEFAULT 0.00,
    processing_days INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Document types table created or already exists.<br>";
} else {
    die("Error creating document_types table: " . $conn->error);
}

// Insert default document types
$documentTypes = [
    [
        'name' => 'Barangay Clearance',
        'description' => 'A certification issued by the barangay stating that the resident has no derogatory record in the barangay.',
        'requirements' => 'Valid ID, Proof of residency, Application form',
        'fee' => 50.00,
        'processing_days' => 1
    ],
    [
        'name' => 'Certificate of Residency',
        'description' => 'A certification that confirms you are a resident of the barangay.',
        'requirements' => 'Valid ID, Proof of residency (utility bills, etc.), Application form',
        'fee' => 50.00,
        'processing_days' => 1
    ],
    [
        'name' => 'Business Permit',
        'description' => 'A permit required for operating a business within the barangay.',
        'requirements' => 'Valid ID of business owner, Business registration documents, Proof of business location, Application form',
        'fee' => 100.00,
        'processing_days' => 3
    ],
    [
        'name' => 'Certificate of Indigency',
        'description' => 'A certification that the resident belongs to the low-income bracket and needs financial assistance.',
        'requirements' => 'Valid ID, Proof of residency, Application form',
        'fee' => 0.00,
        'processing_days' => 1
    ]
];

foreach ($documentTypes as $docType) {
    $stmt = $conn->prepare("SELECT id FROM document_types WHERE name = ?");
    $stmt->bind_param("s", $docType['name']);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows == 0) {
        $stmt->close();
        
        $stmt = $conn->prepare("INSERT INTO document_types (name, description, requirements, fee, processing_days) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssdi", $docType['name'], $docType['description'], $docType['requirements'], $docType['fee'], $docType['processing_days']);
        
        if ($stmt->execute()) {
            echo "Document type '{$docType['name']}' created.<br>";
        } else {
            echo "Error creating document type '{$docType['name']}': " . $stmt->error . "<br>";
        }
    } else {
        echo "Document type '{$docType['name']}' already exists.<br>";
    }
    
    $stmt->close();
}

// Create activity_logs table
$sql = "CREATE TABLE IF NOT EXISTS activity_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    action VARCHAR(255) NOT NULL,
    details TEXT,
    ip_address VARCHAR(45),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Activity logs table created or already exists.<br>";
} else {
    die("Error creating activity_logs table: " . $conn->error);
}

// Close connection
$conn->close();

echo "<br>Database initialization completed successfully!";
echo "<br><a href='../admin/index.php'>Go to Admin Login</a>";
?>
