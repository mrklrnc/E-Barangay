# Development Guide

This guide provides detailed information for developers who want to understand, modify, or extend the E-Barangay Management System.

## Project Structure

The E-Barangay Management System follows a structured organization of files and directories:

```
E-Barangay/
├── admin/                  # Admin dashboard files
│   ├── includes/           # Admin-specific includes
│   │   ├── header.php      # Admin header template
│   │   └── footer.php      # Admin footer template
│   ├── index.php           # Admin login page
│   ├── dashboard.php       # Admin dashboard
│   ├── citizens.php        # Citizens management
│   ├── documents.php       # Document management
│   ├── reports.php         # Reports management
│   ├── announcements.php   # Announcements management
│   ├── settings.php        # System settings
│   └── logout.php          # Logout script
├── assets/                 # Static assets
│   ├── css/                # CSS files
│   │   └── style.css       # Main stylesheet
│   ├── js/                 # JavaScript files
│   │   ├── main.js         # Main JavaScript file
│   │   └── admin.js        # Admin JavaScript file
│   ├── images/             # Image files
│   └── fonts/              # Font files
├── database/               # Database scripts
│   ├── ebarangay_db.sql    # SQL Server database schema
│   ├── ebarangay_db_mysql.sql # MySQL database schema
│   └── init_db.php         # Database initialization script
├── docs/                   # Documentation
│   ├── admin/              # Admin documentation
│   ├── database/           # Database documentation
│   ├── development/        # Development documentation
│   ├── installation/       # Installation documentation
│   └── user/               # User documentation
├── includes/               # Common include files
│   ├── config.php          # Configuration file
│   ├── db.php              # Database functions
│   ├── functions.php       # Helper functions
│   ├── header.php          # Public header template
│   └── footer.php          # Public footer template
├── uploads/                # File uploads directory
├── index.php               # Public homepage
├── about.php               # About page
├── services.php            # Services page
├── contact.php             # Contact page
└── README.md               # Project README
```

## Technology Stack

The E-Barangay Management System is built using the following technologies:

### Frontend
- HTML5
- CSS3
- Bootstrap 5 (CSS framework)
- JavaScript
- jQuery (JavaScript library)
- Font Awesome (Icon library)
- Chart.js (Charting library)

### Backend
- PHP 7.4+
- MySQL (Database)

## Coding Standards

The project follows these coding standards:

### PHP
- PHP files use the `.php` extension
- PHP opening tags: `<?php` (full tag)
- Closing PHP tag omitted at the end of files containing only PHP
- Indentation: 4 spaces
- Line length: 80-120 characters
- Naming conventions:
  - Functions: camelCase (e.g., `getUser()`)
  - Variables: camelCase (e.g., `$userName`)
  - Constants: UPPER_CASE (e.g., `DB_NAME`)
  - Classes: PascalCase (e.g., `UserController`)

### HTML/CSS/JavaScript
- HTML files are embedded within PHP files
- CSS files use the `.css` extension
- JavaScript files use the `.js` extension
- Indentation: 2 spaces
- Naming conventions:
  - CSS classes: kebab-case (e.g., `admin-sidebar`)
  - JavaScript functions: camelCase (e.g., `showAlert()`)
  - JavaScript variables: camelCase (e.g., `userName`)

## Key Components

### Configuration (includes/config.php)

The configuration file contains system-wide settings:
- Database connection parameters
- Application settings
- File upload settings
- Session configuration
- Error reporting settings
- Time zone settings

### Database Functions (includes/db.php)

The database functions file provides a set of functions for database operations:
- `connectDB()`: Establishes database connection
- `closeDB()`: Closes database connection
- `executeQuery()`: Executes a SQL query
- `executeInsert()`: Executes an INSERT query and returns inserted ID
- `executePrepared()`: Executes a prepared statement
- `fetchAll()`: Fetches all rows from a result set
- `fetchOne()`: Fetches a single row from a result set
- `countRows()`: Counts rows in a result set
- `sanitizeInput()`: Sanitizes input data
- `checkUserCredentials()`: Verifies user login credentials

### Helper Functions (includes/functions.php)

The helper functions file provides utility functions:
- `startSession()`: Starts or resumes a session
- `isLoggedIn()`: Checks if a user is logged in
- `redirect()`: Redirects to a specific page
- `showAlert()`: Sets an alert message
- `displayAlert()`: Displays alert messages
- `formatDate()`: Formats date to Philippine format
- `formatDateTime()`: Formats date and time to Philippine format
- `generateRandomString()`: Generates a random string
- `getRecentAnnouncements()`: Gets recent announcements
- `getUserById()`: Gets user by ID
- `logActivity()`: Logs user activity

