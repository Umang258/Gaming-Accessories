<?php
include('../connect.php');
?>

<h2 class="text-center my-2">List Of Brands</h2>
<form action="" method="post" class="py-3 m-auto text-center">

<table class="table">
  <thead>
    <tr>
      <th scope="col">Brand ID</th>
      <th scope="col">Brand Name</th>
      <th scope="col">Brand Image</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $select_categories="select * from `brands`";
      $result_categories=mysqli_query($con,$select_categories);
      // $row_data=mysqli_detch_assoc($result_categories);
      // echo $row_data['cat_title'];

      while($row_data=mysqli_fetch_assoc($result_categories))
       {
        $brand_id=$row_data['brand_id'];
        $brand_title=$row_data['brand_title'];
        $brand_image=$row_data['brand_image'];
       
      
        echo"
        <tr>
        <td>$brand_id</td>
        <td>$brand_title</td>
        <td><img src='../img/$brand_image' style='width:75px' alt='Brand Image'></td>
        </tr>";
      }
?>

  </tbody>
</table>

</form>

