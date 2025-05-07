# Database Schema Documentation

This document provides detailed information about the database schema used in the E-Barangay Management System.

## Database Creation

The database is created using the following SQL statement:

```sql
CREATE DATABASE IF NOT EXISTS ebarangay_db;
USE ebarangay_db;
```

## Table Structures

### admins

The `admins` table stores information about system administrators who can access the admin dashboard.

```sql
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
```

#### Columns
- `id`: Unique identifier for each admin (Primary Key)
- `username`: Admin's username (Unique)
- `password`: Admin's password (should be hashed in production)
- `email`: Admin's email address
- `first_name`: Admin's first name
- `last_name`: Admin's last name
- `created_at`: Timestamp when the record was created
- `updated_at`: Timestamp when the record was last updated

#### Default Data
```sql
INSERT INTO admins (username, password, email, first_name, last_name)
SELECT 'admin', 'admin123', 'admin@example.com', 'Admin', 'User'
FROM dual
WHERE NOT EXISTS (SELECT 1 FROM admins WHERE username = 'admin');
```

### citizens

The `citizens` table stores information about barangay residents.

```sql
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
```

#### Columns
- `id`: Unique identifier for each citizen (Primary Key)
- `first_name`: Citizen's first name
- `middle_name`: Citizen's middle name (optional)
- `last_name`: Citizen's last name
- `birth_date`: Citizen's date of birth
- `gender`: Citizen's gender
- `civil_status`: Citizen's civil status (Single, Married, etc.)
- `address`: Citizen's address
- `contact_number`: Citizen's contact number
- `email`: Citizen's email address
- `occupation`: Citizen's occupation
- `created_at`: Timestamp when the record was created
- `updated_at`: Timestamp when the record was last updated

### document_types

The `document_types` table stores information about the types of documents that can be requested.

```sql
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
```

#### Columns
- `id`: Unique identifier for each document type (Primary Key)
- `name`: Document type name
- `description`: Document type description
- `requirements`: Document requirements
- `fee`: Document processing fee
- `processing_days`: Number of days to process the document
- `created_at`: Timestamp when the record was created
- `updated_at`: Timestamp when the record was last updated

#### Default Data
```sql
INSERT INTO document_types (name, description, requirements, fee, processing_days)
VALUES 
('Barangay Clearance', 'A certification issued by the barangay stating that the resident has no derogatory record in the barangay.', 'Valid ID, Proof of residency, Application form', 50.00, 1),
('Certificate of Residency', 'A certification that confirms you are a resident of the barangay.', 'Valid ID, Proof of residency (utility bills, etc.), Application form', 50.00, 1),
('Business Permit', 'A permit required for operating a business within the barangay.', 'Valid ID of business owner, Business registration documents, Proof of business location, Application form', 100.00, 3),
('Certificate of Indigency', 'A certification that the resident belongs to the low-income bracket and needs financial assistance.', 'Valid ID, Proof of residency, Application form', 0.00, 1);
```

### document_requests

The `document_requests` table stores information about document requests from citizens.

```sql
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
```

#### Columns
- `id`: Unique identifier for each document request (Primary Key)
- `document_type_id`: Foreign key to document_types table
- `citizen_id`: Foreign key to citizens table
- `purpose`: Purpose of the document request
- `status`: Request status (Pending, Processing, Completed, Rejected)
- `remarks`: Additional remarks
- `requested_at`: Timestamp when the document was requested
- `completed_at`: Timestamp when the document was completed
- `created_at`: Timestamp when the record was created
- `updated_at`: Timestamp when the record was last updated

### report_types

The `report_types` table stores information about the types of reports that can be submitted.

```sql
CREATE TABLE IF NOT EXISTS report_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

#### Columns
- `id`: Unique identifier for each report type (Primary Key)
- `name`: Report type name
- `description`: Report type description
- `created_at`: Timestamp when the record was created
- `updated_at`: Timestamp when the record was last updated

#### Default Data
```sql
INSERT INTO report_types (name, description)
VALUES 
('Complaint', 'File complaints about noise, sanitation issues, or other concerns in your neighborhood.'),
('Incident', 'Report incidents such as accidents, theft, or disturbances in your area.'),
('Suggestion', 'Share your ideas and suggestions for improving our barangay services and facilities.'),
('Request for Assistance', 'Request for assistance during emergencies, calamities, or other urgent situations.');
```

### reports

The `reports` table stores information about reports submitted by citizens.

```sql
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
```

#### Columns
- `id`: Unique identifier for each report (Primary Key)
- `report_type_id`: Foreign key to report_types table
- `citizen_id`: Foreign key to citizens table
- `subject`: Report subject
- `description`: Report description
- `location`: Incident location
- `incident_date`: Date and time of the incident
- `status`: Report status (Pending, Investigating, Resolved, Closed)
- `urgency`: Report urgency level (Low, Medium, High, Emergency)
- `remarks`: Additional remarks
- `reported_at`: Timestamp when the report was submitted
- `resolved_at`: Timestamp when the report was resolved
- `created_at`: Timestamp when the record was created
- `updated_at`: Timestamp when the record was last updated

### announcements

The `announcements` table stores information about announcements created by admins.

```sql
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
```

#### Columns
- `id`: Unique identifier for each announcement (Primary Key)
- `title`: Announcement title
- `content`: Announcement content
- `admin_id`: Foreign key to admins table
- `is_published`: Publication status
- `published_at`: Timestamp when the announcement was published
- `created_at`: Timestamp when the record was created
- `updated_at`: Timestamp when the record was last updated

### activity_logs

The `activity_logs` table tracks system activities for auditing purposes.

```sql
CREATE TABLE IF NOT EXISTS activity_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    action VARCHAR(255) NOT NULL,
    details TEXT,
    ip_address VARCHAR(45),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

#### Columns
- `id`: Unique identifier for each activity log (Primary Key)
- `user_id`: ID of the user who performed the action
- `action`: Action performed
- `details`: Action details
- `ip_address`: IP address of the user
- `created_at`: Timestamp when the activity occurred

## Entity Relationships

### One-to-Many Relationships

1. **admins to announcements**
   - One admin can create many announcements
   - Foreign key: `announcements.admin_id` references `admins.id`

2. **citizens to document_requests**
   - One citizen can make many document requests
   - Foreign key: `document_requests.citizen_id` references `citizens.id`

3. **citizens to reports**
   - One citizen can submit many reports
   - Foreign key: `reports.citizen_id` references `citizens.id`

4. **document_types to document_requests**
   - One document type can have many document requests
   - Foreign key: `document_requests.document_type_id` references `document_types.id`

5. **report_types to reports**
   - One report type can have many reports
   - Foreign key: `reports.report_type_id` references `report_types.id`

## Database Initialization

The database can be initialized using the provided SQL scripts:

1. **MySQL**: `database/ebarangay_db_mysql.sql`
2. **SQL Server**: `database/ebarangay_db.sql`

Alternatively, the database can be initialized using the PHP script:

```
database/init_db.php
```

This script creates the database, tables, and inserts initial data automatically.
