<?php
require_once "database.php";

if (isset($_GET['search'])){ # IF user searches

    $search = $conn -> real_escape_string($_GET['search']); # get search result

    # page defaults to 1, or carries over between pages
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    # category defaults to none, or carries over or carries over between pages
    if(isset($_GET['categories'])){
        $category = $_GET['categories'];
    } else {
        $category = "";
    }

    # limits to 5 results per page
    $limit = 5;
    # offset algorithm to find what offset should be
    $offset = ($page - 1) * $limit;

    # Runs almost same code but if the category is none it does not include category
    # In SQL search, if category is set then it searches by category
    if ($_GET['categories'] == ""){

        # SQL query for books that match search
        $sql = "SELECT books.ISBN, books.BookTitle, books.Author, books.Year, books.Reserved, category.CategoryDescription, category.CategoryID
        FROM books 
        LEFT JOIN category ON books.Category = category.CategoryID 
        WHERE BookTitle LIKE '$search%' OR Author LIKE '$search%' 
        LIMIT $limit OFFSET $offset";

        # find amount of pages to display
        $sqlCount = "SELECT COUNT(*) FROM books WHERE BookTitle LIKE '$search%' OR Author LIKE '$search%'"; 
        $resultCount = $conn->query($sqlCount);
        $rowCount = $resultCount->fetch_assoc();
        $pageCount = ceil($rowCount['COUNT(*)'] / $limit);
    }
    else{

        # SQL query for books that match search when category is selected
        $cat = $_GET['categories'];
        $sql = "SELECT books.ISBN, books.BookTitle, books.Author, books.Year, books.Reserved, category.CategoryDescription
        FROM books 
        LEFT JOIN category ON books.Category = category.CategoryID 
        WHERE (books.BookTitle LIKE '$search%' OR Author LIKE '$search%') AND category.CategoryID = $cat
        LIMIT $limit OFFSET $offset";

        #find amount of pages to display
        $sqlCount = "SELECT COUNT(*) FROM books 
        LEFT JOIN category ON books.Category = category.CategoryID 
        WHERE (books.BookTitle LIKE '$search%' OR Author LIKE '$search%') AND category.CategoryID = $cat";
        $resultCount = $conn->query($sqlCount);
        $rowCount = $resultCount->fetch_assoc();
        $pageCount = ceil($rowCount['COUNT(*)'] / $limit);
    }
    $result = $conn->query($sql); # run query


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
        # display results of search
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>";
            echo(htmlentities($row["BookTitle"]));
            echo "</td><td>";
            echo(htmlentities($row["Author"]));
            echo "</td><td>";
            echo(htmlentities($row["Year"]));
            echo "</td><td>";
            echo(htmlentities($row["CategoryDescription"]));
            echo "</td><td>";

            if (htmlentities($row["Reserved"]) == 'N') {
                echo('<a href="../PHP/addreservation.php?id='.htmlentities($row["ISBN"]).'">Reserve</a>');
            }
            else{
                echo "Unavailable";
            }
            echo "</td></tr>\n";
        }
        echo "</table>";
        
        # Display pages as links
        echo "<div class='pages'>";
        for($i = 1; $i <= $pageCount; $i++){
            echo "<a href='index.php?page=$i&search=$search&categories=$category'>$i</a>";
        }
        echo "</div>";
    }
    else{
        echo "0 results";
    }
    $conn->close();
}
?>