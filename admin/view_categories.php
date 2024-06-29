<?php
include('../connect.php');
?>

<h2 class="text-center my-2">List Of Categories</h2>
<form action="" method="post" class="py-3 m-auto text-center">

<table class="table">
  <thead>
    <tr>
      <th scope="col">Category ID</th>
      <th scope="col">Category Name</th>
      <th scope="col">Category Image</th>
     
    </tr>
  </thead>
  <tbody>
  <?php
      $select_categories="select * from `categories`";
      $result_categories=mysqli_query($con,$select_categories);
      // $row_data=mysqli_detch_assoc($result_categories);
      // echo $row_data['cat_title'];

      while($row_data=mysqli_fetch_assoc($result_categories))
       {
        $cat_id=$row_data['cat_id'];
        $cat_title=$row_data['cat_title'];
        $cat_image=$row_data['cat_image'];
       
      
        echo"
        <tr>
        <td>$cat_id</td>
        <td>$cat_title</td>
        <td><img src='../img/$cat_image' style='width:75px' alt='Category Image'></td>
        </tr>";
      }
?>

  </tbody>
</table>

</form>

