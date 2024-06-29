<?php
include('../connect.php');

if(isset($_POST['insert_product']))
{   
    $product_title = $_POST['product_title'];
    $product_desc = $_POST['product_desc'];
    $product_desc2 = $_POST['product_desc2'];
    $product_keyword = $_POST['product_keyword'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $alter_price = $_POST['alter_price'];
    $status = 'true';

    // inserting images in database
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

     // accessing images tmp name
     $temp_image1 = $_FILES['product_image1']['tmp_name'];
     $temp_image2 = $_FILES['product_image2']['tmp_name'];
     $temp_image3 = $_FILES['product_image3']['tmp_name'];

    //  Checking ki Product ka detail Khali to nahi reh gaya
    if($product_title=='')
    {
        echo"<script>alert('Please Fill All the Details in the Form')</script>";
        exit();
    }
    else 
    {
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        // Insert Query
        $insert_product="insert into `products`(product_title,product_desc,product_desc2,product_keyword,cat_id,brand_id,product_image1,product_image2,product_image3,product_price,alter_price,status) values('$product_title','$product_desc','$product_desc2','$product_keyword','$product_category','$product_brand','$product_image1','$product_image2','$product_image3','$product_price','$alter_price','$status')";

        $result_query=mysqli_query($con,$insert_product);

        if($result_query)
        {
            echo"<script>alert('Product is Inserted Successfully')</script>";
        }
    }
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>

    <!-- Bootstrap css CDN link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Awesome Fonts CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body>
    <div class="container mt-3 px-5 w-50">
        <h1 class="text-center py-2">Insert Product Form</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline  m-auto mb-3">
                <b><label for="product_title">Product Name</label></b>
                <input type="text" class="form-control" id="product_title" name="product_title" placeholder="Enter Product Name Here" required>
            </div>
            <!-- Description -->
            <div class="form-outline m-auto mb-3">
                <b><label for="product_desc">Product Description</label></b>
                <input type="text" class="form-control" id="product_desc" name="product_desc" placeholder="Enter Product Description Here" required>
            </div>
               <!-- Description -->
               <div class="form-outline m-auto mb-3">
                <b><label for="product_desc">Product Description</label></b>
                <input type="text" class="form-control" id="product_desc" name="product_desc2" placeholder="Enter Product Description Here" required>
            </div>
             <!-- Product Keyword -->
             <div class="form-outline m-auto mb-3">
                <b><label for="product_keyword">Product Keyword</label></b>
                <input type="text" class="form-control" id="product_keyword" name="product_keyword" placeholder="Enter Product Keyword Here" required>
            </div>
             <!-- Product Categories -->
             <div class="form-outline m-auto mb-3">
             <b><label >Product Category</label></b>
                <select name="product_category" id="product_category" class="form-select" placeholder="Select a Category">
                    <option value=""> Select a Category</option>

        <!-- php code for displaying Categories  -->
        <?php
            $select_categories="select * from `categories`";
            $result_categories=mysqli_query($con,$select_categories);

            while($row_data=mysqli_fetch_assoc($result_categories))
            {
                $cat_title=$row_data['cat_title'];
                $cat_id=$row_data['cat_id'];

                echo"<option value='".$row_data['cat_id']."'>$cat_title</option>";
            }
        ?>
                </select>
            </div>

            <!-- Product Brands -->
            <div class="form-outline m-auto mb-3">
            <b><label>Product Brand</label></b>
                <select name="product_brand" id="product_brand" class="form-select" placeholder="Select a Brand">                   
                    <option value=""> Select a Brand</option>

        <!-- php code for displaying Brands  -->
        <?php
            $select_brands="select * from `brands`";
            $result_brands=mysqli_query($con,$select_brands);
        
                while($row_data=mysqli_fetch_assoc($result_brands))
                {
                  $brand_title=$row_data['brand_title'];
                  $brand_id=$row_data['brand_id'];
          
                  echo" <option value='".$row_data['brand_id']."'>$brand_title</option>"; 
                }
        ?>
                </select>
            </div>
            <!-- Image 1 -->
            <div class="form-outline m-auto mb-3">
                <b><label for="product_image1">Product Image 1</label></b>
                <input type="file" class="form-control" id="product_image1" name="product_image1">
            </div>
             <!-- Image 2 -->
             <div class="form-outline m-auto mb-3">
                <b><label for="product_image2">Product Image 2</label></b>
                <input type="file" class="form-control" id="product_image2" name="product_image2">
            </div>
             <!-- Image 3 -->
             <div class="form-outline m-auto mb-3">
                <b><label for="product_image3">Product Image 3</label></b>
                <input type="file" class="form-control" id="product_image3" name="product_image3" >
            </div>

            <!-- Product Price -->
            <div class="form-outline  m-auto mb-3">
                <b><label for="product_price">Product Price</label></b>
                <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter Product Price Here" required>
            </div>
            <!-- Alternate Price -->
            <div class="form-outline  m-auto mb-3">
                <b><label for="product_price"> Price without Discount</label></b>
                <input type="text" class="form-control" id="alter_price" name="alter_price" placeholder="Enter Product Price Here" required>
            </div>
            <!-- Button -->
            <div class="form-outline  m-auto mb-3">
               <input type="submit" name="insert_product" id="product_price" class="btn btn-primary mb-3 px-3 " value=" Insert Product">
            </div>

        </form>
    </div>



    <!-- Bootstrap js CDN link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <!-- ionicons links -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>