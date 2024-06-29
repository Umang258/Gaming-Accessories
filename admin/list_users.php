<?php
include('../connect.php');
?>

<h2 class="text-center my-2">List Of Users</h2>
<form action="" method="post" class="py-3">

<table class="table">
  <thead>
    <tr>
      <th scope="col">User ID</th>
      <th scope="col">User Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Date & Time</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $select_members="select * from `members`";
      $result_members=mysqli_query($con,$select_members);
      // $row_data=mysqli_detch_assoc($result_categories);
      // echo $row_data['cat_title'];

      while($row_data=mysqli_fetch_assoc($result_members))
       {
        $user_id=$row_data['user_id'];
        $username=$row_data['username'];
        $email=$row_data['email'];
        $password=$row_data['password'];
        $date_time=$row_data['date_time'];
      
        echo"
      <tr>
        <td>$user_id</td>
        <td>$username</td>
        <td>$email</td>
        <td>$password</td>
        <td>$date_time</td>
      </tr>";
      }
?>

  </tbody>
</table>

</form>

