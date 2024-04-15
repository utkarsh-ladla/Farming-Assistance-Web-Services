<?php

include('db_conn.php');
$sql = "SELECT tip_content FROM messages"; 
$result = $conn->query($sql);

// Initialize an array to store tips
$tips = [];

// Check if there are results
if ($result->num_rows > 0) {
  
    while ($row = $result->fetch_assoc()) {
        $tips[] = $row["tip_content"];
    }
} else {
    $tips[] = "No tips available.";
}

// Close connection
$conn->close();

?>
<!-- HTML to display tips -->
<?php if (!empty($tips)): ?>
<ul>
    <?php foreach ($tips as $tip): ?>
    <li><?php echo $tip; ?></li>
    <?php endforeach; ?>
</ul>
<?php else: ?>
<p>No tips available.</p>
<?php endif; ?>