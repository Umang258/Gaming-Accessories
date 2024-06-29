<?php
include 'connect.php';

$email=$_POST["email"];
$username=$_POST["username"];
$password=$_POST["password"];
$cpassword=$_POST["password"];

$r=$con->query("INSERT INTO `members` (username, email, password) VALUES('$username','$email','$password')");

if($r){
	echo "<p style='text-align:center;font-size: 25px;padding-top:90px;'>User created successfully 
	please login Please <a href='http://localhost/gamers/login.php'> Click here </a> to login </p>";
	}

    else 
    {
        echo "<script> alert('There is Something Wrong!')</script>";    
    }
?>