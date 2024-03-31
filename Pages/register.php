<?php session_start(); 
require_once "../PHP/database.php";


# Set all error messages to not display
$userError = $passError = $passConfirmError = $fnameError = $lNameError = $a1Error = $a2Error = $cityError = $telError = $mobError = "";
# Set all input fields to display nothing
$u = $p = $pC = $f = $l = $a1 = $a2 = $c = $t = $m = "";

# when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    # get inputs
    $u = $conn -> real_escape_string($_POST['username']);
    $p = $conn -> real_escape_string($_POST['password']);
    $pC = $conn -> real_escape_string($_POST['passwordConfirm']);  
    $f = $conn-> real_escape_string($_POST['fName']); 
    $l = $conn-> real_escape_string($_POST['lName']);
    $a1 = $conn-> real_escape_string($_POST['address1']);
    $a2 = $conn-> real_escape_string($_POST['address2']);
    $c = $conn-> real_escape_string($_POST['city']);
    $t = $conn-> real_escape_string($_POST['tel']);
    $m = $conn-> real_escape_string($_POST['mobile']);

    # put inputs and error messages into array to loop through them
    $fields = [$u, $p, $pC, $f, $l, $a1, $a2, $c, $t, $m];
    $errors = [&$userError , &$passError , &$passConfirmError , &$fnameError , &$lNameError , &$a1Error , &$a2Error , &$cityError , &$telError , &$mobError]; # error messages passed by reference so they can be changed

    # Add variable will only be false if errors exist in the input
    # If it remains true then the inputs will be pushed to database
    $add = TRUE;
    include "../PHP/validate.php";

    # If no errors exist
    if ($add == TRUE){
        #Insert new user to database
        $sql = "INSERT INTO Users VALUES ('$u', '$p', '$f', '$l', '$a1', '$a2', '$c', '$t', '$m')";
        $_SESSION["User"] = htmlentities($_POST['username']); # put username into session variable
        $conn->query($sql);
        header("Location: index.php"); # send user to index page
        exit();
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
            <h2>Register</h2>
        </div>

        <form method="post">
            <p>Username
            <input type="Text" name="username" value=<?php echo $u; ?>> 
            <?php echo "<span style='color:red'> $userError </span>"; ?></p>
            <p>Password
            <input type="Password" name="password" value=<?php echo $p ?>>
            <?php echo "<span style='color:red'> $passError </span>"; ?> </p>
            <p>Confirm Password
            <input type="Password" name="passwordConfirm" value=<?php echo $pC ?>> 
            <?php echo "<span style='color:red'> $passConfirmError </span>"; ?></p>
            <p>First Name
            <input type="text" name="fName" value=<?php echo $f ?>> 
            <?php echo "<span style='color:red'> $fnameError </span>"; ?></p>
            <p>Last Name
            <input type="text" name="lName" value=<?php echo $l ?>> 
            <?php echo "<span style='color:red'> $lNameError </span>"; ?></p>
            <p>Address Line 1
            <input type="text" name="address1" value=<?php echo $a1 ?>> 
            <?php echo "<span style='color:red'> $a1Error </span>"; ?></p>
            <p>Address Line 2
            <input type="text" name="address2" value=<?php echo $a2 ?>> 
            <?php echo "<span style='color:red'> $a2Error </span>"; ?></p>
            <p>City
            <input type="text" name="city" value=<?php echo $c ?>> 
            <?php echo "<span style='color:red'> $cityError </span>"; ?></p>
            <p>Telephone
            <input type="text" name="tel" value=<?php echo $t ?>> 
            <?php echo "<span style='color:red'> $telError </span>"; ?></p>
            <p>Mobile
            <input type="text" name="mobile" value=<?php echo $m ?>> 
            <?php echo "<span style='color:red'> $mobError </span>"; ?></p>
            <input type="submit">
        </form> 
        <div>
            <p style="font-size: 14px">Already have an account?
            <a href="login.php">Login!!!</a>
            </p>
        </div>
    </div>

</body>
</html>