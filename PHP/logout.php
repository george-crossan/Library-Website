<?php session_start();
session_destroy(); # end session
header("Location: ../Pages/login.php"); # send user back to login
?>