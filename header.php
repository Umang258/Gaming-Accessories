 
<?php 

include 'connect.php';
include('./function/common_function.php');
?>
 
 
 
 <!-- Topbar Start -->
 <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">unknown</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">gamer</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="search.php">
                    <div class="input-group">
                        <input type="Search" name="search_data" class="form-control" placeholder="Search for products">
                        <input type="submit" name="search_data_product" value="Search" class="btn btn-warning" placeholder="Search for products">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

<!-- navbar code is here -->
<div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                       
                        <?php
                            $select_categories="select * from `categories`";
                            $result_categories=mysqli_query($con,$select_categories);
                            // $row_data=mysqli_detch_assoc($result_categories);
                            // echo $row_data['cat_title'];

                            while($row_data=mysqli_fetch_assoc($result_categories))
                            {
                                $cat_title=$row_data['cat_title'];
                                $cat_id=$row_data['cat_id'];

                                echo"
                                <a href='category.php?categories=$cat_id' class='nav-item nav-link'>$cat_title</a>";
                            }
                        ?>

                    
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="cart.php" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;"><?php cart_item();?></span>
                            </a>
                            <a href="logout.php" class="btn px-0 ml-3 text-light">
                               logout
                            </a>
                        </div>
                        
                    </div>
                </nav>
            </div>
        </div>
    </div>