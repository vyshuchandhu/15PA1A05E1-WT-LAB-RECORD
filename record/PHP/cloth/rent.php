 <?php 
include "includes/connect.php";
session_start();
$user_id = $_SESSION['user_id'];

?>	
<!DOCTYPE html>
<html>
<head>
            <title>MY Rent Items</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>   
    <style>
        li{
            list-style-type:none;
        }
    </style>
    <body>
        <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>
  <a href="home1.php" class="w3-bar-item w3-button">MY CLOTHS</a>
  <a href="rent.php" class="w3-bar-item w3-button">MY RENT ITEMS</a>
  <a href="search.php" class="w3-bar-item w3-button">SEARCH</a>
  <a href="suggest.php" class="w3-bar-item w3-button">UPLOAD</a>
  <a href="logout.php" class="w3-bar-item w3-button">LOGOUT</a>
</div>

<div id="main">

<div class="w3-teal">
  <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
    <h1>Rented cloths</h1>
  </div>
</div>
<div class="w3-container">

                    <?php

                    $qry = "select c.`recipe_id`,c.`photo`,c.`description`,c.`name`,c.`request_id`  from tbl_cloth c,tbl_rent r where r.`user_id`='$user_id' and c.`recipe_id`=r.`recipe_id`"; // make select query to get all rows from recipe table
                    $sql = mysqli_query($conn,$qry) or die("error: ".$qry); // execute the quert
                    if(mysqli_num_rows($sql)>0) { // if query returned some rows
                        while($row=mysqli_fetch_assoc($sql)/*your code here*/) { // keep fetching rows using mysqli_fetch_assoc method
                           $imagepath = "uploads/".$row['photo'];//get imagepath from $row associative array
                           $recipelink = "view.php?rid=".$row['recipe_id']; // learn how we are doing this
                           $name = $row['name'];//get the recipe name
                           $description =  $row['description'];//get the description of recipe
                           $request_id = $row['request_id'];
                           echo "<li>";
                           echo "<img src='$imagepath'>";
                           echo "<h3><a href='$recipelink'>$name</a></h3>";
                           echo "<p>$description</p>";
                           echo "</li>";

                        } 
                    } else { 
                        echo "<li>No Rented Items</li>";
}

?>         
    </div>
</div>
<script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "25%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>
</body>
</html>
