
<?php
	error_reporting(0);

	if($_SESSION['position'] == 'Loan Officer'){
			echo "<script>window.location.href = './dashboard.php'</script>";
		}else{
			
		}

	 include_once("connection.php");
        $conn = connection();
    
        // $id = $_GET['loanplansid'];
        $id = $_GET['id'];
        $sql = "SELECT * FROM withdraw where id = $id order by id desc";
        $result = $conn->query($sql) or die ($conn->error);
        $row = $result->fetch_assoc();

       	$_SESSION["currentdate"] = date('M-d-Y');



?>



<!DOCTYPE html>
<html>
<head>
	<title>Microfinance</title>
	<meta name="viewport" content="window=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="asset/css/">
	
	<link rel="icon" href="asset/icons/logo1.jpeg" type="image/jpg" size="16x16"/>
</head>
<body onload="window.print()">
	<div class="header">
		<img id="menuimg" src="asset/icons/280756278.JPG" width="140" height="70">
	</div>
	<div class="receiptname">
		<label>Payment Receipt</label>
	</div>
		<div class="content">
		<div class="personalinfo" style="border-bottom: 0px;">
		<div class="personalinfo" style="width: 100%; border: 0px;">
			<div class="userinfo">
				<div class="details"  style="width: 100%;">
					<label id="label3">Date :</label><label id="label2"><?php echo $_SESSION["currentdate"] ?></label>
				</div>
				
			</div>
			<div class="userinfo">
				<div class="details"  style="width: 100%;">
					<label id="label3">Transaction ID :</label><label id="label2"><?php echo $row['id']; ?></label>
				</div>
			</div>
		</div>
			<div class="contentheader">
				<label >Personal Information</label>
			</div>
			<div class="userinfo">
				<div class="details">
					<label id="label1">Id :</label><label id="label2"><?php echo $row['userid']; ?></label>
				</div>
			</div>
			<div class="userinfo">
				<div class="details">
					<label id="label1">Name :</label><label id="label2"><?php echo $row['lastname']; ?>, <?php echo $row['firstname']; ?> <?php echo $row['middlename']; ?></label>
				</div>
			
			</div>
			<div class="userinfo">
				<div class="details">
					<label id="label1">Gender :</label><label id="label2"><?php echo $row['gender']; ?></label>
				</div>
				
			</div>
			<div class="userinfo">
				<div class="details">
					<label id="label1">Date of Birth :</label><label id="label2"><?php echo $row['dateofbirth']; ?></label>
				</div>
			</div>
			<div class="userinfo">
				<div class="details">
					<label id="label1">Age :</label><label id="label2"><?php echo $row['age']; ?></label>
				</div>
			</div>
			<div class="userinfo">
				<div class="details" style="width: 100%;">
					<label id="label3">Address :</label><label id="label2"><?php echo $row['barangay']; ?>, <?php echo $row['municipality']; ?> <?php echo $row['province']; ?></label>
				</div>
				
			</div>
			<div class="userinfo">
				<div class="details">
					<label id="label1">Contact & Email :</label><label id="label2"><?php echo $row['contact']; ?>	|	<?php echo $row['email']; ?></label>
				</div>

			</div>
		</div>
		<div class="personalinfo" style="border-top: 0px;">
			<div class="contentheader">
				<label >Deposit Details</label>
			</div>
			<div class="userinfo">
				<div class="details"  style="width: 100%;">
					<label id="label3">Date :</label><label id="label2"><?php echo $row['withdrawdate']; ?></label>
				</div>
				
			</div>
			
			<div class="userinfo" style="border-bottom: 0px;">
				<div class="details"  style="width: 100%;">
					<label id="label3">Amount :</label><label id="label2">₱ <?php echo $row['withdrawamount']; ?></label>
				</div>
				
			</div>
			
		</div>
	</div>
			<div class="printbtn">
				<button id="print" onclick="window.print()">Print</button>
			</div>
</body>
<script>
	// var print = document.getElementById("print");
	
	// print.onclick = function(){
	// 	print.style.visibility="hidden";
	// }
</script>
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
	width: 100%;
	/*background-color: white;*/
}
.printME{
	visibility: hidden;
}
.content{
	display: flex;
	flex-direction: column;
	width: 100%;
	height: auto;
	/*border: 1px solid red;*/
}
.header{
	width: 100%;
	height: auto;
	display: flex;
/*	border: 1px solid black;*/

}
.header img{
	margin: auto;
}
.receiptname{
	width: 100%;
	height: 30px;
	/*border: 1px solid black;*/
	display: flex;
	margin-bottom: 10px;
}
.receiptname label{
	margin: auto;
	font-weight: bold;
	font-size: 14px;
}
.personalinfo{
	width: 60%;
	height: auto;
	border: 1px solid lightgray;
	margin: auto;
	
}
.personalinfo .contentheader{
	height: 30px;
	display: flex;
	width: 100%;
	border-bottom: 1px solid lightgray;
	border: none;
	background-color: #239cdf;
}
.personalinfo .contentheader label{
	margin: auto;
	font-weight: bold;
	font-size: 13px;
	margin-left:  5%;
	color: white;
}
.personalinfo .userinfo{
	width: 100%;
	height: 25px;
	border-bottom: 1px solid lightgray;
	display: flex;
}.personalinfo .userinfo .details{
	width: 100%;
	height: 100%;
	/*border: 1px solid gray;*/
	display: flex;
}.personalinfo .userinfo .details #label1{
	margin: auto;
	margin-left: 5%;
	margin-right: 0;
	font-weight: bold;
}.personalinfo .userinfo .details #label2{
	margin: auto;
	/*margin-left: 10px;*/
	margin-right: 5%;
	font-weight: bold;
}.personalinfo .userinfo .details #label3{
	margin: auto;
	font-weight: bold;
	margin-left: 5%;


}
.printbtn{
	width: 100%;
	height: 50px;
	/*border: 1px solid black;*/
	display: flex;
}
.printbtn button{
	margin: auto;
	height: 30px;
	width: 120px;
	color: white;
	background-color: #1671B7;
	border: none;
	border-radius: 3px;
	cursor: pointer;
	font-weight: bold;
}.printbtn button:hover{
	background-color: #1d7ec9;
}
@media print{
	#print {
		visibility: hidden;
	}

}
@media screen and (max-width: 720px){
.personalinfo .userinfo .details #label1{
	margin-left: 5%;
}
.personalinfo .userinfo .details #label3, .personalinfo .contentheader label{
	margin-left: 5%;
}
.content .personalinfo{
	width: 98%;
}


}

</style>