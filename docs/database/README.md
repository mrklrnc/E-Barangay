# Database Documentation

This document provides detailed information about the E-Barangay Management System database structure, schema, and relationships.

## Database Overview

The E-Barangay Management System uses a relational database to store and manage data related to citizens, documents, reports, and administrative functions. The database is designed to ensure data integrity, efficiency, and scalability.

## Database Schema

The database consists of the following main tables:

1. **admins** - Stores administrator account information
2. **citizens** - Contains citizen personal information
3. **document_types** - Lists available document types
4. **document_requests** - Records document requests from citizens
5. **report_types** - Lists available report types
6. **reports** - Stores reports submitted by citizens
7. **announcements** - Contains announcements created by admins
8. **activity_logs** - Tracks system activities

## Entity-Relationship Diagram

```
+-------------+       +----------------+       +---------------+
|   admins    |------>| announcements  |       | document_types|
+-------------+       +----------------+       +---------------+
      |                                               |
      |                                               |
      v                                               v
+-------------+       +----------------+       +---------------+
|activity_logs|       |   citizens     |------>|document_requests
+-------------+       +----------------+       +---------------+
                             |
                             |
                             v
                      +----------------+       +---------------+
                      |    reports     |<------|  report_types |
                      +----------------+       +---------------+
```

## Table Structures

### admins

Stores administrator account information.

| Column     | Type         | Description                           |
|------------|--------------|---------------------------------------|
| id         | INT          | Primary key, auto-increment           |
| username   | VARCHAR(50)  | Admin username, unique                |
| password   | VARCHAR(255) | Admin password                        |
| email      | VARCHAR(100) | Admin email address                   |
| first_name | VARCHAR(50)  | Admin first name                      |
| last_name  | VARCHAR(50)  | Admin last name                       |
| created_at | TIMESTAMP    | Record creation timestamp             |
| updated_at | TIMESTAMP    | Record last update timestamp          |

### citizens

Contains citizen personal information.

| Column         | Type         | Description                           |
|----------------|--------------|---------------------------------------|
| id             | INT          | Primary key, auto-increment           |
| first_name     | VARCHAR(50)  | Citizen first name                    |
| middle_name    | VARCHAR(50)  | Citizen middle name                   |
| last_name      | VARCHAR(50)  | Citizen last name                     |
| birth_date     | DATE         | Citizen birth date                    |
| gender         | VARCHAR(10)  | Citizen gender                        |
| civil_status   | VARCHAR(20)  | Citizen civil status                  |
| address        | VARCHAR(255) | Citizen address                       |
| contact_number | VARCHAR(20)  | Citizen contact number                |
| email          | VARCHAR(100) | Citizen email address                 |
| occupation     | VARCHAR(100) | Citizen occupation                    |
| created_at     | TIMESTAMP    | Record creation timestamp             |
| updated_at     | TIMESTAMP    | Record last update timestamp          |

### document_types

Lists available document types.

| Column          | Type         | Description                           |
|-----------------|--------------|---------------------------------------|
| id              | INT          | Primary key, auto-increment           |
| name            | VARCHAR(100) | Document type name                    |
| description     | TEXT         | Document type description             |
| requirements    | TEXT         | Document requirements                 |
| fee             | DECIMAL(10,2)| Document processing fee               |
| processing_days | INT          | Number of days to process             |
| created_at      | TIMESTAMP    | Record creation timestamp             |
| updated_at      | TIMESTAMP    | Record last update timestamp          |

### document_requests

Records document requests from citizens.

| Column           | Type         | Description                           |
|------------------|--------------|---------------------------------------|
| id               | INT          | Primary key, auto-increment           |
| document_type_id | INT          | Foreign key to document_types         |
| citizen_id       | INT          | Foreign key to citizens               |
| purpose          | VARCHAR(255) | Purpose of the document request       |
| status           | VARCHAR(20)  | Request status (Pending, etc.)        |
| remarks          | TEXT         | Additional remarks                    |
| requested_at     | TIMESTAMP    | Request timestamp                     |
| completed_at     | TIMESTAMP    | Completion timestamp                  |
| created_at       | TIMESTAMP    | Record creation timestamp             |
| updated_at       | TIMESTAMP    | Record last update timestamp          |

