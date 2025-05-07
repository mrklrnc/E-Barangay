-- E-Barangay Management System Database Schema

-- Create Database
IF NOT EXISTS (SELECT * FROM sys.databases WHERE name = 'ebarangay_db')
BEGIN
    CREATE DATABASE ebarangay_db;
END
GO

USE ebarangay_db;
GO

-- Create Admin Table
IF NOT EXISTS (SELECT * FROM sys.tables WHERE name = 'admins')
BEGIN
    CREATE TABLE admins (
        id INT IDENTITY(1,1) PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(100),
        first_name VARCHAR(50),
        last_name VARCHAR(50),
        created_at DATETIME DEFAULT GETDATE(),
        updated_at DATETIME DEFAULT GETDATE()
    );
END
GO

-- Insert Default Admin User
IF NOT EXISTS (SELECT * FROM admins WHERE username = 'admin')
BEGIN
    -- Password: admin123 (in a real application, this would be hashed)
    INSERT INTO admins (username, password, email, first_name, last_name)
    VALUES ('admin', 'admin123', 'admin@example.com', 'Admin', 'User');
END
GO

-- Create Citizens Table
IF NOT EXISTS (SELECT * FROM sys.tables WHERE name = 'citizens')
BEGIN
    CREATE TABLE citizens (
        id INT IDENTITY(1,1) PRIMARY KEY,
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
        created_at DATETIME DEFAULT GETDATE(),
        updated_at DATETIME DEFAULT GETDATE()
    );
END
GO

-- Create Document Types Table
IF NOT EXISTS (SELECT * FROM sys.tables WHERE name = 'document_types')
BEGIN
    CREATE TABLE document_types (
        id INT IDENTITY(1,1) PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        description TEXT,
        requirements TEXT,
        fee DECIMAL(10, 2) DEFAULT 0.00,
        processing_days INT DEFAULT 1,
        created_at DATETIME DEFAULT GETDATE(),
        updated_at DATETIME DEFAULT GETDATE()
    );
END
GO

-- Insert Default Document Types
IF NOT EXISTS (SELECT * FROM document_types WHERE name = 'Barangay Clearance')
BEGIN
    INSERT INTO document_types (name, description, requirements, fee, processing_days)
    VALUES 
    ('Barangay Clearance', 'A certification issued by the barangay stating that the resident has no derogatory record in the barangay.', 'Valid ID, Proof of residency, Application form', 50.00, 1),
    ('Certificate of Residency', 'A certification that confirms you are a resident of the barangay.', 'Valid ID, Proof of residency (utility bills, etc.), Application form', 50.00, 1),
    ('Business Permit', 'A permit required for operating a business within the barangay.', 'Valid ID of business owner, Business registration documents, Proof of business location, Application form', 100.00, 3),
    ('Certificate of Indigency', 'A certification that the resident belongs to the low-income bracket and needs financial assistance.', 'Valid ID, Proof of residency, Application form', 0.00, 1);
END
GO

-- Create Document Requests Table
IF NOT EXISTS (SELECT * FROM sys.tables WHERE name = 'document_requests')
BEGIN
    CREATE TABLE document_requests (
        id INT IDENTITY(1,1) PRIMARY KEY,
        document_type_id INT NOT NULL,
        citizen_id INT NOT NULL,
        purpose VARCHAR(255) NOT NULL,
        status VARCHAR(20) DEFAULT 'Pending', -- Pending, Processing, Completed, Rejected
        remarks TEXT,
        requested_at DATETIME DEFAULT GETDATE(),
        completed_at DATETIME,
        created_at DATETIME DEFAULT GETDATE(),
        updated_at DATETIME DEFAULT GETDATE(),
        FOREIGN KEY (document_type_id) REFERENCES document_types(id),
        FOREIGN KEY (citizen_id) REFERENCES citizens(id)
    );
END
GO

-- Create Report Types Table
IF NOT EXISTS (SELECT * FROM sys.tables WHERE name = 'report_types')
BEGIN
    CREATE TABLE report_types (
        id INT IDENTITY(1,1) PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        description TEXT,
        created_at DATETIME DEFAULT GETDATE(),
        updated_at DATETIME DEFAULT GETDATE()
    );
END
GO

-- Insert Default Report Types
IF NOT EXISTS (SELECT * FROM report_types WHERE name = 'Complaint')
BEGIN
    INSERT INTO report_types (name, description)
    VALUES 
    ('Complaint', 'File complaints about noise, sanitation issues, or other concerns in your neighborhood.'),
    ('Incident', 'Report incidents such as accidents, theft, or disturbances in your area.'),
    ('Suggestion', 'Share your ideas and suggestions for improving our barangay services and facilities.'),
    ('Request for Assistance', 'Request for assistance during emergencies, calamities, or other urgent situations.');
END
GO

-- Create Reports Table
IF NOT EXISTS (SELECT * FROM sys.tables WHERE name = 'reports')
BEGIN
    CREATE TABLE reports (
        id INT IDENTITY(1,1) PRIMARY KEY,
        report_type_id INT NOT NULL,
        citizen_id INT NOT NULL,
        subject VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        location VARCHAR(255),
        incident_date DATETIME,
        status VARCHAR(20) DEFAULT 'Pending', -- Pending, Investigating, Resolved, Closed
        urgency VARCHAR(20) DEFAULT 'Medium', -- Low, Medium, High, Emergency
        remarks TEXT,
        reported_at DATETIME DEFAULT GETDATE(),
        resolved_at DATETIME,
        created_at DATETIME DEFAULT GETDATE(),
        updated_at DATETIME DEFAULT GETDATE(),
        FOREIGN KEY (report_type_id) REFERENCES report_types(id),
        FOREIGN KEY (citizen_id) REFERENCES citizens(id)
    );
END
GO

-- Create Announcements Table
IF NOT EXISTS (SELECT * FROM sys.tables WHERE name = 'announcements')
BEGIN
    CREATE TABLE announcements (
        id INT IDENTITY(1,1) PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        content TEXT NOT NULL,
        admin_id INT NOT NULL,
        is_published BIT DEFAULT 1,
        published_at DATETIME DEFAULT GETDATE(),
        created_at DATETIME DEFAULT GETDATE(),
        updated_at DATETIME DEFAULT GETDATE(),
        FOREIGN KEY (admin_id) REFERENCES admins(id)
    );
END
GO

-- Create Activity Logs Table
IF NOT EXISTS (SELECT * FROM sys.tables WHERE name = 'activity_logs')
BEGIN
    CREATE TABLE activity_logs (
        id INT IDENTITY(1,1) PRIMARY KEY,
        user_id INT NOT NULL,
        action VARCHAR(255) NOT NULL,
        details TEXT,
        ip_address VARCHAR(45),
        created_at DATETIME DEFAULT GETDATE()
    );
END
GO

PRINT 'Database schema created successfully.';
