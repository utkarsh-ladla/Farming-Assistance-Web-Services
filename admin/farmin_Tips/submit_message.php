<?php
session_start();

// Include database connection file
include('db_conn.php');

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["tip_content"])) {
        $content = $_POST["tip_content"];
        
        // Insert message into database
        // (Assuming $conn is your database connection)
        $sql = "INSERT INTO messages (tip_content, timestamp) VALUES (?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $content); // Use "s" for string parameter
        $stmt->execute();
        
        // Redirect back to admin portal or show success message
        header("Location: ../../admin/home.php");
        // header("Location: admin_portal.php");

        exit();
    } else {
        echo "Error: Tip content is required.";
    }
}
?>
<!-- HTML form for admins to submit messages -->

