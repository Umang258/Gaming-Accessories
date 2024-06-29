<?php
session_start();
include '../connect.php';



        $query ="SELECT * FROM `admin` WHERE admin_name= '".$_POST['admin_name']."' AND password= '".$_POST['password']."'";   
        $result=$con->query($query);

        if($row=$result->fetch_array())
        {			$_SESSION["admin_id"]=$row[0];
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

