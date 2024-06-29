<?php

    // connection variable
    $con = mysqli_connect('localhost','root','','store');
    @session_start();
    // connection checking
    if (!$con) {
        die(mysqli_error($con));
    }
    
?>