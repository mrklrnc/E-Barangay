<?php
// Include header
include_once 'includes/header.php';
?>

<!-- Contact Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1>Contact Us</h1>
        <p>Get in touch with <?php echo BARANGAY_NAME; ?> officials and staff</p>
    </div>
</section>

<!-- Contact Information Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Contact Information</h2>
                <p>Feel free to reach out to us through any of the following channels:</p>
                
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-map-marker-alt me-2 text-primary"></i> Address</h5>
                        <p class="card-text"><?php echo BARANGAY_ADDRESS; ?></p>
                    </div>
                </div>
                
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-phone me-2 text-primary"></i> Phone</h5>
                        <p class="card-text"><?php echo BARANGAY_CONTACT; ?></p>
                    </div>
                </div>
                
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-envelope me-2 text-primary"></i> Email</h5>
                        <p class="card-text"><?php echo BARANGAY_EMAIL; ?></p>
                    </div>
                </div>
                
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-clock me-2 text-primary"></i> Office Hours</h5>
                        <p class="card-text">
                            Monday to Friday: 8:00 AM - 5:00 PM<br>
                            Saturday: 8:00 AM - 12:00 PM<br>
                            Sunday: Closed
                        </p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-exclamation-circle me-2 text-primary"></i> Emergency Hotline</h5>
                        <p class="card-text">For emergencies, please contact our 24/7 hotline: <strong>+63 912 345 6789</strong></p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <h2>Send Us a Message</h2>
                <p>Fill out the form below and we'll get back to you as soon as possible.</p>
                
                <form class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullName" required>
                        <div class="invalid-feedback">
                            Please provide your full name.
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" required>
                        <div class="invalid-feedback">
                            Please provide a valid email address.
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" required>
                        <div class="invalid-feedback">
                            Please provide your phone number.
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" required>
                        <div class="invalid-feedback">
                            Please provide a subject for your message.
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="5" required></textarea>
                        <div class="invalid-feedback">
                            Please provide your message.
                        </div>
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
                    
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2>Find Us</h2>
            <p>Visit our barangay office</p>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="ratio ratio-16x9">
                            <!-- Replace with actual Google Maps embed code for your barangay location -->
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.895397988984!2d121.01886317667876!3d14.605034149479126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b7002022b6ff%3A0xb468d8b9f553cd03!2sPedro%20Cruz%20Brgy.%20Hall!5e0!3m2!1sen!2sph!4v1746596981864!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2>Frequently Asked Questions</h2>
            <p>Find answers to common questions about our barangay services</p>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                What are the office hours of the barangay?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                The barangay office is open from Monday to Friday, 8:00 AM to 5:00 PM, and Saturday from 8:00 AM to 12:00 PM. The office is closed on Sundays and holidays.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                How long does it take to process a barangay clearance?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Barangay clearances are typically processed within 1-2 working days after submission of complete requirements and payment of the processing fee.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                How can I report incidents in our barangay?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                You can report incidents by visiting the barangay office in person, calling our hotline, or using the online reporting form on our website. For emergencies, please call our 24/7 emergency hotline.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                How can I request for financial assistance?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                To request for financial assistance, you need to visit the barangay office and bring the following: valid ID, proof of residency, and supporting documents related to your request (e.g., medical bills, school fees, etc.). You will need to fill out an application form and undergo an assessment by our social welfare officer.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                How can I participate in barangay programs and activities?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                You can participate in barangay programs and activities by checking our announcements section for upcoming events, following our social media pages, or visiting the barangay office for more information. We encourage all residents to actively participate in community activities.
                            </div>
                        </div>
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
