<?php
// Include header
include_once 'includes/header.php';
?>

<!-- Services Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1>Our Services</h1>
        <p>Explore the various services offered by <?php echo BARANGAY_NAME; ?></p>
    </div>
</section>

<!-- Document Requests Section -->
<section id="documents" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2>Document Requests</h2>
            <p>Request official barangay documents online</p>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-file-alt me-2 text-primary"></i> Barangay Clearance</h5>
                        <p class="card-text">A certification issued by the barangay stating that the resident has no derogatory record in the barangay.</p>
                        <h6>Requirements:</h6>
                        <ul>
                            <li>Valid ID</li>
                            <li>Proof of residency</li>
                            <li>Application form</li>
                            <li>Processing fee: ₱50.00</li>
                        </ul>
                        <p>Processing time: 1-2 working days</p>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestModal">Request Now</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-home me-2 text-primary"></i> Certificate of Residency</h5>
                        <p class="card-text">A certification that confirms you are a resident of the barangay.</p>
                        <h6>Requirements:</h6>
                        <ul>
                            <li>Valid ID</li>
                            <li>Proof of residency (utility bills, etc.)</li>
                            <li>Application form</li>
                            <li>Processing fee: ₱50.00</li>
                        </ul>
                        <p>Processing time: 1-2 working days</p>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestModal">Request Now</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-store me-2 text-primary"></i> Business Permit</h5>
                        <p class="card-text">A permit required for operating a business within the barangay.</p>
                        <h6>Requirements:</h6>
                        <ul>
                            <li>Valid ID of business owner</li>
                            <li>Business registration documents</li>
                            <li>Proof of business location</li>
                            <li>Application form</li>
                            <li>Processing fee: ₱100.00</li>
                        </ul>
                        <p>Processing time: 3-5 working days</p>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestModal">Request Now</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-hand-holding-heart me-2 text-primary"></i> Certificate of Indigency</h5>
                        <p class="card-text">A certification that the resident belongs to the low-income bracket and needs financial assistance.</p>
                        <h6>Requirements:</h6>
                        <ul>
                            <li>Valid ID</li>
                            <li>Proof of residency</li>
                            <li>Application form</li>
                            <li>Processing fee: Free</li>
                        </ul>
                        <p>Processing time: 1-2 working days</p>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#requestModal">Request Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Reports Section -->
<section id="reports" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2>Report Incidents</h2>
            <p>Report incidents, complaints, or concerns to the barangay officials</p>
        </div>
        
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-exclamation-triangle me-2 text-warning"></i> Incident Reports</h5>
                        <p class="card-text">Report incidents such as accidents, theft, or disturbances in your area.</p>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reportModal">File a Report</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-comment-alt me-2 text-warning"></i> Complaints</h5>
                        <p class="card-text">File complaints about noise, sanitation issues, or other concerns in your neighborhood.</p>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reportModal">File a Complaint</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-lightbulb me-2 text-warning"></i> Suggestions</h5>
                        <p class="card-text">Share your ideas and suggestions for improving our barangay services and facilities.</p>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reportModal">Submit a Suggestion</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-hands-helping me-2 text-warning"></i> Request for Assistance</h5>
                        <p class="card-text">Request for assistance during emergencies, calamities, or other urgent situations.</p>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reportModal">Request Assistance</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Announcements Section -->
<section id="announcements" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2>Announcements</h2>
            <p>Stay updated with the latest news and announcements from <?php echo BARANGAY_NAME; ?></p>
        </div>
        
        <div class="row">
            <!-- In a real application, these would be dynamically loaded from the database -->
            <div class="col-md-6 mb-4">
                <div class="announcement-card">
                    <h4>Barangay Clean-up Drive</h4>
                    <p class="announcement-date">May 15, 2023</p>
                    <p>Join us for our monthly clean-up drive this Saturday. Let's work together to keep our community clean and green.</p>
                    <p>Time: 7:00 AM - 11:00 AM</p>
                    <p>Location: Barangay Plaza</p>
                    <p>Please bring your own gloves and cleaning materials if possible.</p>
                    <a href="#" class="btn btn-sm btn-primary">Read More</a>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="announcement-card">
                    <h4>COVID-19 Vaccination Schedule</h4>
                    <p class="announcement-date">May 10, 2023</p>
                    <p>The next COVID-19 vaccination schedule is now available. Please check the details and register online.</p>
                    <p>Date: May 20-21, 2023</p>
                    <p>Time: 8:00 AM - 4:00 PM</p>
                    <p>Location: Barangay Health Center</p>
                    <p>Bring your valid ID and vaccination card (for booster shots).</p>
                    <a href="#" class="btn btn-sm btn-primary">Read More</a>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="announcement-card">
                    <h4>Barangay Fiesta Celebration</h4>
                    <p class="announcement-date">May 5, 2023</p>
                    <p>We are excited to announce our upcoming barangay fiesta celebration. Join us for fun activities and events.</p>
                    <p>Date: June 12-13, 2023</p>
                    <p>Location: Barangay Plaza and Sports Complex</p>
                    <p>Activities include: Cultural shows, sports competitions, food festival, and more!</p>
                    <a href="#" class="btn btn-sm btn-primary">Read More</a>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="announcement-card">
                    <h4>New Online Document Request System</h4>
                    <p class="announcement-date">May 1, 2023</p>
                    <p>We are launching our new online document request system to make it easier for residents to request documents.</p>
                    <p>Starting May 15, 2023, residents can request barangay documents online through our website.</p>
                    <p>This will reduce waiting time and make the process more convenient for everyone.</p>
                    <a href="#" class="btn btn-sm btn-primary">Read More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Document Request Modal -->
