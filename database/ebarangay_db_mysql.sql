-- E-Barangay Management System Database Schema (MySQL)

-- Create Database
CREATE DATABASE IF NOT EXISTS ebarangay_db;
USE ebarangay_db;

-- Create Admin Table
CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100),
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert Default Admin User
INSERT INTO admins (username, password, email, first_name, last_name)
SELECT 'admin', 'admin123', 'admin@example.com', 'Admin', 'User'
FROM dual
WHERE NOT EXISTS (SELECT 1 FROM admins WHERE username = 'admin');

-- Create Citizens Table
CREATE TABLE IF NOT EXISTS citizens (
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
);

-- Create Document Types Table
CREATE TABLE IF NOT EXISTS document_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    requirements TEXT,
    fee DECIMAL(10, 2) DEFAULT 0.00,
    processing_days INT DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert Default Document Types
INSERT INTO document_types (name, description, requirements, fee, processing_days)
SELECT 'Barangay Clearance', 'A certification issued by the barangay stating that the resident has no derogatory record in the barangay.', 'Valid ID, Proof of residency, Application form', 50.00, 1
FROM dual
WHERE NOT EXISTS (SELECT 1 FROM document_types WHERE name = 'Barangay Clearance');

INSERT INTO document_types (name, description, requirements, fee, processing_days)
SELECT 'Certificate of Residency', 'A certification that confirms you are a resident of the barangay.', 'Valid ID, Proof of residency (utility bills, etc.), Application form', 50.00, 1
FROM dual
WHERE NOT EXISTS (SELECT 1 FROM document_types WHERE name = 'Certificate of Residency');

INSERT INTO document_types (name, description, requirements, fee, processing_days)
SELECT 'Business Permit', 'A permit required for operating a business within the barangay.', 'Valid ID of business owner, Business registration documents, Proof of business location, Application form', 100.00, 3
FROM dual
WHERE NOT EXISTS (SELECT 1 FROM document_types WHERE name = 'Business Permit');

INSERT INTO document_types (name, description, requirements, fee, processing_days)
SELECT 'Certificate of Indigency', 'A certification that the resident belongs to the low-income bracket and needs financial assistance.', 'Valid ID, Proof of residency, Application form', 0.00, 1
FROM dual
WHERE NOT EXISTS (SELECT 1 FROM document_types WHERE name = 'Certificate of Indigency');

-- Create Document Requests Table
CREATE TABLE IF NOT EXISTS document_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    document_type_id INT NOT NULL,
    citizen_id INT NOT NULL,
    purpose VARCHAR(255) NOT NULL,
    status VARCHAR(20) DEFAULT 'Pending', -- Pending, Processing, Completed, Rejected
    remarks TEXT,
    requested_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    completed_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (document_type_id) REFERENCES document_types(id),
    FOREIGN KEY (citizen_id) REFERENCES citizens(id)
);

-- Create Report Types Table
CREATE TABLE IF NOT EXISTS report_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert Default Report Types
INSERT INTO report_types (name, description)
SELECT 'Complaint', 'File complaints about noise, sanitation issues, or other concerns in your neighborhood.'
FROM dual
WHERE NOT EXISTS (SELECT 1 FROM report_types WHERE name = 'Complaint');

INSERT INTO report_types (name, description)
SELECT 'Incident', 'Report incidents such as accidents, theft, or disturbances in your area.'
FROM dual
WHERE NOT EXISTS (SELECT 1 FROM report_types WHERE name = 'Incident');

INSERT INTO report_types (name, description)
SELECT 'Suggestion', 'Share your ideas and suggestions for improving our barangay services and facilities.'
FROM dual
WHERE NOT EXISTS (SELECT 1 FROM report_types WHERE name = 'Suggestion');

INSERT INTO report_types (name, description)
SELECT 'Request for Assistance', 'Request for assistance during emergencies, calamities, or other urgent situations.'
FROM dual
WHERE NOT EXISTS (SELECT 1 FROM report_types WHERE name = 'Request for Assistance');

-- Create Reports Table
CREATE TABLE IF NOT EXISTS reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    report_type_id INT NOT NULL,
    citizen_id INT NOT NULL,
    subject VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(255),
    incident_date TIMESTAMP,
    status VARCHAR(20) DEFAULT 'Pending', -- Pending, Investigating, Resolved, Closed
    urgency VARCHAR(20) DEFAULT 'Medium', -- Low, Medium, High, Emergency
    remarks TEXT,
    reported_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    resolved_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (report_type_id) REFERENCES report_types(id),
    FOREIGN KEY (citizen_id) REFERENCES citizens(id)
);

-- Create Announcements Table
CREATE TABLE IF NOT EXISTS announcements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    admin_id INT NOT NULL,
    is_published BOOLEAN DEFAULT TRUE,
    published_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (admin_id) REFERENCES admins(id)
);

-- Create Activity Logs Table
CREATE TABLE IF NOT EXISTS activity_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    action VARCHAR(255) NOT NULL,
    details TEXT,
    ip_address VARCHAR(45),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
