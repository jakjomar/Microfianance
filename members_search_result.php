<?php 

include 'config.php';
error_reporting(0);

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
		
		$check_email = mysqli_num_rows(mysqli_query($conn, "SELECT email FROM member WHERE email='$email'"));

		if ($check_email > 0) {
				echo "<script>alert('email already exist');</script>";
		} else{
			$sql = "INSERT INTO member (lastname, firstname, middlename, email, password, age, gender, province, municipality, barangay, dateofbirth, contact) VALUES ('$lastname','$firstname','$middlename', '$email', '$password', '$age', '$gender', '$province', '$municipality', '$barangay', '$dateofbirth', '$contact')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Add successfully');</script>";
				echo "<script>window.location.href = './admin_home.php'</script>";
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
        
        $search = $_GET['search'];

         $sql = "SELECT * FROM member where lastname LIKE '%$search%' || firstname LIKE '%$search%' || middlename LIKE '%$search%' || id LIKE '%$search%' ||  gender LIKE '%$search%' ||  barangay LIKE '%$search%' ||  municipality LIKE '%$search%' ||  province LIKE '%$search%' order by id";
                $result = $conn->query($sql) or die ($conn->error);
                $row = $result->fetch_assoc();








 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="window=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
	
	<link rel="icon" href="asset/image/logo1.jpeg" type="image/jpg" size="16x16"/>

</head>
<body>
	<!-- formobile -->
	<div class="leftdiv1" id="leftdiv1">
		
			<img id="backbtn" src="asset/icons/icons8-menu-24.PNG" width="30" height="30">
		
		<div class="logo1">
		</div>
		<div class="btn1" id="btn1">
			<a href="members.php" style="background-color: #dfdfdf;">
					<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27">
					<label>Members</label>
			</a>
			<a href="loans.php">
					<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27">
					<label>Loans</label>
			</a>
			<a href="loan_plans.php">
					<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27">
					<label>Loan Plans</label>
			</a>
			<a href="Loan_types.php">
					<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27">
					<label>Loan Types</label>
			</a>
			<a href="loan_payment.php">
					<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27">
					<label>Loan Payment</label>
			</a>
		</div>
	</div>
	<!-- for desktop -->
	<div class="leftdiv" id="leftdiv">
		<div class="logo">
		</div>
		<div class="btn" id="btn">
			<a href="members.php" style="background-color: #dfdfdf;">
					<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27">
					<label>Members</label>
			</a>
			<a href="loans.php">
					<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27">
					<label>Loans</label>
			</a>
			<a href="loan_plans.php">
					<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27">
					<label>Loan Plans</label>
			</a>
			<a href="loan_types.php">
					<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27">
					<label>Loan Types</label>
			</a>
			<a href="loan_payment.php">
					<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27">
					<label>Loan Payment</label>
			</a>
		</div>
	</div>
	<!-- content -->
	<div class="rightdiv" id="rightdiv">

		<div class="header">
			<img id="menu" src="asset/icons/icons8-menu-24.PNG" width="30" height="30">
		</div>
		<div class="header1">
			<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27">
			<label>Members</label>
		</div>
		<div class="search-add">
			<form method="GET" action="members_search_result.php" autocomplete="off">
				<input type="text" name="search" required>
				<button type="submit">Search</button>
			</form>
			<button id="add">New Member</button>
		</div>
		<div class="table">
			<div class="tableheader">
				<div class="tablename" id="tablename" style="width: 50%;" >
					<label>User ID</label>
				</div>
				<div class="tablename">
					<label>Fullname</label>
				</div>
				<div class="tablename" id="hide">
					<label>Gender</label>
				</div>
				<div class="tablename" id="hide">
					<label>Address</label>
				</div>
				<div class="tablename">
					<label>Contact</label>
				</div>

			</div>
			 <?php do{ ?>
			<div class="list">
				<a href="id=<?php echo $row['id'];?>">
					<div class="tablename" id="tablename" style="width: 50%;">
						<label><?php echo $row['id']; ?></label>
					</div>
					<div class="tablename">
						<label><?php echo $row['lastname']; ?> <?php echo $row['firstname']; ?> <?php echo $row['middlename']; ?></label>
					</div>
					<div class="tablename" id="hide">
						<label><?php echo $row['gender']; ?></label>
					</div>
					<div class="tablename" id="hide">
						<label><?php echo $row['barangay']; ?>, <?php echo $row['municipality']; ?> <?php echo $row['province']; ?></label>
					</div>
					<div class="tablename">
						<label><?php echo $row['contact']; ?></label>
					</div>
				</a>
			</div>
			<?php }while ($row = $result->fetch_assoc()) ?>
		</div>
	</div>
	<!-- addmember -->
		<div class="addform" id="addform">
			<div class="close">
				<label>Add Member</label>
			</div>
			<form  method="POST" action="" autocomplete="off">
				<div class="forminput">
					<div class="input">
						<label>Last Name :</label>
						<input type="text" name="lastname" required>
					</div>
					<div class="input">
						<label>First Name :</label>
						<input type="text" name="firstname" required>
					</div>
					<div class="input">
						<label>Midle Name :</label>
						<input type="text" name="middlename" required>
					</div>
				</div>
				<div class="forminput">
					<div class="input">
						<label>Date of Birth :</label>
						<input type="date" name="dateofbirth" required>
					</div>
					<div class="input">
						<label>Age :</label>
						<input type="number" name="age" required>
					</div>
					<div class="input">
						<label>Gender :</label>
						<select type="text" name="gender" required>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
				</div>
				<div class="forminput">
					<div class="input">
						<label>Provice :</label>
						<input type="text" name="province" required>
					</div>
					<div class="input">
						<label>Municipality :</label>
						<input type="text" name="municipality" required>
					</div>
					<div class="input">
						<label>Barangay :</label>
						<input type="text" name="barangay" required>
					</div>
				</div>
				<div class="forminput">
					<div class="input">
						<label>Email :</label>
						<input type="text" name="email" required>
					</div>
					<div class="input">
						<label>Contact Number :</label>
						<input type="number" name="contact" required>
					</div>
					
				</div>
				<div class="savebtn">
					<button type="submit" name="save">Save</button>
					<button type="button" id="close" name="save">Cancel</button>
				</div>


			</form>
		</div>

</body>
<script src="script.js"></script>

</html>
