<?php

include('db_conn.php');
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
        
        echo "<p>Status: ";
        echo "<select name='status[]' onchange='updateStatus(this, " . $row["id"] . ")'>";
        echo "<option value='unread'" . ($row["status"] == "unread" ? " selected" : "") . ">Unread</option>";
        echo "<option value='read'" . ($row["status"] == "read" ? " selected" : "") . ">Read</option>";
        echo "<option value='solved'" . ($row["status"] == "solved" ? " selected" : "") . ">Solved</option>";
        echo "</select>";
        echo "</p>";
        echo "</div>";
    }
} else {
    $complaints[] = "No complaints available.";
}

// Close connection
$conn->close();

?>


<script>
    function updateStatus(selectElement, complaintId) {
    var status = selectElement.value;

    // Debugging: Log status and complaintId
    console.log('Status:', status);
    console.log('Complaint ID:', complaintId);

    // Create AJAX request
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Request successful
                alert('Status updated successfully.');
            } else {
                // Request failed
                alert('Failed to update status.');
            }
        }
    };
    xhr.open('POST', 'update_status.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('status=' + status + '&id=' + complaintId);
}

</script>