<div class="modal fade" id="requestModal" tabindex="-1" aria-labelledby="requestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="requestModalLabel">Document Request Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="documentType" class="form-label">Document Type</label>
                            <select class="form-select" id="documentType" required>
                                <option value="" selected disabled>Select Document Type</option>
                                <option value="barangay_clearance">Barangay Clearance</option>
                                <option value="certificate_residency">Certificate of Residency</option>
                                <option value="business_permit">Business Permit</option>
                                <option value="certificate_indigency">Certificate of Indigency</option>
                                <option value="other">Other</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a document type.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="purpose" class="form-label">Purpose</label>
                            <input type="text" class="form-control" id="purpose" required>
                            <div class="invalid-feedback">
                                Please provide the purpose for this document.
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" required>
                            <div class="invalid-feedback">
                                Please provide your first name.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" required>
                            <div class="invalid-feedback">
                                Please provide your last name.
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                            <div class="invalid-feedback">
                                Please provide a valid email address.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" required>
                            <div class="invalid-feedback">
                                Please provide your phone number.
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" rows="3" required></textarea>
                        <div class="invalid-feedback">
                            Please provide your address.
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="idUpload" class="form-label">Upload Valid ID</label>
                        <input class="form-control" type="file" id="idUpload" required>
                        <div class="invalid-feedback">
                            Please upload a valid ID.
                        </div>
                        <small class="text-muted">Accepted formats: JPG, PNG, PDF. Max size: 5MB</small>
                    </div>
                    
                    <div class="mb-3">
                        <label for="additionalInfo" class="form-label">Additional Information</label>
                        <textarea class="form-control" id="additionalInfo" rows="3"></textarea>
                    </div>
                    
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="termsCheck" required>
                        <label class="form-check-label" for="termsCheck">
                            I agree to the terms and conditions and consent to the processing of my personal information.
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit Request</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Report Incident Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reportModalLabel">Report Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="reportType" class="form-label">Report Type</label>
                            <select class="form-select" id="reportType" required>
                                <option value="" selected disabled>Select Report Type</option>
                                <option value="incident">Incident Report</option>
                                <option value="complaint">Complaint</option>
                                <option value="suggestion">Suggestion</option>
                                <option value="assistance">Request for Assistance</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a report type.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="urgency" class="form-label">Urgency Level</label>
                            <select class="form-select" id="urgency" required>
                                <option value="" selected disabled>Select Urgency Level</option>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                                <option value="emergency">Emergency</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select an urgency level.
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="reporterFirstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="reporterFirstName" required>
                            <div class="invalid-feedback">
                                Please provide your first name.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="reporterLastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="reporterLastName" required>
                            <div class="invalid-feedback">
                                Please provide your last name.
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="reporterEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="reporterEmail" required>
                            <div class="invalid-feedback">
                                Please provide a valid email address.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="reporterPhone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="reporterPhone" required>
                            <div class="invalid-feedback">
                                Please provide your phone number.
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="incidentLocation" class="form-label">Location</label>
                        <input type="text" class="form-control" id="incidentLocation" required>
                        <div class="invalid-feedback">
                            Please provide the location.
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="incidentDate" class="form-label">Date of Incident</label>
                        <input type="date" class="form-control" id="incidentDate" required>
                        <div class="invalid-feedback">
                            Please provide the date of the incident.
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="reportDetails" class="form-label">Details</label>
                        <textarea class="form-control" id="reportDetails" rows="5" required></textarea>
                        <div class="invalid-feedback">
                            Please provide details about the report.
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="evidenceUpload" class="form-label">Upload Evidence (if any)</label>
                        <input class="form-control" type="file" id="evidenceUpload" multiple>
                        <small class="text-muted">Accepted formats: JPG, PNG, PDF, MP4. Max size: 10MB</small>
                    </div>
                    
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="reportTermsCheck" required>
                        <label class="form-check-label" for="reportTermsCheck">
                            I certify that the information provided is true and accurate to the best of my knowledge.
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit Report</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
// Include footer
include_once 'includes/footer.php';
?>
