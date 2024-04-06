<?php
// Include database connection file
include('../db_conn.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize complaint input
    $complaint = trim($_POST["complaint"]);

    // Insert complaint into database
    $sql = "INSERT INTO complaints (complaint_text, submission_date) VALUES (?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $complaint);
    
    if ($stmt->execute()) {
        // If complaint is successfully submitted, redirect to a success page
        header("Location: ../../farmer/home.php");
        exit();
    } else {
        // If an error occurs, display an error message
        echo "Error: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>