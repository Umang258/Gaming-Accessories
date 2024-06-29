<?php
include('../connect.php');

if(isset($_POST['insert_brand']))
{
    $brand_title= $_POST['brand_title'];
    $brand_image= $_FILES['brand_image']['name'];
    $temp_image1 = $_FILES['brand_image']['tmp_name'];

    //check for Unique Values
    $select_query = "select * from `brands` where brand_title='$brand_title'";
    $result_select = mysqli_query($con,$select_query);
    $number = mysqli_num_rows($result_select);

    if($number>0) 
    {
        echo "<script> alert('Brand is Already Present in Database')</script>";
    }
    else
    {
    //inserting Into Database
    $insert_query="insert into `brands` (brand_title,brand_image) values('$brand_title','$brand_image')";

    move_uploaded_file($temp_image1,"../img/$brand_image");
    $result=mysqli_query($con,$insert_query);

    if($result)
    {
        $temp_image1 = $_FILES['brand_image']['tmp_name'];
        echo "<script> alert('Category Has Been Inserted Successfully')</script>";
    }
    }
}
?>

<h2 class="text-center my-2">Insert Brand</h2>
<form action="" method="post" class="py-3 w-50 m-auto"  enctype="multipart/form-data">

    <div class="input-group py-3   ">
        
        <input type="text" class="form-control" name="brand_title" id="inlineFormInputGroupUsername2" placeholder="Insert Brand here" required>
    </div>
    <div class="form-outline mb-3 text-center py-2">
        <b><label for="product_image1" >Brand Image</label></b>
        <input type="file" class="form-control" id="brand_image" name="brand_image" required>
    </div>

<div class="input-group justify-content-center ">
    
    <input type="submit" class="bg-primary border-0 p-2 my-3 text-light" name="insert_brand"  value="Insert Brands">
</div>

</form>