<?php 

include 'config.php';
error_reporting(0);


	$host =  "localhost";
    $username ="root";
    $password ="";
    $db = "microfinance1";

    $conn =  new mysqli($host, $username, $password, $db);

    if($conn->connect_error){
        echo $conn->connect_error;

    }
    include_once("connection.php");
    $conn = connection();

  

   //  $id = $_GET['id'];
  	// $sql = "SELECT * FROM member WHERE id = '$id'";
  	
   //  $result = $conn->query($sql) or die ($conn->error);
   //  $row = $result->fetch_assoc();
       
  	
   //  $result = $conn->query($sql) or die ($conn->error);
   //  $row = $result->fetch_assoc();
   //  $_SESSION["lastname"] = $row['lastname'];
   //  $_SESSION["firstname"] = $row['firstname'];
   //  $_SESSION["middlename"] = $row['middlename'];
   //  $_SESSION["barangay"] = $row['barangay'];
   //  $_SESSION["municipality"] = $row['municipality'];
   //  $_SESSION["province"] = $row['province'];
   //  $_SESSION["id"] = $row['id'];
   //  $_SESSION["gender"] = $row['gender'];
   //  $_SESSION["contact"] = $row['contact'];
   //  $_SESSION["email"] = $row['email'];
   //  $_SESSION["loanstatus"] = $row['loanstatus'];
   //  $_SESSION["dateofbirth"] = $row['dateofbirth'];
   //  $_SESSION["age"] = $row['age'];
   //  $_SESSION["savings"] = $row['savings'];
      


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Microfinance</title>
	<meta name="viewport" content="window=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
	
	<link rel="icon" href="asset/image/logo1.jpeg" type="image/jpg" size="16x16"/>

</head>
<body>
	<div class="left" id="left">
		<div class="leftheader" id="leftheader">
			<img id="hideleft" src="asset/icons/352270.PNG" width="27" height="27">
		</div>
		<div class="btn">
		<a href="./microfinance.php">
					<img id="menuimg" src="asset/icons/home.PNG" width="27" height="27">
					<label>Home</label>
			</a>
			<a href="./about.php"  style="background-color: #239cdf;">
					<img id="menuimg" src="asset/icons/4154884.PNG" width="27" height="27">
					<label>About</label>
			</a>
		</div>
	</div>
	<div class="myheader" id="blur">
		<img id="menu1" src="asset/icons/icons8-menu-24.PNG" width="30" height="30">
		<img id="menuimg" src="asset/icons/logo1.JPEG" width="50" height="40">
		<div class="button">
			<a href="./microfinance.php"><label>HOME</label></a>
			
			<a href="./about.php" style="border: 1px solid #394d8d; color: #394d8d;"><label style="color: #394d8d;">ABOUT</label></a>
		</div>
	</div>
	<div class="content" style="margin-top: 40px;">
		<h1>Microfinance</h1>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The system would include account management regarding savings of users that can monitor client money and account. It will show transactions made, withdraw and deposit amount and personal information of users such as full name, address, contact information, gender, email address, and account name and password.</p>
	</div>
	<div class="content" style="margin-top: 20px;">
		<h1>Terms and Condition</h1>
		
	</div>
	<div class="content">
		<h1>&nbsp;&nbsp;&nbsp;Condition of Use</h1>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;By using our system, you agree to the terms and conditions our system. Your personal information will be cancelled if you agree to our terms and conditions. If you do not wish to let us collect your personal information, please do not agree to it.</p>
	</div>
	<div class="content">
		<h1>&nbsp;&nbsp;&nbsp;Age Restricts</h1>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;By accepting the terms and conditions, you represent that you are at least 18 years old to register to our system. If you are younger than 18, you may not access or system. The reasons are that non-legal age may not be able to pay the transaction for they are mostly unemployed during that age.</p>
	</div>
	<div class="content">
		<h1>&nbsp;&nbsp;&nbsp;Member's Source of Income</h1>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Members must be able to state their source of income during the actual process in the office of the administration.</p>
	</div>
	<!-- <div class="content" style="margin-bottom: 20px;">
		<h1>Member's Source of Income</h1>
		<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Members must be able to state their source of income during the actual process in the office of the administration.</p>
	</div> -->
	<br><br>
	

		

</body>
<div class="out" id="out">
	<!-- <div class="outheader">
		<label>Sign-Out</label>
	</div> -->
	<div class="out1">
		<label>Are you sure you want to Sign-out ??</label>
	</div>
	<div class="outbtn">
		<a href="sign-out.php"><label>Sign-out</label></a>
		<button id="no"><label>Cancel</label></button>
	</div>
	
</div>
<script type="text/javascript">
	
	var left = document.getElementById("left");
	var leftheader = document.getElementById("leftheader");
	var hideleft = document.getElementById("hideleft");
	var menu1 = document.getElementById("menu1");
	var blur = document.getElementById("blur");
	var blur2 = document.getElementById("blur2");
	
	hideleft.onclick=function(){
		left.style.display ="none";
		blur.style="user-select: all";
		blur.style="pointer-events: all";
		
		
	}
	menu1.onclick=function(){
		left.style.display ="flex";
		blur.style="user-select: none";
		blur.style="pointer-events: none";
		
		
		

	}

