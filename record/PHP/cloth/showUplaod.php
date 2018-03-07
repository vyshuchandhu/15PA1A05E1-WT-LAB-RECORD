<?php
include "includes/connect.php";
session_start();
$user_id=$_SESSION['user_id'];
$request = $_GET['request'];
$rid=$_GET['rid'];
if($request==0){
$qry1 = "UPDATE tbl_cloth SET `request_id`=1  WHERE `recipe_id`='$rid';";
$sql2 = "INSERT INTO tbl_rent (`rent_id`,`recipe_id`,`user_id`) values ('$request','$rid','$user_id');";
$sql=mysqli_query($conn,$qry1);
mysqli_query($conn,$sql2);
if ($conn->query($qry1)==TRUE) {
echo '<script type="text/javascript">
            alert("Product is rented");
      </script>';
//header('location:home.php'); 
}
else{ 
       header('location:home1.php');
}
}
?>
