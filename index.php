<?php
// Include header
include_once 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1>Welcome to <?php echo BARANGAY_NAME; ?></h1>
        <p>Your online portal for barangay services and information</p>
        <a href="services.php" class="btn btn-primary btn-lg">Explore Services</a>
    </div>
</section>

<!-- Services Section -->
<section class="services-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2>Our Services</h2>
            <p>We provide various services to help our community</p>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="service-card text-center">
                    <i class="fas fa-file-alt"></i>
                    <h3>Document Requests</h3>
                    <p>Request barangay clearance, certificates, and other documents online</p>
                    <a href="services.php#documents" class="btn btn-outline-primary">Learn More</a>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="service-card text-center">
                    <i class="fas fa-flag"></i>
                    <h3>Report Incidents</h3>
                    <p>Report incidents, complaints, or concerns to the barangay officials</p>
                    <a href="services.php#reports" class="btn btn-outline-primary">Learn More</a>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="service-card text-center">
                    <i class="fas fa-bullhorn"></i>
                    <h3>Announcements</h3>
                    <p>Stay updated with the latest news and announcements from the barangay</p>
                    <a href="services.php#announcements" class="btn btn-outline-primary">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Announcements Section -->
<section class="announcements-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2>Latest Announcements</h2>
            <p>Stay informed with the latest updates from <?php echo BARANGAY_NAME; ?></p>
        </div>
        
        <div class="row">
            <!-- In a real application, these would be dynamically loaded from the database -->
            <div class="col-md-6">
                <div class="announcement-card">
                    <h4>Barangay Clean-up Drive</h4>
                    <p class="announcement-date">May 15, 2023</p>
                    <p>Join us for our monthly clean-up drive this Saturday. Let's work together to keep our community clean and green.</p>
                    <a href="#" class="btn btn-sm btn-primary">Read More</a>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="announcement-card">
                    <h4>COVID-19 Vaccination Schedule</h4>
                    <p class="announcement-date">May 10, 2023</p>
                    <p>The next COVID-19 vaccination schedule is now available. Please check the details and register online.</p>
                    <a href="#" class="btn btn-sm btn-primary">Read More</a>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="announcement-card">
                    <h4>Barangay Fiesta Celebration</h4>
                    <p class="announcement-date">May 5, 2023</p>
                    <p>We are excited to announce our upcoming barangay fiesta celebration. Join us for fun activities and events.</p>
                    <a href="#" class="btn btn-sm btn-primary">Read More</a>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="announcement-card">
                    <h4>New Online Document Request System</h4>
                    <p class="announcement-date">May 1, 2023</p>
                    <p>We are launching our new online document request system to make it easier for residents to request documents.</p>
                    <a href="#" class="btn btn-sm btn-primary">Read More</a>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <a href="services.php#announcements" class="btn btn-primary">View All Announcements</a>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>Contact Us</h2>
                <p>Have questions or concerns? Feel free to reach out to us.</p>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> <?php echo BARANGAY_ADDRESS; ?></li>
                    <li class="mb-2"><i class="fas fa-phone me-2"></i> <?php echo BARANGAY_CONTACT; ?></li>
                    <li class="mb-2"><i class="fas fa-envelope me-2"></i> <?php echo BARANGAY_EMAIL; ?></li>
                </ul>
                <div class="mt-4">
                    <a href="contact.php" class="btn btn-primary">Send Message</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Office Hours</h5>
                        <p class="card-text">Monday to Friday: 8:00 AM - 5:00 PM</p>
                        <p class="card-text">Saturday: 8:00 AM - 12:00 PM</p>
                        <p class="card-text">Sunday: Closed</p>
                        <p class="card-text">For emergencies, please contact our hotline at <?php echo BARANGAY_CONTACT; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
// Include footer
include_once 'includes/footer.php';
?>
