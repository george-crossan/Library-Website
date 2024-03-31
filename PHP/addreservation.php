<?php
session_start();
require_once "database.php";

# Create variables to put in sql statement
$user = $_SESSION["User"];
$date = date("Y-m-d");
$p = $conn -> real_escape_string($_GET['id']);

$sql = "INSERT INTO reserved VALUES ('$p', '$user', '$date')"; # Create reservation row
$sql2 = "UPDATE books SET Reserved = 'Y' WHERE ISBN = '$p'"; # Change book reservation status to reserved
$conn->query($sql);
$conn->query($sql2);
echo '<body style="background-color: #1d1d20;color: #f0f0f0;">';
echo 'Success - <a href="../Pages/index.php" style="color: 0f8cf2;">Continue...</a>';
echo '</body>';
return;
?>