<?php
include('../connect.php');
?>

<h2 class="text-center my-2">List Of Products</h2>
<form action="" method="post" class="py-3">

<table class="table">
  <thead>
    <tr>
        <th scope="col">Product image</th>
        <th scope="col">Product ID</th>
        <th scope="col">Product Name</th>
        <th scope="col">Product price</th>
        
      
 
    </tr>
  </thead>
  <tbody>
  <?php
      $sql="select * from `Products`";
      $result=mysqli_query($con,$sql);
      // $row_data=mysqli_detch_assoc($result_categories);
      // echo $row_data['cat_title'];

      while($row=mysqli_fetch_assoc($result))
       {
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_desc=$row['product_desc'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
      
      
        echo"
        <tr>
        <td><img src='../admin/product_images/$product_image1' style='width:80px' alt='Product Image'></td>
        <td>$product_id</td>
        <td>$product_title</td>
 
        <td>$product_price/-</td>
        </tr>";
      }
?>

  </tbody>
</table>

</form>

