<?php 
require('./session.php');
include 'config.php';
include 'search_loantype.php';
require('./position_restriction.php');
error_reporting(0);

if($_SESSION['position'] == 'Finance Manager'){
	echo "<script>window.location.href = './savings.php'</script>";
}else{

}

if (isset($_POST["save"])){

	
			
	
		$months = mysqli_real_escape_string($conn, $_POST["months"]);
		$interest = mysqli_real_escape_string($conn, $_POST["interest"]);
		$amount = mysqli_real_escape_string($conn, $_POST["amount"]);
		$monthlypayment = mysqli_real_escape_string($conn, $_POST["monthlypayment"]);
		$totalpayment = mysqli_real_escape_string($conn, $_POST["totalpayment"]);
		$planid = mysqli_real_escape_string($conn, $_POST["planid"]);
		$loantype = mysqli_real_escape_string($conn, $_POST["loantype"]);
		$check_loanplans = mysqli_num_rows(mysqli_query($conn, "SELECT loanplans FROM loanplans WHERE loanplans ='$loanplans'"));

		if ($check_loanplans > 0) {
				echo "<script>alert('Loan Plans already exist');</script>";
		} else{
			$sql = "INSERT INTO loanplans (months, interest, amount, monthlypayment, totalpayment, planid, loantype) VALUES ('$months', '$interest', '$amount', '$monthlypayment', '$totalpayment', '$planid', '$loantype')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Add successfully');</script>";
				echo "<script>window.location.href = './loan_plans.php'</script>";
			}else{
				echo "<script>alert('Failed');</script>";
			}
		} 
	}



		$host =  "localhost";
        $username ="root";
        $password ="";
        $db = "microfinance";

        $conn =  new mysqli($host, $username, $password, $db);

        if($conn->connect_error){
            echo $conn->connect_error;

        }
        include_once("connection.php");
        $conn = connection();
    
        $id = $_GET['loanplansid'];
        
        $sql = "SELECT * FROM loanplans order by loanplansid desc";
        $result = $conn->query($sql) or die ($conn->error);
        $row = $result->fetch_assoc();

         if(isset($_GET['loanplansid'])){
			$id = $_GET['loanplansid'];
			
			$sql = "DELETE FROM loanplans WHERE loanplansid = '$id'";
			$update = mysqli_query($conn, $sql);

			if ($update) {
			
			header("location:./loan_plans.php");
		}else{
			echo "<script>alert('Failed');</script>";
		}
	}








 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Microfinance</title>
	<meta name="viewport" content="window=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
	
	<link rel="icon" href="asset/image/logo1.jpeg" type="image/jpg" size="16x16"/>
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
			<a href="Loan_types.php" style="background-color: #239cdf;">
					<img id="menuimg" src="asset/icons/4779371.PNG" width="25" height="25">
					<label>Loan Plans</label>
			</a>
			<a href="Loan_types.php">
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
			<a href="loan_types.php" style="background-color: #239cdf;">
					<img id="menuimg" src="asset/icons/4779371.PNG" width="25" height="25">
					<label>Loan Plans</label>
			</a>
			<a href="loan_types.php" >
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
			</div>
		</div>
		<div class="header1">
			<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27">
			<label>Loan Plans</label>
		</div>
		<div class="tablebody">
		<div class="search-add">
			
			<button id="add">Add Loan Plans</button>
			<?php 
						$host =  "localhost";
				        $username ="root";
				        $password ="";
				        $db = "microfinance1";

				        $conn =  new mysqli($host, $username, $password, $db);

				        if($conn->connect_error){
				            echo $conn->connect_error;

				        }
				        	 
							$members = "SELECT * FROM loanplans";
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
				<div class="tablename" id="tablename" style="width: 70%;" >
					<label>Plans</label >
				</div>
				<div class="tablename" id="tablename" style="width: 30%;" >
					<label>Action</label >
				</div>
				

			</div>
			 <?php do{ ?>
			<div class="list">
				
					<div class="tablename" id="tablename" style="width: 70%;">
						<div class="tablelist">
							<label id="label1">Loan Type :</label ><label id="label2"><?php echo $row['loantype']; ?></label>
						</div>
						<div class="tablelist">
							<label id="label1">Months :</label ><label id="label2" style="text-transform: none;"><?php echo $row['months']; ?> month/s</label>
						</div>
						<div class="tablelist">
							<label id="label1">Interest :</label ><label id="label2"><?php echo $row['interest'];?> %</label>
						</div>
						<div class="tablelist">
							<label id="label1">Amount :</label ><label id="label2">₱ <?php echo $row['amount']; ?></label>
						</div>
						<div class="tablelist">
							<label id="label1">Monthly Payment :</label ><label id="label2">₱ <?php echo $row['monthlypayment']; ?></label>
						</div>
						<div class="tablelist">
							<label id="label1">Total Payable Amount :</label ><label id="label2">₱ <?php echo $row['totalpayment']; ?></label>
						</div>
					</div>
					<div class="tablename" id="tablename" style="width: 30%; margin: auto; border-right: none;">
						<form>
           					<!-- <a  href="#?id=<?php echo $row['id'];?>" name="edit"><img src="asset/icons/icons8-edit-24.PNG" width="25" height="25"></a> -->
           					<a  href=" ?loanplansid=<?php echo $row['loanplansid'];?>" name="delete"><img src="asset/icons/7247454.PNG" width="30" height="25"></a>
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
				<label>Add Loan Plan</label>
				<a href="loan_plans.php" id="x" style="margin: auto; margin-right: 0px;">
					<img id="" src="asset/icons/352270.PNG" width="24" height="24">
				</a>
			</div>
			<form  method="POST" action="" autocomplete="off">
				<div class="forminput" style="flex-direction: column;">
					<div class="input">
					
						<?php
							
						    include_once("connection.php");
						    $conn = connection();

						  	
						    
						    $sql = "SELECT * FROM loantypes order by types asc";
						    $result = $conn->query($sql) or die ($conn->error);
						    $row = $result->fetch_assoc();
						?>
						<label>Loan Types :</label>
						<select type="text" name="loantype" id="loantype" required>
							<option></option>
							 <?php do{ ?>
							<option value="<?php echo $row['types']; ?>"><?php echo $row['types']; ?></option>
							<?php }while ($row = $result->fetch_assoc()) ?>
						</select>
					</div>
					<div class="input">
						<label>Amount :</label>
						<input type="number" name="amount" id="amount" required>
					</div>
					<div class="input">
						<label>Months :</label>
						<input type="number" name="months" id="months" required>
					</div>
					<div class="input">
						<label>Interest(%) :</label>
						<input type="number" name="interest" id="interest" required>
					</div>
					<div class="input">
						<button type="button" id="calculate" name="calculate">Calculate</button>
					</div>
					<div class="input">
						<label>Monthly Payment :</label>
						<input type="text" name="monthlypayment" id="monthlypayment">
					</div>
					<div class="input">
						<label>Total Payable Amount :</label>
						<input type="number" name="totalpayment" id="totalpayment" required>
					</div>
					<div class="input">
						
						<input type="hidden" name="planid" id="ami">
					</div>
				</div>
					
				<div class="savebtn">
					<button type="submit" name="save">Save</button>
					<button type="button" id="close" name="save">Cancel</button>
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
#label11{
	margin: auto;
	margin-right: 20px;
	font-size: 12px;
	font-weight: bold;
	color: gray;
}
.addform form .forminput .input button{
		margin: auto;
		width: 100px;
		height: 30px;
		cursor: pointer;
		border: none;
		border-radius: 3px;
		background-color: #1671b9;
		color: white;
	}
	.addform form .forminput .input button:focus{
		outline: none;
	}

	.addform{
		width: 450px;
	}
	.addform .forminput{
		gap: 10px;
	}
	.addform form .forminput .input input, .addform form .forminput .input label, .addform form .forminput .input textarea, .forminput .input select{
		margin: auto;
		margin-left: 15px;
		margin-bottom: 5px;
	}
	.addform form .forminput .input textarea{
		height: 40px;
		padding-top: 10px;
	}
	.table{
		width: 100%;
		
	}
	.tablebody1{
		overflow-y: hidden;
	}
	.list{
		height: auto;
		display: flex;
		flex-direction: row;

	}
	.list #tablename{
		display: flex;
		height: auto;
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
	@media screen and (max-width: 720px){
		.addform{
		width: 96%;
	}
	.table{
		
	}
	.tablebody1{
		overflow-x: hidden;
	}
	#label11{
		display: none;
	}
	}
</style>