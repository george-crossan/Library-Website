<?php session_start(); # starts PHP session

# Send user back to login page if not logged in
if($_SESSION["User"] == null){
    header("Location: login.php");
} 

require_once "../PHP/database.php";

# Get categories for filter
$categorySQL = "SELECT CategoryID, CategoryDescription FROM category";
$categoryResult = $conn->query($categorySQL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/search.css">
    <link rel="stylesheet" href="../CSS/nav.css">
    <title>Library</title>
    <script src="https://kit.fontawesome.com/18c3765873.js" crossorigin="anonymous"></script> <!-- font to use search icon -->
</head>
<body>
    <?php include '../PHP/nav.php' ?>
    <div class="main">
        <h2>Search for book </h2>
        <div class="search">
            <form method="get">
                <input type="text" placeholder="Search for Books/Authors" autocomplete="off" name="search">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                <select name="categories" id="categories">
                    <option value="">None</option>
                    <?php # Display all categories for filter
                    while($row = $categoryResult->fetch_assoc()) {
                        $categoryName = $row["CategoryDescription"];
                        $categoryID = $row["CategoryID"];
                        echo"<option value='$categoryID'>$categoryName</option>";
                    }
                    ?>
                </select>
            </form>
        </div>
        <div class="results">
            <?php include '../PHP/searchfunction.php';?>
        </div>
    </div>
</body>
</html>