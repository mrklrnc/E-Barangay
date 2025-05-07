# E-Barangay Management System

An online barangay management system for managing citizens' documents, reports, and announcements.

## Features

- **Document Management**: Process and track citizen document requests
- **Report Management**: Handle incident reports and complaints from citizens
- **Announcement System**: Send announcements to citizens via SMS and email
- **User Dashboard**: Public interface for citizens to access services
- **Admin Dashboard**: Secure interface for barangay officials to manage the system

## Technology Stack

- **Frontend**: HTML, Bootstrap 5, CSS, JavaScript
- **Backend**: PHP
- **Database**: SQL Server Management Studio (SSMS)

## Project Structure

```
E-Barangay/
├── assets/
│   ├── css/
│   ├── js/
│   ├── images/
│   └── fonts/
├── includes/
│   ├── config.php
│   ├── db.php
│   ├── header.php
│   ├── footer.php
│   └── functions.php
├── admin/
│   ├── index.php (login page)
│   ├── dashboard.php
│   ├── citizens.php
│   ├── documents.php
│   ├── reports.php
│   ├── announcements.php
│   ├── includes/ (admin-specific includes)
│   └── settings.php
├── index.php (public dashboard)
├── about.php
├── services.php
├── contact.php
└── README.md
```

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/mrklrnc/E-Barangay.git
   ```

2. Set up a web server with PHP support (e.g., XAMPP, WAMP)

3. Import the database schema (to be provided)

4. Configure the database connection in `includes/config.php`

5. Access the application through your web server

## Admin Access

- **URL**: `/admin`
- **Username**: admin
- **Password**: admin123

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Contributors

- Mark Lawrence - Developer

## Acknowledgments

- Bootstrap for the responsive UI components
- Font Awesome for the icons
- XAMPP for the local development environment
