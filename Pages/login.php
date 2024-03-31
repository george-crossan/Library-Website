<?php 
session_start();

require_once "../PHP/database.php";

$error = "";

if(isset($_POST['name']) && isset($_POST['password'])) { 

    # get username and password from form
    $u = $conn->real_escape_string($_POST['name']);
    $p = $conn->real_escape_string($_POST['password']);

    # find if username and password exists in database
    $sql = "SELECT Username, COUNT(*) FROM Users WHERE Username = '$u' AND Password = '$p'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    
    if(htmlentities($row["COUNT(*)"]) > 0){ # if account exists
        $_SESSION["User"] = htmlentities($row["Username"]); # puts username into session variable to login
        $error = "";
        header("Location: index.php"); # send user to index page
        exit();
    }
    else{
        $error = "Username or Password is incorrect";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>Register</title>
    
</head>
<body>
    <div class="main">
        <div>
            <h2>Login</h2>
        </div>
        <form method="post">
            <div> 
                <p> Username </p>
                <input type="Text" name="name">
            </div>
            <div>
                <p> Password </p>
                <input type="Password" name="password"> 
            </div> <br>
            <?php echo "<span style='color:red'> $error </span>"; ?>
            <br>
            <input type="submit">

        </form> 
        <div>
            <p style="font-size: 14px">Don't have an account?
            <a href="register.php">Create one!</a>
            </p>
        </div>
    </div>
</body>
</html>