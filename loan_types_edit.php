<?php
require('./session.php');
include 'config.php';
require('./position_restriction.php');
error_reporting(0);

if($_SESSION['position'] == 'Finance Manager'){
	echo "<script>window.location.href = './savings.php'</script>";
}else{

}

if (isset($_POST["save"])){


		$type = $_GET['types'];
		
		$types = mysqli_real_escape_string($conn, $_POST["types"]);
		$description = mysqli_real_escape_string($conn, $_POST["description"]);
		
		
		// $check_types = mysqli_num_rows(mysqli_query($conn, "SELECT types FROM loantypes WHERE types ='$types'"));

		// if ($check_types > 0) {
		// 		echo "<script>alert('Loan Type already exist');</script>";
				
		// } else{

			$sql = "UPDATE loantypes SET types = '$types', description = '$description' WHERE types = '$type'";
			$update = mysqli_query($conn, $sql);
			if($update){
				echo "<script>alert('Update successfully');</script>";
				echo "<script>window.location.href = './loan_types.php'</script>";
			}else{
				echo "<script>alert('Failed');</script>";
			}
		} 
	

	


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

	$type = $_GET['types'];
  	$sql = "SELECT * FROM loantypes WHERE types = '$type'";
  	
    $result = $conn->query($sql) or die ($conn->error);
    $row = $result->fetch_assoc();
    $_SESSION["types"] = $row['types'];
    $_SESSION["description"] = $row['description'];
	  







 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Microfinance</title>
	<meta name="viewport" content="window=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
	
	<link rel="icon" href="asset/icons/logo1.jpeg" type="image/jpg" size="16x16"/>

