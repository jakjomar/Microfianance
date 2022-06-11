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

  

    $id = $_GET['id'];
    $check_id = "SELECT * FROM member WHERE id ='$id'";
    $sqlvalidate = mysqli_query($conn, $check_id);

    if (mysqli_num_rows($sqlvalidate) == 0){
    	echo "<script>alert('User ID does not Exist');</script>";
    	echo "<script>window.location.href = './microfinance.php'</script>";
    }else{

  	$sql = "SELECT * FROM member WHERE id = '$id'";


  	
    $result = $conn->query($sql) or die ($conn->error);
    $row = $result->fetch_assoc();
       
  	
    $result = $conn->query($sql) or die ($conn->error);
    $row = $result->fetch_assoc();
    $_SESSION["lastname"] = $row['lastname'];
    $_SESSION["firstname"] = $row['firstname'];
    $_SESSION["middlename"] = $row['middlename'];
    $_SESSION["barangay"] = $row['barangay'];
    $_SESSION["municipality"] = $row['municipality'];
    $_SESSION["province"] = $row['province'];
    $_SESSION["id"] = $row['id'];
    $_SESSION["gender"] = $row['gender'];
    $_SESSION["contact"] = $row['contact'];
    $_SESSION["email"] = $row['email'];
    $_SESSION["loanstatus"] = $row['loanstatus'];
    $_SESSION["dateofbirth"] = $row['dateofbirth'];
    $_SESSION["age"] = $row['age'];
    $_SESSION["savings"] = $row['savings'];
      
}

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
			<a href="./microfinance.php"><label>HOME</label></a>
			
			<a href="./about.php" ><label>ABOUT</label></a>
		</div>
	</div>
	<div class="searchid"  id="blur2">
		<form autocomplete="off"> 
		<input type="number" name="id" id="search" value="<?php echo $_GET['id'];?>" required/>
		<button>Search</button>
	</form>
	</div>
	<script>
	var search = parseInt(document.getElementById("search").value);
	var rightdiv = document.getElementById("rightdiv");
	var blank = 0;
	if(search == blank){
		rightdiv.style.display ="none";
	}
	else{
		rightdiv.style.display ="flex";
	}

	
		
	
	</script>
	<div class="rightdiv" id="rightdiv">

		
	
		
		<div class="search-add" id="search-add-refreshbtn">

			<div class=""  id="refresh-add">
				<!-- <a id="viewprofile">
					<img id="menuimg" src="asset/icons/1989232.PNG" width="23" height="23">
					<label>Profile<label>
				</a> -->
				<a id="displaysavings" style="background-color: #239cdf;">
					<!-- <img id="menuimg" src="asset/icons/1989232.PNG" width="23" height="23"> -->
					<label>Savings<label>
				</a>
				<a id="displayloan">
					<!-- <img id="menuimg" src="asset/icons/1989232.PNG" width="23" height="23"> -->
					<label>Loans<label>
				</a>
					
			</div>
			<img id="close" src="asset/icons/352270.PNG" width="25" height="25">
			<script type="text/javascript">
				var close = document.getElementById("close");
				close.onclick = function(){
					window.location.href = './microfinance.php';
				}

			</script>
		</div>
		<!-- <div class="profile" id="profile">
			<div class="info" style="margin-top: 10px;">
				<div class="info1">
					<label>Name :</label>
					<input type="text" name="" value="<?php echo $_SESSION['lastname']; ?> <?php echo $_SESSION['firstname']; ?> <?php echo $_SESSION['middlename']; ?>" disabled>
				</div>
				<div class="info1" style="width: ;">
					<label>ID :</label>
					<input type="text" name="" value="<?php echo $_SESSION['id']; ?>" disabled>
				</div>
				<div class="info1" id="info2" style="width: ;">
					<label>Date of Birth :</label>
					<input type="text" name="" value="<?php echo $_SESSION['dateofbirth']; ?>" disabled>
				</div>
				<div class="info1" id="info2" style="width: ;">
					<label>Age :</label>
					<input type="text" name="" value="<?php echo $_SESSION['age']; ?>" disabled>
				</div>
				<div class="info1" id="info2" style="width: ;">
					<label>Gender :</label>
					<input type="text" name="" value="<?php echo $_SESSION['gender']; ?>" disabled>
				</div>
			</div>
			<div class="info">
				
			</div>
			<div class="info">
				<div class="info1" id="info1" style="width: ;">
					<label>Address :</label>
					<input type="text" name="" value="<?php echo $_SESSION['barangay']; ?>, <?php echo $_SESSION['municipality']; ?> <?php echo $_SESSION['province']; ?>" disabled>
				</div>
				<div class="info1" id="info2">
					<label>Contact Number :</label>
					<input type="text" name="" value="<?php echo $_SESSION['contact']; ?>" disabled>
				</div>
				<div class="info1">
					<label>Email :</label>
					<input type="text" name="" value="<?php echo $_SESSION['email']; ?>" disabled>
				</div>
			</div>
			<div class="info" style="margin-bottom: 10px;">
				

			</div>
		</div> -->
		<div class="loanprofile">
			<div class="savingsprofile" id="savingsprofile" style="display: flex">
				<div class="usersavings">
					<div class="usertotalsavings">
						<div class="usertotalsavings1">
						
						<div class="usersavingsamount">
							<label>₱ <?php echo $_SESSION['savings']; ?></label>
						</div>
						<div class="usertotalsavingsheader">
							<label>Total Savings</label>
						</div>
					</div>
						<!-- <div class="usertotalsavings2">
							<img src="asset/icons/7634045.PNG" width="40" height="40">
						</div> -->
					</div>

				</div>
				<div class="usersavingstransaction">
					<div class="loanprofileloanbtn">
						<button type="button" id="btn111">Deposit History</button>
						<button type="button" id="btn222">Withdraw History</button>
					</div>
					<div class="savingstransaction" id="deposithistory">
				<?php
				
					include_once("connection.php");
			        $conn = connection();

					$id = $_GET['id'];
				  	$sql = "SELECT * FROM deposit WHERE userid = '$id' order by id desc";
				  	
				    $result = $conn->query($sql) or die ($conn->error);
				    $row = $result->fetch_assoc();
	     
				?>
			<div class="table" id="table">
			<div class="tableheader" id="tableheader">
				<div class="tablename" id="tablename" style="width:50%;" >
					<label>Deposit ID</label>
				</div>
				<div class="tablename" id="tablename" style="width:50%;" >
					<label>Date</label>
				</div>
				
				<div class="tablename" style="width: 50%;">
					<label>Amount</label>
				</div>
				

			</div>
			 <?php do{ ?>
			<div class="list">
				<a >
					<div class="tablename" id="tablename" style="width: 50%;">
						<label># <?php echo $row['id']; ?></label>
					</div>
					<div class="tablename" id="tablename" style="width: 50%;">
						<label><?php echo $row['depositdate']; ?></label>
					</div>
					
					<div class="tablename" id="" style="width: 50%;">
						<label>₱ <?php echo $row['depositamount']; ?></label>
					</div>
					
				</a>
			</div>
			<?php }while ($row = $result->fetch_assoc()) ?>
		</div>

					</div>
					<div class="savingstransaction" id="withdrawhistory">
						<?php
				
					include_once("connection.php");
			        $conn = connection();

					$id = $_GET['id'];
				  	$sql = "SELECT * FROM withdraw WHERE userid = '$id' order by id desc";
				  	
				    $result = $conn->query($sql) or die ($conn->error);
				    $row = $result->fetch_assoc();
	     
				?>
			<div class="table" id="table">
			<div class="tableheader" id="tableheader">
				<div class="tablename" id="tablename" style="width:50%;" >
					<label>Withdraw ID</label>
				</div>
				<div class="tablename" id="tablename" style="width:50%;" >
					<label>Date</label>
				</div>
				
				<div class="tablename" style="width: 50%;">
					<label>Amount</label>
				</div>
				

			</div>
			 <?php do{ ?>
			<div class="list">
				<a>
					<div class="tablename" id="tablename" style="width: 50%;">
						<label># <?php echo $row['id']; ?></label>
					</div>
					<div class="tablename" id="tablename" style="width: 50%;">
						<label><?php echo $row['withdrawdate']; ?></label>
					</div>
					
					<div class="tablename" id="" style="width: 50%;">
						<label>₱ <?php echo $row['withdrawamount']; ?></label>
					</div>
					
				</a>
			</div>
			<?php }while ($row = $result->fetch_assoc()) ?>
		</div>
					</div>
					<script type="">
						var btn111 = document.getElementById("btn111");
						var btn222 = document.getElementById("btn222");
						var deposithistory = document.getElementById("deposithistory");
						var withdrawhistory = document.getElementById("withdrawhistory");
						


						btn222.onclick = function(){
							btn222.style="background-color: #239cdf;";
							btn111.style="background-color: #a3a3a3;";
							withdrawhistory.style.display="block";
							deposithistory.style.display="none";
						}
						btn111.onclick = function(){
							btn222.style="background-color: #a3a3a3;";
							btn111.style="background-color: #239cdf;";
							withdrawhistory.style.display="none";
							deposithistory.style.display="block";

						}
					</script>
				</div>
				
			</div>
			<div class="loanprofileloan" id="loanprofileloan">

				<div class="loanprofileloanbtn">
					<button type="button" id="btn11">Loans</button>
					<button type="button" id="btn22">Loan Transactions</button>
				</div>
			<div class="loanrecord" id="loanrecord">
			<?php
				
				 	include_once("connection.php");
			        $conn = connection();

					$id = $_GET['id'];
				  	$sql = "SELECT * FROM loanpayment WHERE userid = '$id'";
				  	
				    $result = $conn->query($sql) or die ($conn->error);
				    $row = $result->fetch_assoc();
	     
			?>
		<div class="table" id="table">
			<div class="tableheader" id="tableheader">
				<div class="tablename" id="tablename" style="width:15%;" >
					<label>Loan ID</label>
				</div>
				<div class="tablename" id="tablename" style="width:25%;" >
					<label>Date</label>
				</div>
				<div class="tablename" style="width: 55%;">
					<label>Loan Plan</label>
				</div>
				<div class="tablename" style="width: 30%;">
					<label>Loan Type</label>
				</div>
				<div class="tablename" id="" style="width: 25%;">
					<label>Total Payment</label>
				</div>
				<div class="tablename" id="" style="width: 20%;">
					<label>Balance</label>
				</div>
				<div class="tablename" id="" style="width: 30%;">
					<label>Monthly Payment</label>
				</div>
				<div class="tablename" id="" style="width: 25%;">
					<label>Status</label>
				</div>

			</div>
			 <?php do{ ?>
			<div class="list">
				<a>
					<div class="tablename" id="tablename" style="width: 15%;">
						<label># <?php echo $row['id']; ?></label>
					</div>
					<div class="tablename" id="tablename" style="width: 25%;">
						<label><?php echo $row['loandate']; ?></label>
					</div>
					<div class="tablename" style="width: 55%;">
						<label><?php echo $row['months']; ?> Months, <?php echo $row['interest']; ?>% Interest, ₱ <?php echo $row['amount']; ?></label>

					</div>
					<div class="tablename" id="" style="width: 30%;">
						<label><?php echo $row['loantype']; ?></label>
					</div>
					<div class="tablename" id="" style="width: 25%;">
						<label>₱ <?php echo $row['totalpayableamount']; ?></label>
					</div>
					<div class="tablename" id="" style="width: 20%;">
						<label>₱ <?php echo $row['totalbalance']; ?></label>
					</div>
					<div class="tablename" id="" style="width: 30%;">
						<label>₱ <?php echo $row['monthlypayment']; ?></label>
					</div>
					<div class="tablename" id="" style="width: 25%;">
						<label><?php echo $row['status']; ?></label>
					</div>
				</a>
			</div>
			<?php }while ($row = $result->fetch_assoc()) ?>
		</div>
	</div>
				
	<div class="loanhistory" id="loanhistory">
	<?php
	
	 include_once("connection.php");
        $conn = connection();

		$id = $_GET['id'];
	  	$sql = "SELECT * FROM loanuserpayment WHERE userid = '$id'";
	  	
	    $result = $conn->query($sql) or die ($conn->error);
	    $row = $result->fetch_assoc();	   
	  	     
	?>
			<div class="table" id="table">
			<div class="tableheader" id="tableheader">
				<div class="tablename" id="" style="width: 40%;" >
					<label>Transaction ID</label>
				</div>
				<div class="tablename" id="tablename" style="width: 40%;" >
					<label>Date</label>
				</div>
				<div class="tablename">
					<label>Loan Plan</label>
				</div>
				<div class="tablename" id="" style="width: 40%;">
					<label>Total Payment</label>
				</div>
				<div class="tablename" id="" style="width: 40%;">
					<label>Balance</label>
				</div>
				<div class="tablename" id="" style="width: 50%;">
					<label>Payment</label>
				</div>
				<div class="tablename" id="" style="width: 50%;">
					<label>Status</label>
				</div>

			</div>
			 <?php do{ ?>
			<div class="list">
				<a>
					<div class="tablename" id="" style="width: 40%;">
						<label># <?php echo $row['id']; ?></label>
					</div>
					<div class="tablename" id="tablename" style="width: 40%;">
						<label><?php echo $row['loandate']; ?></label>
					</div>
					<div class="tablename">
						<label><?php echo $row['months']; ?> Months, <?php echo $row['interest']; ?>% Interest, ₱ <?php echo $row['amount']; ?></label>

					</div>
					<div class="tablename" id="" style="width: 40%;">
						<label>₱ <?php echo $row['totalpayableamount']; ?></label>
					</div>
					<div class="tablename" id="" style="width: 40%;">
						<label>₱ <?php echo $row['totalbalance']; ?></label>
					</div>
					<div class="tablename" id="" style="width: 50%;">
						<label>₱ <?php echo $row['payment']; ?></label>
					</div>
					<div class="tablename" id="" style="width: 50%;">
						<label><?php echo $row['status']; ?></label>
					</div>
					
				</a>
			</div>
			<?php }while ($row = $result->fetch_assoc()) ?>
		</div>
	</div>
	</div>
