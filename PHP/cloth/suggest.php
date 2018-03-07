<?php 
include "includes/connect.php";
session_start();
if(!isset($_SESSION['email'])) 
    header('location:login.php');

if(isset($_POST['sub'])) {
    $rname = $_POST['rname'];
    $description = $_POST['description'];    
    $ingredients = $_POST['ingredients'];
    $directions = $_POST['directions'];
    $user_id=$_SESSION['user_id'];
   
    $uploadOk = 0;
    // https://www.tutorialspoint.com/php/php_file_uploading.htm
    //To Do: Check the file size. It should be less than 50000.
    //To Do: Restrict the file type to jpg or jpeg or gif.
    //To Do: Uload the file using PHP move_uploaded_file() function
    //TO Do change the $uploadOk to 1 after above if above tasks are completed
    if(isset($_FILES['photo'])){
        $errors= array();
        $file_name = $_FILES['photo']['name'];
        $file_size = $_FILES['photo']['size'];
        $file_tmp = $_FILES['photo']['tmp_name'];
        $file_type = $_FILES['photo']['type'];
        $tmp = explode('.', $file_name);
        $file_ext=strtolower(end($tmp));
        
        $expensions= array("jpeg","jpg","png", "gif");
        if(in_array($file_ext,$expensions)=== false){
           array_push($errors, "extension not allowed, please choose a JPEG or PNG file.");
        }
        
        if($file_size > 50000000) {
            array_push($errors, "File size must be excately 50 KB.");
        }
        
        if(empty($errors)==true) {
           move_uploaded_file($file_tmp,"uploads/".$file_name) or die("error moving file");
           $uploadOk = 1;
        }else{
           print_r($errors);
        }
     
    if ($uploadOk == 1) {
        $qry = "insert into tbl_cloth (name, user_id, description, ingredients, directions, photo) VALUES ('$rname', '$user_id', '$description', '$ingredients', '$directions', '$file_name')";
        mysqli_query($conn,$qry)  or die("error: ".$qry);
        header('location:home.php');
    }
}
}
?>
<!DOCTYPE html>
<html>
    <head>
            <title>Upload</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>   
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
    <h1>Upload cloths</h1>
  </div>
</div>
<div class="w3-container">
                <h4> <?php if(isset($warning)) echo $warning; ?></h4>
                <!--NOTE: enctype is necessary for upload and you cant use GET, only POST-->
                <form class="form" method="post" action="" enctype="multipart/form-data"></br></br>
                Type of Dress<input type="text" name="rname"></br></br>
                Description<textarea name="description"></textarea></br></br>
                Type of Material<textarea name="ingredients"></textarea></br></br>
                Sizes<textarea name="directions"></textarea></br></br>
                Photo<input type="file" name="photo" id="photo"></br></br>
                <input type="submit" name="sub" value="Click to Submit">
            </form>
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