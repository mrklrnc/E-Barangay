# User Guide

This guide provides detailed information for citizens on how to use the E-Barangay Management System's public interface.

## Accessing the System

The E-Barangay Management System can be accessed through any web browser:

```
http://localhost/E-Barangay/
```

No login is required to access the public dashboard and services.

## Public Dashboard

The public dashboard is the main landing page of the E-Barangay Management System. It provides an overview of the barangay and access to various services.

### Dashboard Components

1. **Hero Section**
   - Barangay name and welcome message
   - Quick access to services

2. **Services Section**
   - Document Requests
   - Report Incidents
   - Announcements

3. **Announcements Section**
   - Latest announcements from the barangay

4. **Contact Section**
   - Barangay contact information
   - Office hours

## Requesting Documents

Citizens can request various official documents from the barangay through the system.

### Available Document Types

1. **Barangay Clearance**
   - A certification stating that the resident has no derogatory record in the barangay
   - Fee: ₱50.00
   - Processing time: 1-2 working days

2. **Certificate of Residency**
   - A certification confirming residency in the barangay
   - Fee: ₱50.00
   - Processing time: 1-2 working days

3. **Business Permit**
   - A permit required for operating a business within the barangay
   - Fee: ₱100.00
   - Processing time: 3-5 working days

4. **Certificate of Indigency**
   - A certification that the resident belongs to the low-income bracket and needs financial assistance
   - Fee: Free
   - Processing time: 1-2 working days

### How to Request a Document

1. Navigate to the "Services" page
2. Go to the "Document Requests" section
3. Click on the "Request Now" button for the desired document type
4. Fill in the required information:
   - Personal Information (Name, Contact Details, Address)
   - Purpose of the document
   - Upload required supporting documents
5. Review the information
6. Submit the request
7. Note the reference number provided for tracking

### Tracking a Document Request

1. Navigate to the "Services" page
2. Go to the "Document Requests" section
3. Click on "Track Request"
4. Enter your reference number
5. View the status of your request:
   - Pending: Request has been submitted but not yet processed
   - Processing: Request is being processed
   - Completed: Document is ready for pickup
   - Rejected: Request has been rejected (with reason)

### Collecting Requested Documents

Once your document request status changes to "Completed":

1. Visit the barangay office during office hours
2. Bring the following:
   - Reference number
   - Valid ID
   - Payment (if applicable)
3. Collect your document from the barangay staff

## Submitting Reports

Citizens can submit various types of reports to the barangay through the system.

### Types of Reports

1. **Incident Reports**
   - Report incidents such as accidents, theft, or disturbances in your area

2. **Complaints**
   - File complaints about noise, sanitation issues, or other concerns in your neighborhood

3. **Suggestions**
   - Share ideas and suggestions for improving barangay services and facilities

4. **Request for Assistance**
   - Request assistance during emergencies, calamities, or other urgent situations

### How to Submit a Report

1. Navigate to the "Services" page
2. Go to the "Report Incidents" section
3. Click on the appropriate report type
4. Fill in the required information:
   - Personal Information (Name, Contact Details)
   - Report Details (Location, Date, Description)
   - Urgency Level
   - Upload evidence (photos, videos, etc.) if available
5. Review the information
6. Submit the report
7. Note the reference number provided for tracking

### Tracking a Report

1. Navigate to the "Services" page
2. Go to the "Report Incidents" section
3. Click on "Track Report"
4. Enter your reference number
5. View the status of your report:
   - Pending: Report has been submitted but not yet processed
   - Investigating: Report is being investigated
   - Resolved: Issue has been resolved
   - Closed: No further action needed

## Viewing Announcements

The system allows citizens to view official announcements from the barangay.

### Accessing Announcements

1. Navigate to the homepage
2. Scroll down to the "Latest Announcements" section
3. View the list of recent announcements

OR

1. Navigate to the "Services" page
2. Go to the "Announcements" section
3. View the complete list of announcements

### Announcement Details

Each announcement includes:
- Title
- Date published
- Content
- Contact information (if applicable)

## Contact Information

### Barangay Office

- **Address**: <?php echo BARANGAY_ADDRESS; ?>
- **Phone**: <?php echo BARANGAY_CONTACT; ?>
- **Email**: <?php echo BARANGAY_EMAIL; ?>

### Office Hours

- Monday to Friday: 8:00 AM - 5:00 PM
- Saturday: 8:00 AM - 12:00 PM
- Sunday: Closed

### Emergency Hotline

For emergencies, please contact the 24/7 hotline: +63 912 345 6789

## Frequently Asked Questions

### Document Requests

**Q: How long does it take to process a barangay clearance?**  
A: Barangay clearances are typically processed within 1-2 working days after submission of complete requirements and payment of the processing fee.

**Q: What documents do I need to bring when requesting a certificate?**  
A: Generally, you need to bring a valid ID and proof of residency (utility bills, etc.). Specific requirements for each document type are listed on the Services page.

**Q: Can someone else collect my document on my behalf?**  
A: Yes, but they must bring an authorization letter signed by you, along with both your ID and their ID.

### Reports

**Q: Will my identity be kept confidential when I submit a report?**  
A: Yes, your personal information will be kept confidential. However, basic contact information is required for follow-up purposes.

**Q: How quickly will my report be addressed?**  
A: Response time depends on the urgency and nature of the report. Emergency reports are prioritized, while routine matters may take a few days to process.

**Q: Can I update my report after submission?**  
A: No, but you can submit additional information by creating a new report and referencing your original report number.

### General

**Q: Is there a mobile app version of the E-Barangay system?**  
A: Currently, the system is only available through web browsers, but it is mobile-responsive and can be accessed on smartphones and tablets.

**Q: How do I report technical issues with the system?**  
A: Please contact the barangay office or send an email to <?php echo BARANGAY_EMAIL; ?> with details of the issue you encountered.
