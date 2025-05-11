<?php
// Include database connection
require_once __DIR__ . '/../../includes/db.php';

/**
 * Get all citizens from the database
 * @return array Array of citizens
 */
function getAllCitizens() {
    try {
        $conn = connectDB();
        if (!$conn) {
            throw new Exception("Database connection failed");
        }
        
        $sql = "SELECT 
                    id as citizen_id,
                    first_name,
                    last_name,
                    middle_name,
                    contact_number,
                    email,
                    address
                FROM citizens 
                ORDER BY id ASC";
                
        $stmt = sqlsrv_query($conn, $sql);
        
        if ($stmt === false) {
            throw new Exception(print_r(sqlsrv_errors(), true));
        }
        
        $citizens = array();
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $citizens[] = $row;
        }
        
        sqlsrv_free_stmt($stmt);
        closeDB($conn);
        
        return $citizens;
    } catch(Exception $e) {
        throw new Exception("Error fetching citizens: " . $e->getMessage());
    }
}

/**
 * Get a single citizen by ID
 * @param int $id Citizen ID
 * @return array|null Citizen data or null if not found
 */
function getCitizenById($id) {
    try {
        $conn = connectDB();
        if (!$conn) {
            throw new Exception("Database connection failed");
        }
        
        $sql = "SELECT 
                    id as citizen_id,
                    first_name,
                    last_name,
                    middle_name,
                    contact_number,
                    email,
                    address
                FROM citizens 
                WHERE id = ?";
                
        $params = array($id);
        $stmt = sqlsrv_query($conn, $sql, $params);
        
        if ($stmt === false) {
            throw new Exception(print_r(sqlsrv_errors(), true));
        }
        
        $citizen = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        
        sqlsrv_free_stmt($stmt);
        closeDB($conn);
        
        return $citizen;
    } catch(Exception $e) {
        throw new Exception("Error fetching citizen: " . $e->getMessage());
    }
}

/**
 * Add a new citizen
 * @param array $data Citizen data
 * @return int|false New citizen ID or false on failure
 */
function addCitizen($data) {
    try {
        $conn = connectDB();
        if (!$conn) {
            throw new Exception("Database connection failed");
        }
        
        // Start transaction
        sqlsrv_begin_transaction($conn);
        
        try {
            $sql = "INSERT INTO citizens (
                        first_name,
                        last_name,
                        middle_name,
                        contact_number,
                        email,
                        address
                    ) VALUES (?, ?, ?, ?, ?, ?)";
                    
            $params = array(
                $data['first_name'],
                $data['last_name'],
                $data['middle_name'],
                $data['contact_number'],
                $data['email'],
                $data['address']
            );
            
            $stmt = sqlsrv_query($conn, $sql, $params);
            
            if ($stmt === false) {
                throw new Exception(print_r(sqlsrv_errors(), true));
            }
            
            // Get the new citizen ID
            $query = sqlsrv_query($conn, "SELECT SCOPE_IDENTITY() AS id");
            if ($query === false) {
                throw new Exception(print_r(sqlsrv_errors(), true));
            }
            
            $row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
            $newId = $row['id'];
            
            // If everything is successful, commit the transaction
            sqlsrv_commit($conn);
            
            sqlsrv_free_stmt($stmt);
            sqlsrv_free_stmt($query);
            closeDB($conn);
            
            return $newId;
        } catch (Exception $e) {
            // If there's an error, rollback the transaction
            sqlsrv_rollback($conn);
            throw $e;
        }
    } catch(Exception $e) {
        throw new Exception("Error adding citizen: " . $e->getMessage());
    }
}

/**
 * Update an existing citizen
 * @param int $id Citizen ID
 * @param array $data Updated citizen data
 * @return bool True on success, false on failure
 */
function updateCitizen($id, $data) {
    try {
        $conn = connectDB();
        if (!$conn) {
            throw new Exception("Database connection failed");
        }
        
        $sql = "UPDATE citizens SET 
                    first_name = ?,
                    last_name = ?,
                    middle_name = ?,
                    contact_number = ?,
                    email = ?,
                    address = ?
                WHERE id = ?";
                
        $params = array(
            $data['first_name'],
            $data['last_name'],
            $data['middle_name'],
            $data['contact_number'],
            $data['email'],
            $data['address'],
            $id
        );
        
        $stmt = sqlsrv_query($conn, $sql, $params);
        
        if ($stmt === false) {
            throw new Exception(print_r(sqlsrv_errors(), true));
        }
        
        sqlsrv_free_stmt($stmt);
        closeDB($conn);
        
        return true;
    } catch(Exception $e) {
        throw new Exception("Error updating citizen: " . $e->getMessage());
    }
}

/**
 * Delete a citizen
 * @param int $id Citizen ID
 * @return bool True on success, false on failure
 */
