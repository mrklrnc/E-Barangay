    <!-- Footer -->
    <footer class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-links">
                    <h5>About <?php echo BARANGAY_NAME; ?></h5>
                    <p>
                        <?php echo BARANGAY_NAME; ?> is committed to providing efficient and effective services to its constituents.
                    </p>
                    <p>
                        <i class="fas fa-map-marker-alt me-2"></i> <?php echo BARANGAY_ADDRESS; ?><br>
                        <i class="fas fa-phone me-2"></i> <?php echo BARANGAY_CONTACT; ?><br>
                        <i class="fas fa-envelope me-2"></i> <?php echo BARANGAY_EMAIL; ?>
                    </p>
                </div>
                <div class="col-md-4 footer-links">
                    <h5>Quick Links</h5>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="services.php">Services</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4 footer-links">
                    <h5>Services</h5>
                    <ul>
                        <li><a href="services.php#documents">Document Requests</a></li>
                        <li><a href="services.php#reports">Report Incidents</a></li>
                        <li><a href="services.php#announcements">Announcements</a></li>
                        <li><a href="services.php#programs">Barangay Programs</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; <?php echo date('Y'); ?> <?php echo BARANGAY_NAME; ?>. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="social-links">
                        <a href="#" class="me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-facebook-messenger"></i></a>

                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Custom JS -->
    <script src="assets/js/main.js"></script>
</body>
</html>
