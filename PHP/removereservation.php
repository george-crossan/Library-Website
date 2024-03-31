<?php
session_start();
require_once "database.php";

$p = $conn -> real_escape_string($_GET['id']); # book isbn for sql statement

$sql = "DELETE FROM reserved WHERE ISBN ='$p'"; # delete row from reserved table
$sql2 = "UPDATE books SET Reserved = 'N' WHERE ISBN = '$p'"; # change reserve status of book to N
$conn->query($sql);
$conn->query($sql2);
echo '<body style="background-color: #1d1d20;color: #f0f0f0;">';
echo 'Success - <a href="../Pages/reservations.php" style="color: 0f8cf2;">Continue...</a>';
echo '</body>';
return;

?>