</head>
<body>
	<!-- formobile -->
	<div class="leftdiv1" id="leftdiv1">
		
			<img id="backbtn" src="asset/icons/icons8-menu-24.PNG" width="30" height="30">
		
		<div class="logo1">
			<img id="menuimg" src="asset/icons/microfinance.PNG" width="65%" height="100%">
		</div>
		<div class="btn1" id="btn1">
			<a href="dashboard.php">
					<img id="menuimg" src="asset/icons/4136060.PNG" width="25" height="25">
					<label>Dashboard</label>
			</a>
			<a href="members.php" style="display :<?php echo $_SESSION['loanofficer'];?>;" >
					<img id="menuimg" src="asset/icons/1989232.PNG" width="25" height="25">
					<label>Members</label>
			</a>
			<a href="loans.php">
					<img id="menuimg" src="asset/icons/2043684.PNG" width="25" height="25">
					<label>Add Loans</label>
			</a>
			<!-- <a href="loan_plans.php">
					<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27">
					<label>Loan Plans</label>
			</a> -->
			<a href="Loan_types.php">
					<img id="menuimg" src="asset/icons/4779371.PNG" width="25" height="25">
					<label>Loan Plans</label>
			</a>
			<a href="Loan_types.php" style="background-color: #239cdf;">
					<img id="menuimg" src="asset/icons/4556485.PNG" width="25" height="25">
					<label>Loan Types</label>
			</a>
			<a href="loan_payment.php">
					<img id="menuimg" src="asset/icons/4836525.PNG" width="25" height="25">
					<label>Loan Payment</label>
			</a>
			<a href="loan_transaction.php">
					<img id="menuimg" src="asset/icons/4836503.PNG" width="25" height="25">
					<label>Loan Transaction</label>
			</a>
			<a href="savings.php" style="display :<?php echo $_SESSION['loanofficer'];?>;">
					<img id="menuimg" src="asset/icons/7634045.PNG" width="25" height="25">
					<label>Savings</label>
			</a>
			<a href="deposit_record.php" style="display :<?php echo $_SESSION['loanofficer'];?>;">
					<img id="menuimg" src="asset/icons/4641433.PNG" width="25" height="25">
					<label>Deposit Record</label>
			</a>
			<a href="withdraw_record.php" style="display :<?php echo $_SESSION['loanofficer'];?>;">
					<img id="menuimg" src="asset/icons/4265284.PNG" width="25" height="25">
					<label>Withdraws Record</label>
			</a>
			<a href="administrator.php" style="display :<?php echo $_SESSION['loanofficer'];?>;">
					<img id="menuimg" src="asset/icons/4641420.PNG" width="21" height="21">
					<label>Administrator</label>
			</a>
			<a id="dashboardlogout1">
					<img id="menuimg" src="asset/icons/2010497.PNG" width="21" height="21">
					<label>Sign-out</label>
			</a>
		</div>
	</div>
	<!-- for desktop -->
	<div class="leftdiv" id="leftdiv">
		<div class="logo">
			<img id="menuimg" src="asset/icons/microfinance.PNG" width="65%" height="100%">
		</div>
		<div class="btn" id="btn">
			<a href="dashboard.php">
					<img id="menuimg" src="asset/icons/4136060.PNG" width="25" height="25">
					<label>Dashboard</label>
			</a>
			<a href="members.php" style="display :<?php echo $_SESSION['loanofficer'];?>;">
					<img id="menuimg" src="asset/icons/1989232.PNG" width="25" height="25">
					<label>Members</label>
			</a>
			<a href="loans.php">
					<img id="menuimg" src="asset/icons/2043684.PNG" width="25" height="25">
					<label>Add Loans</label>
			</a>
			<!-- <a href="loan_plans.php">
					<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27">
					<label>Loan Plans</label>
			</a> -->
			<a href="loan_types.php">
					<img id="menuimg" src="asset/icons/4779371.PNG" width="25" height="25">
					<label>Loan Plans</label>
			</a>
			<a href="loan_types.php" style="background-color: #239cdf;">
					<img id="menuimg" src="asset/icons/4556485.PNG" width="25" height="25">
					<label>Loan Types</label>
			</a>
			<a href="loan_payment.php">
					<img id="menuimg" src="asset/icons/4836525.PNG" width="25" height="25">
					<label>Loan Payment</label>
			</a>
			<a href="loan_transaction.php">
					<img id="menuimg" src="asset/icons/4836503.PNG" width="25" height="25">
					<label>Loan Transaction</label>
			</a>
			<a href="savings.php" style="display :<?php echo $_SESSION['loanofficer'];?>;">
					<img id="menuimg" src="asset/icons/7634045.PNG" width="25" height="25">
					<label>Savings</label>
			</a>
			<a href="deposit_record.php" style="display :<?php echo $_SESSION['loanofficer'];?>;">
					<img id="menuimg" src="asset/icons/4641433.PNG" width="25" height="25">
					<label>Deposit Record</label>
			</a>
			<a href="withdraw_record.php" style="display :<?php echo $_SESSION['loanofficer'];?>;">
					<img id="menuimg" src="asset/icons/4265284.PNG" width="25" height="25">
					<label>Withdraws Record</label>
			</a>
			<a href="administrator.php" style="display :<?php echo $_SESSION['loanofficer'];?>;">
					<img id="menuimg" src="asset/icons/4641420.PNG" width="21" height="21">
					<label>Administrator</label>
			</a>
			<a id="dashboardlogout2">
					<img id="menuimg" src="asset/icons/2010497.PNG" width="21" height="21">
					<label>Sign-out</label>
			</a>
		</div>
	</div>
	<!-- content -->
	<div class="rightdiv" id="rightdiv">

		<div class="header">
			<img id="menu" src="asset/icons/icons8-menu-24.PNG" width="30" height="30">
			<div class="admin">
				<div class="adminimg">
					<img id="imgadmin" src="asset/icons/4641420.PNG" width="30" height="30">
				</div>
				<div class="myadminlabel">
				<div class="myadmin">
					<!-- <label id="adminlabel">Welcome! </label> -->
					<label id="adminname">
						<?php echo $_SESSION["lname"];?> <?php echo $_SESSION["fname"];?>
						<?php echo $_SESSION["mname"];?>
					</label>	
				</div>
				<div class="myadmin">
					<label id="adminlabel1"><?php echo $_SESSION["position"];?> </label>
						
				</div>
				</div>
			</div>s
		</div>
		<div class="header1">
			<!-- <img id="menuimg" src="asset/icons/4556485.PNG" width="27" height="27"> -->
			<label>Loan Types</label>
		</div>
		<div class="tablebody">
		<div class="search-add">
			
			<button id="add">Add Loan Types</button>
			<?php 
						$host =  "localhost";
				        $username ="root";
				        $password ="";
				        $db = "microfinance1";

				        $conn =  new mysqli($host, $username, $password, $db);

				        if($conn->connect_error){
				            echo $conn->connect_error;

				        }
				        	$type = $_GET['types'];
							$members = "SELECT * FROM loantypes WHERE types = '$type'";
							$members_run = mysqli_query($conn, $members);

							if($total = mysqli_num_rows($members_run))
							{
								echo '<label id="label11">Result : '.$total.'</label>';
							}else{
								echo '<label id="label11">Result : 0</label>';
							}
						 

					?>
		</div>
		<div class="tablebody1" id="tablebody11">
		<div class="table">
			<div class="tableheader">
				
				<div class="tablename" style="width: 70%;">
					<label>Loan Types</label>
				</div>
				
			
				<div class="tablename" id="tablename" style="width: 30%;" >
					<label>Action</label>
				</div>

			</div>
			 <?php do{ ?>
			<div class="list">
					<div class="tablename" id="tablename" style="width: 70%;">
						<div class="tablelist">
							<label id="label1">Loan Type :</label ><label id="label2"><?php echo $row['types']; ?></label>
						</div>
						<div class="tablelist">
							<label id="label1"> Descriptions :</label ><label id="label2"><?php echo $row['description']; ?></label>
						</div>
					</div>
					<div class="tablename" id="tablename" style="width: 30%;">
						<form>
           					<a href="loan_types_edit.php ?types=<?php echo $row['types'];?>"><img src="asset/icons/7628917.PNG" width="30" height="25"></a>
           					<a  href=" ?id=<?php echo $row['id'];?>" name="delete"><img src="asset/icons/7247454.PNG" width="30" height="25"></a>
           				</form>
					</div>
					
			</div>
			<?php }while ($row = $result->fetch_assoc()) ?>
		</div>
	</div>
		</div>
	</div>
	<!-- Add loan plans -->
		<div class="addform" id="addform">
			<div class="close">
				<label>Add Loan Types</label>
			</div>
			<form  method="POST" action="" autocomplete="off">
				<div class="forminput" style="flex-direction: column;">
					<div class="input">
						<label>Type :</label>
						<textarea type="text" name="types" required></textarea>
					</div>
					<div class="input">
						<label>Description :</label>
						<textarea type="text" name="description" required></textarea>
					</div>
					
					
				</div>
					
				<div class="savebtn">
					<button type="submit" name="save">Save</button>
					<button type="button" id="close" name="save">Cancel</button>
				</div>


			</form>
		</div>
		<!-- edit -->
		<div class="addform" id="editform">
			<div class="close">
				<label>Edit Loan Types</label>
				<a href="loan_types.php" id="x" style="margin: auto; margin-right: 0px;">
					<img id="" src="asset/icons/352270.PNG" width="24" height="24">
				</a>
			</div>
			<form  method="POST" action="" autocomplete="off">
				<script>
					function lettersonly(input){
						var regex = /[^a-zA-Z ]/gi;
						
						input.value = input.value.replace(regex,"");
					}
				</script>
				<div class="forminput" style="flex-direction: column;">
					<div class="input">
						<label>Type :</label>
						<textarea type="text" name="types"  onkeyup="lettersonly(this)" required><?php echo $_SESSION['types']; ?></textarea>
					</div>
					<div class="input">
						<label>Description :</label>
						<textarea type="text" name="description"  onkeyup="lettersonly(this)" required style="height: 100px;"><?php echo $_SESSION['description']; ?></textarea>
					</div>
					
					
				</div>
					
				<div class="savebtn">
					<button type="submit" name="save">Save</button>
					<a href="loan_types.php" id="close" name="save"><label>Cancel</label></a>
				</div>


			</form>
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
<script src="script.js"></script>

