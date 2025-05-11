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
    // Get citizen details
    $citizen = getCitizenDetails($id);
} catch (Exception $e) {
    showAlert($e->getMessage(), 'danger');
    header('Location: citizens.php');
    exit;
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Citizen Details</h5>
                    <div>
                        <a href="edit_citizen.php?id=<?php echo $id; ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="citizens.php" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-3">Personal Information</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <th width="150">Full Name:</th>
                                    <td>
                                        <?php 
                                        echo htmlspecialchars($citizen['last_name'] . ', ' . 
                                            $citizen['first_name'] . 
                                            ($citizen['middle_name'] ? ' ' . $citizen['middle_name'] : ''));
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Contact Number:</th>
                                    <td><?php echo htmlspecialchars($citizen['contact_number']); ?></td>
                                </tr>
                                <tr>
                                    <th>Email Address:</th>
                                    <td>
                                        <?php if ($citizen['email']): ?>
                                            <?php echo htmlspecialchars($citizen['email']); ?>
                                        <?php else: ?>
                                            <span class="text-muted">Not provided</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Complete Address:</th>
                                    <td><?php echo htmlspecialchars($citizen['address']); ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-3">System Information</h6>
                            <table class="table table-borderless">
                                <tr>
                                    <th width="150">Citizen ID:</th>
                                    <td><?php echo htmlspecialchars($citizen['citizen_id']); ?></td>
                                </tr>
                                <tr>
                                    <th>Date Created:</th>
                                    <td>
                                        <?php 
                                        echo $citizen['created_at'] ? 
                                            date('F j, Y g:i A', strtotime($citizen['created_at'])) : 
                                            'N/A';
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Last Updated:</th>
                                    <td>
                                        <?php 
                                        echo $citizen['updated_at'] ? 
                                            date('F j, Y g:i A', strtotime($citizen['updated_at'])) : 
                                            'N/A';
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'includes/footer.php'; ?> 