<?php 
include "includes/connect.php";
session_start();

if(isset($_POST['sub'])) {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $repass=$_POST['repass'];
        if($name==''||$repass==''||$pass=''||$email=='')
             $warning="Fill all fields";
        else{
        if($pass!=$repass){
             $warning="Retype password is not same";
        }
        else{
        $qry = "INSERT INTO `tbl_user` ( `user_name`, `user_email`, `password`) VALUES ('$name', '$email', '$pass')";
        mysqli_query($conn,$qry) or die("Connection failed: " . mysqli_error());
		 header('location:home1.php');
        }
        }
    }
if(isset($_POST['submit'])) {
        $email=$_POST['email1'];
        $pass=$_POST['pass1'];
        $qry = "SELECT * FROM `tbl_user` WHERE  `user_email`='$email' AND `password`='$pass';";
        $sql = mysqli_query($conn,$qry) or die("Connection failed: " . mysqli_error());
        if(mysqli_num_rows($sql)>0) {
            $row=mysqli_fetch_assoc($sql);
            $_SESSION['user_id']=$row['user_id'];
            $_SESSION["user"] = $row['user_name'];
            $_SESSION["email"] = $row['user_email'];
            header('location:home1.php');
        } else {
            $warning = "Invalid login";
        }
    
    }	
?>
<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <title>Login Form&Register Form</title>
      <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="login-wrap">
	<div class="login-html">
		<h4> <?php if(isset($warning)) echo $warning; ?></h4>
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
		<div class="login-form">
			<div class="sign-in-htm">
				<form class="form" method="post" action="">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input" name="email1">
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="pass1">
				</div>
				<div class="group">
					<input id="check" type="checkbox" class="check" checked>
					<label for="check"><span class="icon"></span> Keep me Signed in</label>
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign In" name="submit">
				</div>
				</form>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Forgot Password?</a>
				</div>
			</div>
			<div class="sign-up-htm">
				<form class="form" method="post" action="">
				<div class="group">
					<label for="user" class="label">Username</label>
					<input id="user" type="text" class="input" name="name" >
				</div>
				<div class="group">
					<label for="pass" class="label">Email Address</label>
					<input id="pass" type="text" class="input" name="email" >
				</div>
				<div class="group">
					<label for="pass" class="label">Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="pass" >
				</div>
				<div class="group">
					<label for="pass" class="label">Repeat Password</label>
					<input id="pass" type="password" class="input" data-type="password" name="repass" >
				</div>
				<div class="group">
					<input type="submit" class="button" value="Sign Up" name="sub">
				</div>
				</form>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Already Member?</a>
				</div>
			</div>
		</div>
	</div>
</div>
  
  

</body>

</html>
