<?php
// Include database connection file
include('db_conn.php');

// SQL query to fetch farming tips
$sql = "SELECT tip_content FROM farming_tips";
$result = $conn->query($sql);

// Initialize an array to store farming tips
$farming_tips = [];

// Check if there are results
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $farming_tips[] = $row["tip_content"];
    }
}

// Close connection
$conn->close();

// Output farming tips as JSON
echo json_encode($farming_tips);
?>