</script>
<script type="text/javascript">
	
	var leftdiv = document.getElementById("leftdiv");
	var leftdiv1 = document.getElementById("leftdiv1");
	var rightdiv = document.getElementById("rightdiv");
	var dashboardlogout2 = document.getElementById("dashboardlogout2");
	var dashboardlogout1 = document.getElementById("dashboardlogout1");
	var out = document.getElementById("out");
	var no = document.getElementById("no");
	dashboardlogout2.onclick=function(){
		out.style.display="flex";
		leftdiv.style="user-select: none";
		leftdiv.style="pointer-events: none";
		leftdiv.style.filter="blur(5px)";
		leftdiv1.style="user-select: none";
		leftdiv1.style="pointer-events: none";
		leftdiv1.style.filter="blur(5px)";
		
		rightdiv.style="user-select: none";
		rightdiv.style="pointer-events: none";
		rightdiv.style.filter="blur(5px)";

	}
	dashboardlogout1.onclick=function(){
		out.style.display="flex";
		leftdiv.style="user-select: none";
		leftdiv.style="pointer-events: none";
		leftdiv.style.filter="blur(5px)";
		leftdiv1.style="user-select: none";
		leftdiv1.style="pointer-events: none";
		leftdiv1.style.filter="blur(5px)";
		
		rightdiv.style="user-select: none";
		rightdiv.style="pointer-events: none";
		rightdiv.style.filter="blur(5px)";
	}
	no.onclick=function(){
		out.style.display="none";
		leftdiv.style="user-select: all";
		leftdiv.style="pointer-events: all";
		leftdiv.style.filter="blur(0px)";
		leftdiv1.style="user-select: all";
		leftdiv1.style="pointer-events: all";
		leftdiv1.style.filter="blur(0px)";
		rightdiv.style.filter="blur(0px)";
		rightdiv.style.filter="blur(0px)";
		rightdiv.style="user-select: all";
		rightdiv.style="pointer-events: all";
	}

</script>
<script>
		var viewprofile = document.getElementById("viewprofile");
		var displaysavings = document.getElementById("displaysavings");
		var displayloan = document.getElementById("displayloan");
		var loanprofileloan = document.getElementById("loanprofileloan");
		var savingsprofile = document.getElementById("savingsprofile");
		var profile = document.getElementById("profile");
	
		displaysavings.onclick=function(){
			savingsprofile.style.display="flex";
			profile.style.display="none";
			loanprofileloan.style.display="none";
			displaysavings.style="background-color: #239cdf;";
			displayloan.style="background-color: #a3a3a3;";
			viewprofile.style="background-color: #a3a3a3;";
		}
		displayloan.onclick=function(){
			savingsprofile.style.display="none";
			profile.style.display="none";
			loanprofileloan.style.display="flex";
			displaysavings.style="background-color: a3a3a3;";
			displayloan.style="background-color: #239cdf;";
			viewprofile.style="background-color: #a3a3a3;";

		}
		viewprofile.onclick=function(){
			savingsprofile.style.display="none";
			profile.style.display="flex";
			loanprofileloan.style.display="none";
			displaysavings.style="background-color: #a3a3a3;";
			displayloan.style="background-color: #a3a3a3;";
			viewprofile.style="background-color: #239cdf;";

		}

</script>
<script src="script.js"></script>

</html>
<style type="text/css">

html,body{
	color: #565353;
	height: 100%;
	width: 100%;
	display: flex;
	flex-direction: column;
	background-color: white;
}
.content{
	width: 60%;
	height: auto;
	display: flex;
	flex-direction: column;
	/*border: 1px solid lightgray;*/
	margin: auto;
	margin-bottom: 0;
	margin-top: 10px;
	text-align: justify;
	word-spacing: 2.0px;
}
.content h1{
	font-weight: bold;
	font-size: 15px;
	margin: auto;
	margin-left: 0;
}

