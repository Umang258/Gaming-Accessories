<?php

include('connect.php');


    $email=$_POST["email"];
    $username=$_POST["username"];
  
    $review=$_POST["review"];
    
    $r=$con->query("INSERT INTO `reviews` (review,username, email) VALUES('$review',$username','$email',NOW())");
    
    if($r){
        echo "<script> alert('Review Inserted')</script>";
       
        }
    
        else 
        {
            echo "<script> alert('There is Something Wrong!');
            window.location = 'detail.php';</script>";    
        }
    ?>
    
