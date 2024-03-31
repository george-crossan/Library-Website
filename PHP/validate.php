<?php

# Search if username exists
$sql = "SELECT Username, COUNT(*) FROM Users WHERE Username = '$u'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


# If username already exists 
if(htmlentities($row["COUNT(*)"]) > 0){
    $userError = "*This username already exists";
}

# If passwords dont match & if not 6 characters
if($p != $pC){
    $passConfirmError = "*Passwords do not match";
}
if(strlen($p) != 6){
    $passError = "*Password must be 6 characters in length";
}

# PHone numbers must be 10 digits
if(strlen($m) != 10){
    $mobError = "*Mobile number must be 10 digits";
}
if(strlen($t) != 10){
    $telError = "*Telephone number must be 10 digits";
}

# All other fields must be under 25 characters and not empty
$index = 0;
foreach ($fields as $inp){
    if(strlen($inp) > 25){
        $errors[$index] = "*Field cannot be more than 25 characters";
    }
    elseif(empty($inp)){
        $errors[$index] = "*Field cannot be empty";
    }
    $index++;
}

# If ANY errors are found then add is False
# When add is false data is not sent to database
foreach ($errors as $err){
    if($err != ""){
        $add = FALSE;
    }
}

?>