.content p{
	margin: auto;
	margin-left: 0;
	margin-top: 5px;
	font-size: 14px;
}
#content{
	margin: auto;
	display: flex;
	width: 50%;
	height: 400px;
	/*border: 1px solid lightgray;*/
	background: url(asset/images/1651192994652.PNG);
	background-size: 80%;
	/*background-size: normal;*/
	background-repeat: no-repeat;
	background-color: white;
	/*background-attachment: fixed;*/
	background-position: center;
	margin-top: 0px;
}
.rightdiv{
	margin: auto;
	height: auto;
	width: 80%;
	/*background-color: white;*/
	box-shadow: -1px 1px 5px lightgrey, 1px 1px 5px lightgrey;
	border-radius: 10px;
	margin-bottom: 10px;
	gap: 10px;
	margin-top: 0;
}
.rightdiv .profile, .rightdiv .savingsprofile, .rightdiv .loanprofileloan{
	box-shadow:  none;
	/*border: 1px solid lightgray;*/
}
.search-add img{
	margin: auto;
	margin-right: 10px;
	cursor: pointer;
}
.myheader{
	width: 100%;
	height: 70px;
	min-height: 70px;
	background-color: white;
	position: sticky;
	top: 0;
	/*border-bottom: 1px solid lightgray;*/
	display: flex;

}
.myheader img{
	margin: auto;
	margin-left: 10%;
}
.myheader .button{
	display: flex;
	height: 100%;
	width: auto;
	/*border: 1px solid black;*/
	gap: 10px;
	margin-right: 10%;
}
.myheader .button a{
	margin: auto;
	
	text-decoration: none;
	display: flex;
	border-radius: 2px;

}
.myheader .button a label{
	font-size: 14px;
	margin: auto;
	cursor: pointer;
	padding: 5px;
	font-weight: bold;

}
.searchid{
	width: 100%;
	height: 70px;
	display: flex;
	margin: auto;
	margin-top: 20px;
	margin-bottom: 10px;
	/*background-color: blue;*/
	
}
.searchid form{
	display: flex;
	height: 100%;
	width: 100%;
}
.searchid input, .searchid button{
	margin: auto;
}
.searchid input:focus{
	outline: none;
	border: 2px solid #79d2f6;
	border-radius: 2px;
}
.searchid input{
	margin-right: 5px;
	height: 40px;
	width: 250px;
	padding-left: 10px;
	border-radius: 2px;
	border: 1px solid lightgray;

}
.searchid button{
	margin-left: 0;
	border: none;
	color: white;
	cursor: pointer;
	height: 36px;
	border-radius: 2px;

}

.table{
	width: 98%;
	border: 1px solid lightgray;
	margin-top: 5px;

}
.list a .tablename label{
		cursor: default;
	}
#displayloan, #displaysavings{
	background-color: #a3a3a3;
	margin-left: 10px;
	margin-right: 0;
}
#viewprofile{
	background-color: #239cdf;
	margin-right: 0;
}
#displayloan, #displaysavings, #viewprofile{
	width: 80px;
	display: flex;
	
}
#displayloan label, #displaysavings label, #viewprofile label{
	margin: auto;

}
#refresh-add{
	/*border: 1px solid red;*/
	display: flex;

}
#profile{
	margin-top: 10px;
}
.usersavingstransaction, .loanprofileloan{
	height: auto;

}
.savingstransaction, .loanrecord , .loanhistory {
	height: auto;
	max-height: 400px;
	margin-bottom: 10px;
}.myheader #menu1 ,.left{
	display: none;
}

@media screen and (max-width: 720px){
	.myheader .button {
		display: none;
	}
	.myheader img{
		margin: auto;
}
.myheader #menu1{
	 display: flex;
	 margin-left: 20px;
	 cursor: pointer;
}
.left{
	position: fixed;
	display: none;
	flex-direction: column;
	width: 70%;
	height: 100%;

	background-color: #0b2e4a;
	border-right: 1px solid lightgray;
	z-index: 10;
}
.left .leftheader{
	width: 100%;
	display: flex;
	height: 50px;
	
}
.left .leftheader #hideleft{
	margin: auto;
	margin-right: 10px;
	filter: invert(100%) hue-rotate(190deg);
	cursor: pointer;
}
.left .btn{
	width: 100%;
	height: auto;
	/*border: 1px solid lightgray;*/
	display: flex;
	flex-direction: column;
	gap: 5px;
	margin-top: 40px;
}
.left .btn a{
	width: 100%;
	display: flex;
	height: 40px;
	/*border: 1px solid black;*/
	text-decoration: none;
	cursor: pointer;
}
.left .btn a:hover{
	background-color: #3e90be;
}

.left .btn a img{
	margin: auto;
	margin-left: 30px;
	margin-right: 0;
	cursor: pointer;
	filter: invert(100%) hue-rotate(190deg);
}
.left .btn a label{
	text-decoration: none;
	margin: auto;
	margin-left: 15px;
	cursor: pointer;
	color: white;
	font-weight: normal;

}
#content{
	margin: auto;
	display: flex;
	width: 90%;
	height: 400px;
	/*border: 1px solid lightgray;*/
	background: url(asset/images/1651192994652.PNG);
	background-size: 100%;
	/*background-size: normal;*/
	background-repeat: no-repeat;
	/*background-color: #b1d7fd;*/
	/*background-attachment: fixed;*/
	background-position: center;
	margin-top: 0px;
}
.content{
	width: 80%;
}

.myheader img{
	margin: auto;
	margin-right: 10px;
}
.rightdiv{
	width: 96%;
}
.addform{
	height: 85%;
	overflow: hidden;
}
.addform form{
	overflow-y: scroll;
}
.addform form .forminput{
	flex-direction: column;
	

}.addform form .forminput .input input, .addform form .forminput .input select{
	width: 100%;
}.usersavingstransaction .table{
	width: 98%;
	border: 1px solid lightgray;
	margin: auto;
	margin-top: 5px;
	margin-bottom: 5px;
}
}
</style>
