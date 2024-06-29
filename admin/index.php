<?php 
session_start();
if(!isset($_SESSION["admin_id"]))
header("location:login.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>

    <!-- Bootstrap css CDN link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Awesome Fonts CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Stylesheet link -->
    <link rel="stylesheet" href="style.css">


</head>

<body>

<div class="container-fluid p-0">
    <!-- first child Navbar -->
    <nav class="navbar navbar-extend-lg navbar-light bg-dark">

        <div class="container-fluid">
        <img src="image/logo.jpg" alt="" style="width: 45px;" class="rounded-pill"> 
        
        <nav class="navbar navbar-extend-lg ">
            <ul class="navbar-nav">
                <li class="navbar-item">
                    <a href="#"  class="nav-link text-light">Welcome Tarun</a>
                </li>

            </ul>
        </nav>
        </div>
    </nav>
        <!-- Second Child Navbar -->
        <div class="bg-light">
            <h3 class="text-center p-2">
                Manage Details
            </h3>
        </div>

        <!-- Third Child Navbar -->
    <div class="row">
        <div class="col md-12 bg-dark  d-flex align-items-center ">
    
        <div class="mx-2 mt-2 text-center">      
            <a  href="#">
                <img src="image/logo.jpg" alt="Admin Image" style="width: 50px;"> 
            </a>
            <p class="text-center text-light">Tarun Suthar</p>
        </div>
        
        <div class="button text-center m-3">
            <button ><a href="index.php?insert_product" class="nav-link text-light bg-dark p-1 px-2 ">Add Product</a></button>

            <button><a href="index.php?view_product" class="nav-link text-light bg-dark p-1 px-2">View Products</a></button>
            
            <button><a href="index.php?insert_categories" class="nav-link text-light bg-dark p-1 px-2">Add Category</a></button>
            
            <button><a href="index.php?view_categories" class="nav-link text-light bg-dark p-1 px-2">View Categories</a></button>
            
            <button><a href="index.php?insert_brands" class="nav-link text-light bg-dark p-1 px-2">Add Brands</a></button>
            
            <button><a href="index.php?view_brands" class="nav-link text-light bg-dark p-1 px-2">View Brands</a></button>
            
            <button><a href="index.php?list_users" class="nav-link text-light bg-dark p-1 px-2">List Users</a></button>
            
            <button><a href="../logout.php" class="nav-link text-light bg-dark p-1 px-2">Logout</a></button>

        </div>
        </div>
    </div> 

    <!-- fourth child -->
    <div class="container my-3">
        <?php
        if(isset($_GET['insert_categories']))
        {
            include('insert_categories.php');
        }
        if(isset($_GET['insert_brands']))
        {
            include('insert_brands.php');
        }
        if(isset($_GET['list_users']))
        {
            include('list_users.php');
        }
        if(isset($_GET['view_categories']))
        {
            include('view_categories.php');
        }
        if(isset($_GET['view_brands']))
        {
            include('view_brands.php');
        }
        if(isset($_GET['view_product']))
        {
            include('view_product.php');
        }
        if(isset($_GET['insert_product']))
        {
            include('insert_product.php');
        }
        ?>
    </div>

</div>



    <!-- Bootstrap js CDN link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <!-- ionicons links -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>

</html>