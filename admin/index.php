<?php
// Include configuration and functions
require_once '../includes/config.php';
require_once '../includes/functions.php';

// Start session
startSession();

// Check if user is already logged in
if (isLoggedIn()) {
    redirect('dashboard.php');
}

// Process login form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitizeInput($_POST['username']);
    $password = $_POST['password'];
    
    // In a real application, you would validate against database
    // For demo purposes, we'll use a hardcoded admin account
    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['user_id'] = 1;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';
        
        // Log activity
        logActivity(1, 'Login', 'Admin logged in');
        
        // Redirect to dashboard
        redirect('dashboard.php');
    } else {
        showAlert('Invalid username or password. Please try again.', 'danger');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - <?php echo SITE_NAME; ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-light">
    <div class="container">
        <div class="login-container">
            <div class="login-logo text-center">
                <i class="fas fa-building fa-4x text-primary"></i>
                <h2 class="mt-3"><?php echo BARANGAY_NAME; ?></h2>
                <p class="text-muted">Admin Login</p>
            </div>
            
            <?php displayAlert(); ?>
            
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" id="username" name="username" required>
                        <div class="invalid-feedback">
                            Please enter your username.
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div class="invalid-feedback">
                            Please enter your password.
                        </div>
                    </div>
                </div>
                
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                
                <div class="text-center mt-3">
                    <a href="#" class="text-decoration-none">Forgot password?</a>
                </div>
            </form>
            
            <div class="text-center mt-4">
                <a href="../index.php" class="text-decoration-none"><i class="fas fa-arrow-left me-1"></i> Back to Homepage</a>
            </div>
        </div>
        
        <div class="text-center mt-3 text-muted">
            <small>&copy; <?php echo date('Y'); ?> <?php echo BARANGAY_NAME; ?>. All rights reserved.</small>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Custom JS -->
    <script src="../assets/js/main.js"></script>
</body>
</html>