### report_types

Lists available report types.

| Column      | Type         | Description                           |
|-------------|--------------|---------------------------------------|
| id          | INT          | Primary key, auto-increment           |
| name        | VARCHAR(100) | Report type name                      |
| description | TEXT         | Report type description               |
| created_at  | TIMESTAMP    | Record creation timestamp             |
| updated_at  | TIMESTAMP    | Record last update timestamp          |

### reports

Stores reports submitted by citizens.

| Column          | Type         | Description                           |
|-----------------|--------------|---------------------------------------|
| id              | INT          | Primary key, auto-increment           |
| report_type_id  | INT          | Foreign key to report_types           |
| citizen_id      | INT          | Foreign key to citizens               |
| subject         | VARCHAR(255) | Report subject                        |
| description     | TEXT         | Report description                    |
| location        | VARCHAR(255) | Incident location                     |
| incident_date   | TIMESTAMP    | Incident date and time                |
| status          | VARCHAR(20)  | Report status                         |
| urgency         | VARCHAR(20)  | Report urgency level                  |
| remarks         | TEXT         | Additional remarks                    |
| reported_at     | TIMESTAMP    | Report submission timestamp           |
| resolved_at     | TIMESTAMP    | Resolution timestamp                  |
| created_at      | TIMESTAMP    | Record creation timestamp             |
| updated_at      | TIMESTAMP    | Record last update timestamp          |

### announcements

Contains announcements created by admins.

| Column       | Type         | Description                           |
|--------------|--------------|---------------------------------------|
| id           | INT          | Primary key, auto-increment           |
| title        | VARCHAR(255) | Announcement title                    |
| content      | TEXT         | Announcement content                  |
| admin_id     | INT          | Foreign key to admins                 |
| is_published | BOOLEAN      | Publication status                    |
| published_at | TIMESTAMP    | Publication timestamp                 |
| created_at   | TIMESTAMP    | Record creation timestamp             |
| updated_at   | TIMESTAMP    | Record last update timestamp          |

### activity_logs

Tracks system activities.

| Column     | Type         | Description                           |
|------------|--------------|---------------------------------------|
| id         | INT          | Primary key, auto-increment           |
| user_id    | INT          | User ID who performed the action      |
| action     | VARCHAR(255) | Action performed                      |
| details    | TEXT         | Action details                        |
| ip_address | VARCHAR(45)  | IP address                            |
| created_at | TIMESTAMP    | Activity timestamp                    |

## Database Initialization

The database can be initialized in two ways:

### 1. Using the Initialization Script

The system provides a PHP script that automatically creates the database, tables, and inserts initial data:

```
database/init_db.php
```

This script:
- Creates the database if it doesn't exist
- Creates all required tables
- Inserts default admin user
- Inserts default document types
- Inserts default report types

### 2. Using SQL Scripts

The system also provides SQL scripts for manual database setup:

- For MySQL: `database/ebarangay_db_mysql.sql`
- For SQL Server: `database/ebarangay_db.sql`

## Database Functions

The system includes several PHP functions for database operations:

| Function           | Description                                      |
|--------------------|--------------------------------------------------|
| connectDB()        | Establishes database connection                  |
| closeDB()          | Closes database connection                       |
| executeQuery()     | Executes a SQL query                             |
| executeInsert()    | Executes an INSERT query and returns inserted ID |
| executePrepared()  | Executes a prepared statement                    |
| fetchAll()         | Fetches all rows from a result set               |
| fetchOne()         | Fetches a single row from a result set           |
| countRows()        | Counts rows in a result set                      |
| sanitizeInput()    | Sanitizes input data                             |
| checkUserCredentials() | Verifies user login credentials              |

These functions are defined in `includes/db.php`.
