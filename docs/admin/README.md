# Admin Guide

This guide provides detailed information for administrators on how to use the E-Barangay Management System.

## Admin Login

### Accessing the Admin Dashboard

1. Open your web browser and navigate to:
   ```
   http://localhost/E-Barangay/admin/
   ```

2. You will be presented with the admin login page.

3. Enter your credentials:
   - Default username: `admin`
   - Default password: `admin123`

4. Click the "Login" button to access the admin dashboard.

### Login Security

- The system uses database authentication to verify admin credentials
- User sessions are managed securely
- Failed login attempts are logged for security monitoring
- For security reasons, change the default admin password after the first login

## Dashboard Overview

After successful login, you will be directed to the admin dashboard, which provides an overview of the system's key metrics and recent activities.

### Dashboard Components

1. **Statistics Cards**
   - Total Citizens
   - Document Requests
   - Reports
   - Announcements

2. **Charts**
   - Document Requests by Type
   - Reports by Type

3. **Recent Activities**
   - Recent Document Requests
   - Recent Reports

4. **Quick Actions**
   - New Document Request
   - Add Citizen
   - Create Announcement
   - View Reports

## Managing Citizens

The Citizens Management section allows administrators to manage citizen records in the system.

### Viewing Citizens

1. Click on "Citizens" in the sidebar menu
2. The system displays a list of all registered citizens
3. Use the search box to find specific citizens
4. Sort the list by clicking on column headers

### Adding a New Citizen

1. Click on "Citizens" in the sidebar menu
2. Click the "Add New Citizen" button
3. Fill in the required information:
   - First Name
   - Last Name
   - Address
   - Contact Information
4. Fill in optional information:
   - Middle Name
   - Birth Date
   - Gender
   - Civil Status
   - Email
   - Occupation
5. Click "Save" to add the citizen

### Editing Citizen Information

1. Click on "Citizens" in the sidebar menu
2. Find the citizen you want to edit
3. Click the "Edit" button
4. Update the information as needed
5. Click "Save" to update the record

### Deleting a Citizen

1. Click on "Citizens" in the sidebar menu
2. Find the citizen you want to delete
3. Click the "Delete" button
4. Confirm the deletion when prompted

## Managing Document Requests

The Document Management section allows administrators to process document requests from citizens.

### Viewing Document Requests

1. Click on "Documents" in the sidebar menu
2. The system displays a list of all document requests
3. Use filters to view requests by status:
   - Pending
   - Processing
   - Completed
   - Rejected

### Processing a Document Request

1. Click on "Documents" in the sidebar menu
2. Find the document request you want to process
3. Click the "View" button to see details
4. Update the status:
   - Change to "Processing" when you start working on it
   - Change to "Completed" when the document is ready
   - Change to "Rejected" if the request cannot be fulfilled
5. Add remarks if necessary
6. Click "Save" to update the request

### Creating a New Document Request

1. Click on "Documents" in the sidebar menu
2. Click the "New Document Request" button
3. Select a citizen from the dropdown
4. Select a document type
5. Enter the purpose of the document
6. Click "Save" to create the request

## Managing Reports

The Reports Management section allows administrators to handle reports submitted by citizens.

### Viewing Reports

1. Click on "Reports" in the sidebar menu
2. The system displays a list of all reports
3. Use filters to view reports by:
   - Type (Complaint, Incident, Suggestion, Request for Assistance)
   - Status (Pending, Investigating, Resolved, Closed)
   - Urgency (Low, Medium, High, Emergency)

### Processing a Report

1. Click on "Reports" in the sidebar menu
2. Find the report you want to process
3. Click the "View" button to see details
4. Update the status:
   - Change to "Investigating" when you start working on it
   - Change to "Resolved" when the issue is resolved
   - Change to "Closed" when no further action is needed
5. Add remarks about actions taken
6. Click "Save" to update the report

## Managing Announcements

The Announcements section allows administrators to create and manage announcements for citizens.

### Viewing Announcements

1. Click on "Announcements" in the sidebar menu
2. The system displays a list of all announcements
3. Use filters to view published or draft announcements

### Creating a New Announcement

1. Click on "Announcements" in the sidebar menu
2. Click the "New Announcement" button
3. Enter the announcement title
4. Enter the announcement content
5. Set the publication status:
   - Published: Immediately visible to citizens
   - Draft: Saved but not visible to citizens
6. Click "Save" to create the announcement

### Editing an Announcement

1. Click on "Announcements" in the sidebar menu
2. Find the announcement you want to edit
3. Click the "Edit" button
4. Update the information as needed
5. Click "Save" to update the announcement

### Deleting an Announcement

1. Click on "Announcements" in the sidebar menu
2. Find the announcement you want to delete
3. Click the "Delete" button
4. Confirm the deletion when prompted

## System Settings

The Settings section allows administrators to configure system parameters.

### Updating Barangay Information

1. Click on "Settings" in the sidebar menu
2. Go to the "Barangay Information" tab
3. Update the information:
   - Barangay Name
   - Address
   - Contact Number
   - Email
4. Click "Save" to update the information

### Managing Admin Accounts

1. Click on "Settings" in the sidebar menu
2. Go to the "Admin Accounts" tab
3. View existing admin accounts
4. Add new admin accounts
5. Edit or delete existing accounts

### Changing Your Password

1. Click on your username in the top-right corner
2. Select "Profile" from the dropdown menu
3. Go to the "Change Password" section
4. Enter your current password
5. Enter and confirm your new password
6. Click "Save" to update your password

## Activity Logs

The system maintains logs of all administrative activities for security and auditing purposes.

### Viewing Activity Logs

1. Click on "Settings" in the sidebar menu
2. Go to the "Activity Logs" tab
3. View the list of activities:
   - User
   - Action
   - Details
   - IP Address
   - Timestamp
4. Use filters to narrow down the logs by date, user, or action
