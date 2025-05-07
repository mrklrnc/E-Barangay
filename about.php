<?php
// Include header
include_once 'includes/header.php';
?>

<!-- About Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1>About <?php echo BARANGAY_NAME; ?></h1>
        <p>Learn more about our barangay, its history, officials, and mission</p>
    </div>
</section>

<!-- About Content Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>Our History</h2>
                <p>
                    <?php echo BARANGAY_NAME; ?> has a rich history dating back to the early 1900s. Originally established as a small farming community, our barangay has grown into a vibrant neighborhood with a diverse population.
                </p>
                <p>
                    Over the years, we have developed from a rural settlement into a progressive community with modern facilities while preserving our cultural heritage and traditions. Our barangay has been recognized multiple times for its cleanliness, peace and order initiatives, and community development programs.
                </p>
                
                <h2 class="mt-5">Our Mission</h2>
                <p>
                    To provide efficient and effective delivery of basic services to our constituents, promote peace and order, and implement sustainable development programs that will improve the quality of life of our residents.
                </p>
                
                <h2 class="mt-5">Our Vision</h2>
                <p>
                    A progressive, peaceful, and self-reliant community where residents actively participate in governance and development initiatives, with improved quality of life and sustainable livelihood opportunities.
                </p>
            </div>
            
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Barangay Facts</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Population
                                <span class="badge bg-primary rounded-pill">5,000+</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Land Area
                                <span class="badge bg-primary rounded-pill">2.5 km²</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Households
                                <span class="badge bg-primary rounded-pill">1,200+</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Established
                                <span class="badge bg-primary rounded-pill">1945</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Contact Information</h5>
                        <p class="card-text">
                            <i class="fas fa-map-marker-alt me-2"></i> <?php echo BARANGAY_ADDRESS; ?><br>
                            <i class="fas fa-phone me-2"></i> <?php echo BARANGAY_CONTACT; ?><br>
                            <i class="fas fa-envelope me-2"></i> <?php echo BARANGAY_EMAIL; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Barangay Officials Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2>Barangay Officials</h2>
            <p>Meet the dedicated officials serving our community</p>
        </div>
        
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-user-circle fa-5x mb-3 text-primary"></i>
                        <h5 class="card-title">Juan Dela Cruz</h5>
                        <p class="card-text text-muted">Barangay Captain</p>
                        <p class="card-text">Leading our barangay since 2019 with a focus on community development and peace and order initiatives.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-user-circle fa-5x mb-3 text-primary"></i>
                        <h5 class="card-title">Maria Santos</h5>
                        <p class="card-text text-muted">Barangay Secretary</p>
                        <p class="card-text">Manages administrative tasks and ensures efficient record-keeping and documentation.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-user-circle fa-5x mb-3 text-primary"></i>
                        <h5 class="card-title">Pedro Reyes</h5>
                        <p class="card-text text-muted">Barangay Treasurer</p>
                        <p class="card-text">Oversees the barangay's financial resources and ensures transparent financial management.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-12 text-center">
                <h4>Barangay Kagawads</h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-user-circle fa-4x mb-3 text-primary"></i>
                        <h5 class="card-title">Roberto Lim</h5>
                        <p class="card-text text-muted">Committee on Peace and Order</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-user-circle fa-4x mb-3 text-primary"></i>
                        <h5 class="card-title">Elena Gomez</h5>
                        <p class="card-text text-muted">Committee on Health</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-user-circle fa-4x mb-3 text-primary"></i>
                        <h5 class="card-title">Antonio Tan</h5>
                        <p class="card-text text-muted">Committee on Education</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-user-circle fa-4x mb-3 text-primary"></i>
                        <h5 class="card-title">Rosario Garcia</h5>
                        <p class="card-text text-muted">Committee on Environment</p>
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
