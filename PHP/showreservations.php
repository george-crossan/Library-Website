<?php
require_once "database.php";

$user = $_SESSION["User"];

# Show all reservations that current user has
$sql = "SELECT books.ISBN, books.BookTitle, books.Author, books.Year 
FROM books 
JOIN reserved ON books.ISBN = reserved.ISBN 
JOIN users ON users.Username = reserved.Username 
WHERE reserved.Username = '$user'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    //output data of each row in a table
    echo "<table>";
    echo "<tr><th>";
    echo"BookTitle";
    echo "</th><th>";
    echo"Author";
    echo "</th><th>";
    echo"Year";
    echo "</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>";
        echo(htmlentities($row["BookTitle"]));
        echo "</td><td>";
        echo(htmlentities($row["Author"]));
        echo "</td><td>";
        echo(htmlentities($row["Year"]));
        echo "</td><td>";
        echo('<a href="../PHP/removereservation.php?id='.htmlentities($row["ISBN"]).'">Remove Reservation</a>');
        echo "</td></tr>\n";
    }
    echo "</table>";
}
else{
    echo "You have no books reserved at the moment.";
}


$conn->close();
?>