</html>
<style type="text/css">
.rightdiv, .leftdiv{
	filter:blur(5px);
	user-select: none;
	pointer-events: none;
}
	#editform{
		display: flex;
		position: absolute;
	}
	.addform{
		width: 30%;
	}
	.addform .forminput{
		gap: 10px;
	}
	.addform form .forminput .input input, .addform form .forminput .input label, .addform form .forminput .input textarea{
		margin: auto;
		margin-left: 15px;
		margin-bottom: 5px;
	}
	.addform form .forminput .input textarea{
		height: 40px;
		padding-top: 10px;
		/*
		*/
	}
	.table{
		width: 100%;
		margin: auto;
	}
	.list{
		height: auto;
		display: flex;
		flex-direction: row;

	}
	.list #tablename{
		display: flex;
		
		flex-direction: column;
	}
	
	
	.rightdiv .list #tablename form a label{
		color: white;
		cursor: pointer;
		margin: auto;
	}
	.list .tablename .tablelist{
		height: 30px;
		width: 100%;
		display: flex;
		margin-top: 5px;
		margin-bottom: 5px;
	}.table .list .tablename .tablelist #label1{
		margin: auto;
		margin-left: 10%;
		
		margin-right: 0px;

	}
	.table .list .tablename .tablelist #label2{
		margin: auto;
		margin-left: 10px;
		
		font-weight: bold;

	}
	.rightdiv .table .list .tablename form{
		display: flex;
		margin: auto;
		height: auto;
		width: auto;
		gap: 30px;

		
	}
	.rightdiv .table .list .tablename form a{
		display: flex;
		margin: auto;

		border: none;
		
		
	}
	.rightdiv .table .list .tablename form a img{
		display: flex;
		margin: auto;
		width: 20px;
		
		
	}
	.addform form .savebtn a{
		text-decoration: none;
		display: flex;
	}
	.addform form .savebtn a label{
		text-decoration: none;
		display: flex;
		margin: auto;
		color: white;
		cursor: pointer;

	}
	#label11{
	margin: auto;
	margin-right: 20px;
	font-size: 12px;
	font-weight: bold;
	color: gray;
}
	@media screen and (max-width: 720px){
		.addform, .table{
		width: 98%;
	}
	#label11{
		display: none;
	}
	}
</style>