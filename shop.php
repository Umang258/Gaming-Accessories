<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
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
        include('header.php');
    ?>


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">All Products</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
               <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">All Products</span></h2>
        <div class="row px-xl-5">
        <?php
            $sql="select * from `products`order by product_title ";
            $result=mysqli_query($con,$sql);

            while ($row=mysqli_fetch_assoc($result)) 
            {
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_desc=$row['product_desc'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];
                $alter_price=$row['alter_price'];
                $cat_id=$row['cat_id'];
                $brand_id=$row['brand_id'];

                echo"
                <div class='col-lg-3 col-md-4 col-sm-6 pb-1'>
                    <div class='product-item bg-light mb-4'>
                        <div class='product-img position-relative overflow-hidden'>
                            <img class='img-fluid w-100' src='img/$product_image1' alt='Product Image'>
                            <div class='product-action'>
                                <a class='btn btn-outline-dark btn-square' href='index.php?add_to_cart=$product_id'><i class='fa fa-shopping-cart'></i></a>
                                <a class='btn btn-outline-dark btn-square' href='detail.php?product_id=$product_id'><i class='fa fa-search'></i></a>
                            </div>
                        </div>
                        <div class='text-center py-4'>
                            <a class='h6 text-decoration-none text-truncate' href='detail.php'>$product_title</a>
                            <div class='d-flex align-items-center justify-content-center mt-2'>
                                <h5><span>&#8377;</span>$product_price</h5><h6 class='text-muted ml-2'><del><span>&#8377;</span>$alter_price</del></h6>
                            </div>
                        </div>
                    </div>
                </div>";

            }
        ?>
        
        </div>
    </div>
    <!-- Products End -->

        </div>
    </div>
    <!-- Shop End -->


    <?php
        include('footer.php');
    ?>


    <!-- Back to Top -->
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