<?php
// Start session and include functions
session_start();
require_once 'functions/citizen_functions.php';

// Check if ID is provided
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error'] = 'Invalid citizen ID';
    header('Location: citizens.php');
    exit;
}

$id = (int)$_GET['id'];
$errors = array();
$success = false;
$data = array();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the edit form using the function
    $result = processCitizenEdit($id, $_POST);
    $success = $result['success'];
    $errors = $result['errors'];
    $data = $result['data'];
    
    if ($success) {
        $_SESSION['success'] = 'Citizen information updated successfully';
        header('Location: view_citizen.php?id=' . $id);
        exit;
    }
} else {
    try {
        // Get citizen details for form using the function
        $citizen = getCitizenDetails($id);
        $data = array(
            'first_name' => $citizen['first_name'],
            'last_name' => $citizen['last_name'],
            'middle_name' => $citizen['middle_name'],
            'contact_number' => $citizen['contact_number'],
            'email' => $citizen['email'],
            'address' => $citizen['address']
        );
    } catch (Exception $e) {
        $_SESSION['error'] = $e->getMessage();
        header('Location: citizens.php');
        exit;
    }
}

// Include header after all redirects
include_once 'includes/header.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Citizen</h5>
                    <a href="view_citizen.php?id=<?php echo $id; ?>" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Back to Details
                    </a>
                </div>
                <div class="card-body">
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo htmlspecialchars($error); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="first_name">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" 
                                           value="<?php echo htmlspecialchars($data['first_name'] ?? ''); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" 
                                           value="<?php echo htmlspecialchars($data['last_name'] ?? ''); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="middle_name">Middle Name</label>
                                    <input type="text" class="form-control" id="middle_name" name="middle_name" 
                                           value="<?php echo htmlspecialchars($data['middle_name'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact_number">Contact Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="contact_number" name="contact_number" 
                                           value="<?php echo htmlspecialchars($data['contact_number'] ?? ''); ?>" 
                                           pattern="09\d{9}" 
                                           placeholder="09XXXXXXXXX" required>
                                    <small class="form-text text-muted">Format: 09XXXXXXXXX</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" 
                                           value="<?php echo htmlspecialchars($data['email'] ?? ''); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="address">Complete Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="address" name="address" rows="3" required><?php 
                                        echo htmlspecialchars($data['address'] ?? ''); 
                                    ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Changes
                                </button>
                                <a href="view_citizen.php?id=<?php echo $id; ?>" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'includes/footer.php'; ?> 