function deleteCitizen($id) {
    try {
        $conn = connectDB();
        if (!$conn) {
            throw new Exception("Database connection failed");
        }
        
        // Start transaction
        sqlsrv_begin_transaction($conn);
        
        try {
            // First check if citizen exists
            $checkSql = "SELECT id FROM citizens WHERE id = ?";
            $checkParams = array($id);
            $checkStmt = sqlsrv_query($conn, $checkSql, $checkParams);
            
            if ($checkStmt === false) {
                throw new Exception(print_r(sqlsrv_errors(), true));
            }
            
            if (!sqlsrv_fetch_array($checkStmt, SQLSRV_FETCH_ASSOC)) {
                throw new Exception("Citizen not found");
            }
            
            sqlsrv_free_stmt($checkStmt);
            
            // Delete the citizen
            $sql = "DELETE FROM citizens WHERE id = ?";
            $params = array($id);
            
            $stmt = sqlsrv_query($conn, $sql, $params);
            
            if ($stmt === false) {
                throw new Exception(print_r(sqlsrv_errors(), true));
            }
            
            // If everything is successful, commit the transaction
            sqlsrv_commit($conn);
            
            sqlsrv_free_stmt($stmt);
            closeDB($conn);
            
            return true;
        } catch (Exception $e) {
            // If there's an error, rollback the transaction
            sqlsrv_rollback($conn);
            throw $e;
        }
    } catch(Exception $e) {
        throw new Exception("Error deleting citizen: " . $e->getMessage());
    }
}

/**
 * Get all citizens with pagination
 * @param int $page Current page number
 * @param int $perPage Number of records per page
 * @param string $search Search term (optional)
 * @return array Array containing citizens data and pagination info
 */
function getAllCitizensWithPagination($page = 1, $perPage = 10, $search = '') {
    try {
        $conn = connectDB();
        if (!$conn) {
            throw new Exception("Database connection failed");
        }

        // Calculate offset
        $offset = ($page - 1) * $perPage;

        // Base query
        $baseQuery = "FROM citizens";
        $whereClause = "";
        $params = array();

        // Add search condition if search term is provided
        if (!empty($search)) {
            $whereClause = " WHERE first_name LIKE ? OR last_name LIKE ? OR middle_name LIKE ? OR contact_number LIKE ? OR email LIKE ? OR address LIKE ?";
            $searchTerm = "%{$search}%";
            $params = array($searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm);
        }

        // Get total records for pagination
        $countSql = "SELECT COUNT(*) as total " . $baseQuery . $whereClause;
        $countStmt = sqlsrv_query($conn, $countSql, $params);
        
        if ($countStmt === false) {
            throw new Exception(print_r(sqlsrv_errors(), true));
        }

        $totalRow = sqlsrv_fetch_array($countStmt, SQLSRV_FETCH_ASSOC);
        $totalRecords = $totalRow['total'];
        $totalPages = ceil($totalRecords / $perPage);

        // Get paginated records
        $sql = "SELECT 
                    id as citizen_id,
                    first_name,
                    last_name,
                    middle_name,
                    contact_number,
                    email,
                    address
                " . $baseQuery . $whereClause . "
                ORDER BY id ASC
                OFFSET ? ROWS
                FETCH NEXT ? ROWS ONLY";

        // Add pagination parameters
        $params[] = $offset;
        $params[] = $perPage;

        $stmt = sqlsrv_query($conn, $sql, $params);
        
        if ($stmt === false) {
            throw new Exception(print_r(sqlsrv_errors(), true));
        }

        $citizens = array();
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $citizens[] = $row;
        }

        sqlsrv_free_stmt($stmt);
        sqlsrv_free_stmt($countStmt);
        closeDB($conn);

        return array(
            'citizens' => $citizens,
            'pagination' => array(
                'current_page' => $page,
                'per_page' => $perPage,
                'total_records' => $totalRecords,
                'total_pages' => $totalPages
            )
        );
    } catch(Exception $e) {
        throw new Exception("Error fetching citizens: " . $e->getMessage());
    }
}

/**
 * Process citizen form submission
 * @param array $postData The POST data from the form
 * @return array Array containing success status, errors, and new citizen ID if successful
 */
