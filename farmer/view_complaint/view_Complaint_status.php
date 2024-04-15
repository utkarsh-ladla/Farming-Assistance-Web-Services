

<?php
// Include database connection file
include('db_conn.php');

// Assuming the farmer's ID is obtained through some form of authentication (e.g., session variable)
// Replace `$_SESSION['farmer_id']` with the actual way you retrieve the farmer's ID
$farmer_id = $_SESSION['id'];

// Fetch complaints associated with the farmer's ID
$sql = "SELECT id, complaint_text, status FROM complaints WHERE farmer_id = $farmer_id";
$result = $conn->query($sql);

// Check if there are complaints
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Complaint</th><th>Status</th></tr>";
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["complaint_text"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No complaints found for this farmer.";
}

// Close database connection
$conn->close();
?>

