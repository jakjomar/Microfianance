<?php 
require('./session.php');
include 'config.php';
error_reporting(0);

if($_SESSION['position'] == 'Loan Officer'){
	echo "<script>window.location.href = './dashboard.php'</script>";
}else{

}

if (isset($_POST["savedeposit"])){

		$lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
		$firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
		$middlename = mysqli_real_escape_string($conn, $_POST["middlename"]);
		$gender = mysqli_real_escape_string($conn, $_POST["gender"]);
		$age = mysqli_real_escape_string($conn, $_POST["age"]);
		$barangay = mysqli_real_escape_string($conn, $_POST["barangay"]);
		$municipality = mysqli_real_escape_string($conn, $_POST["municipality"]);
		$province = mysqli_real_escape_string($conn, $_POST["province"]);
		$contact = mysqli_real_escape_string($conn, $_POST["contact"]);
		$email = mysqli_real_escape_string($conn, $_POST["email"]);
		$userid = mysqli_real_escape_string($conn, $_POST["userid"]);
		$dateofbirth = mysqli_real_escape_string($conn, $_POST["dateofbirth"]);
		
		$depositamount = mysqli_real_escape_string($conn, $_POST["depositamount"]);
		$savings = mysqli_real_escape_string($conn, $_POST["overallsavings"]);
		$depositdate = date('Y-m-d');
		$blank ="0";
		if($depositamount == $blank ){
			echo "<script>alert('Please Input Amount');</script>";
		}else{
		$sql = "INSERT INTO deposit (lastname, firstname, middlename, userid, age, gender, barangay, municipality, province, contact, email, dateofbirth, depositdate, depositamount, savings) VALUES ('$lastname', '$firstname', '$middlename', '$userid', '$age', '$gender', '$barangay', '$municipality', '$province', '$contact', '$email', '$dateofbirth', '$depositdate', '$depositamount', '$savings')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
			$id = $_GET['id'];
			$overallsavings = mysqli_real_escape_string($conn, $_POST["overallsavings"]);
			$sql = "UPDATE member SET savings = '$overallsavings' WHERE id = '$id'";
			$update = mysqli_query($conn, $sql);
				echo "<script>alert('Deposit successfully');</script>";

			}else{
				echo "<script>alert('Failed');</script>";
			}
		
		}
	}

	if (isset($_POST["savewithdraws"])){

		$lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
		$firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
		$middlename = mysqli_real_escape_string($conn, $_POST["middlename"]);
		$gender = mysqli_real_escape_string($conn, $_POST["gender"]);
		$age = mysqli_real_escape_string($conn, $_POST["age"]);
		$barangay = mysqli_real_escape_string($conn, $_POST["barangay"]);
		$municipality = mysqli_real_escape_string($conn, $_POST["municipality"]);
		$province = mysqli_real_escape_string($conn, $_POST["province"]);
		$contact = mysqli_real_escape_string($conn, $_POST["contact"]);
		$email = mysqli_real_escape_string($conn, $_POST["email"]);
		$userid = mysqli_real_escape_string($conn, $_POST["userid"]);
		$dateofbirth = mysqli_real_escape_string($conn, $_POST["dateofbirth"]);
		
		$withdrawamount = mysqli_real_escape_string($conn, $_POST["withdrawamount"]);
		$savings = mysqli_real_escape_string($conn, $_POST["overallsavings1"]);
		$totalsavings = mysqli_real_escape_string($conn, $_POST["totalsavings"]);
		$withdrawdate = date('Y-m-d');
		$savingsvalue = "50";
		$blank ="0";
		if($withdrawamount == $blank ){
			echo "<script>alert('Please Input Amount');</script>";
		}else{
		if( $savingsvalue > $savings){
			echo "<script>alert('Insuficient Balance!');</script>";
		}else{
			if($totalsavings == $savingsvalue){
				echo "<script>alert('Unable to Withdraw!');</script>";
			}else{
		$sql = "INSERT INTO withdraw (lastname, firstname, middlename, userid, age, gender, barangay, municipality, province, contact, email, dateofbirth, withdrawdate, withdrawamount, savings) VALUES ('$lastname', '$firstname', '$middlename', '$userid', '$age', '$gender', '$barangay', '$municipality', '$province', '$contact', '$email', '$dateofbirth', '$withdrawdate', '$withdrawamount', '$savings')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
			$id = $_GET['id'];
			$overallsavings = mysqli_real_escape_string($conn, $_POST["overallsavings1"]);
			$sql = "UPDATE member SET savings = '$overallsavings' WHERE id = '$id'";
			$update = mysqli_query($conn, $sql);
				echo "<script>alert('Withdraw successfully');</script>";

			}else{
				echo "<script>alert('Failed');</script>";
				}

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
    $_SESSION["savings"] = $row['savings'];
    $_SESSION["age"] = $row['age'];
    


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
			<!-- <img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27"> -->
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
				        	 $search = $_GET['id'];
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
							$search = $_GET['id'];
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
	<!-- savings -->
		<div class="addform" id="addform">
			<div class="close">
				<label>Savings</label>
				<a href="savings.php" id="x" style="margin: auto; margin-right: 0px;">
					<img id="" src="asset/icons/352270.PNG" width="24" height="24">
				</a>
			</div>
			<form  method="POST" action="" autocomplete="off">
				<div class="forminput" id="forminput">
					<div class="input">
						<label>ID :</label>
						<input type="text" name="" value="<?php echo $_SESSION['id'];?>"  disabled>
						<input type="hidden" name="userid" value="<?php echo $_SESSION['id'];?>" required>
						<input type="hidden" name="loanstatus" value="<?php echo $_SESSION['loanstatus'];?>">
						
						
					</div>
					<div class="input">
						<label>Last Name :</label>
						<input type="text" name="" value="<?php echo $_SESSION['lastname']; ?>"  disabled>
						<input type="hidden" name="lastname" value="<?php echo $_SESSION['lastname'];?>" required>
					</div>
					<div class="input">
						<label>Firt Name :</label>
						<input type="text" name="" value="<?php echo $_SESSION['firstname']; ?>"  disabled>
						<input type="hidden" name="firstname" value="<?php echo $_SESSION['firstname'];?>" required>
					</div>
					<div class="input">
						<label>Middle Name :</label>
						<input type="text" name="" value="<?php echo $_SESSION['middlename']; ?>"  disabled>
						<input type="hidden" name="middlename" value="<?php echo $_SESSION['middlename'];?>" required>
					</div>
						
				</div>
				<div class="forminput" id="forminput">
					<div class="input" id="input">
						<label>Date of Birth :</label>
						<input type="text" name="" value="<?php echo $_SESSION['dateofbirth']; ?>" disabled>
						<input type="hidden" name="dateofbirth" value="<?php echo $_SESSION['dateofbirth']; ?>" required>
					</div>
					<div class="input" id="input">
						<label>Age :</label>
						<input type="text" name="" value="<?php echo $_SESSION['age']; ?>" disabled>
						<input type="hidden" name="age" value="<?php echo $_SESSION['age']; ?>" required>
					</div>
					<div class="input" id="input">
						<label>Gender :</label>
						<input type="text" name="" value="<?php echo $_SESSION['gender']; ?>" disabled>
						<input type="hidden" name="gender" value="<?php echo $_SESSION['gender']; ?>" required>
					</div>
					
				</div>
				<div class="forminput" id="forminput">
					<div class="input">
						<label>Address :</label>
						<input type="text" name="address" id="" value="<?php echo $_SESSION['barangay']; ?>, <?php echo $_SESSION['municipality']; ?> <?php echo $_SESSION['province']; ?>" disabled>
						<input type="hidden" name="barangay" id="" value="<?php echo $_SESSION['barangay']; ?>">
						<input type="hidden" name="municipality" id="" value="<?php echo $_SESSION['municipality']; ?>">
						<input type="hidden" name="province" id="" value="<?php echo $_SESSION['province']; ?>">
					</div>
					<div class="input">
						<label>Contact Number :</label>
						<input type="text" name="contact" id=""  value="<?php echo $_SESSION['contact']; ?>" disabled>
						<input type="hidden" name="contact" id=""  value="<?php echo $_SESSION['contact']; ?>">
						<input type="hidden" name="email" id=""  value="<?php echo $_SESSION['email']; ?>">
					</div>
					<div class="input">
						<label>Email :</label>
						<input type="text" name="contact" id=""  value="<?php echo $_SESSION['email']; ?>"  style="text-transform: none;" disabled>
						<input type="hidden" name="contact" id=""  value="<?php echo $_SESSION['contact']; ?>">
						<input type="hidden" name="email" id=""  value="<?php echo $_SESSION['email']; ?>">
					</div>
				</div>
				<div class="forminput" id="savings">
					<div class="totalsavings">
						<div class="savingsdiv">
							<div class="totalsavingsdiv">
								<div class="totalsavingsamount">
									<label>₱ <?php echo $_SESSION['savings']; ?></label>
									<input type="hidden" name="totalsavings" id="totalsavings" value="<?php echo $_SESSION['savings']; ?>">
								</div>
								<div class="totalsavingsheader">

									<label>Total Savings</label>
								</div>
								
							</div>
							<div class="totalsavingsicon">
								<img id="menuimg" src="asset/icons/7634045.PNG" width="50" height="50">
							</div>
						</div>
					</div>
					<div class="inputsavings">
						<div class="inputsavingsbutton">
							<button type="button" id="depositbtn">Deposit</button>
							<button type="button" id="withdrawsbtn">Withdraws</button>
						</div>
						<div class="depositdiv" id="depositdiv">
							<div class="savingsinput">
								<label>Deposit Amount :</label>
								<input type="number" id="deposit" name="depositamount" value="0">
							</div>
							<div class="savingsinput">
								<button type="button" id="calculate3">Confirm</button>
							</div>
							<div class="savingsinput">
								<label>Total Amount :</label>
								<input type="number" id="overallsavingss" name="overallsavingss" disabled>
								<input type="hidden" id="overallsavings" name="overallsavings">
								<!-- <input type="number" id="overallsavings" name="overallsavings"> -->

							</div>
						</div>
						<div class="depositdiv" id="withdrawsdiv">
							<div class="savingsinput">
								<label>Withdraw Amount :</label>
								<input type="number" id="withdraw1" name="withdrawamount" value="0">
								
							</div>
							<div class="savingsinput">
								<button type="button" id="calculate4" name="calculate4">Confirm</button>
							</div>
							<div class="savingsinput">
								<label>Total Amount :</label>
								<input type="number" id="overallsavings11" name="overallsavings11" disabled>
								<input type="hidden" id="overallsavings1" name="overallsavings1">
								<!-- <input type="number" id="overallsavings" name="overallsavings"> -->

							</div>
						</div>
					</div>
				</div>
				
				
				<div class="savebtn" id="depositsavebtn">
					<button type="submit" name="savedeposit" id="savedeposit" disabled>Save</button>
					<a href="savings.php" id="close" name="save"><label>Cancel</label></a>
				</div>
				<div class="savebtn" id="withdrawsavebtn">
					<button type="submit" name="savewithdraws" id="savewithdraws" disabled>Save</button>
					<a href="savings.php" id="close" name="save"><label>Cancel</label></a>
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
	// var calculate = document.getElementById("calculate");
	
	// 	calculate.onclick = function(){
	// 	var n5 = parseInt(document.getElementById("months").value);
	// 	var n1 = parseInt(document.getElementById("amount").value);	
	// 	var n7 = parseInt(document.getElementById("monthlypayment").value);
	// 	var n6 = parseInt(document.getElementById("interest").value);	
	// 	var interest = (n1 * (n6 * .01)) / n5;
	// 	var payment = ((n1/n5)+ interest).toFixed(2);
	// 	var payment = payment.toString().replace(/\B(?=(\d{3})+(?!\d))/g,"");
	// 	monthlypayment.value= payment;

	// 	var n5 = parseInt(document.getElementById("months").value);
	// 	var n7 = parseInt(document.getElementById("monthlypayment").value);
		
	// 	var total = n7*n5;
	// 	totalpayment.value = total;

	// 	ami.value = n5*n1+n6*2022;
	
	// }
	var calculate3 = document.getElementById("calculate3");
	var savedeposit = document.getElementById("savedeposit");
	
		calculate3.onclick = function(){
		var deposit = parseInt(document.getElementById("deposit").value);
		var totalsavings = parseInt(document.getElementById("totalsavings").value);	
		var total1 = totalsavings + deposit;
		overallsavings.value = total1;
		overallsavingss.value = total1;
		savedeposit.disabled = false;
	}
	var calculate4 = document.getElementById("calculate4");
	var savewithdraws = document.getElementById("savewithdraws");
		calculate4.onclick = function(){
		var withdraw1 = parseInt(document.getElementById("withdraw1").value);
		var totalsavings = parseInt(document.getElementById("totalsavings").value);	
		var total2 = totalsavings - withdraw1;
		overallsavings1.value = total2;
		overallsavings11.value = total2;
		savewithdraws.disabled = false;
	}

	
	var depositdiv = document.getElementById("depositdiv");
	var withdrawsdiv = document.getElementById("withdrawsdiv");
	var depositbtn = document.getElementById("depositbtn");
	var withdrawsbtn = document.getElementById("withdrawsbtn");
	var withdrawsavebtn = document.getElementById("withdrawsavebtn");
	var depositsavebtn = document.getElementById("depositsavebtn");

		withdrawsbtn.onclick = function(){
			depositdiv.style.display="none";
			withdrawsdiv.style.display="block";
			depositsavebtn.style.display="none";
			withdrawsavebtn.style.display="flex";
			withdrawsbtn.style ="background-color: #239cdf;";
			depositbtn.style ="background-color: #a3a3a3;";
		}
		depositbtn.onclick = function(){
			depositdiv.style.display="flex";
			withdrawsdiv.style.display="none";
			depositsavebtn.style.display="flex";
			withdrawsavebtn.style.display="none";
			depositbtn.style ="background-color: #239cdf;";
			withdrawsbtn.style ="background-color: #a3a3a3;";
		}

</script>
</html>
<style type="text/css">

.rightdiv, .leftdiv{
	filter:blur(5px);
	user-select: none;
	pointer-events: none;
	
}	
#label1{
	margin: auto;
	margin-right: 20px;
	font-size: 12px;
	font-weight: bold;
	color: gray;
}
.addform{
	display: flex;
	width: 900px;
	margin-bottom: 30px;

}
.addform form #withdrawsavebtn{
	display: none;
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
/*savings*/
.addform form #savings{
	/*border: 1px solid red;*/
	height: auto;
	display: flex;
	flex-direction: row;
	margin-top: 20px;
	gap: 10px;
}
.addform form #savings .totalsavings{
	width: 40%;
	height: 100%;
	/*border: 1px solid black;*/
	display: flex;
	flex-direction: column;
	margin: auto;
	margin-top: 0;
}
.addform form #savings .totalsavings .savingsdiv{
	margin: auto;

	display: flex;
	flex-direction: row;
	width: 90%;
	height: 100px;
	/*border: 1px solid lightgray;*/
	box-shadow: -1px 1px 3px lightgrey, 1px 1px 3px lightgrey;
}
.addform form #savings .totalsavings .savingsdiv .totalsavingsdiv{
	width: 70%;
	height: 100%;
	
	display: flex;
	flex-direction: column;
	/*border: 1px solid lightgray;*/
}
.addform form #savings .totalsavings .savingsdiv .totalsavingsicon{
	width: 30%;
	height: 100%;
	
	display: flex;
	flex-direction: column;
	/*border: 1px solid blue;*/
}
.addform form #savings .totalsavings .savingsdiv .totalsavingsicon img{
	margin: auto;
	filter: invert(32%) sepia(29%) saturate(1055%) hue-rotate(188deg) brightness(87%) contrast(96%);
}
.addform form #savings .totalsavings .savingsdiv .totalsavingsdiv .totalsavingsheader{
	width: 100%;
	height: 40%;
	/*border-bottom: 1px solid lightgray;*/
	display: flex;
}
.addform form #savings .totalsavings .savingsdiv .totalsavingsdiv .totalsavingsheader label{
	margin: auto;
	margin-left: 15px;
	font-weight: bold;
	color: #7d7f81;
}
.addform form #savings .totalsavings .savingsdiv .totalsavingsdiv .totalsavingsamount{
	width: 100%;
	height: 60%;
	display: flex;
}
.addform form #savings .totalsavings .savingsdiv .totalsavingsdiv .totalsavingsamount input{
	height: 20px;
	width: 80%;
}
.addform form #savings .totalsavings .savingsdiv .totalsavingsdiv .totalsavingsamount label{
	margin: auto;
	font-size: 25px;
	margin-left: 20px;
	margin-bottom: 5px;
	color: #394d8d;
}
.addform form #savings .inputsavings{
	width: 50%;
	margin: auto;
	margin-right: 0;
	height: 100%;
	display: flex;
	flex-direction: column;
	/*border: 1px solid blue;*/
}
.addform form #savings .inputsavings .inputsavingsbutton{
	width: 100%;
	height: 40px;
	/*border: 1px solid lightgray;*/
	/*margin-top: 10px;*/
	display: flex;
}
.addform form #savings .inputsavings .inputsavingsbutton button, .addform form #savings .inputsavings .savingsinput #calculate3, .addform form #savings .inputsavings .savingsinput #calculate4{
	/*background-color: #239cdf;*/
	width: 100px;
	height: 30px;
	margin: auto;
	margin-left: 10px;
	box-shadow: -1px 1px 3px lightgrey, 1px 1px 3px lightgrey;
	border: none;
	color: white ;
	cursor: pointer;
	margin-right: 0;

}
.addform form #savings .inputsavings .inputsavingsbutton #withdrawsbtn{
	/*color: #565353;*/
	background-color: #a3a3a3;
}

