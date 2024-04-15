<?php
// Include your database connection file
include '../db_conn.php';

// Add the 'confirmed' column if it doesn't exist
$sql_add_column = "ALTER TABLE sell_crop ADD COLUMN confirmed TINYINT(1) DEFAULT 0";
// mysqli_query($conn, $sql_add_column); // This will not affect existing tables if the column already exists

// Check if the form was submitted and if the deal ID is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm']) && isset($_POST['deal_id'])) {
    // Sanitize and retrieve the deal ID from the form
    $deal_id = mysqli_real_escape_string($conn, $_POST['deal_id']);

    // Update the database to mark the deal as confirmed
    $sql = "UPDATE sell_crop SET confirmed = 1 WHERE id = '$deal_id'"; // Assuming 'id' is the primary key of your 'sell_crop' table
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Deal confirmed successfully.";
        header("Location: ../home.php");
        
    } else {
        echo "Error confirming deal: " . mysqli_error($conn);
    }
}

// Fetch data from your database table
$sql = "SELECT * FROM sell_crop";
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Loop through each row and display the data in table rows
    while($row = mysqli_fetch_assoc($result)) {
        // echo "<tr>";
        // echo "<td>".$row['crop_id']."</td>";
        // echo "<td>".$row['crop_name']."</td>";
        // echo "<td>".$row['quantity']."</td>";
        // echo "<td>".$row['price']."</td>";
        // echo "<td>".$row['farmer_id']."</td>";
        // echo "<td>".$row['farmer_name']."</td>";
        // echo "<td>".($row['confirmed'] == 1 ? 'Accept' : '<form action="confirm_deal.php" method="POST"><input type="hidden" name="deal_id" value="'.$row['id'].'"><button type="submit" name="confirm">Confirm</button></form>')."</td>"; // Display "Accept" if confirmed, otherwise display a confirm button
        // echo "</tr>";
    }
} else {
    // If no rows are returned, display a message
    echo "<tr><td colspan='8'>No data found</td></tr>";
}

// Close the database connection
mysqli_close($conn);
?>
