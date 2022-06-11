<?php 

error_reporting(0);
require('./session.php');
require('./position_restriction.php');


if($_SESSION['position'] == 'Finance Manager'){
	echo "<script>window.location.href = './savings.php'</script>";
}else{

}


 ?>
<!DOCTYPE html>
<html id="html">
<head>
	<title>Microfinance</title>
	<meta name="viewport" content="window=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
	
	<link rel="icon" href="asset/icons/logo1.jpeg" type="image/jpg" size="16x16"/>

</head>
<body id="body">
	<!-- formobile -->
	<div class="leftdiv1" id="leftdiv1">
		
			<img id="backbtn" src="asset/icons/icons8-menu-24.PNG" width="30" height="30">
		
		<div class="logo1">
			<img id="menuimg" src="asset/icons/microfinance.PNG" width="65%" height="100%">
		</div>
		<div class="btn1" id="btn1">
			<a href="dashboard.php" style="background-color: #239cdf; display: <?php echo $_SESSION['financemanager'];?>;">
					<img id="menuimg" src="asset/icons/4136060.PNG" width="25" height="25">
					<label>Dashboard</label>
			</a>
			<a href="members.php" style="display :<?php echo $_SESSION['financemanager'];?>; display: <?php echo $_SESSION['loanofficer'];?>;">
					<img id="menuimg" src="asset/icons/1989232.PNG" width="25" height="25">
					<label>Members</label>
			</a>
			<a href="loans.php">
					<img id="menuimg" src="asset/icons/2043684.PNG" width="25" height="25">
					<label>Add Loans</label>
			</a>
			<a href="loan_plans.php" style="display :<?php echo $_SESSION['financemanager'];?>;">
					<img id="menuimg" src="asset/icons/4779371.PNG" width="25" height="25">
					<label>Loan Plans</label>
			</a>
			<a href="Loan_types.php" style="display :<?php echo $_SESSION['financemanager'];?>;">
					<img id="menuimg" src="asset/icons/4556485.PNG" width="25" height="25">
					<label>Loan Types</label>
			</a>
			<a href="loan_payment.php" style="display :<?php echo $_SESSION['financemanager'];?>;">
					<img id="menuimg" src="asset/icons/4836525.PNG" width="25" height="25">
					<label>Loan Payment</label>
			</a>
			<a href="loan_transaction.php" style="display :<?php echo $_SESSION['financemanager'];?>;">
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
			<a href="administrator.php" style="display :<?php echo $_SESSION['financemanager'];?>; display :<?php echo $_SESSION['loanofficer'];?>;">
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
			<a href="dashboard.php" style="background-color: #239cdf; display: <?php echo $_SESSION['financemanager'];?>;">
					<img id="menuimg" src="asset/icons/4136060.PNG" width="25" height="25">
					<label>Dashboard</label>
			</a>
			<a href="members.php" style="display :<?php echo $_SESSION['financemanager'];?>; display: <?php echo $_SESSION['loanofficer'];?>;">
					<img id="menuimg" src="asset/icons/1989232.PNG" width="25" height="25">
					<label>Members</label>
			</a>
			<a href="loans.php" style="display :<?php echo $_SESSION['financemanager'];?>;">
					<img id="menuimg" src="asset/icons/2043684.PNG" width="25" height="25">
					<label>Add Loans</label>
			</a>
			<a href="loan_plans.php" style="display :<?php echo $_SESSION['financemanager'];?>;">
					<img id="menuimg" src="asset/icons/4779371.PNG" width="25" height="25">
					<label>Loan Plans</label>
			</a>
			
			<a href="loan_types.php" style="display :<?php echo $_SESSION['financemanager'];?>;">
					<img id="menuimg" src="asset/icons/4556485.PNG" width="25" height="25">
					<label>Loan Types</label>
			</a>
			<a href="loan_payment.php" style="display :<?php echo $_SESSION['financemanager'];?>;">
					<img id="menuimg" src="asset/icons/4836525.PNG" width="25" height="25">
					<label>Loan Payment</label>
			</a>
			<a href="loan_transaction.php" style="display :<?php echo $_SESSION['financemanager'];?>;">
					<img id="menuimg" src="asset/icons/4836503.PNG" width="25" height="25">
					<label>Loan Transaction</label>
			</a>
			<a href="savings.php" style="display :<?php echo $_SESSION['loanofficer'];?>;" >
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
			<a href="administrator.php" style="display :<?php echo $_SESSION['financemanager'];?>; display: <?php echo $_SESSION['loanofficer'];?>;">
					<img id="menuimg" src="asset/icons/4641420.PNG" width="21" height="21">
					<label>Administrator</label>
			</a>
			<a id="dashboardlogout2" >
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
			<!-- <img id="menuimg" src="asset/icons/2043684.PNG" width="27" height="27"> -->
			<label>Dashboard</label>
		</div>
		<!-- <div class="tablebody">
		<div class="search-add" id="search-add-refreshbtn">
			<div class="refresh-add" id="refresh-add">
			<form method="GET" action="loans.php" autocomplete="off">
				<input type="text" name="search" required>
				<button type="submit">Search</button>
			</form>
			</div>
			<div class="" id="refresh-add">
				<a href="loans.php" id="refresh"><img id="menuimg" src="asset/icons/574166.PNG" width="23" height="23"><label>Refresh List</label></a>
			</div>
		</div>
	</div> -->


	<!-- dashboard -->
	<div class="dashboard1" id="mydashboard1">
		
		<a id="click1">
			<div class="totaldashboard" id="totaldashboard">
				<div class="totaldashboard1">
					<div class="totaldashboard11">
						<?php 
						$host =  "localhost";
				        $username ="root";
				        $password ="";
				        $db = "microfinance1";

				        $conn =  new mysqli($host, $username, $password, $db);

				        if($conn->connect_error){
				            echo $conn->connect_error;

				        }
							$members = "SELECT * FROM member";
							$members_run = mysqli_query($conn, $members);

							if($total = mysqli_num_rows($members_run))
							{
								echo '<label id="label1">'.$total.'</label>';
							}else{
								echo '<label id="label1">0</label>';
							}


					?>
					</div>
					<div class="totaldashboard111">
						<label id="label11">Members</label>
					</div>
				</div>
				<div class="totaldashboard2">
					<img id="img1" src="asset/icons/1989232.PNG" width="40" height="40">
				</div>
			</div>
		</a>
		<a id="click4">
			<div class="totaldashboard">
				<div class="totaldashboard1">
					<div class="totaldashboard11">
						<?php 
						$host =  "localhost";
				        $username ="root";
				        $password ="";
				        $db = "microfinance1";

				        $conn =  new mysqli($host, $username, $password, $db);

				        if($conn->connect_error){
				            echo $conn->connect_error;

				        }
				        	$date = date('Y-m-d');
							$active_loan = "SELECT * FROM loanpayment where duedate = '$date' ";
							$active_loan_run = mysqli_query($conn, $active_loan);

							$loanpayment = "SELECT * FROM loanpayment";
							$loan_payment_run= mysqli_query($conn, $loanpayment);
							$total_loans = mysqli_num_rows($loan_payment_run);

							if($total = mysqli_num_rows($active_loan_run))
							{
								echo '<label id="label4">'.$total.'</label>';
							}else{
								echo '<label id="label4"> 0 </label>';
							}


					?>
					</div>
					<div class="totaldashboard111">
						<label id="label44">Today's Due</label>
					</div>
				</div>
				<div class="totaldashboard2">
					<img id="img4" src="asset/icons/7321213.PNG" width="40" height="40">
				</div>
			</div>
		</a>
		<a id="click2">
			<div class="totaldashboard">
				<div class="totaldashboard1">
					<div class="totaldashboard11">
					<?php 
						$host =  "localhost";
				        $username ="root";
				        $password ="";
				        $db = "microfinance1";

				        $conn =  new mysqli($host, $username, $password, $db);

				        if($conn->connect_error){
				            echo $conn->connect_error;

				        }
							$active_loan = "SELECT * FROM loanpayment where status = 'On Process' ";
							$active_loan_run = mysqli_query($conn, $active_loan);

							$loanpayment = "SELECT * FROM loanpayment";
							$loan_payment_run= mysqli_query($conn, $loanpayment);
							$total_loans = mysqli_num_rows($loan_payment_run);

							if($total = mysqli_num_rows($active_loan_run))
							{
								echo '<label id="label2">'.$total.'</label>';
							}else{
								echo '<label id="label2"> 0</label>';
							}


					?>
					</div>
					<div class="totaldashboard111">
						<label id="label22">Active Loans</label>
					</div>
				</div>
				<div class="totaldashboard2">
					<img id="img2" src="asset/icons/2043684.PNG" width="40" height="40">
				</div>
			</div>
		</a>
		
		<a id="click3">
			<div class="totaldashboard">
				<div class="totaldashboard1">
					<div class="totaldashboard11">
					<?php 
						$host =  "localhost";
				        $username ="root";
				        $password ="";
				        $db = "microfinance1";

				        $conn =  new mysqli($host, $username, $password, $db);

				        if($conn->connect_error){
				            echo $conn->connect_error;

				        }
							$active_loan = "SELECT * FROM loanpayment where status = 'Finished' ";
							$active_loan_run = mysqli_query($conn, $active_loan);

							$loanpayment = "SELECT * FROM loanpayment";
							$loan_payment_run= mysqli_query($conn, $loanpayment);
							$total_loans = mysqli_num_rows($loan_payment_run);

							if($total = mysqli_num_rows($active_loan_run))
							{
								echo '<label id="label3">'.$total.'/'.$total_loans.'</label>';
							}else{
								echo '<label id="label3">No Data</label>';
							}


					?>
					</div>
					<div class="totaldashboard111">
						<label id="label33">Finished Loans</label>
					</div>
				</div>
				<div class="totaldashboard2">
					<img id="img3" src="asset/icons/2043684.PNG" width="40" height="40">
				</div>
			</div>
		</a>
		
		<!-- <a id="click5">
			<div class="totaldashboard">
				<div class="totaldashboard1">
					<div class="totaldashboard11">
						<label>10</label>
					</div>
					<div class="totaldashboard111">
						<label>Admin</label>
					</div>
				</div>
				<div class="totaldashboard2">
					<img src="asset/icons/7634045.PNG" width="40" height="40">
				</div>
			</div>
		</a> -->
		
	</div>
	<div class="dashboard2">

		<div class="dashboard2table" id="dashboard2table1">
			<div class="dashboard2tableheader">
				<label>Members</label>
				<a href="dashboard.php" id="x" style="margin: auto; margin-right: 10px;">
					<img id="" src="asset/icons/352270.PNG" width="24" height="24">
				</a>
			</div>
			<?php
			$host =  "localhost";
	        $username ="root";
	        $password ="";
	        $db = "microfinance1";

	        $conn =  new mysqli($host, $username, $password, $db);

	        if($conn->connect_error){
	            echo $conn->connect_error;

	        }
			$sql = "SELECT * FROM member order by lastname";
	        $result = $conn->query($sql) or die ($conn->error);
	        $row = $result->fetch_assoc();

			?>
			<div class="dashboard2table1">
				<div class="table1">
				<div class="table">
				<div class="tableheader">
				<div class="tablename" id="tablename" style="width: 30%;" >
					<label>User ID</label>
				</div>
				<div class="tablename">
					<label>Fullname</label>
				</div>
				<div class="tablename" id="" style="width: 40%;">
					<label>Gender</label>
				</div>
				<div class="tablename" id="">
					<label>Address</label>
				</div>
				<div class="tablename" style="width: 40%;">
					<label>Contact</label>
				</div>

			</div>
			<?php do{ ?>
			<div class="list">
				<a>
					<div class="tablename" id="tablename" style="width: 30%;">
						<label><?php echo $row['id']; ?></label>
					</div>
					<div class="tablename">
						<label><?php echo $row['lastname']; ?> <?php echo $row['firstname']; ?> <?php echo $row['middlename']; ?></label>
					</div>
					<div class="tablename" id="" style="width: 40%;">
						<label><?php echo $row['gender']; ?></label>
					</div>
					<div class="tablename" id="">
						<label><?php echo $row['barangay']; ?>, <?php echo $row['municipality']; ?> <?php echo $row['province']; ?></label>
					</div>
					<div class="tablename" style="width: 40%;">
						<label><?php echo $row['contact']; ?></label>
					</div>
				</a>
			</div>
			<?php }while ($row = $result->fetch_assoc()) ?>
			</div>
			</div>
			</div>
		</div>

		<div class="dashboard2table" id="dashboard2table2">
			<div class="dashboard2tableheader">
				<label>Active Loans</label>
				<a href="dashboard.php" id="x" style="margin: auto; margin-right: 10px;">
					<img id="" src="asset/icons/352270.PNG" width="24" height="24">
				</a>
			</div>
			<?php
			$host =  "localhost";
	        $username ="root";
	        $password ="";
	        $db = "microfinance1";

	        $conn =  new mysqli($host, $username, $password, $db);

	        if($conn->connect_error){
	            echo $conn->connect_error;

	        }
			$sql = "SELECT * FROM loanpayment where status ='On Process' order by lastname asc";
	        $result = $conn->query($sql) or die ($conn->error);
	        $row = $result->fetch_assoc();

			?>
			<div class="dashboard2table1">
				<div class="table1">
				<div class="table">
				<div class="tableheader">
				<div class="tablename" id="tablename" style="width: 50%;" >
					<label>User ID</label>
				</div>
				<div class="tablename" id="tablename" style="width: 50%;" >
					<label>Loan ID</label>
				</div>
				<div class="tablename">
					<label>Fullname</label>
				</div>
				<div class="tablename" id="" style="width:;">
					<label>Due Date</label>
				</div>
				<div class="tablename" id="" style="width: 50%;">
					<label>Total Payable</label>
				</div>
				<div class="tablename" id="" style="width: 50%;">
					<label>Balance</label>
				</div>
				<div class="tablename" style="width: 50%;">
					<label>Contact</label>
				</div>

			</div>
			<?php do{ ?>
			<div class="list">
				<a>
					<div class="tablename" id="tablename" style="width: 50%;">
						<label><?php echo $row['userid']; ?></label>
					</div>
					<div class="tablename" id="tablename" style="width: 50%;">
						<label><?php echo $row['id']; ?></label>
					</div>
					<div class="tablename">
						<label><?php echo $row['lastname']; ?>, <?php echo $row['firstname']; ?> <?php echo $row['middlename']; ?></label>
					</div>
					<div class="tablename" id="" style="width: ">
						<label><?php echo $row['duedate']; ?></label>
					</div>
					<div class="tablename" id="" style="width: 50%;">
						<label>₱ <?php echo $row['totalpayableamount']; ?></label>
					</div>
					<div class="tablename" id="" style="width: 50%;">
						<label>₱ <?php echo $row['totalbalance']; ?></label>
					</div>
					
					<div class="tablename" style="width: 50%;">
						<label><?php echo $row['contact']; ?></label>
					</div>
				</a>
			</div>
			<?php }while ($row = $result->fetch_assoc()) ?>
			</div>
			</div>
			</div>
		</div>
		<div class="dashboard2table" id="dashboard2table4">
			<div class="dashboard2tableheader">
				<label>Due Date</label>
				<a href="dashboard.php" id="x" style="margin: auto; margin-right: 10px;">
					<img id="" src="asset/icons/352270.PNG" width="24" height="24">
				</a>
			</div>
			<?php
			$host =  "localhost";
	        $username ="root";
	        $password ="";
	        $db = "microfinance1";

	        $conn =  new mysqli($host, $username, $password, $db);

	        if($conn->connect_error){
	            echo $conn->connect_error;

	        }
	        $date = date('Y-m-d');
			$sql = "SELECT * FROM loanpayment where duedate = '$date' order by lastname asc";
	        $result = $conn->query($sql) or die ($conn->error);
	        $row = $result->fetch_assoc();

			?>
			<div class="dashboard2table1">
				<div class="table1">
				<div class="table">
				<div class="tableheader">
				<div class="tablename" id="tablename" style="width: 50%;" >
					<label>User ID</label>
				</div>
				<div class="tablename" id="tablename" style="width: 50%;" >
					<label>Loan ID</label>
				</div>
				<div class="tablename">
					<label>Fullname</label>
				</div>
				<div class="tablename" id="" style="width:;">
					<label>Due Date</label>
				</div>
				<div class="tablename" id="" style="width: 50%;">
					<label>Total Payable</label>
				</div>
				<div class="tablename" id="" style="width: 50%;">
					<label>Balance</label>
				</div>
				<div class="tablename" style="width: 50%;">
					<label>Contact</label>
				</div>

			</div>
			<?php do{ ?>
			<div class="list">
				<a>
					<div class="tablename" id="tablename" style="width: 50%;">
						<label><?php echo $row['userid']; ?></label>
					</div>
					<div class="tablename" id="tablename" style="width: 50%;">
						<label><?php echo $row['id']; ?></label>
					</div>
					<div class="tablename">
						<label><?php echo $row['lastname']; ?>, <?php echo $row['firstname']; ?> <?php echo $row['middlename']; ?></label>
					</div>
					<div class="tablename" id="" style="width: ">
						<label><?php echo $row['duedate']; ?> </label>
					</div>
					<div class="tablename" id="" style="width: 50%;">
						<label>₱ <?php echo $row['totalpayableamount']; ?></label>
					</div>
					<div class="tablename" id="" style="width: 50%;">
						<label>₱ <?php echo $row['totalbalance']; ?></label>
					</div>
					
					<div class="tablename" style="width: 50%;">
						<label><?php echo $row['contact']; ?></label>
					</div>
				</a>
			</div>
			<?php }while ($row = $result->fetch_assoc()) ?>
			</div>
			</div>
			</div>
		</div>
		<div class="dashboard2table" id="dashboard2table3">
			<div class="dashboard2tableheader">
				<label>Finished Loans</label>
				<a href="dashboard.php" id="x" style="margin: auto; margin-right: 10px;">
					<img id="" src="asset/icons/352270.PNG" width="24" height="24">
				</a>
			</div>
			<?php
			$host =  "localhost";
	        $username ="root";
	        $password ="";
	        $db = "microfinance1";

	        $conn =  new mysqli($host, $username, $password, $db);

	        if($conn->connect_error){
	            echo $conn->connect_error;

	        }

			$sql = "SELECT * FROM loanpayment where status ='Finished' order by lastname asc";
	        $result = $conn->query($sql) or die ($conn->error);
	        $row = $result->fetch_assoc();

			?>
			<div class="dashboard2table1">
				<div class="table1">
				<div class="table">
				<div class="tableheader">
				<div class="tablename" id="tablename" style="width: 50%;" >
					<label>User ID</label>
				</div>
				<div class="tablename" id="tablename" style="width: 50%;" >
					<label>Loan ID</label>
				</div>
				<div class="tablename">
					<label>Fullname</label>
				</div>
				<div class="tablename" id="" style="width:;">
					<label>Loan PLan</label>
				</div>
				<div class="tablename" id="" style="width: 50%;">
					<label>Loan Date</label>
				</div>
				<div class="tablename" style="width: 50%;">
					<label>Date Finished</label>
				</div>

			</div>
			<?php do{ ?>
			<div class="list">
				<a>
					<div class="tablename" id="tablename" style="width: 50%;">
						<label><?php echo $row['userid']; ?></label>
					</div>
					<div class="tablename" id="tablename" style="width: 50%;">
						<label><?php echo $row['id']; ?></label>
					</div>
					<div class="tablename">
						<label><?php echo $row['lastname']; ?>, <?php echo $row['firstname']; ?> <?php echo $row['middlename']; ?></label>
					</div>
					<div class="tablename" id="" style="width: ">
						<label><?php echo $row['months']; ?> Months, <?php echo $row['interest']; ?>% Interest, ₱ <?php echo $row['amount']; ?></label>
					</div>
					<div class="tablename" id="" style="width: 50%;">
						<label><?php echo $row['loandate']; ?></label>
					</div>
					<div class="tablename" style="width: 50%;">
						<label><?php echo $row['lasttransaction']; ?></label>
					</div>
				</a>
			</div>
			<?php }while ($row = $result->fetch_assoc()) ?>
			</div>
			</div>
			</div>
		</div>
		<!-- <div class="dashboard2table" id="dashboard2table4">
			
		</div> -->
	</div>
		<script src="dashboard.js">

		</script>

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
	.list a .tablename label{
		cursor: default;
		   /* text-transform: uppercase;*/
	}
</style>

