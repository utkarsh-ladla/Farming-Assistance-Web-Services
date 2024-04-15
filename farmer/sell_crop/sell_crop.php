<?php
// Start the session
session_start();

// Include your database connection file
include '../db_conn.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $supplier_id = mysqli_real_escape_string($conn, $_POST['supplier_id']);
    $crop_id = mysqli_real_escape_string($conn, $_POST['crop_id']);
    $crop_name = mysqli_real_escape_string($conn, $_POST['crop_name']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    // Assuming you have stored farmer ID and name in session variables
    // Replace these with the appropriate way to get the logged-in farmer's ID and name in your application
    $farmer_id = $_SESSION['id']; // Example session variable storing farmer ID
    $farmer_name = $_SESSION['name']; // Example session variable storing farmer name

    // Fetch supplier name based on supplier ID
    $query_supplier = "SELECT supplier_name FROM supplier_advertisements WHERE supplier_id = '$supplier_id'";
    $result_supplier = mysqli_query($conn, $query_supplier);


    // Fetch crop name based on crop ID
    $query_crop = "SELECT crop_name FROM supplier_advertisements WHERE crop_id = '$crop_id'";
    $result_crop = mysqli_query($conn, $query_crop);

    // Check if queries were successful
    if ($result_supplier && $result_crop) {
        $row_supplier = mysqli_fetch_assoc($result_supplier);
        $supplier_name = $row_supplier['supplier_name'];

        $row_crop = mysqli_fetch_assoc($result_crop);
        // $crop_name = $row_crop['crop_name'];

        // Insert data into sell_crop table
        $query_insert = "INSERT INTO sell_crop (supplier_id, supplier_name, crop_id, crop_name, quantity, price, farmer_id, farmer_name) VALUES ('$supplier_id', '$supplier_name', '$crop_id', '$crop_name', '$quantity', '$price', '$farmer_id', '$farmer_name')";
        $result_insert = mysqli_query($conn, $query_insert);

        if ($result_insert) {
            echo "Data inserted successfully into sell_crop table.";
            header("Location: ../home.php");
        } else {
            echo "Error inserting data into sell_crop table: " . mysqli_error($conn);
        }
    } else {
        echo "Error fetching supplier or crop details: " . mysqli_error($conn);
    }
}
