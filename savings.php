<?php 
require('./session.php');
include 'config.php';
error_reporting(0);

if($_SESSION['position'] == 'Loan Officer'){
	echo "<script>window.location.href = './dashboard.php'</script>";
}else{

}

if (isset($_POST["save"])){

	
		
		$fullname = mysqli_real_escape_string($conn, $_POST["fullname"]);
		$gender = mysqli_real_escape_string($conn, $_POST["gender"]);
		$address = mysqli_real_escape_string($conn, $_POST["address"]);
		$contact = mysqli_real_escape_string($conn, $_POST["contact"]);
		$email = mysqli_real_escape_string($conn, $_POST["email"]);
		$loantype = mysqli_real_escape_string($conn, $_POST["loantype"]);
		$userid = mysqli_real_escape_string($conn, $_POST["userid"]);
		$amount = mysqli_real_escape_string($conn, $_POST["amount"]);
		$months = mysqli_real_escape_string($conn, $_POST["months"]);
		$interest = mysqli_real_escape_string($conn, $_POST["interest"]);
		$monthlypayment = mysqli_real_escape_string($conn, $_POST["monthlypayment"]);
		$totalpayment = mysqli_real_escape_string($conn, $_POST["totalpayment"]);
		$totalbalance = mysqli_real_escape_string($conn, $_POST["totalpayment"]);
		$loanstatus = mysqli_real_escape_string($conn, $_POST["loanstatus"]);
		$dateofbirth = mysqli_real_escape_string($conn, $_POST["dateofbirth"]);
		$duedate = mysqli_real_escape_string($conn, $_POST["duedate"]);
		$status = "On Process";
		$loandate = date('Y-m-d');
		
		if ($duedate == $loandate) {
			echo "<script>alert('Please Change Due date!');</script>";
		}else{
		
		$id = $_GET['id'];
		$loan_status = "On Process";
		if ($loanstatus == $loan_status) {
				echo "<script>alert('User have an Unfinish loan');</script>";
		} else{
			$sql = "INSERT INTO loanpayment (fullname, loantype, userid, amount, months, interest, monthlypayment, totalpayableamount, totalbalance, status, loandate, gender, address, contact, email, dateofbirth, duedate) VALUES ('$fullname', '$loantype', '$userid', '$amount', '$months', '$interest', '$monthlypayment', '$totalpayment', '$totalbalance', '$status', '$loandate', '$gender', '$address', '$contact', '$email', '$dateofbirth', '$duedate')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Add successfully');</script>";
				$id = $_GET['id'];
				$status = "On Process";
				$sql = "UPDATE member SET loanstatus = '$status' WHERE id = '$id'";
				$update = mysqli_query($conn, $sql);
				if($update){
					
				}else{
					echo "<script>alert('Failed');</script>";
				}
				echo "<script>window.location.href = './loans.php'</script>";

			}else{
				echo "<script>alert('Failed');</script>";
			}
		} 
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
    
        $id = $_GET['id'];
        
        $sql = "SELECT * FROM member order by lastname asc";
        $result = $conn->query($sql) or die ($conn->error);
        $row = $result->fetch_assoc();

         if (isset($_GET["search"])){  

       $search = $_GET['search'];
         $check_record = "SELECT * FROM member where lastname LIKE '$search' || firstname LIKE '$search' || middlename LIKE '$search' || id LIKE '$search' ||  gender LIKE '$search' ||  barangay LIKE '$search' ||  municipality LIKE '$search' ||  province LIKE '$search' order by lastname asc";
    $sqlvalidate = mysqli_query($conn, $check_record);

    if (mysqli_num_rows($sqlvalidate) == 0){
    	echo "<script>alert('No existing data');</script>";
    	echo "<script>window.location.href = './savings.php'</script>";
    }else{
        $search = $_GET['search'];

         $sql = "SELECT * FROM member where lastname LIKE '$search' || firstname LIKE '$search' || middlename LIKE '$search' || id LIKE '$search' ||  gender LIKE '$search' ||  barangay LIKE '$search' ||  municipality LIKE '$search' ||  province LIKE '$search' order by lastname asc";
                $result = $conn->query($sql) or die ($conn->error);
                $row = $result->fetch_assoc();


            }
    
}







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
			<a href="dashboard.php" style="display :<?php echo $_SESSION['financemanager'];?>;">
					<img id="menuimg" src="asset/icons/4136060.PNG" width="25" height="25">
					<label>Dashboard</label>
			</a>
			<a href="members.php" style="display :<?php echo $_SESSION['financemanager'];?>;">
					<img id="menuimg" src="asset/icons/1989232.PNG" width="25" height="25">
					<label>Members</label>
			</a>
			<a href="loans.php" style="display :<?php echo $_SESSION['financemanager'];?>;">
					<img id="menuimg" src="asset/icons/2043684.PNG" width="25" height="25">
					<label>Add Loans</label>
			</a>
			<!-- <a href="loan_plans.php">
					<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27">
					<label>Loan Plans</label>
			</a> -->
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
			<a href="savings.php" style="background-color: #239cdf;">
					<img id="menuimg" src="asset/icons/7634045.PNG" width="25" height="25">
					<label>Savings</label>
			</a>
			<a href="deposit_record.php">
					<img id="menuimg" src="asset/icons/4641433.PNG" width="25" height="25">
					<label>Deposit Record</label>
			</a>
			<a href="withdraw_record.php">
					<img id="menuimg" src="asset/icons/4265284.PNG" width="25" height="25">
					<label>Withdraws Record</label>
			</a>
			<a href="administrator.php" style="display :<?php echo $_SESSION['financemanager'];?>;">
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
			<a href="dashboard.php" style="display :<?php echo $_SESSION['financemanager'];?>;">
					<img id="menuimg" src="asset/icons/4136060.PNG" width="25" height="25">
					<label>Dashboard</label>
			</a>
			<a href="members.php" style="display :<?php echo $_SESSION['financemanager'];?>;">
					<img id="menuimg" src="asset/icons/1989232.PNG" width="25" height="25">
					<label>Members</label>
			</a>
			<a href="loans.php" style="display :<?php echo $_SESSION['financemanager'];?>;">
					<img id="menuimg" src="asset/icons/2043684.PNG" width="25" height="25">
					<label>Add Loans</label>
			</a>
			<!-- <a href="loan_plans.php">
					<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27">
					<label>Loan Plans</label>
			</a> -->
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
			<a href="savings.php" style="background-color: #239cdf;">
					<img id="menuimg" src="asset/icons/7634045.PNG" width="25" height="25">
					<label>Savings</label>
			</a>
			<a href="deposit_record.php">
					<img id="menuimg" src="asset/icons/4641433.PNG" width="25" height="25">
					<label>Deposit Record</label>
			</a>
			<a href="withdraw_record.php">
					<img id="menuimg" src="asset/icons/4265284.PNG" width="25" height="25">
					<label>Withdraws Record</label>
			</a>
			<a href="administrator.php" style="display :<?php echo $_SESSION['financemanager'];?>;">
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
<!-- 			<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27"> -->
			<label>Savings</label>
		</div>
		<div class="tablebody">
		<div class="search-add" id="search-add-refreshbtn">
			<div class="refresh-add" id="refresh-add">
			<form method="GET" action="savings.php" autocomplete="off">
				<input type="text" name="search" value="<?php echo $_GET['search'];?>" required>
				<button type="submit">Search</button>
			</form>
			</div>
			<div class="" id="refresh-add">
				<a href="savings.php" id="refresh"><!-- <img id="menuimg" src="asset/icons/574166.PNG" width="23" height="23"> --><label>Refresh List</label></a>
				<form method="GET" action="export_savings_record.php" id="export">
					<input type="hidden" name="search_export" value="<?php echo $_GET['search'];?>" required>
					<button type="submit" id="export_button">Export to Excel</button>
				</form>
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
				        	 $search = $_GET['search'];
				        	 $blank = "";
				        	 if($search == $blank){
							$members = "SELECT * FROM member";
							$members_run = mysqli_query($conn, $members);

							if($total = mysqli_num_rows($members_run))
							{
								echo '<label id="label1">Result : '.$total.'</label>';
							}else{
								echo '<label id="label1">Result : 0</label>';
							}
						} else{
							$search = $_GET['search'];
							$members = "SELECT * FROM member where lastname LIKE '$search' || firstname LIKE '$search' || middlename LIKE '$search' || id LIKE '$search' ||  gender LIKE '$search' ||  barangay LIKE '$search' ||  municipality LIKE '$search' ||  province LIKE '$search' order by lastname asc";
							$members_run = mysqli_query($conn, $members);

							if($total = mysqli_num_rows($members_run))
							{
								echo '<label id="label1">Result : '.$total.'</label>';
							}else{
								echo '<label id="label1">Result : 0</label>';
							}
						}

					?>
		</div>
		<div class="tablebody1" id="tablebody11">
		<div class="table">
			<div class="tableheader">
				<div class="tablename" id="tablename" style="width: 50%;" >
					<label>User ID</label>
				</div>
				<div class="tablename">
					<label>Fullname</label>
				</div>
				
				<div class="tablename" id="">
					<label>Address</label>
				</div>
				<div class="tablename"  style="width: 50%;">
					<label>Contact</label>
				</div>
				<div class="tablename" id=""  style="width: 50%;">
					<label>Total Savings</label>
				</div>
			</div>
			 <?php do{ ?>
			<div class="list">
				<a href="user_savings.php ?id=<?php echo $row['id'];?>">
					<div class="tablename" id="tablename" style="width: 50%;">
						<label><?php echo $row['id']; ?></label>
					</div>
					<div class="tablename">
						<label><?php echo $row['lastname']; ?> <?php echo $row['firstname']; ?> <?php echo $row['middlename']; ?></label>
					</div>
					
					<div class="tablename" id="">
						<label><?php echo $row['barangay']; ?>, <?php echo $row['municipality']; ?> <?php echo $row['province']; ?></label>
					</div>
					<div class="tablename"  style="width: 50%;">
						<label><?php echo $row['contact']; ?></label>
					</div>
					<div class="tablename" id=""  style="width: 50%;">
						<label>₱ <?php echo $row['savings']; ?></label>
					</div>
				</a>
			</div>
			<?php }while ($row = $result->fetch_assoc()) ?>
		</div>
	</div>
	</div>
</div>
	<!-- addmember -->
		<div class="addform" id="addform">
			<div class="close">
				<label>Add Loan</label>
			</div>
			<form  method="POST" action="" autocomplete="off">
				<div class="forminput" id="forminput">
					<div class="input">
						<label>Name & ID :</label>
						<input type="text" name="" value="<?php echo $_SESSION['lastname']; ?>, <?php echo $_SESSION['firstname']; ?> <?php echo $_SESSION['middlename']; ?> | ID : <?php echo $_SESSION['id']; ?>"  disabled>
						<input type="hidden" name="userid" value="<?php echo $_SESSION['id']; ?>" required>
						<input type="hidden" name="loanstatus" value="<?php echo $_SESSION['loanstatus']; ?>">
						
						<input type="hidden" name="fullname" value="<?php echo $_SESSION['lastname']; ?>, <?php echo $_SESSION['firstname']; ?> <?php echo $_SESSION['middlename']; ?>" required>
					</div>
					<div class="input" id="input">
						<label>Date of Birth :</label>
						<input type="text" name="" value="<?php echo $_SESSION['dateofbirth']; ?>" disabled>
						<input type="hidden" name="dateofbirth" value="<?php echo $_SESSION['dateofbirth']; ?>" required>
					</div>
					<div class="input" id="input">
						<label>Gender :</label>
						<input type="text" name="" value="<?php echo $_SESSION['gender']; ?>" disabled>
						<input type="hidden" name="gender" value="<?php echo $_SESSION['gender']; ?>" required>
					</div>
					

					
					
				</div>
				<form>
				<!-- <div class="forminput">
					
					<div class="input">
						<?php
							
						    include_once("connection.php");
						    $conn = connection();

						  
						    
						    $sql = "SELECT * FROM loanplans order by loanplansid asc";
						    $result = $conn->query($sql) or die ($conn->error);
						    $row = $result->fetch_assoc();
						?>
						<label>Plans (Months, Interest %, ₱ Amount) :</label>

						<select type="text" name="loanplan" id="plans" required>
							<option></option>

							 <?php do{ ?>

							<option value="<?php echo $row['months']; ?> month/s <?php echo $row['interest']; ?>%, <?php echo $row['amount']; ?>"><?php echo $row['months'];?> month/s <?php echo $row['interest']; ?>%, <?php echo $row['amount'];?></option>
							<?php }while ($row = $result->fetch_assoc()) ?>
						</select>
					</div>
					
				</div> -->
				<!-- <div class="savebtn" id="checkbtn">
					
					
				</div> -->
				<div class="forminput" id="forminput">
					<div class="input">
						<label>Address :</label>
						<input type="text" name="address" id="" value="<?php echo $_SESSION['barangay']; ?>, <?php echo $_SESSION['municipality']; ?> <?php echo $_SESSION['province']; ?>" disabled>
						<input type="hidden" name="address" id="" value="<?php echo $_SESSION['barangay']; ?>, <?php echo $_SESSION['municipality']; ?> <?php echo $_SESSION['province']; ?>">
					</div>
					<div class="input">
						<label>Contact no. & Email :</label>
						<input type="text" name="contact" id=""  value="<?php echo $_SESSION['contact']; ?>	|	<?php echo $_SESSION['email']; ?>" disabled>
						<input type="hidden" name="contact" id=""  value="<?php echo $_SESSION['contact']; ?>">
						<input type="hidden" name="email" id=""  value="<?php echo $_SESSION['email']; ?>">
					</div>
				</div>
				<div class="forminput" id="forminput">
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
				</div>
				<div class="forminput" id="forminput">
					<div class="input">
						<label>Amount :</label>
						<input type="number" name="amount" id="amount" required>
					</div>
					<div class="input">
						<label>Month/s :</label>
						<select type="number" name="months" id="months" required>
						<option value=""></option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
					</select>
					</div>
					<div class="input">
						<label>interest(%) :</label>
						<input type="number" name="interest" id="interest" required>
					</div>
					
				</div>
				<div class="savebtn" id="checkbtn">
					<button type="button" id="calculate" name="calculate">Calculate</button>
					
				</div>
				<div class="forminput" id="forminput">
					<div class="input">
						<label>Monthly Payment</label>
						<input type="text" name="monthlypayment" id="monthlypayment" required>
					</div>
					<div class="input">
						<label>Total Payable Amount :</label>
						<input type="text" name="totalpayment" id="totalpayment" required>
					</div>
					<div class="input">
						<label>Due Date :</label>
						<input type="date" name="duedate" id="duedate" required>
					</div>
					
				</div>
				
				<div class="savebtn">
					<button type="submit" name="save">Save</button>
					<a href="loans.php" id="close" name="save"><label>Cancel</label></a>
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
<script type="text/javascript">
	var calculate = document.getElementById("calculate");
	
		calculate.onclick = function(){
		var n5 = parseInt(document.getElementById("months").value);
		var n1 = parseInt(document.getElementById("amount").value);	
		var n7 = parseInt(document.getElementById("monthlypayment").value);
		var n6 = parseInt(document.getElementById("interest").value);	
		var interest = (n1 * (n6 * .01)) / n5;
		var payment = ((n1/n5)+ interest).toFixed(2);
		var payment = payment.toString().replace(/\B(?=(\d{3})+(?!\d))/g,"");
		monthlypayment.value= payment;

		var n5 = parseInt(document.getElementById("months").value);
		var n7 = parseInt(document.getElementById("monthlypayment").value);
		
		var total = n7*n5;
		totalpayment.value = total;

		ami.value = n5*n1+n6*2022;
	
	}
</script>
</html>
<style type="text/css">

.rightdiv, .leftdiv{
	/*filter:blur(5px);
	user-select: none;
	pointer-events: none;*/
	
}	

#label1{
	margin: auto;
	margin-right: 20px;
	font-size: 12px;
	font-weight: bold;
	color: gray;
}

.addform{
	display: none;
	width: 900px;
	margin-bottom: 30px;

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

}.addform form .savebtn #calculate{
	margin: auto;
	width: 100px;
}
.addform form .forminput #input{
	width: 50%;
}
.addform form .forminput .input #plans{
	width: 95%;
}
.addform form #checkbtn{
	border: none;
	height: 45px;
}
.addform form #checkbtn a{
	margin: auto;
	width: 130px;

}
.addform form #forminput #loantype{
	width: 45%;
}
@media screen and (max-width: 720px){


.addform form .forminput .input #plans{
	width: 95%;

}
/*.addform{
display: flex;
width: 96%;
margin-bottom: 10%;


}
*/.addform form{
	/*overflow-y: scroll;*/
}
.addform form .forminput{
	width: 85%;
}
.addform form .forminput #input{
	width: 100%;
}
.addform form #forminput{
	flex-direction: column;
	
	width: 85%;
}
.addform form #forminput input, .addform form #forminput select, .addform form #forminput #loantype{
	width: 100%;
}
#label1{
	display: none;
}



	
</style>