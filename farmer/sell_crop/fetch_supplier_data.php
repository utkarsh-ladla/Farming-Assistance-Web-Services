<?php
// Include your database connection file
include 'db_connection.php';

// Check if supplier ID is set and not empty
if(isset($_POST['supplier_id']) && !empty($_POST['supplier_id'])) {
    // Sanitize input
    $supplier_id = mysqli_real_escape_string($conn, $_POST['supplier_id']);
    
    // Query to fetch supplier name and crop IDs
    $query = "SELECT supplier_name, GROUP_CONCAT(crop_id) AS crop_ids FROM supplier_advertisements WHERE supplier_id = '$supplier_id' GROUP BY supplier_name";
    $result = mysqli_query($conn, $query);
    
    // Check if query was successful
    if($result) {
        // Check if any rows were returned
        if(mysqli_num_rows($result) > 0) {
            // Fetch supplier name and crop IDs
            $row = mysqli_fetch_assoc($result);
            $supplier_name = $row['supplier_name'];
            $crop_ids = explode(',', $row['crop_ids']);
            
            // Prepare options for supplier name select element
            $supplier_name_options = '<option value="'.$supplier_name.'">'.$supplier_name.'</option>';
            
            // Prepare options for crop ID select element
            $crop_id_options = '<option value="">Select Crop ID</option>';
            foreach ($crop_ids as $crop_id) {
                $crop_id_options .= '<option value="'.$crop_id.'">'.$crop_id.'</option>';
            }
            
            // Send response back
            echo json_encode(array('supplier_name_options' => $supplier_name_options, 'crop_id_options' => $crop_id_options));
        } else {
            // No matching supplier found
            echo json_encode(array('error' => 'No matching supplier found.'));
        }
    } else {
        // Query failed
        echo json_encode(array('error' => 'Query failed.'));
    }
} else {
    // Supplier ID not set or empty
    echo json_encode(array('error' => 'Supplier ID is not set or empty.'));
}
?>