.addform form #savings .inputsavings .inputsavingsbutton #depositbtn{
/*	margin-left: 0;*/
	background-color: #239cdf;
}
.addform form #savings .inputsavings .savingsinput #calculate3, .addform form #savings .inputsavings .savingsinput #calculate4{
	margin-left: 10px;
	background-color: #239cdf;
}
.addform form #savings .inputsavings .savingsinput{
	width: 100%;
	height: auto;
	/*border: 1px solid lightgray;*/
	display: flex;
	flex-direction: column;
}
.addform form #savings .inputsavings .depositdiv{
	width: 100%;
	height: auto;
	display: flex;
	flex-direction: column;
/*	background-color: lightgray;*/
}


.addform form #savings .inputsavings .depositdiv .savingsinput label{
	margin: auto;
	margin-left: 10px;
	margin-top: 10px;
	margin-bottom: 10px;
	font-weight: bold;
}
.addform form #savings .inputsavings .depositdiv .savingsinput input{
	margin: auto;
	margin-left: 10px;
	margin-top: 0px;
	margin-bottom: 10px;
	height: 40px;
	width: 60%;
	padding: 10px;
	border-radius: 4px;
	border: 1px solid lightgray;
	font-weight: bold;
}
.addform form #savings .inputsavings .depositdiv .savingsinput input:focus{
	outline-color: #79d2f6;
}
.addform form #savings .inputsavings #withdrawsdiv{
	display: none;
}
@media screen and (max-width: 720px){


.addform form .forminput .input #plans{
	width: 95%;

}
.addform{
display: flex;
width: 96%;
margin-bottom: 10%;
/*height: 550px;
overflow: hidden;*/

}
.addform form{
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
.addform form #savings{
	
	flex-direction: column;
	
}
.addform form #savings .totalsavings, .addform form #savings .totalsavings .savingsdiv{
	/*border: 1px solid black;*/
	width: 100%;
}
.addform form #savings .inputsavings{
	width: 100%;
	margin-top: 10px;
}
.addform form #savings .inputsavings .depositdiv .savingsinput input{
	height: 40px;
	width: 90%;

}
#label1{
	display: none;
}
	
</style>