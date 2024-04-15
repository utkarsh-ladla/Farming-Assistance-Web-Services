<?php

include('db_conn.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["status"]) && isset($_POST["complaint_id"])) {
    // Process the form data and update the status
    $status = $_POST["status"];
    $complaintId = $_POST["complaint_id"];

    // Update status in the database
    $query = "UPDATE complaints SET status = '$status' WHERE id = $complaintId";
    if (mysqli_query($conn, $query)) {
        // Redirect back to the same page to avoid resubmission on page refresh
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
}



$sql = "SELECT id, complaint_text, status FROM complaints";
$result = $conn->query($sql);

// Initialize an array to store complaints
$complaints = [];

// Check if there are results
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<div class='complaint-box'>";
        
        // Check if 'id' key exists in the row
        if (isset($row["id"])) {
            echo "<p>ID: " . $row["id"] . "</p>";
        } else {
            echo "<p>ID: N/A</p>"; // Provide a default value if 'id' key is not set
        }
        
        // Check if 'complaint' key exists in the row
        if (isset($row["complaint_text"])) {
            echo "<p>Complaint: " . $row["complaint_text"] . "</p>";
        } else {
            echo "<p>Complaint: N/A</p>"; // Provide a default value if 'complaint' key is not set
        }
        
        // echo "<p>Status: ";
        // echo "<select name='status[]' onchange='updateStatus(this, " . $row["id"] . ")'>";
        // echo "<option value='unread'" . ($row["status"] == "unread" ? " selected" : "") . ">Unread</option>";
        // echo "<option value='read'" . ($row["status"] == "read" ? " selected" : "") . ">Read</option>";
        // echo "<option value='solved'" . ($row["status"] == "solved" ? " selected" : "") . ">Solved</option>";
        // echo "</select>";
        // echo "</p>";
        // echo "</div>";

        echo "<form method='post' action='".$_SERVER['PHP_SELF']."'>";
        echo "<p>Status: ";
        echo "<select name='status'>";
        echo "<option value='unread'" . ($row["status"] == "unread" ? " selected" : "") . ">Unread</option>";
        echo "<option value='read'" . ($row["status"] == "read" ? " selected" : "") . ">Read</option>";
        echo "<option value='solved'" . ($row["status"] == "solved" ? " selected" : "") . ">Solved</option>";
        echo "</select>";
        echo "<input type='hidden' name='complaint_id' value='" . $row["id"] . "'>";
        echo "<input type='submit' value='Update' class='submit-button'>";
        echo "</p>";
        echo "</form>";

        echo "</div>";


    }
} else {
    $complaints[] = "No complaints available.";
}

// Close connection
$conn->close();

?>