<script type="">
	var btn11 = document.getElementById("btn11");
	var btn22 = document.getElementById("btn22");
	var loanrecord = document.getElementById("loanrecord");
	var loanhistory = document.getElementById("loanhistory");
	


	btn22.onclick = function(){
		btn22.style="background-color: #239cdf;";
		btn11.style="background-color: #a3a3a3;";
		loanhistory.style.display="block";
		loanrecord.style.display="none";
	}
	btn11.onclick = function(){
		btn22.style="background-color: #a3a3a3;";
		btn11.style="background-color: #239cdf;";
		loanhistory.style.display="none";
		loanrecord.style.display="block";

	}
</script>
			</div>
			
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
	var rightdiv = document.getElementById("rightdiv");
	hideleft.onclick=function(){
		left.style.display ="none";
		blur.style="user-select: all";
		blur.style="pointer-events: all";
		
		blur2.style="user-select: all";
		blur2.style="pointer-events: all";
		
		rightdiv.style="user-select: all";
		rightdiv.style="pointer-events: all";
	}
	menu1.onclick=function(){
		left.style.display ="flex";
		blur.style="user-select: none";
		blur.style="pointer-events: none";
		
		blur2.style="user-select: none";
		blur2.style="pointer-events: none";
		
		rightdiv.style="user-select: none";
		rightdiv.style="pointer-events: none";
		

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
		// var viewprofile = document.getElementById("viewprofile");
		var displaysavings = document.getElementById("displaysavings");
		var displayloan = document.getElementById("displayloan");
		var loanprofileloan = document.getElementById("loanprofileloan");
		var savingsprofile = document.getElementById("savingsprofile");
		// var profile = document.getElementById("profile");
	
		displaysavings.onclick=function(){
			savingsprofile.style.display="flex";
			// profile.style.display="none";
			loanprofileloan.style.display="none";
			displaysavings.style="background-color: #239cdf;";
			displayloan.style="background-color: #a3a3a3;";
			// viewprofile.style="background-color: #a3a3a3;";
		}
		displayloan.onclick=function(){
			displaysavings.style="background-color: a3a3a3;";
			savingsprofile.style.display="none";

			// profile.style.display="none";
			loanprofileloan.style.display="flex";
			
			displayloan.style="background-color: #239cdf;";
			// viewprofile.style="background-color: #a3a3a3;";

		}
		// viewprofile.onclick=function(){
		// 	savingsprofile.style.display="none";
		// 	profile.style.display="flex";
		// 	loanprofileloan.style.display="none";
		// 	displaysavings.style="background-color: #a3a3a3;";
		// 	displayloan.style="background-color: #a3a3a3;";
		// 	viewprofile.style="background-color: #239cdf;";

		// }

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
	background-color: #0d58a585;
	/*background-size: normal;*/
	background-repeat: no-repeat;
	/*background-color: white;*/
	/*background-attachment: fixed;*/
	background-position: center;

}
body{
	display: flex;
	flex-direction: column;
	
	height: auto;
	
	width: 100%;
}
.left{
	display: none;
}
.rightdiv{
	margin: auto;
	height: auto;
	width: 80%;
	background-color: white;
	box-shadow: -1px 1px 5px lightgrey, 1px 1px 5px lightgrey;
	border-radius: 10px;
	margin-bottom: 20px;
	margin-top: 10px;
	z-index: 1;
}
.rightdiv .profile, .rightdiv .savingsprofile, .rightdiv .loanprofileloan{
	box-shadow:  none;
	/*border: 1px solid lightgray;*/
}