### Templates

The system uses template files for consistent layout:
- `includes/header.php`: Public header template
- `includes/footer.php`: Public footer template
- `admin/includes/header.php`: Admin header template
- `admin/includes/footer.php`: Admin footer template

## Authentication System

The authentication system is implemented in the following files:
- `admin/index.php`: Admin login page
- `admin/logout.php`: Logout script
- `includes/functions.php`: Contains `isLoggedIn()` function
- `includes/db.php`: Contains `checkUserCredentials()` function

### Authentication Flow

1. User submits login form with username and password
2. System sanitizes input
3. System checks credentials against database
4. If valid, session variables are set and user is redirected to dashboard
5. If invalid, error message is displayed

## Database Interaction

The system interacts with the database using the functions in `includes/db.php`:

### Example: Retrieving Data

```php
// Get all citizens
$result = executeQuery("SELECT * FROM citizens ORDER BY last_name, first_name");
$citizens = fetchAll($result);

// Display citizens
foreach ($citizens as $citizen) {
    echo $citizen['first_name'] . ' ' . $citizen['last_name'] . '<br>';
}
```

### Example: Inserting Data

```php
// Insert a new citizen
$sql = "INSERT INTO citizens (first_name, last_name, address) VALUES (?, ?, ?)";
$params = ["s", "s", "s"];
$values = [$firstName, $lastName, $address];
executePrepared($sql, $params, $values);
```

### Example: Updating Data

```php
// Update a citizen's information
$sql = "UPDATE citizens SET first_name = ?, last_name = ?, address = ? WHERE id = ?";
$params = ["s", "s", "s", "i"];
$values = [$firstName, $lastName, $address, $id];
executePrepared($sql, $params, $values);
```

## Extending the System

### Adding a New Page

1. Create a new PHP file in the appropriate directory
2. Include the header and footer templates
3. Add your content between the templates

Example:
```php
<?php
// Include header
include_once 'includes/header.php';
?>

<!-- Your content here -->
<section class="py-5">
    <div class="container">
        <h1>New Page</h1>
        <p>This is a new page.</p>
    </div>
</section>

<?php
// Include footer
include_once 'includes/footer.php';
?>
```

### Adding a New Feature

1. Identify the appropriate location for your feature
2. Update the database schema if needed
3. Create or modify PHP files to implement the feature
4. Update the UI to include the new feature
5. Test thoroughly

### Adding a New Admin Module

1. Create a new PHP file in the admin directory
2. Include the admin header and footer templates
3. Implement the module functionality
4. Add a link to the module in the admin sidebar (`admin/includes/header.php`)

## Security Considerations

The system implements several security measures:

1. **Input Sanitization**: All user inputs are sanitized using the `sanitizeInput()` function
2. **Prepared Statements**: Database queries use prepared statements to prevent SQL injection
3. **Session Management**: Sessions are managed securely with regeneration
4. **Authentication**: User authentication is required for admin access
5. **Activity Logging**: User activities are logged for auditing purposes

### Security Recommendations

When extending the system, follow these security practices:

1. Always sanitize user inputs
2. Use prepared statements for database queries
3. Validate data on both client and server sides
4. Implement proper error handling
5. Use HTTPS in production environments
6. Implement password hashing for user passwords
7. Regularly update dependencies and libraries

## Troubleshooting

### Common Issues

1. **Database Connection Errors**
   - Check database credentials in `includes/config.php`
   - Verify that MySQL service is running
   - Ensure the database exists

2. **PHP Errors**
   - Check PHP error logs
   - Enable error reporting for development
   - Verify PHP version compatibility

3. **File Upload Issues**
   - Check directory permissions
   - Verify upload directory exists
   - Check file size and type restrictions

### Debugging Tips

1. Enable error reporting in `includes/config.php`:
   ```php
   error_reporting(E_ALL);
   ini_set('display_errors', 1);
   ```

2. Add debug output:
   ```php
   echo '<pre>';
   print_r($variable);
   echo '</pre>';
   ```

3. Check database queries:
   ```php
   echo "Query: $sql";
   ```

## Contributing

When contributing to the project:

1. Follow the established coding standards
2. Document your code with comments
3. Test your changes thoroughly
4. Update documentation as needed
5. Submit detailed pull requests
