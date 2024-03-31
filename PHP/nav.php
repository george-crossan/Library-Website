<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nav</title>
</head>
<body>
    <ul>
        <li> <?php echo $_SESSION["User"]; ?> </li>
        <li><a href="reservations.php">Reservations</a></li>
        <li><a href="index.php">Search</a></li>
        <li><a href="../PHP/logout.php">Logout</a></li>
    </ul>
</body>
</html>