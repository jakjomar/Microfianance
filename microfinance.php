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

<body id="">
	<div class="left" id="left">
		<div class="leftheader" id="leftheader">
			<img id="hideleft" src="asset/icons/352270.PNG" width="27" height="27">
		</div>
		<div class="btn">
		<a href="./microfinance.php" style="background-color: #239cdf;">
					<img id="menuimg" src="asset/icons/home.PNG" width="27" height="27">
					<label>Home</label>
			</a>
			<a href="./about.php">
					<img id="menuimg" src="asset/icons/4154884.PNG" width="27" height="27">
					<label>About</label>
			</a>
		</div>
	</div>
	<div class="myheader" id="blur">
		<img id="menu1" src="asset/icons/icons8-menu-24.PNG" width="30" height="30">
		<img id="menuimg" src="asset/icons/logo1.JPEG" width="50;" height="40;">
		<div class="button">
			<a href="./microfinance.php" style="border: 1px solid #394d8d; "><label style="color: #394d8d;">HOME</label></a>
			
			<a href="./about.php" ><label>ABOUT</label></a>
		</div>
	</div>
	<!-- <div class="content">
		<p>Microfinance</p>
	</div> -->
	<div id="content" id="blur3">
		
	</div>
	<div class="searchid" id="blur2">
		<form method="GET" action="microfinance_search_result.php" autocomplete="off"> 
		<input type="number" name="id" id="search" value="<?php echo $_GET['id'];?>" required/>
		<button type="submit">Search ID</button>
	</form>
	</div>

	
	
	</div>

		

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
	var blur3 = document.getElementById("blur3");
	hideleft.onclick=function(){
		left.style.display ="none";
		blur.style="user-select: all";
		blur.style="pointer-events: all";
		
		blur2.style="user-select: all";
		blur2.style="pointer-events: all";
		
		blur3.style="user-select: all";
		blur3.style="pointer-events: all";
	}
	menu1.onclick=function(){
		left.style.display ="flex";
		blur.style="user-select: none";
		blur.style="pointer-events: none";
		
		blur2.style="user-select: none";
		blur2.style="pointer-events: none";
		
		blur3.style="user-select: none";
		blur3.style="pointer-events: none";
		

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

html{
	display: flex;
	flex-direction: column;
	
	height: 100%;
	width: 100%;
	background: url(asset/images/bc70de68091fb9fd2dc32724a7f189b1.PNG);
	background-size: 60%;
	
	/*background-size: normal;*/
	background-repeat: no-repeat;
	/*background-color: white;*/
	/*background-attachment: fixed;*/
	background-position: center;

}
body{
	display: flex;
	flex-direction: column;
	background-color: #0d58a585;
	height: 100%;
	width: 100%;
}
.left{
	display: none;
}
.content{
	width: 100%;
	height: 50px;
	display: flex;
	/*border: 1px solid lightgray;*/
	margin: auto;
	margin-bottom: 0;
	margin-top: 10px;
}
.content p{
	margin: auto;
}
#content{
	margin: auto;
	display: flex;
	width: 40%;
	height: 100px;
	/*border: 1px solid black;*/
	background: url(asset/images/microfinance.PNG);
	background-size: 65%;
	/*background-size: normal;*/
	background-repeat: no-repeat;
	/*background-color: white;*/
	/*background-attachment: fixed;*/
	background-position: center;
	margin-top: 10%;
	margin-bottom: 0;

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
	background-color: white;
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
.myheader #menu1{
	 display: none;
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
	margin-top: 0px;
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
	box-shadow: -1px 1px 1px lightgrey, 1px 1px 1px lightgrey;

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
	width: 100px;
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
}

@media screen and (max-width: 720px){
html{
	background-size: 100%;
}
.myheader .button{
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
	height: 100px;
	/*border: 1px solid black;*/
	background: url(asset/images/microfinance.PNG);
	background-size: 65%;
	/*background-size: normal;*/
	background-repeat: no-repeat;
	/*background-color: white;*/
	/*background-attachment: fixed;*/
	background-position: center;
	margin-top: 20%;
	margin-bottom: 0;
}
.myheader img{
	margin: auto;
	padding: 0;
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
