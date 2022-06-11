<?php
	
	session_start();

	if($_SESSION['position'] == 'Finance Manager'){
			echo "<script>window.location.href = './savings.php'</script>";
		}else{
			
		}
		
	if($_SESSION['position'] == 'Loan Officer'){
			echo "<script>window.location.href = './dashboard.php'</script>";
		}else{
			
		}


	require('./session.php');

	include_once("connection.php");
    $conn = connection();

    $id = $_GET['id'];
  	$sql = "SELECT * FROM member WHERE id = '$id'";
  	
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

    $_SESSION["currentdate"] = date('M-d-Y');
     

    

?>



<!DOCTYPE html>
<html>
<head>
	<title>Microfinance</title>
	<link rel="icon" href="asset/icons/logo1.jpeg" type="image/jpg" size="16x16"/>
</head>
<body onload="window.print()">

	<div class="header">
		<img src="asset/images/280756278.JPG" width="150" height="80">
		<label id="address">Francia, Virac Catanduanes</label>
		<label id="date">Date : <?php echo $_SESSION['currentdate'];?></label>
	</div>
	<div class="info2" style="margin-bottom: 10px; margin-top: 0;">
		<label>Personal Information</label>
	</div>
	<div class="info">
		<div class="img">
			<?php 
				include_once("connection.php");
			    $conn = connection();

			    $id = $_GET['id'];
			  	$sql = "SELECT * FROM profile WHERE userid = '$id'";
			  	
			    $result = $conn->query($sql) or die ($conn->error);
			    $row = $result->fetch_assoc();
			    $_SESSION['image'] = $row['image']; 

			?>
			<img src="PROFILE/<?php echo $_SESSION['image'];?>">
		</div>
		<div class="info1">
			<div class="personalinfo">
				<div class="personalinfo1">
					<label>ID :</label>
				</div>
				<div class="personalinfo2">
					<input type="text" name="" value="<?php echo $_SESSION['id'];?>" style="width: 145px;" disabled>
				</div>
				
			</div>
			<div class="personalinfo">
				<div class="personalinfo1">
					<label id="label1"style="margin-left: 15px;">Last Name :</label>
					<label id="label1" style="margin-left: 96px;" >First Name :</label>
					<label id="label1" style="margin-left: 99px;">Middle Name :</label>
				</div>
				<div class="personalinfo2">
					<input type="text" name="" value="<?php echo $_SESSION['lastname'];?>" disabled>
					<input type="text" name="" value="<?php echo $_SESSION['firstname'];?>" disabled>
					<input type="text" name="" value="<?php echo $_SESSION['middlename'];?>" disabled>
				</div>
				
			</div>
			<div class="personalinfo">
				<div class="personalinfo1">
					<label id="label1"style="margin-left: 15px;">Date of Birth :</label>
					<label id="label1" style="margin-left: 90px;">Age :</label>
					<label id="label1" style="margin-left: 135px;">Gender :</label>
				</div>
				<div class="personalinfo2">
					<input type="text" name="" value="<?php echo $_SESSION['dateofbirth'];?>" disabled>
					<input type="text" name="" value="<?php echo $_SESSION['age'];?>" disabled>
					<input type="text" name="" value="<?php echo $_SESSION['gender'];?>" disabled>
				</div>
				
			</div>
			<div class="personalinfo">
				<div class="personalinfo1">
					<label>Address :</label>
				</div>
				<div class="personalinfo2">
					<input type="text" name="" value="<?php echo $_SESSION['barangay'];?>, <?php echo $_SESSION['municipality'];?> <?php echo $_SESSION['province'];?>" style="width: 95.9%;"  disabled>
				</div>
				
			</div>
			<div class="personalinfo">
				<div class="personalinfo1"> 
					<label id="label1">Email :</label>
					
					<label id="label1" style="margin-left: 266px;">Contact Number :</label>
				</div>
				<div class="personalinfo2">
					<input type="text" name="" value="<?php echo $_SESSION['email'];?>" style="width: 300px;" disabled>
					<input type="text" name="" value="<?php echo $_SESSION['contact'];?>" disabled>
					
				</div>
				
			</div>
			
		</div>
	</div>
	<div class="info2">
		<label>Savings</label>
	</div>
	<div class="info3">
		<div class="info33">
			<div class="info333">
				<label>Total Savings</label>
			</div>
			<div class="info3333">
				<label>₱ <?php echo $_SESSION['savings'];?></label>
			</div>
		</div>
	</div>
	<div class="info2" style="margin-top: 0;">
		<label>Loans</label>
	</div>
	<div class="info4">
		<div class="table">
			<?php
				
				 include_once("connection.php");
			        $conn = connection();

					$id = $_GET['id'];
				  	$sql = "SELECT * FROM loanpayment WHERE userid = '$id' order by id asc";
				  	
				    $result = $conn->query($sql) or die ($conn->error);
				    $row = $result->fetch_assoc();

	     
			?>
			<div class="theader">
				<div class="throw">
					<label>Loan ID</label>
				</div>
				<div class="throw">
					<label>Loan Date</label>
				</div>
				
				<div class="throw">
					<label>Month/s</label>
				</div>
				<div class="throw">
					<label>Interest</label>
				</div>
				<div class="throw">
					<label>Amount</label>
				</div>
				<div class="throw">
					<label>Total Payment</label>
				</div>
				<div class="throw">
					<label>Total Balance</label>
				</div>
				<div class="throw" style="border: none;">
					<label>Status</label>
				</div>
			</div>
			 <?php do{ ?>
			<div class="theader">
				<div class="throw">
					<label><?php echo $row['id']; ?></label>
				</div>
				<div class="throw">
					<label><?php echo $row['loandate'];?></label>
				</div>
				
				<div class="throw">
					<label><?php echo $row['months'];?></label>
				</div>
				<div class="throw">
					<label><?php echo $row['interest'];?> %</label>
				</div>
				<div class="throw">
					<label>₱ <?php echo $row['amount'];?></label>
				</div>
				<div class="throw">
					<label>₱ <?php echo $row['totalpayableamount'];?></label>
				</div>
				<div class="throw">
					<label>₱ <?php echo $row['totalbalance'];?></label>
				</div>
				<div class="throw" style="border: none;">
					<label><?php echo $row['status'];?></label>
				</div>
			</div>
			<?php }while ($row = $result->fetch_assoc()) ?>
		</div>

	</div>
	<button id="print" onclick="window.print()">print</button>




