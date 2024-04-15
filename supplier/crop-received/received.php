<?php
// Include your database connection file
include 'db_conn.php';

// Fetch data from your database table
$sql = "SELECT * FROM sell_crop";
$result = mysqli_query($conn, $sql);

// Check if there are any rows returned
if (mysqli_num_rows($result) > 0) {
    // Loop through each row and display the data in table rows
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row['crop_id']."</td>";
        echo "<td>".$row['crop_name']."</td>";
        echo "<td>".$row['quantity']."</td>";
        echo "<td>".$row['price']."</td>";
        echo "<td>".$row['farmer_id']."</td>";
        echo "<td>".$row['farmer_name']."</td>";
        echo "<td>";
        if ($row['confirmed'] == 1) {
            echo "Accept";
        } else {
            echo '<form action="crop-received/confirm_deal.php" method="POST">';
            echo '<input type="hidden" name="deal_id" value="'.$row['id'].'">';
            echo '<button type="submit" name="confirm">Confirm</button>';
            echo '</form>';
        }
        echo "</td>";
        echo "</tr>";
    }
} else {
    // If no rows are returned, display a message
    echo "<tr><td colspan='7'>No data found</td></tr>";
}

// Close the database connection
mysqli_close($conn);
?>
