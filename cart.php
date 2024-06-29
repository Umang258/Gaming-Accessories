<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Unknown Gamers - Cart</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php
    ob_start();

    // Start session if not already started
    if (!session_id()) {
        session_start();
    }

    // Include header
    include('header.php');

    // Call the remove_cart_item function
    remove_cart_item();

    ?>

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>image</th>
                            <th>Product</th>
                            <th>Price for you</th>
                            <th>Real Price</th>
                            <th>Click</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <form action="" method="post">
                            <?php 
                            $get_ip_add = getIPAddress();
                            $total_price = 0;
                            $alter_prices = 0;
                            $save = 0;
                            $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
                            $result = mysqli_query($con, $cart_query);
                            while ($row = mysqli_fetch_array($result)){
                                $product_id = $row['product_id'];
                                $select_products = "Select * from `products` where product_id = '$product_id'";
                                $result_products = mysqli_query($con, $select_products);
                                while ($row_product_price = mysqli_fetch_array($result_products)){
                                    $product_price = array ($row_product_price['product_price']);
                                    $alter_price = array ($row_product_price['alter_price']);
                                    $price_table = $row_product_price['product_price'];
                                    $price_tables = $row_product_price['alter_price'];
                                    $product_title = $row_product_price['product_title'];
                                    $product_image1 = $row_product_price['product_image1'];
                                    $product_values = array_sum ($product_price);
                                    $total_price += $product_values;
                                    $product_value = array_sum ($alter_price);
                                    $alter_prices += $product_value;
                                    $save = $alter_prices - $total_price;
                                    ?>
                                    <tr>
                                        <td class="align-middle"><img src="admin/product_images/<?php echo $product_image1 ?>" alt="" style="width: 50px;"></td>
                                        <td class="align-middle"><?php echo $product_title?></td>
                                        <td class="align-middle"><span>&#8377;</span><?php echo $price_table?></td>
                                        <td class="align-middle"><del><span>&#8377;</span><?php echo $price_tables?></del></td>
                                        <?php 
                                        $get_ip_add = getIPAddress(); 
                                        if (isset($_POST['update_cart'])) {
                                            $quantities = $_POST['qty'];
                                            $update_cart = "update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                                            $result_products_quantity = mysqli_query($con, $update_cart);
                                            $total_price = $total_price * $quantities;
                                        }        
                                        ?>
                                        <td class="align-middle"><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                        <td class="align-middle">
                                            <input type="submit" value="Remove Item" class="bg-warning px-3 py-2 border-0 mx-3" name="remove_cart">
                                        </td>
                                    </tr>
                                    <?php 
                                } 
                            }
                            ?>
                        </form>   
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h6>Total Price :</h6>
                            <h6><del><span>&#8377;</span><?php echo $alter_prices?></del></h6>
                        </div>
                        <div class="d-flex justify-content-between text-center mt-2">
                            <p>Congratulaltions!...  You Will Save :<b> <span>&#8377;</span><?php echo $save?></b></p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Price With Discount :</h5>
                            <h5><span>&#8377;</span><?php echo $total_price?></h5>
                        </div>
                        
                            <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
    
    <!-- function to remove item -->
    <?php 

    function remove_cart_item(){
        global $con;
        if (isset($_POST['remove_cart']) && isset($_POST['removeitem']) && is_array($_POST['removeitem'])) {
            foreach ($_POST['removeitem'] as $remove_id) {
                $delete_query = "Delete from `cart_details` where product_id = $remove_id";
                $run_delete = mysqli_query($con, $delete_query);
                if ($run_delete) {
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        }
    }

    // Include footer
    include('footer.php');

    ?> 
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
   
</body>

</html>
