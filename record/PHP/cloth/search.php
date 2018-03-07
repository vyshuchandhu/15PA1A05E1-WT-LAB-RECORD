<?php 
include "includes/connect.php";
session_start();
if(!isset($_SESSION['email'])) 
		header('location:login.php');
	$user_id = $_SESSION['user_id'];
	if(isset($_POST['submit'])) {
		$type=$_GET['type'];
		$size=$_GET['size'];
		$user_id = $_SESSION['user_id'];
		$qry2 = "select * from tbl_cloth where `name`='$type' and `directions`='$size' and `request_id`=0";
		mysqli_query($conn,$qry2);
	}
?>
<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
    <h1>Search</h1>
    <form method="post" id="frm">
                    Type of Dress<select id="type" name="type">
                    <option value="Anarkali">Anarkali</option>
                    <option value="zeans">zeans</option>
                    <option value="choli">choli</option>
                    <option value="chudidhar">chudidhar</option>
                    <option value="shirts">shirts</option>
                    <option value="tops">tops</option>
                    <option value="frock">frock</option>
                    <option value="sari">sari</option>
                    </select></br></br>
                    sizes<select id="size" name="size">
                    <option value="Small">Small</option>
                    <option value="Medium">Medium</option>
                    <option value="Large">Large</option>
                    <option value="ExtraLarge">ExtraLarge</option>
                    <option value="XXL">XXL</option>
                    </select></br></br>
                    <input type="button"  value="Submit" name="submit" onclick="showRequest();">
                </form>

  </div>
</div>
<div class="w3-container">
                <div id="request" class="request">
               </div>
				<script>
				document.getElementById("type").selectedIndex = -1;
                document.getElementById("size").selectedIndex = -1;
			function showRequest() {
				document.getElementById("request").innerHTML=" ";
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("request").innerHTML += this.responseText;
					}
				};
				var type=document.getElementById("type").value;
				var size=document.getElementById("size").value;
				document.getElementById("frm").reset();
				xhttp.open("GET","showRequest.php?rid=<?php echo $user_id;?>&type="+type+"&size="+size, true);
				xhttp.send();
			}
</script>
<div>
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
