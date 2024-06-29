<?php
session_start();
include 'connect.php';



        $query ="SELECT * FROM members WHERE username= '".$_POST['username']."' AND password= '".$_POST['password']."'";   
        $result=$con->query($query);

        if($row=$result->fetch_array())
        {			$_SESSION["user_id"]=$row[0];
                    header("location:index.php");
        }

        else{
            echo "
			<script>alert('Enter Correct Email and Password !');
				setTimeout(function() {
				location.href = 'login.php';
				});
			</script>";
        }
?>

