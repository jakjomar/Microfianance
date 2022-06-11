<?php
error_reporting(0);
session_start();
$hostname = "localhost";
$username = "root";
$password = "";
$database ="Microfinance1";

$conn = mysqli_connect($hostname, $username, $password, $database) or die("database connection failed");


	if($_SESSION['login'] == 'incorrect' || empty($_SESSION['login'])){
		$_SESSION['login'] = 'incorrect';
		
	}

	if($_SESSION['login'] == 'correct'){
		
		echo "<script>window.location.href = './dashboard.php'</script>";
	}


	if (isset($_POST["sign-in"])) {
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$password = mysqli_real_escape_string($conn, md5($_POST["password"]));
	

	$check_username = "SELECT * FROM admin WHERE email ='$email' AND password='$password'";
	$sqlvalidate = mysqli_query($conn, $check_username);
	$row = mysqli_fetch_array($sqlvalidate);

	if (mysqli_num_rows($sqlvalidate) > 0) {

		$_SESSION['login'] = 'correct';
		$_SESSION["id"] = $row['id'];
		$_SESSION["lname"] = $row['lname'];
		$_SESSION["fname"] = $row['fname'];
		$_SESSION["mname"] = $row['mname'];
		$_SESSION["email"] = $row['email'];
		$_SESSION["position"] = $row['position'];
		
		echo "<script>window.location.href = './dashboard.php'</script>";
	}
	 else{
	 	$_SESSION["login"] = "incorrect";
		echo "<script>alert('login details incorrect');</script>";
	}

}	

?>
<!DOCTYPE html>
<html>
<head>
<!-- <script language="javascript" type="text/javascript">
window.history.forward();
</script> -->
	<title>Microfinance</title>
	<meta name="viewport" content="window=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="asset/css/login.css">
	<link rel="icon" href="asset/icons/logo1.jpeg" type="image/jpg" size="16x16"/>
</head>
<body>
	<div class="loginform">
		<div class="img">
		</div>
	<form method="POST" action="" autocomplete="off">
		<div class="logo">
			<img id="menu" src="asset/icons/microfinance2.PNG" width="200" height="70">
		</div>
		<div class="box" id="box1">
			<label id="header">Sign In</label>
		</div>
		<div id="box" class="box">
			<label>Email : </label>
		</div>
		<div class="box">
			<input type="text" name="email" value="<?php echo $_POST['email'];?>" required>
		</div>
		<div id="box" class="box">
			<label>Password :</label>
		</div>
		<div class="box">
			<input type="password" id="pass" name="password" value="<?php echo $_POST['password'];?>" required>
			<span><img  id="show" src="asset/icons/7660426.PNG" width="20" height="20"></span>
			<span><img id="hide"  src="asset/icons/7660378.PNG" width="20" height="20"></span>
		</div>
		<div  id="btn" class="box">
			<button type="submit" name="sign-in">Sign In</button>
		</div>
		<!-- <div  id="btn" class="box">
			<a href="" id="Sign-up" name="Sign-up"><label>Sign-up</label></a>
		</div> -->
	</form>
	</div>
</body>
<script>
	var show = document.getElementById("show");
	var hide = document.getElementById("hide");
	var pass = document.getElementById("pass");
	show.onclick =  function(){
		hide.style.display ="block";
		show.style.display ="none";
		pass.setAttribute('type', 'text');
	}
	hide.onclick =  function(){
		show.style.display ="block";
		hide.style.display ="none";
		pass.setAttribute('type', 'password');
	}

</script>
</html>
<style type="text/css">


</style>