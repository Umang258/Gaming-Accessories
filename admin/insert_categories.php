<?php
include('../connect.php');

if(isset($_POST['insert_cat']))
{
    $cat_title=$_POST['cat_title'];
    $cat_image= $_FILES['cat_image']['name'];
    $temp_image1 = $_FILES['cat_image']['tmp_name'];

    //check for Unique Values
    $select_query = "select * from `categories` where cat_title='$cat_title'";
    $result_select = mysqli_query($con,$select_query);
    $number = mysqli_num_rows($result_select);

    if($number>0) 
    {
        echo "<script> alert('Category is Already Present in Database')</script>";
    }
    else
    {
    //inserting Into Database
    $insert_query="insert into `categories` (cat_title,cat_image) values('$cat_title','$cat_image')";

    move_uploaded_file($temp_image1,"../img/$cat_image");
    $result=mysqli_query($con,$insert_query);

    if($result)
    {
        $temp_image1 = $_FILES['cat_image']['tmp_name'];
        echo "<script> alert('Category Has Been Inserted Successfully')</script>";
    }
    }
}
?>

<h2 class="text-center my-2">Insert Categories</h2>
<form action="" method="post" class="py-3 w-50 m-auto"  enctype="multipart/form-data">

    <div class="input-group py-3   ">
        
        <input type="text" class="form-control" name="cat_title" id="inlineFormInputGroupUsername2" placeholder="Insert Category here" required>
    </div>
    <div class="form-outline mb-3 text-center py-2">
        <b><label for="product_image1">Category Image</label></b>
        <input type="file" class="form-control" id="cat_image" name="cat_image" required>
    </div>

<div class="input-group justify-content-center ">
    
    <input type="submit" class="bg-primary border-0 p-2 my-3 text-light" name="insert_cat"  value="Insert Categories">
    <!-- <button type="submit" class="btn btn-primary btn-md ">Insert Category</button> -->
</div>

</form>