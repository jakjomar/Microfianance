<?php 
require('./session.php');
include 'config.php';
error_reporting(0);

if($_SESSION['position'] == 'Loan Officer'){
	echo "<script>window.location.href = './dashboard.php'</script>";
}else{

}

if($_SESSION['position'] == 'Finance Manager'){
	echo "<script>window.location.href = './savings.php'</script>";
}else{

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

    	if(isset($_GET['id'])){
			$id = $_GET['id'];
			$admin = "1014";
			if($id == $admin){
				echo "<script>alert('Unable to delete');</script>";
				echo "<script>window.location.href = './administrator.php'</script>";
			}else{
			
			$sql = "DELETE FROM admin WHERE id = '$id'";
			$update = mysqli_query($conn, $sql);

			if ($update) {
			
			echo "<script>window.location.href = './administrator.php'</script>";
		}else{
			echo "<script>alert('Failed');</script>";
		}
	}

}
        $id = $_GET['id'];
        
        $sql = "SELECT * FROM admin order by id";
        $result = $conn->query($sql) or die ($conn->error);
        $row = $result->fetch_assoc();

		if (isset($_POST["save"])){

		
		$email = mysqli_real_escape_string($conn, $_POST["email"]);
		if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
			echo "<script>alert('Invalid Email')</script>";
			// echo "<script>window.location.href = './admin_home.php'</script>";
		}
		else{

		$email = mysqli_real_escape_string($conn, $_POST["email"]);
		$check_email = mysqli_num_rows(mysqli_query($conn, "SELECT email FROM admin WHERE email='$email'"));

		if ($check_email > 0) {
				echo "<script>alert('email already exist');</script>";
		} else{
			$password = mysqli_real_escape_string($conn, md5($_POST["password"]));
			$cpassword = mysqli_real_escape_string($conn, md5($_POST["cpassword"]));
		if($password !== $cpassword){
			echo "<script>alert('Password Not Match')</script>";
		}else{
		$lname = mysqli_real_escape_string($conn, $_POST["lname"]);
		$fname = mysqli_real_escape_string($conn, $_POST["fname"]);
		$mname = mysqli_real_escape_string($conn, $_POST["mname"]);
		$password = mysqli_real_escape_string($conn, md5($_POST["password"]));
		$position = mysqli_real_escape_string($conn, $_POST["position"]);
		$email = mysqli_real_escape_string($conn, $_POST["email"]);
			$sql = "INSERT INTO admin (lname, fname, mname, email, password, position) VALUES ('$lname','$fname','$mname', '$email', '$password', '$position')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Add successfully');</script>";
				echo "<script>window.location.href = './administrator.php'</script>";
			}else{
				echo "<script>alert('Failed');</script>";
			}
		} 
	}
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
			<a href="dashboard.php">
					<img id="menuimg" src="asset/icons/4136060.PNG" width="25" height="25">
					<label>Dashboard</label>
			</a>
			<a href="members.php" >
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
			<a href="administrator.php" style="background-color: #239cdf;">
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
			<a href="members.php">
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
			<a href="loan_plans.php">
					<img id="menuimg" src="asset/icons/4779371.PNG" width="25" height="25">
					<label>Loan Plans</label>
			</a>
			<a href="loan_types.php">
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
			<a href="administrator.php" style="background-color: #239cdf;">
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
			<!-- <img id="menuimg" src="asset/icons/4556485.PNG" width="27" height="27"> -->
			<label>Administrator</label>
		</div>
		<div class="discription">

			<div class="descriptions">
				<label>NOTE !!!</label>
				<br>
				<label>Administor : The one who manages the System.</label>
				<br>
				<label>Loan Officer : Works at financial institutions and assist clients with loan application.</label>
				<br>
				<label>Finance Manager : Perform data analysis and advise senior managers on profit-maximizing ideas.</label>
				</div>


		</div>
		<div class="tablebody">

		<div class="search-add">
			
			<button id="add">New Staf</button>
			<?php 
						$host =  "localhost";
				        $username ="root";
				        $password ="";
				        $db = "microfinance1";

				        $conn =  new mysqli($host, $username, $password, $db);

				        if($conn->connect_error){
				            echo $conn->connect_error;

				        }
				        	 
							$members = "SELECT * FROM admin";
							$members_run = mysqli_query($conn, $members);

							if($total = mysqli_num_rows($members_run))
							{
								echo '<label id="label1">Result : '.$total.'</label>';
							}else{
								echo '<label id="label1">Result : 0</label>';
							}
						 

					?>
		</div>

		<div class="tablebody1" id="tablebody11">
			
		<div class="table">
			<div class="tableheader">
				
				<div class="tablename" style="width: 70%;">
					<label>Name</label>
				</div>
				<div class="tablename" style="width: 70%;">
					<label>Email</label>
				</div>
				<div class="tablename" style="width: 70%;">
					<label>Position</label>
				</div>
			
				<div class="tablename" id="tablename" style="width: 30%;" >
					<label>Action</label>
				</div>

			</div>
			 <?php do{ ?>
			<div class="list">
					<div class="tablename" id="tablename" style="width: 70%;">		
						<label id=""><?php echo $row['lname']; ?>, <?php echo $row['fname']; ?> <?php echo $row['mname']; ?>	</label>
					</div>
					<div class="tablename" id="tablename" style="width: 70%;">		
						<label id=""  style="text-transform: none;"><?php echo $row['email']; ?></label>
					</div>
					<div class="tablename" id="tablename" style="width: 70%;">		
						<label id=""><?php echo $row['position']; ?></label>
					</div>
					<div class="tablename" id="tablename" style="width: 30%; border-right: none;">
						<form>
           					<!-- <a href="loan_types_edit.php ?types=<?php echo $row['types'];?>"><img src="asset/icons/7628917.PNG" width="30" height="25"></a> -->
           					<a  href="administrator.php ?id=<?php echo $row['id'];?>" name="delete">
           						<img src="asset/icons/7247454.PNG" width="30" height="20">
           					</a>
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
			<div class="close" style="margin-bottom: 0;">
				<label>Add Staf</label>
				<a href="administrator.php" id="x" style="margin: auto; margin-right: 0px;">
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
						<label>Last Name :</label>
						<input type="text" name="lname" value="<?php echo $_POST['lname']; ?>" onkeyup="lettersonly(this)" required></input>
					</div>
					<div class="input">
						<label>First Name :</label>
						<input type="text" name="fname" value="<?php echo $_POST['fname']; ?>" onkeyup="lettersonly(this)" required></input>
					</div>
					<div class="input">
						<label>Middle Name :</label>
						<input type="text" name="mname" value="<?php echo $_POST['mname']; ?>" onkeyup="lettersonly(this)" required></input>
					</div>
					<div class="input">
						<label>Email :</label>
						<input type="text" name="email" value="<?php echo $_POST['email']; ?>"  style="text-transform: none;" required></input>
					</div>
					<div class="input">
						<label>Position :</label>
						<select name="position" value="<?php echo $_POST['position']; ?>" required>
							<option value="<?php echo $_POST['position']; ?>"><?php echo $_POST['position']; ?></option>
							<option value="Administrator">Administrator</option>
							<option value="Loan Officer">Loan Officer</option>
							<option value="Finance Manager">Finance Manager</option>
						</select>
					</div>
					<div class="input">
						<label>Password :</label>
						<input type="password" name="password" value="<?php echo $_POST['password']; ?>" required></input>
					</div>
					<div class="input">
						<label>Confirm Password :</label>
						<input type="password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required></input>
					</div>
				</div>
				<div class="savebtn">
					<button type="submit" name="save">Save</button>
					<button type="button" id="close" name="save">Cancel</button>
				</div>


			</form>
		</div>
	</div>
		<!-- edit -->
		

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
	#label1{
	margin: auto;
	margin-right: 20px;
	font-size: 12px;
	font-weight: bold;
	color: gray;
}
	.addform{
		width: 30%;
	}
	.addform .forminput{
		gap: 0px;
	}
	.addform form{
		/*border: 1px solid red;*/
	}
	.addform form .forminput .input{
		/*border: 1px solid red;*/
	}
	.addform form .forminput .input label{
		margin-left: 15px;
	}
	.addform form .forminput .input input, .addform form .forminput .input select{
		margin: auto;
		margin-left: 15px;
		text-transform: capitalize;
	}
	
	.table{
		width: 100%;
		
	}
	.tablebody1{
		overflow-y: hidden;
	}
	.list .tablename{
		border-right: 1px solid lightgray;
		border-bottom: none;
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
		border-right: 1px solid lightgray;
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
		gap: 20px;
		/*border: 1px solid red;*/

		
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
		width: 600px;
	}
	.tablebody1{
		overflow-x: hidden;
		overflow-x: scroll;
	}
	#label1{
		display: none;
	}
	}
</style>
