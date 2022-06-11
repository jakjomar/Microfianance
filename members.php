<?php 
require('./session.php');
include 'config.php';
require('./position_restriction.php');
error_reporting(0);

if($_SESSION['position'] == 'Finance Manager'){
	echo "<script>window.location.href = './savings.php'</script>";
}else{

}
if($_SESSION['position'] == 'Loan Officer'){
	echo "<script>window.location.href = './dashboard.php'</script>";
}else{
	
}

if (isset($_POST["save"])){

	$dateofbirth = mysqli_real_escape_string($conn, $_POST["age"]);
	if(($dateofbirth) < 18){
		echo "<script>alert('Your are not applicable to create an account')</script>";

	}
	else {
	if(($dateofbirth) >= 18){
		$email = mysqli_real_escape_string($conn, $_POST["email"]);
		if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
			echo "<script>alert('Invalid Email')</script>";
			// echo "<script>window.location.href = './admin_home.php'</script>";
		}
		else{
			
		
		$lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
		$firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
		$middlename = mysqli_real_escape_string($conn, $_POST["middlename"]);
		$age = mysqli_real_escape_string($conn, $_POST["age"]);
		$gender = mysqli_real_escape_string($conn, $_POST["gender"]);
		$dateofbirth = mysqli_real_escape_string($conn, $_POST["dateofbirth"]);
		$province = mysqli_real_escape_string($conn, $_POST["province"]);
		$municipality = mysqli_real_escape_string($conn, $_POST["municipality"]);
		$barangay = mysqli_real_escape_string($conn, $_POST["barangay"]);
		$email = mysqli_real_escape_string($conn, $_POST["email"]);
		$contact = mysqli_real_escape_string($conn, $_POST["contact"]);
		$savings = "0";
		$check_email = mysqli_num_rows(mysqli_query($conn, "SELECT email FROM member WHERE email='$email'"));

		if ($check_email > 0) {
				echo "<script>alert('email already exist');</script>";
		} else{
			$sql = "INSERT INTO member (lastname, firstname, middlename, email, password, age, gender, province, municipality, barangay, dateofbirth, contact, savings) VALUES ('$lastname','$firstname','$middlename', '$email', '$password', '$age', '$gender', '$province', '$municipality', '$barangay', '$dateofbirth', '$contact', '$savings')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Add successfully');</script>";
				echo "<script>window.location.href = './members.php'</script>";
			}else{
				echo "<script>alert('Failed');</script>";
			}
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
        
        $sql = "SELECT * FROM member order by lastname asc";
        $result = $conn->query($sql) or die ($conn->error);
        $row = $result->fetch_assoc();


      if (isset($_GET["search"])){  

        $search = $_GET['search'];
         $check_record = "SELECT * FROM member where lastname LIKE '$search' || firstname LIKE '$search' || middlename LIKE '$search' || id LIKE '$search' ||  gender LIKE '$search' ||  barangay LIKE '$search' ||  municipality LIKE '$search' ||  province LIKE '$search'  order by lastname asc";
    $sqlvalidate = mysqli_query($conn, $check_record);

    if (mysqli_num_rows($sqlvalidate) == 0){
    	echo "<script>alert('No existing data');</script>";
    	echo "<script>window.location.href = './Members.php'</script>";
    }else{
        $search = $_GET['search'];

         $sql = "SELECT * FROM member where lastname LIKE '$search' || firstname LIKE '$search' || middlename LIKE '$search' || id LIKE '$search' ||  gender LIKE '$search' ||  barangay LIKE '$search' ||  municipality LIKE '$search' ||  province LIKE '$search' order by lastname";
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
	<script src="generateage.js"></script>
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
			<a href="members.php" style="background-color: #239cdf;">
					<img id="menuimg" src="asset/icons/1989232.PNG" width="25" height="25">
					<label>Members</label>
			</a>
			<a href="loans.php">
					<img id="menuimg" src="asset/icons/2043684.PNG" width="25" height="25">
					<label>Add Loans</label>
			</a>
			<a href="loan_plans.php">
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
			<a href="savings.php">
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

			<a href="administrator.php">
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
			<a href="members.php" style="background-color: #239cdf;">
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
			<a href="savings.php">
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
			<a href="administrator.php">
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
			<!-- <img id="menuimg" src="asset/icons/1989232.PNG" width="27" height="27"> -->
			<label>Members</label>
		</div>
		<div class="tablebody">
		<div class="search-add" id="search-add-refreshbtn">
			<div class="refresh-add" id="refresh-add">
			<form method="GET" action="members.php" autocomplete="off">
				<input type="text" name="search" value="<?php echo $_GET['search'];?>" required>
				<button type="submit"><!-- <i><img id="menuimg" src="asset/icons/574166.PNG" width="23" height="23"></i> -->Search</button>
			</form>
			</div>
			<div class="" id="refresh-add">
				<a href="members.php" id="refresh"><!-- <img id="menuimg" src="asset/icons/574166.PNG" width="23" height="23"> -->
				<label>Refresh List</label></a>
				<button id="add">New Member</button>
			<form method="GET" action="./export.php" id="export">
				<input type="hidden" name="search_export" id="search" value="<?php echo $_GET['search'];?>">
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
							$members = "SELECT * FROM member where lastname LIKE '$search' || firstname LIKE '$search' || middlename LIKE '$search' || id LIKE '$search' ||  gender LIKE '$search' ||  barangay LIKE '$search' ||  municipality LIKE '$search' ||  province LIKE '$search'";
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
		<div class="table" id="data">
			<div class="tableheader">
				<div class="tablename" id="tablename" style="width: 50%;" >
					<label>User ID</label>
				</div>
				<div class="tablename">
					<label>Fullname</label>
				</div>
				<div class="tablename" id="" style="width: 50%;">
					<label>Gender</label>
				</div>
				<div class="tablename" id="">
					<label>Address</label>
				</div>
				<div class="tablename" style="width: 50%;">
					<label>Contact</label>
				</div>

			</div>
			 <?php do{ ?>
			<div class="list">
				<a href="members_profile.php?id=<?php echo $row['id'];?>">
					<div class="tablename" id="tablename" style="width: 50%;">
						<label><?php echo $row['id']; ?></label>
					</div>
					<div class="tablename">
						<label><?php echo $row['lastname']; ?>, <?php echo $row['firstname']; ?> <?php echo $row['middlename']; ?></label>
					</div>
					<div class="tablename" id="" style="width: 50%;">
						<label><?php echo $row['gender']; ?></label>
					</div>
					<div class="tablename" id="">
						<label><?php echo $row['barangay']; ?>, <?php echo $row['municipality']; ?> <?php echo $row['province']; ?></label>
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

	<!-- addmember -->
		<div class="addform" id="addform">
			<div class="close">
				<label>Add Member</label>
				<a href="members.php" id="x" style="margin: auto; margin-right: 0px;">
					<img id="" src="asset/icons/352270.PNG" width="24" height="24">
				</a>
			</div>
			<form  method="POST" action="" autocomplete="off">
				<script src="generateage.js"></script>
				<script>
					function lettersonly(input){
						var regex = /[^a-zA-Z .]/gi;
						
						input.value = input.value.replace(regex,"");
					}
				</script>
				<div class="forminput">
					<div class="input">
						<label>Last Name :</label>
						<input type="text" name="lastname" value="<?php echo $_POST['lastname']; ?>" onkeyup="lettersonly(this)" required>
					</div>
					<div class="input">
						<label>First Name :</label>
						<input type="text" name="firstname" value="<?php echo $_POST['firstname']; ?>" onkeyup="lettersonly(this)" required>
					</div>
					<div class="input">
						<label>Midle Name :</label>
						<input type="text" name="middlename" value="<?php echo $_POST['middlename']; ?>" onkeyup="lettersonly(this)" required>
					</div>
				</div>
				<div class="forminput">
					<div class="input">
						<label>Date of Birth :</label>
						<input type="date" name="dateofbirth" id="txtbirthdate" value="dateofbirth" onkeyup="getAgeVal(0)" onblur="getAgeVal(0);" required>
					</div>
					<div class="input">
						<label>Age :</label>
						<input type="text" name="age" id="txtage" value="<?php echo $_POST['age']; ?>" required>

					</div>
					<div class="input">
						<label>Gender :</label>
						<select type="text" name="gender" value="<?php echo $_POST['gender']; ?>" onkeyup="lettersonly(this)" required>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
				</div>
				<div class="forminput">
					<div class="input">
						<label>Province :</label>
						<input type="text" name="province" value="<?php echo $_POST['province']; ?>" onkeyup="lettersonly(this)" required>
					</div>
					<div class="input">
						<label>Municipality :</label>
						<input type="text" name="municipality" value="<?php echo $_POST['municipality']; ?>" onkeyup="lettersonly(this)" required>
					</div>
					<div class="input">
						<label>Barangay :</label>
						<input type="text" name="barangay" value="<?php echo $_POST['barangay']; ?>"  required>
					</div>
				</div>
				<div class="forminput">
					<div class="input">

						<label>Email :</label>
						<input type="text" name="email" value="<?php echo $_POST['email']; ?>" style="text-transform: none;" required>
					</div>
					<div class="input">
						<label>Contact Number :</label>

						<input name="contact" value="<?php echo $_POST['contact']; ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="11" required>
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
<!-- <script>
	function html_to_excel(type)
	{
		var data = document.getElementById('data');

		var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});

		XLSX.write(file, { booktype: type, bookSST: true, type: 'base64'});

		XLSX.writeFile(file, 'file.' + type);
	}

		const export_button = document.getElementById('export_button');
		export_button.addEventListener('click', () => {
			html_to_excel('xlsx');
		})


</script> -->
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
#label1{
	margin: auto;
	margin-right: 20px;
	font-size: 12px;
	font-weight: bold;
	color: gray;
}
@media screen and (max-width: 720px){
	#label1{
		display: none;
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
}
.table{
	margin: auto;
	margin-top: 0;
	display: flex;
	width: 900px;
	/*border: 1px solid blue;*/
	

}
}
</style>
