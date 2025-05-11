<?php
require_once 'functions/citizen_functions.php';
session_start(); // Ensure session is started

// Handle delete request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_citizen_id'])) {
    $deleteId = (int)$_POST['delete_citizen_id'];
    try {
        $result = deleteCitizen($deleteId);
        if ($result) {
            $_SESSION['success'] = 'Citizen deleted successfully.';
        } else {
            $_SESSION['error'] = 'Failed to delete citizen.';
        }
    } catch (Exception $e) {
        $_SESSION['error'] = 'Error: ' . $e->getMessage();
    }
    header('Location: citizens.php');
    exit;
}

// Handle add citizen form
$errors = array();
$success = false;
$formData = array();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['delete_citizen_id'])) {
    $result = processCitizenForm($_POST);
    $success = $result['success'];
    $errors = $result['errors'];
    $formData = $result['data'];

    if ($success) {
        $_SESSION['success'] = 'Citizen added successfully!';
        header('Location: citizens.php');
        exit;
    }
}

// Now include header and continue with the rest of the page
include_once 'includes/header.php';

// Get current page and search term
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$perPage = 10; // Number of records per page

// Get citizens with pagination
try {
    $result = getAllCitizensWithPagination($page, $perPage, $search);
    $citizens = $result['citizens'];
    $pagination = $result['pagination'];
} catch (Exception $e) {
    showAlert($e->getMessage(), 'danger');
    $citizens = array();
    $pagination = array(
        'current_page' => 1,
        'per_page' => $perPage,
        'total_records' => 0,
        'total_pages' => 0
    );
}
?>

<!-- Add Citizen Form -->
<div class="card mb-4">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Add New Citizen</h5>
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#addCitizenForm">
            <i class="fas fa-plus"></i> Add Citizen
        </button>
    </div>
    <div class="card-body collapse" id="addCitizenForm">
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="alert alert-success">
                Citizen added successfully! Redirecting to citizens list...
            </div>
        <?php else: ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="first_name" name="first_name" 
                               value="<?php echo htmlspecialchars($formData['first_name'] ?? ''); ?>" required>
                        <div class="invalid-feedback">Please enter first name</div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="last_name" class="form-label">Last Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="last_name" name="last_name" 
                               value="<?php echo htmlspecialchars($formData['last_name'] ?? ''); ?>" required>
                        <div class="invalid-feedback">Please enter last name</div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="middle_name" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name" 
                               value="<?php echo htmlspecialchars($formData['middle_name'] ?? ''); ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="contact_number" class="form-label">Contact Number <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" id="contact_number" name="contact_number" 
                               placeholder="09XXXXXXXXX" 
                               value="<?php echo htmlspecialchars($formData['contact_number'] ?? ''); ?>" required>
                        <div class="invalid-feedback">Please enter a valid contact number</div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" 
                               value="<?php echo htmlspecialchars($formData['email'] ?? ''); ?>">
                        <div class="invalid-feedback">Please enter a valid email address</div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Complete Address <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="address" name="address" rows="3" required><?php echo htmlspecialchars($formData['address'] ?? ''); ?></textarea>
                    <div class="invalid-feedback">Please enter complete address</div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#addCitizenForm">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Save Citizen
                    </button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>

<!-- Search Form -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="row g-3">
            <div class="col-md-8">
                <input type="text" class="form-control" name="search" placeholder="Search citizens..." 
                       value="<?php echo htmlspecialchars($search); ?>">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Search
                </button>
                <?php if (!empty($search)): ?>
                    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Clear
                    </a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<!-- Citizens List -->
<div class="card">
    <div class="card-header bg-white">
        <h5 class="mb-0">Citizens List</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($citizens)): ?>
                        <tr>
                            <td colspan="5" class="text-center">No citizens found</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($citizens as $citizen): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($citizen['citizen_id']); ?></td>
                                <td>
                                    <?php 
                                    echo htmlspecialchars($citizen['last_name'] . ', ' . 
                                        $citizen['first_name'] . 
                                        ($citizen['middle_name'] ? ' ' . $citizen['middle_name'] : ''));
                                    ?>
                                </td>
                                <td>
                                    <?php if ($citizen['contact_number']): ?>
                                        <div><?php echo htmlspecialchars($citizen['contact_number']); ?></div>
                                    <?php endif; ?>
                                    <?php if ($citizen['email']): ?>
                                        <div class="text-muted small"><?php echo htmlspecialchars($citizen['email']); ?></div>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo htmlspecialchars($citizen['address']); ?></td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="view_citizen.php?id=<?php echo $citizen['citizen_id']; ?>" 
                                           class="btn btn-info" title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="edit_citizen.php?id=<?php echo $citizen['citizen_id']; ?>" 
                                           class="btn btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="POST" onsubmit="return confirm('Are you sure you want to delete this citizen?');" style="display:inline;">
                                            <input type="hidden" name="delete_citizen_id" value="<?php echo $citizen['citizen_id']; ?>">
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <?php if ($pagination['total_pages'] > 1): ?>
            <nav aria-label="Page navigation" class="mt-4">
                <ul class="pagination justify-content-center">
                    <?php if ($pagination['current_page'] > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $pagination['current_page'] - 1; ?><?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>">
                                Previous
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $pagination['total_pages']; $i++): ?>
                        <li class="page-item <?php echo $i === $pagination['current_page'] ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?><?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>">
                                <?php echo $i; ?>
                            </a>
                        </li>
                    <?php endfor; ?>

                    <?php if ($pagination['current_page'] < $pagination['total_pages']): ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $pagination['current_page'] + 1; ?><?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>">
                                Next
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        <?php endif; ?>
    </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JavaScript -->
<script>
// Form validation
(function () {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            form.classList.add('was-validated')
        }, false)
    })
})()

// Contact number validation
document.getElementById('contact_number').addEventListener('input', function(e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length > 11) {
        value = value.slice(0, 11);
    }
    e.target.value = value;
});

// Delete citizen function
function deleteCitizen(id) {
    if (confirm('Are you sure you want to delete this citizen?')) {
        window.location.href = 'delete_citizen.php?id=' + id;
    }
}
</script>
</body>
</html> 