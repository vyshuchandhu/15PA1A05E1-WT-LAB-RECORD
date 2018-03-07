<?php
include "includes/connect.php";
session_start();
$rid = $_GET['rid'];
$user_id=$_SESSION['user_id'];
$qry = "SELECT * FROM `tbl_cloth` where `recipe_id`='$rid'";
$sql = mysqli_query($conn,$qry);
if(mysqli_num_rows($sql)>0)
$row=mysqli_fetch_assoc($sql);
else
$warning = "Invalid page";
if(isset($_POST['submit'])) {
$comment = $_POST['comment'];
$user_id = $_SESSION['user_id'];
$qry2 = "INSERT INTO `tbl_comments` ( `comment`, `user_id` , `recipe_id`) VALUES ('$comment', '$user_id', '$rid');";
mysqli_query($conn,$qry2);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>View</title>
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
    <h1>Cloth View</h1>
  </div>
</div>
<div class="w3-container">
<h2><?php echo $row['name'];?></h2>
<h4> <?php if(isset($warning)) echo $warning; ?></h4>
<p ><?php echo $row['description'];?></p>
<h3>Description</h3>
<?php echo $row['ingredients'];?>
<h3>Type of Material</h3>
<?php echo $row['directions'];?>
<h3>Photos</h3>
<ul class="inline">
<li><img src="uploads/<?php echo $row['photo'];?>" style="width:30%;height:50%"></li>
</ul>
<a href="showUplaod.php?request=<?php echo $row['request_id'];?>&rid=<?php echo $row['recipe_id'];?>">Rent</a></br>
<a href="showDelete.php?rid=<?php echo $rid;?>">Delete</a></br>            
<h3>Add Comments</h3>
<form method="post" id="frm">
<textarea name="comment" id="comment"></textarea></br>
<input type="button" value="Submit" onclick="showComments();">
</form>
<div id="comments" class="comments">
<?php $qry1 = "SELECT * FROM `tbl_comments` where `recipe_id` = '$rid' ;";
$sql1 = mysqli_query($conn,$qry1);
if(mysqli_num_rows($sql1)>0) {
while($row1=mysqli_fetch_assoc($sql1)) {
$uid = $row1['user_id'];
$qry2 = "SELECT * FROM `tbl_user` where `user_id` = '$uid'";
$sql2 = mysqli_query($conn,$qry2);
$row2=mysqli_fetch_assoc($sql2);
echo "<div class='comment'>";
echo "By:<b>".$row2['user_name']."</b><br>";
echo $row1['comment'];
echo "</div>";
}
}
else echo "Nocomments"; ?>
</div>
<script>
function showComments() {
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
document.getElementById("comments").innerHTML += this.responseText;
}
};
var comment = document.getElementById("comment").value;
document.getElementById("frm").reset();
xhttp.open("GET","showComment.php?rid=<?php echo $rid;?>&comment="+comment, true);
xhttp.send();
}
</script>
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