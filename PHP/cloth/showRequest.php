<?php
include "includes/connect.php";
session_start();
$type=$_GET['type'];
$size=$_GET['size'];
$user_id = $_SESSION['user_id'];
?>
<html>
<style>
form {
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 180px;
}

form img {
    width: 100%;
    height: 300%;
}
</style>
<ul class="recipes-ul">
<div id="request" class="request">
	<?php $qry1 = "SELECT * FROM `tbl_cloth` where `name`='$type' and `directions`='$size'and `request_id`=0;";
	$sql1 = mysqli_query($conn,$qry1);
	if(mysqli_num_rows($sql1)>0) {
	 while($row=mysqli_fetch_assoc($sql1)/*your code here*/) { // keep fetching rows using mysqli_fetch_assoc method
                           $imagepath = "uploads/".$row['photo'];//get imagepath from $row associative array
                           $recipelink = "view.php?rid=".$row['recipe_id']; // learn how we are doing this
                           $name = $row['name'];//get the recipe name
                           $description =  $row['description'];//get the description of recipe
                           echo "<form>";
                           echo "<img src='$imagepath'>";
                           echo "<h3><a href='$recipelink'>$name</a></h3>";
                           echo "<p>$description</p>";
                           echo "</form>";
                        } 
                    } else { 
                        echo "<li>No Search Item found</li>";
                    }	
?>
</ul>
</div>
</html>