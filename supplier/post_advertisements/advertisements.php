<?php
// Include database connection file
include('../db_conn.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize crop name input
    $crop_name = trim($_POST["crop_name"]);

    // Validate required quantity input
    $required_quantity = floatval($_POST["required_quantity"]);

    // Get the supplier's name and ID from the session (ensure the session is started)
    session_start();
    if(isset($_SESSION['id']) && isset($_SESSION['name'])) {
        $supplier_id = $_SESSION['id'];
        $supplier_name = $_SESSION['name'];
    } else {
        // Redirect to login page or handle session expiration
        header("Location: login.php");
        exit();
    }

    // File upload configuration
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["crop_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size (max 5MB)
    if ($_FILES["crop_image"]["size"] > 5 * 1024 * 1024) {
        echo "Sorry, your file is too large (max 5MB).";
        $uploadOk = 0;
    }

    // Allow certain file formats (jpg, jpeg, png, gif)
    $allowed_formats = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowed_formats)) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["crop_image"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["crop_image"]["name"])) . " has been uploaded.";

            // Insert advertisement into database
            $sql = "INSERT INTO supplier_advertisements (supplier_id, supplier_name, crop_name, crop_image, required_quantity) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("isssd", $supplier_id, $supplier_name, $crop_name, $target_file, $required_quantity);
            if ($stmt->execute()) {
                // If advertisement is successfully submitted, redirect to a success page
                header("Location: ../home.php");
                exit();
            } else {
                // If an error occurs during insertion, display an error message
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Close database connection
$conn->close();
?>