function processCitizenForm($postData) {
    $errors = array();
    $success = false;
    $newId = null;

    // Sanitize and validate input
    $data = array(
        'first_name' => trim($postData['first_name'] ?? ''),
        'last_name' => trim($postData['last_name'] ?? ''),
        'middle_name' => trim($postData['middle_name'] ?? ''),
        'contact_number' => trim($postData['contact_number'] ?? ''),
        'email' => trim($postData['email'] ?? ''),
        'address' => trim($postData['address'] ?? '')
    );

    // Validate required fields
    if (empty($data['first_name'])) {
        $errors[] = "First name is required";
    }
    if (empty($data['last_name'])) {
        $errors[] = "Last name is required";
    }
    if (empty($data['contact_number'])) {
        $errors[] = "Contact number is required";
    }
    if (empty($data['address'])) {
        $errors[] = "Address is required";
    }

    // Validate email if provided
    if (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Validate contact number format (Philippine mobile number)
    if (!empty($data['contact_number']) && !preg_match('/^09\d{9}$/', $data['contact_number'])) {
        $errors[] = "Contact number must be a valid Philippine mobile number (09XXXXXXXXX)";
    }

    // If no errors, proceed with adding the citizen
    if (empty($errors)) {
        try {
            $newId = addCitizen($data);
            if ($newId) {
                $success = true;
            }
        } catch (Exception $e) {
            $errors[] = $e->getMessage();
        }
    }

    return array(
        'success' => $success,
        'errors' => $errors,
        'newId' => $newId,
        'data' => $data // Return sanitized data for form repopulation
    );
}

/**
 * Get citizen details for viewing
 * @param int $id Citizen ID
 * @return array Citizen data or null if not found
 */
function getCitizenDetails($id) {
    try {
        $conn = connectDB();
        if (!$conn) {
            throw new Exception("Database connection failed");
        }

        $sql = "SELECT 
                    id as citizen_id,
                    first_name,
                    last_name,
                    middle_name,
                    contact_number,
                    email,
                    address,
                    FORMAT(created_at, 'yyyy-MM-dd HH:mm:ss') as created_at,
                    FORMAT(updated_at, 'yyyy-MM-dd HH:mm:ss') as updated_at
                FROM citizens 
                WHERE id = ?";
                
        $params = array($id);
        $stmt = sqlsrv_query($conn, $sql, $params);
        
        if ($stmt === false) {
            throw new Exception(print_r(sqlsrv_errors(), true));
        }
        
        $citizen = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        
        sqlsrv_free_stmt($stmt);
        closeDB($conn);
        
        if (!$citizen) {
            throw new Exception("Citizen not found");
        }
        
        return $citizen;
    } catch(Exception $e) {
        throw new Exception("Error fetching citizen details: " . $e->getMessage());
    }
}

/**
 * Process citizen edit form
 * @param int $id Citizen ID
 * @param array $postData The POST data from the form
 * @return array Array containing success status, errors, and updated data
 */
function processCitizenEdit($id, $postData) {
    $errors = array();
    $success = false;
    $data = array();

    try {
        // First check if citizen exists
        $citizen = getCitizenDetails($id);
        if (!$citizen) {
            throw new Exception("Citizen not found");
        }

        // Sanitize and validate input
        $data = array(
            'first_name' => trim($postData['first_name'] ?? ''),
            'last_name' => trim($postData['last_name'] ?? ''),
            'middle_name' => trim($postData['middle_name'] ?? ''),
            'contact_number' => trim($postData['contact_number'] ?? ''),
            'email' => trim($postData['email'] ?? ''),
            'address' => trim($postData['address'] ?? '')
        );

        // Validate required fields
        if (empty($data['first_name'])) {
            $errors[] = "First name is required";
        }
        if (empty($data['last_name'])) {
            $errors[] = "Last name is required";
        }
        if (empty($data['contact_number'])) {
            $errors[] = "Contact number is required";
        }
        if (empty($data['address'])) {
            $errors[] = "Address is required";
        }

        // Validate email if provided
        if (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format";
        }

        // Validate contact number format (Philippine mobile number)
        if (!empty($data['contact_number']) && !preg_match('/^09\d{9}$/', $data['contact_number'])) {
            $errors[] = "Contact number must be a valid Philippine mobile number (09XXXXXXXXX)";
        }

        // If no errors, proceed with updating the citizen
        if (empty($errors)) {
            $conn = connectDB();
            if (!$conn) {
                throw new Exception("Database connection failed");
            }

            // Start transaction
            sqlsrv_begin_transaction($conn);

            try {
                $sql = "UPDATE citizens SET 
                            first_name = ?,
                            last_name = ?,
                            middle_name = ?,
                            contact_number = ?,
                            email = ?,
                            address = ?,
                            updated_at = GETDATE()
                        WHERE id = ?";
                        
                $params = array(
                    $data['first_name'],
                    $data['last_name'],
                    $data['middle_name'],
                    $data['contact_number'],
                    $data['email'],
                    $data['address'],
                    $id
                );
                
                $stmt = sqlsrv_query($conn, $sql, $params);
                
                if ($stmt === false) {
                    throw new Exception(print_r(sqlsrv_errors(), true));
                }

                // If everything is successful, commit the transaction
                sqlsrv_commit($conn);
                
                sqlsrv_free_stmt($stmt);
                closeDB($conn);
                
                $success = true;
            } catch (Exception $e) {
                // If there's an error, rollback the transaction
                sqlsrv_rollback($conn);
                throw $e;
            }
        }
    } catch(Exception $e) {
        $errors[] = $e->getMessage();
    }

    return array(
        'success' => $success,
        'errors' => $errors,
        'data' => $data
    );
} 