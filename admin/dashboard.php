<?php
// Include header
include_once 'includes/header.php';
require_once '../includes/db.php';
require_once 'functions/citizen_stats.php';

// Get actual count of citizens
$sql = "SELECT COUNT(*) AS total FROM citizens";
$resultAndConn = executeQuery($sql);
if ($resultAndConn === false) {
    die(print_r(sqlsrv_errors(), true));
}
$row = fetchOne($resultAndConn);
$totalCitizens = $row ? $row['total'] : 0;

$totalCitizens = getCitizenCount();
?>

<!-- Dashboard Overview -->
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted">Total Citizens</h6>
                    <h3><?php echo $totalCitizens; ?></h3>
                </div>
                <div class="bg-primary bg-opacity-10 p-3 rounded">
                    <i class="fas fa-users fa-2x text-primary"></i>
                </div>
            </div>
            <div class="mt-3">
                <span class="text-success"><i class="fas fa-arrow-up me-1"></i>3.5%</span>
                <span class="text-muted ms-2">Since last month</span>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted">Document Requests</h6>
                    <h3>85</h3>
                </div>
                <div class="bg-success bg-opacity-10 p-3 rounded">
                    <i class="fas fa-file-alt fa-2x text-success"></i>
                </div>
            </div>
            <div class="mt-3">
                <span class="text-success"><i class="fas fa-arrow-up me-1"></i>12.7%</span>
                <span class="text-muted ms-2">Since last month</span>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted">Reports</h6>
                    <h3>31</h3>
                </div>
                <div class="bg-warning bg-opacity-10 p-3 rounded">
                    <i class="fas fa-flag fa-2x text-warning"></i>
                </div>
            </div>
            <div class="mt-3">
                <span class="text-danger"><i class="fas fa-arrow-down me-1"></i>2.3%</span>
                <span class="text-muted ms-2">Since last month</span>
            </div>
        </div>
    </div>
    
    <div class="col-md-3 mb-4">
        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted">Announcements</h6>
                    <h3>12</h3>
                </div>
                <div class="bg-info bg-opacity-10 p-3 rounded">
                    <i class="fas fa-bullhorn fa-2x text-info"></i>
                </div>
            </div>
            <div class="mt-3">
                <span class="text-success"><i class="fas fa-arrow-up me-1"></i>5.1%</span>
                <span class="text-muted ms-2">Since last month</span>
            </div>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="row">
    <div class="col-md-6 mb-4">
        <div class="admin-card">
            <h5 class="card-title mb-3">Document Requests</h5>
            <canvas id="documentsChart"></canvas>
        </div>
    </div>
    
    <div class="col-md-6 mb-4">
        <div class="admin-card">
            <h5 class="card-title mb-3">Reports by Type</h5>
            <canvas id="reportsChart"></canvas>
        </div>
    </div>
</div>

<!-- Recent Activities Section -->
<div class="row">
    <div class="col-md-6 mb-4">
        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">Recent Document Requests</h5>
                <a href="documents.php" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Document Type</th>
                            <th>Requestor</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#DOC-001</td>
                            <td>Barangay Clearance</td>
                            <td>Juan Dela Cruz</td>
                            <td>May 5, 2023</td>
                            <td><span class="badge bg-success">Completed</span></td>
                        </tr>
                        <tr>
                            <td>#DOC-002</td>
                            <td>Certificate of Residency</td>
                            <td>Maria Santos</td>
                            <td>May 6, 2023</td>
                            <td><span class="badge bg-warning">Pending</span></td>
                        </tr>
                        <tr>
                            <td>#DOC-003</td>
                            <td>Business Permit</td>
                            <td>Pedro Reyes</td>
                            <td>May 6, 2023</td>
                            <td><span class="badge bg-info">Processing</span></td>
                        </tr>
                        <tr>
                            <td>#DOC-004</td>
                            <td>Certificate of Indigency</td>
                            <td>Elena Gomez</td>
                            <td>May 7, 2023</td>
                            <td><span class="badge bg-warning">Pending</span></td>
                        </tr>
                        <tr>
                            <td>#DOC-005</td>
                            <td>Barangay Clearance</td>
                            <td>Roberto Lim</td>
                            <td>May 7, 2023</td>
                            <td><span class="badge bg-success">Completed</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 mb-4">
        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">Recent Reports</h5>
                <a href="reports.php" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Reporter</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#REP-001</td>
                            <td>Complaint</td>
                            <td>Antonio Tan</td>
                            <td>May 3, 2023</td>
                            <td><span class="badge bg-success">Resolved</span></td>
                        </tr>
                        <tr>
                            <td>#REP-002</td>
                            <td>Incident</td>
                            <td>Rosario Garcia</td>
                            <td>May 4, 2023</td>
                            <td><span class="badge bg-warning">Investigating</span></td>
                        </tr>
                        <tr>
                            <td>#REP-003</td>
                            <td>Suggestion</td>
                            <td>Juan Dela Cruz</td>
                            <td>May 5, 2023</td>
                            <td><span class="badge bg-info">Under Review</span></td>
                        </tr>
                        <tr>
                            <td>#REP-004</td>
                            <td>Complaint</td>
                            <td>Maria Santos</td>
                            <td>May 6, 2023</td>
                            <td><span class="badge bg-warning">Investigating</span></td>
                        </tr>
                        <tr>
                            <td>#REP-005</td>
                            <td>Incident</td>
                            <td>Pedro Reyes</td>
                            <td>May 7, 2023</td>
                            <td><span class="badge bg-danger">Urgent</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions Section -->
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="admin-card">
            <h5 class="card-title mb-3">Quick Actions</h5>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <a href="documents.php" class="btn btn-primary d-block py-3">
                        <i class="fas fa-file-alt me-2"></i> New Document Request
                    </a>
                </div>
                <div class="col-md-3 mb-3">
                    <a href="citizens.php" class="btn btn-success d-block py-3">
                        <i class="fas fa-user-plus me-2"></i> Add Citizen
                    </a>
                </div>
                <div class="col-md-3 mb-3">
                    <a href="announcements.php" class="btn btn-info d-block py-3">
                        <i class="fas fa-bullhorn me-2"></i> Create Announcement
                    </a>
                </div>
                <div class="col-md-3 mb-3">
                    <a href="reports.php" class="btn btn-warning d-block py-3">
                        <i class="fas fa-flag me-2"></i> View Reports
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Include footer
include_once 'includes/footer.php';
?>
