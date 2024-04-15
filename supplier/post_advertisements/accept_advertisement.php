

<?php
// Include database connection file
include('db_conn.php');

$sql_select = "SELECT id, crop_name, crop_image, required_quantity, supplier_id, supplier_name FROM supplier_advertisements";
$result = $conn->query($sql_select);

// Check if there are advertisements
if ($result->num_rows > 0) {
    echo "<div class='advertisement-container'>";
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<form method='post' action='".$_SERVER['PHP_SELF']."'>";
        echo "<div class='advertisement'>";
        echo "<h3>" . $row["crop_name"] . "</h3>";
        // Display the image with a correct file path
        echo "<p>Crop Id: ". $row["id"] . "</p>";
        // echo "<img src='uploads/" . $row["crop_image"] . "' alt='Crop Image'>";
        echo "<p>Required Quantity: " . $row["required_quantity"] . " kgs</p>";
        echo "<p>Supplier ID: " . $row["supplier_id"] . "</p>";
        echo "<p>Supplier Name: " . $row["supplier_name"] . "</p>";
        // echo "<a href='accept_advertisement.php?id=" . $row["id"] . "' class='accept-btn'>Accept</a>";
        echo "</div>";
        echo "</form>";
    }
    echo "</div>";

} else {
    echo "No advertisements available.";
}

$conn->close();
?>