</body>
</html>

<style type="text/css">
	*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	color: #565353;
	font-size: 12px;
	font-family: 'Open Sans', sans-serif;
}
html{
	border: 5px dashed back; 
	
	width: 100%;
	scroll-behavior: smooth;
	display: flex;
	
	/*background-color: #f4f4f4;*/
	
	
	
}
body{
	display: flex;
	flex-direction: column;
	width: 700px;
	margin: auto;
	/*border: 1px solid red;*/
	/*background-color: white;*/
}
.header{
	width: 100%;
	height: 100px;
	/*border: 1px solid black;*/
	display: flex;
	position: relative;
	margin-top: 20px;
}
.header #date{
	margin: auto;
	margin-right: 10px;
	font-weight: bold;
	font-size: 12px;
	margin-bottom: 20px;
}
.header #address{
	margin: auto;
	margin-left: 10px;
	position: absolute;
	bottom: 20px;
	font-weight: bold;
	font-size: 12px;
}
.info{
	width: 100%;
	height: auto;
	/*border: 1px solid black;*/
	display: flex;
	gap: 0px;
}
button{
	width: 100px;
	height: 30px;
	border: none;
	border-radius: 2px;
	cursor: pointer;
	

}
.img{
	width: 30%;
	
	height: 100%;
	/*border: 1px solid red;*/
	padding: 0;
	
	display: flex;
	margin: auto;
	margin-right: 0;
}
.img img{
	margin: auto;
	height: 150px;
	width: 170px;
	border-radius: 5%;
	/*border: 1px solid black;*/

}
.info1{
	width: 500px;
	margin: auto;
	height: 100%;
	/*border: 1px solid red;*/
	padding: 0;
	margin-left: 0;
}
.personalinfo{
	width: 100%;
	height: auto;
	/*border-bottom: 1px solid lightgray;*/
	display: flex;
	flex-direction: column;
}
.personalinfo1{
	width: 100%;
	height: 30px;
	/*border: 1px solid red;*/
	display: flex;
}
.personalinfo1 label{
	margin: auto;
	margin-left: 10px;
	margin-right: 0;
	padding: 0;

	
}
.personalinfo2{
	width: 100%;
	height: 40px;
	/*border: 1px solid lightgray;*/
	display: flex;
}
.personalinfo2 input{
	margin: auto;
	 width: 180px;
	 height: 30px;
	 padding-left: 10px;
	 margin-left: 10px;
	 border: 1px solid lightgray;
	 border-radius: 2px;
	 font-size: 11px;
	 margin-right: 10px;
}
.personalinfo2 input:focus{
	outline: none;
}
.info2{
	width: 100%;
	height: 30px;
	/*border: 1px solid lightgray;*/
	margin-top: 40px;
	background-color: #239cdf;
	display: flex;
}
.info2 label{
	margin: auto;
	font-size: 13px;
	font-weight: bold;
	color: white;
}
.info3{
	width: 100%;
	height: 100px;
	/*border: 1px solid lightgray;*/
	display: flex;
}
.info33{
	width: 50%;
	height: 50px;
	border: 1px solid lightgray;
	margin: auto;
	display: flex;
	flex-direction: row;
}
.info333{
	width: 40%;
	height: 100%;
	display: flex;
	background-color: lightgray;
	border-bottom: none;
}
.info3333{
	width: 60%;
	height: 100%;
	display: flex;
}
.info333 label{
	margin: auto;
	font-weight: bold;
	font-size: 12px;
}
.info3333 label{
	margin: auto;
	/*font-weight: bold;*/
	font-size: 12px;
}
.info4{
	margin-bottom: 20px;
}
.info4, .table{
	width: 100%;
	height: auto;
	display: flex;
	flex-direction: column;
	/*border: 1px solid lightgray;*/
	border-bottom: none;
}
.info4, .table .theader{
	width: 100%;
	height: 30px;
	display: flex;
	flex-direction: row;
	border-bottom: 1px solid lightgray;
	/*border-bottom: none;*/
}
.info4, .table .theader .throw{
	width: 100%;
	border-right: 1px solid lightgray;
	border-left: 1px solid lightgray;
	height: 100%;
	display: flex;
	margin: auto;
}
.info4, .table .theader .throw label{
	margin: auto;
	font-size: 11px;
}
button{
	margin: auto;
	height: 30px;
	width: 120px;
	color: white;
	background-color: #1671B7;
	border: none;
	border-radius: 3px;
	cursor: pointer;
	font-weight: bold;
	margin-top: 20px;
	margin-bottom: 30px;
}button:hover{
	background-color: #1d7ec9;
}

@media print{
	#print {
		visibility: hidden;
	}

}




</style>