.search-add img{
	margin: auto;

	margin-right: 10px;

	cursor: pointer;
	padding: 0;
}
.myheader{
	width: 100%;
	height: 70px;
	position: sticky;
	top: 0;
	z-index: 10;
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
.myheader .button a{
	margin: auto;
	
	text-decoration: none;


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
	/*background-color: blue;*/
	z-index: 1;
}
.searchid form{
	display: flex;
	height: 100%;
	width: 100%;
	background-color: transparent;
}
.searchid input, .searchid button{
	margin: auto;
}
.searchid input:focus{
	outline: none;
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
/*#displaysavings{
	background-color: #239cdf;
	margin-right: 0;
}*/
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
	margin-left: 0;
	margin: auto;
	margin-left: 10px;
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
}.myheader #menu1{
	display: none;
}

@media screen and (max-width: 720px){
html{
	display: flex;
	flex-direction: column;
	
	height: 100%;
	width: 100%;
	
	background-size: 90%;
	background-color: white;

}
.myheader .button{
		display: none;
}
	.myheader img{
		margin-right: 10px;
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
	z-index: 2000;
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
}
.rightdiv{
	width: 96%;
}#search-add-refreshbtn{
	display: flex;
	flex-direction: row;
	height: 50px;
	min-height: 50px;
	/*border: 1px solid red;*/
}
.myheader img{
	margin: auto;
	margin-right: 10px;
	
}
.search-add img{
	margin: auto;

	margin-right: 10px;

	cursor: pointer;
	padding: 0;
}
.addform{
	height: 85%;
	overflow: hidden;
}
.addform form{
	overflow-y: scroll;
	background-color: transparent;
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
