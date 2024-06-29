<?php 

// including connect file 
include('connect.php');


// getting products
function getproducts() {
    global $con;

    // codition to check isset or not
    if(!isset($_GET['category'])) {
      if(!isset($_GET['brand'])) {

        $sql="select * from `products`order by product_title LIMIT 0,8 ";
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
                            <a class='btn btn-outline-dark btn-square' href='index.php?add_to_cart=$product_id' ><i class='fa fa-shopping-cart'></i></a>
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

}
}
}

// getting all products
function get_all_products() {

  global $con;

  // codition to check isset or not
  if(!isset($_GET['category'])) {
    if(!isset($_GET['brand'])) {

  $sql="select * from `products`order by product_title ";
  $result=mysqli_query($con,$sql);

  while ($row=mysqli_fetch_assoc($result)) 
  {
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_desc=$row['product_desc'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $cat_id=$row['cat_id'];
    $brand_id=$row['brand_id'];

    echo"

    <div class='col-md-3 py-2'>
    <div class='card'>
    <div class='album '>
      
    
        <div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 '>
          
      
          <img src='../admin/product_images/$product_image1' class='card-img-top ' alt='Product Image'>
        <div class='card-body'>
          <h4 class='card-title text-center'>$product_title</h4>
          <p class='card-text text-center'>$product_desc</p>
          <p class='card-text text-center'><b>Product Price =$product_price/-</b></p>
          
            
              <div class='d-flex justify-content-between align-items-center'>
                  <div class='btn'>
                  <a href='product_details.php?product_id=$product_id' class='btn btn-primary '>View Product</a>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>
                  </div>
                  
                </div>
              </div>
            </div>
          

          </div>
          </div>
        </div>";
    

  }

}
}
}

// getting unique categories
function get_unique_categories() {
  global $con;

  // codition to check isset or not
  if(isset($_GET['categories'])) {
   $cat_id = $_GET['categories']; 

  $sql="select * from `products` where cat_id=$cat_id";
  $result=mysqli_query($con,$sql);
  $num_of_rows=mysqli_num_rows($result);
  if($num_of_rows==0) {
    echo "<h4 class='text-center text-danger'>No stock for this category</h4>";
  }
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
                <a class='btn btn-outline-dark btn-square' href='category.php?add_to_cart=$product_id' ><i class='fa fa-shopping-cart'></i></a>
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

}
}

// getting unique brands
function get_unique_brands() {
  global $con;

  // codition to check isset or not
  if(isset($_GET['brands'])) {
   $brand_id = $_GET['brands']; 

  $sql="select * from `products` where brand_id=$brand_id";
  $result=mysqli_query($con,$sql);
  $num_of_rows=mysqli_num_rows($result);
  if($num_of_rows==0) {
    echo "<h2 class='text-center text-danger'>This  brand is not available</h2>";
  }
  while ($row=mysqli_fetch_assoc($result)) 
  {
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_desc=$row['product_desc'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    $cat_id=$row['cat_id'];
    $brand_id=$row['brand_id'];

    echo"
    <div class='col-md-4 py-2'>
      <div class='card'>
        <img src='../admin/product_images/$product_image1' class='card-img-top ' alt='Product Image'>
      <div class='card-body'>
        <h4 class='card-title text-center'>$product_title</h4>
        <p class='card-text text-center'>$product_desc</p>
        <p class='card-text text-center'><b>Product Price =$product_price/-</b></p>
        <div class='text-center'>
          <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to Cart</a>
          <a href='product_details.php?product_id=$product_id' class='btn btn-primary '>View Product</a>
        </div>
      </div>
      </div>
    </div>";

  }

}
}


// display brands in dropdown list
function getbrands() {
    global $con;
    $select_brands="select * from `brands`";
    $result_brands=mysqli_query($con,$select_brands);
   
    while($row_data=mysqli_fetch_assoc($result_brands))
     {
      $brand_title=$row_data['brand_title'];
      $brand_id=$row_data['brand_id'];
   
      echo"
      <li>
         <a class='dropdown-item text-dark' href='index.php?brands=$brand_id'>$brand_title</a>
      </li>";
    }

}


// display category in dropdown list
function getcategories(){
    global $con;
    $select_categories="select * from `categories`";
    $result_categories=mysqli_query($con,$select_categories);
       
    while($row_data=mysqli_fetch_assoc($result_categories))
     {
      $cat_title=$row_data['cat_title'];
      $cat_id=$row_data['cat_id'];
   
      echo"
      <li>
         <a class='dropdown-item text-dark' href='index.php?categories=$cat_id'>$cat_title</a>
      </li>";
    }
}

// get reviews 
function view_reviews() {
  global $con;

  // codition to check isset or not
  if(isset($_GET['id'])) {
  if(!isset($_GET['product'])) {
   
      $product_id=$_GET['product_id'];
  $sql="select * from `reviews` where id=$id";
  $result=mysqli_query($con,$sql);

  while ($row=mysqli_fetch_assoc($result)) 
  {
    $product_id=$row['product_id'];
    $email=$_POST["email"];
    $username=$_POST["username"];
    $date_time=$_POST["date_time"];
    $review=$_POST["review"];
 
    echo"
     <div class='media mb-4'>
    <img src='img/user.jpg' alt='Image' class='img-fluid mr-3 mt-1' style='width: 45px;'>
    <div class='media-body'>
        <h6>$username<small> - <i>$date_time</i></small></h6>
        <p>$review</p>
    </div>
</div> ";
  }
}
}
}

// searching products function

function search_product(){
  global $con;
  if(isset($_GET['search_data_product'])){
    $search_data_value=$_GET['search_data'];
   $search_query="Select * from `products` where product_keyword like '%$search_data_value%'";
  $result=mysqli_query($con,$search_query);
  $num_of_rows=mysqli_num_rows($result);
  if($num_of_rows==0) {
    echo "<h3 class='text-center text-danger'>No result match. No product found on this category!</h3>";
  }

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
                                <a class='btn btn-outline-dark btn-square' href='cart.php?add_to_cart=$product_id'><i class='fa fa-shopping-cart'></i></a>
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

}
}

// view details function
function view_details() {
  global $con;

  // codition to check isset or not
  if(isset($_GET['product_id'])) {
  if(!isset($_GET['category'])) {
    if(!isset($_GET['brand'])) {
      $product_id=$_GET['product_id'];
  $sql="select * from `products` where product_id=$product_id";
  $result=mysqli_query($con,$sql);

  while ($row=mysqli_fetch_assoc($result)) 
  {
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_desc=$row['product_desc'];
    $product_desc2=$row['product_desc2'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];
    $cat_id=$row['cat_id'];
    $brand_id=$row['brand_id'];

    echo"
        <div class='row px-xl-5'>
            <div class='col-lg-5 mb-30'>
                <div id='product-carousel' class='carousel slide' data-ride='carousel'>
                    <div class='carousel-inner bg-light'>
                        <div class='carousel-item active'>
                            <img class='w-100 h-100' src='img/$product_image1' alt='$product_title'>
                        </div>

                        <div class='carousel-item '>
                          <img class='w-100 h-100' src='img/$product_image2' alt='$product_title'>
                        </div>

                        <div class='carousel-item '>
                          <img class='w-100 h-100' src='img/$product_image3' alt='$product_title'>
                        </div>
                          
                    </div>
                    <a class='carousel-control-prev' href='#product-carousel' data-slide='prev'>
                        <i class='fa fa-2x fa-angle-left text-dark'></i>
                    </a>
                    <a class='carousel-control-next' href='#product-carousel' data-slide='next'>
                        <i class='fa fa-2x fa-angle-right text-dark'></i>
                    </a>
                </div>
            </div>

            <div class='col-lg-7 h-auto mb-30'>
                <div class='h-100 bg-light p-30'>
                    <h3>$product_title</h3>
                   
                    <h3 class='font-weight-semi-bold mb-4'><span>&#8377;</span>$product_price</h3>
                    <p class='mb-4'>$product_desc</p>
                   
                    
                    <div class='d-flex align-items-center mb-4 pt-2'>
                        <div class='input-group quantity mr-3' style='width: 130px;'>
                            <div class='input-group-btn'>
                                <button class='btn btn-primary btn-minus'>
                                    <i class='fa fa-minus'></i>
                                </button>
                            </div>
                            <input type='text' class='form-control bg-secondary border-0 text-center' value='1'>
                            <div class='input-group-btn'>
                                <button class='btn btn-primary btn-plus'>
                                    <i class='fa fa-plus'></i>
                                </button>
                            </div>
                        </div>
                        <a href='index.php?add_to_cart=$product_id'>
                        <button class='btn btn-primary px-3'><i class='fa fa-shopping-cart mr-1'></i> Add To
                            Cart</button>
                            </a>
                    </div>
                    <div class='d-flex pt-2'>
                        <strong class='text-dark mr-2'>Share on:</strong>
                        <div class='d-inline-flex'>
                            <a class='text-dark px-2' href=''>
                                <i class='fab fa-facebook-f'></i>
                            </a>
                            <a class='text-dark px-2' href=''>
                                <i class='fab fa-twitter'></i>
                            </a>
                            <a class='text-dark px-2' href=''>
                                <i class='fab fa-linkedin-in'></i>
                            </a>
                            <a class='text-dark px-2' href=''>
                                <i class='fab fa-pinterest'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='row px-xl-5'>
        <div class='col'>
            <div class='bg-light p-30'>
                <div class='nav nav-tabs mb-4'>
                    <a class='nav-item nav-link text-dark active' data-toggle='tab' href='#tab-pane-1'>Description</a>

                    <a class='nav-item nav-link text-dark' data-toggle='tab' href='#tab-pane-2'>Reviews (0)</a>
                </div>
                <div class='tab-content'>
                    <div class='tab-pane fade show active' id='tab-pane-1'>
                        <h4 class='mb-3'>Product Description</h4>
                        <p>
                            $product_desc2
                        </p>
                    </div>
        ";

  }

}
}
}
}

// get ip address function

function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip; 


// cart function
function cart() {

  if (isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add = getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query = "Select * from `cart_details` where ip_address='$get_ip_add' and product_id=$get_product_id";
    $result=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result);
    if($num_of_rows>0) {
      echo "<script> alert('This item is already present inside cart') </script>";
      echo "<script> window.open('index.php','_self')</script>";
   }
   else{
    $insert_query= "insert into `cart_details` ( product_id, ip_address, quantity) values ( '$get_product_id', '$get_ip_add', 0)";
    $result=mysqli_query($con,$insert_query);
    echo "<script> alert('Item is added to cart') </script>";
    echo "<script> window.open('index.php','_self')</script>";  
    
  
    
   }
  }
  
  }
  //function to get caet item numbers
  function cart_item(){
  
    if (isset($_GET['add_to_cart']))
    {
      global $con;
      $get_ip_add = getIPAddress();
      
      $select_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
      $result=mysqli_query($con,$select_query);
      $count_cart_items=mysqli_num_rows($result);
    }
     else
     {
      global $con;
      $get_ip_add = getIPAddress();
      
      $select_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
      $result=mysqli_query($con,$select_query);
      $count_cart_items=mysqli_num_rows($result);  
      
    
      
     }
     echo $count_cart_items;
    }
  
  
  // total price function
  function total_cart_price(){
  
    global $con;
    $get_ip_add = getIPAddress();
    $total_price=0;
    $cart_query = "Select * from `cart_details` where ip_address='$get_ip_add'";
    $result = mysqli_query($con,$cart_query);
    while ($row = mysqli_fetch_array($result)){
      $product_id = $row['product_id'];
      $select_products = "Select * from `products` where product_id = '$product_id'";
      $result_products = mysqli_query($con,$select_products);
      while ($row_product_price = mysqli_fetch_array($result_products)){
        $product_price = array ($row_product_price['product_price']);
        $product_values = array_sum ($product_price);
        $total_price+= $product_values;
        
      }
  
    }
    echo $total_price;
  }

?>