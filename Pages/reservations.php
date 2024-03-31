<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/search.css">
    <link rel="stylesheet" href="../CSS/nav.css">
    <title>Reservations</title>
</head>
<body>
    <?php include '../PHP/nav.php' ?>
    <div class="main">
        <h2>Reserved Books</h2>
        <div class="results">
            <form method="post">
                <?php include '../PHP/showreservations.php';?>
            </form>
        </div>
    </div>
</body>
</html>