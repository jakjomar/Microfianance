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
    $_SESSION["age"] = $row['age'];
    $_SESSION["savings"] = $row['savings'];
      
    if (isset($_POST["update"])){


		$id = $_GET['id'];
		
		$lastname = $_POST["lastname"];
		$firstname = $_POST["firstname"];
		$middlename = $_POST["middlename"];
		$age = $_POST["age"];
		$gender = $_POST["gender"];
		$dateofbirth = $_POST["dateofbirth"];
		$province = $_POST["province"];
		$municipality = $_POST["municipality"];
		$barangay = $_POST["barangay"];
		$email = $_POST["email"];
		$contact = $_POST["contact"];
		
		// $check_types = mysqli_num_rows(mysqli_query($conn, "SELECT types FROM loantypes WHERE types ='$types'"));

		// if ($check_types > 0) {
		// 		echo "<script>alert('Loan Type already exist');</script>";
				
		// } else{

			$sql = "UPDATE member SET firstname = '$firstname', lastname = '$lastname', middlename = '$middlename', dateofbirth = '$dateofbirth', age = '$age', gender = '$gender', province = '$province', municipality = '$municipality', barangay = '$barangay', email = '$email', contact = '$contact' WHERE id = '$id'";
			$update = mysqli_query($conn, $sql);
			if($update){
				echo "<script>alert('Update successfully');</script>";
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
			}else{
				echo "<script>alert('Failed');</script>";
			}
		}

		 if (isset($_POST["update1"])){


	$userid = $_GET['id'];
 	$file_name = $_FILES['file']['name'];
 	$check_id = mysqli_num_rows(mysqli_query($conn, "SELECT userid FROM profile WHERE userid ='$userid'"));
 	if ($check_id > 0) {
				echo "<script>alert('Profile already exists');</script>";
				
		}else{
	 $check_img = mysqli_num_rows(mysqli_query($conn, "SELECT image FROM profile WHERE image ='$file_name'"));
 	if ($check_img > 0) {
				echo "<script>alert('Image already exists');</script>";
				
		} else{
	$file_name = $_FILES['file']['name'];
	$file_destination = "PROFILE/".$file_name;
	$target_dir = "PROFILE/";
	$target_file = $target_dir . basename($_FILES["file"]["name"]);
 	
 	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 	$temp_name = $_FILES['file']['tmp_name'];
 	$file_size = $_FILES['file']['size'];

		 	
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
		 
		}else{

 	$sql = "INSERT INTO profile (image, userid) VALUES ('$file_name', '$userid')";
 	$result = mysqli_query($conn, $sql);
 	if($result){
 		(move_uploaded_file($temp_name, $file_destination));
 		echo "<script>alert('The file ". htmlspecialchars( basename($_FILES['file']['name'])). " has been uploaded.')</script>";
 		// echo "<script>alert('Upload Successfully');</script>";
 		 // echo "<script>window.location.href = './videos.php'</script>";
 	}
 	else{
 		echo "<script>alert('Something went wrong?');</script>";
 		echo "<script>alert('Please check your file name.');</script>";

 			}
 		}
	}
}

}	

 if (isset($_POST["update2"])){


	$userid = $_GET['id'];
 	$file_name = $_FILES['file']['name'];
 	$check_existingid = mysqli_num_rows(mysqli_query($conn, "SELECT userid FROM profile WHERE userid ='$userid'"));
 	if ($check_existingid < 1) {
				echo "<script>alert('Please add picture first!');</script>";
				
		}else{


	$check_img = mysqli_num_rows(mysqli_query($conn, "SELECT image FROM profile WHERE image ='$file_name'"));
 	if ($check_img > 0) {
				echo "<script>alert('Image already exists');</script>";
				
		} else{
	$file_name = $_FILES['file']['name'];
	$file_destination = "PROFILE/".$file_name;
	$target_dir = "PROFILE/";
	$target_file = $target_dir . basename($_FILES["file"]["name"]);
 	
 	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 	$temp_name = $_FILES['file']['tmp_name'];
 	$file_size = $_FILES['file']['size'];

		 	
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
		 
		}else{
	$userid = $_GET['id'];
	$get_img = mysqli_num_rows(mysqli_query($conn, "SELECT image FROM profile WHERE userid = '$userid'"));
	
	$existing_img ="PROFILE/".$get_img;
	if($get_img == $existing_img){

		unlink($existing_img);
	
	}


 	$sql = "UPDATE profile SET image = '$file_name' WHERE userid = '$userid'";
 	$result = mysqli_query($conn, $sql);
 	if($result){
 		(move_uploaded_file($temp_name, $file_destination));
 		echo "<script>alert('The file ". htmlspecialchars( basename($_FILES['file']['name'])). " has been uploaded.')</script>";
 		// echo "<script>alert('Upload Successfully');</script>";
 		 // echo "<script>window.location.href = './videos.php'</script>";
 	}
 	else{
 		echo "<script>alert('Something went wrong?');</script>";
 		echo "<script>alert('Please check your file name.');</script>";

 			}
 		}
	}
}

}		

		 if (isset($_POST["update3"])){


	$userid = $_GET['id'];
 	$file_name = $_FILES['file']['name'];
 	$check_id = mysqli_num_rows(mysqli_query($conn, "SELECT userid FROM credentials WHERE userid ='$userid'"));
 	if ($check_id > 0) {
				echo "<script>alert('Profile already exists');</script>";
				
		}else{
	 $check_img = mysqli_num_rows(mysqli_query($conn, "SELECT image FROM credentials WHERE image ='$file_name'"));
 	if ($check_img > 0) {
				echo "<script>alert('Image already exists');</script>";
				
		} else{
	$file_name = $_FILES['file']['name'];
	$file_destination = "CREDENTIALS/".$file_name;
	$target_dir = "CREDENTIALS/";
	$target_file = $target_dir . basename($_FILES["file"]["name"]);
 	
 	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 	$temp_name = $_FILES['file']['tmp_name'];
 	$file_size = $_FILES['file']['size'];

		 	
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
		 
		}else{

 	$sql = "INSERT INTO credentials (image, userid) VALUES ('$file_name', '$userid')";
 	$result = mysqli_query($conn, $sql);
 	if($result){
 		(move_uploaded_file($temp_name, $file_destination));
 		echo "<script>alert('The file ". htmlspecialchars( basename($_FILES['file']['name'])). " has been uploaded.')</script>";
 		// echo "<script>alert('Upload Successfully');</script>";
 		 // echo "<script>window.location.href = './videos.php'</script>";
 	}
 	else{
 		echo "<script>alert('Something went wrong?');</script>";
 		echo "<script>alert('Please check your file name.');</script>";

 			}
 		}
	}
}

}

if (isset($_POST["update4"])){


	$userid = $_GET['id'];
 	$file_name = $_FILES['file']['name'];
 	$check_existingid = mysqli_num_rows(mysqli_query($conn, "SELECT userid FROM credentials WHERE userid ='$userid'"));
 	if ($check_existingid < 1) {
				echo "<script>alert('Please add your credentials first!');</script>";
				
		}else{


	$check_img = mysqli_num_rows(mysqli_query($conn, "SELECT image FROM credentials WHERE image ='$file_name'"));
 	if ($check_img > 0) {
				echo "<script>alert('Image already exists');</script>";
				
		} else{
	$file_name = $_FILES['file']['name'];
	$file_destination = "CREDENTIALS/".$file_name;
	$target_dir = "CREDENTIALS/";
	$target_file = $target_dir . basename($_FILES["file"]["name"]);
 	
 	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 	$temp_name = $_FILES['file']['tmp_name'];
 	$file_size = $_FILES['file']['size'];

		 	
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
		 
		}else{
	$userid = $_GET['id'];
	$get_img = mysqli_num_rows(mysqli_query($conn, "SELECT image FROM credentials WHERE userid = '$userid'"));
	
	$existing_img ="CREDENTIALS/".$get_img;
	if($get_img == $existing_img){

		unlink($existing_img);
	
	}


 	$sql = "UPDATE credentials SET image = '$file_name' WHERE userid = '$userid'";
 	$result = mysqli_query($conn, $sql);
 	if($result){
 		(move_uploaded_file($temp_name, $file_destination));
 		echo "<script>alert('The file ". htmlspecialchars( basename($_FILES['file']['name'])). " has been uploaded.')</script>";
 		// echo "<script>alert('Upload Successfully');</script>";
 		 // echo "<script>window.location.href = './videos.php'</script>";
 	}
 	else{
 		echo "<script>alert('Something went wrong?');</script>";
 		echo "<script>alert('Please check your file name.');</script>";

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
			<a href="members.php" style="background-color: #239cdf;">
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
					<label id="adminlabel1">Administrator </label>
						
				</div>
				</div>
			</div>
		</div>
		<div class="header1">
			<!-- <img id="menuimg" src="asset/icons/1989232.PNG" width="27" height="27"> -->
			<label>Profile</label>
		</div>
		<div class="search-add" id="search-add-refreshbtn">
			
			<div class=""  id="refresh-add">
				<a href="members.php" id="refresh">
<!-- 					<img id="menuimg" src="asset/icons/1989232.PNG" width="23" height="23"> -->
					<label>Member List<label>
				</a>
					
			</div>
		</div>
		<div class="search-add" id="search-add-refreshbtn">

			<div class=""  id="refresh-add">
				<a id="viewprofile">
					<!-- <img id="menuimg" src="asset/icons/1989232.PNG" width="23" height="23"> -->
					<label>Profile<label>
				</a>
				<a id="displaysavings">
					<!-- <img id="menuimg" src="asset/icons/1989232.PNG" width="23" height="23"> -->
					<label>Savings<label>
				</a>
				<a id="displayloan">
					<!-- <img id="menuimg" src="asset/icons/1989232.PNG" width="23" height="23"> -->
					<label>Loans<label>
				</a>
				<a href="personal_info.php?id=<?php echo $row['id'];?>" target="_blank" id="printpersonalinfo">
					<!-- <img id="menuimg" src="asset/icons/1989232.PNG" width="23" height="23"> -->
					<label>Print<label>
				</a>	
			</div>
		</div>
		<div class="profile" id="profile">
			<div class="info" id="editbtn">
				<button id="edit">Edit</button>
				<button id="update">Edit Picture</button>
				<!-- <button id="update2">Update Picture</button> -->
				<button id="update3">Edit Credentials</button>
			</div>
			<div class="info" style=" flex-direction: ;">
				<div class="info1" id="infoimg" style="width: ; margin-right: 10px;">
					<label style="margin-left: 0;">Profile :</label>
					<?php
						include_once("connection.php");
			        $conn = connection();

					$id = $_GET['id'];
				  	$sql = "SELECT * FROM profile WHERE userid = '$id'";
				  	
				    $result = $conn->query($sql) or die ($conn->error);
				    $row = $result->fetch_assoc();

				    $_SESSION['image'] = $row['image'];

					?>
					<a target="_blank" href="./PROFILE/<?php echo $_SESSION['image'];?>">
						<img src="./PROFILE/<?php echo $_SESSION['image'];?>">
					</a>
				</div>
				<div class="info1" id="infoimg" style="width: ;">
					<label style="margin-left: 0;">Credentials :</label>
					<?php
						include_once("connection.php");
			        $conn = connection();

					$id = $_GET['id'];
				  	$sql = "SELECT * FROM credentials WHERE userid = '$id'";
				  	
				    $result = $conn->query($sql) or die ($conn->error);
				    $row = $result->fetch_assoc();

				    $_SESSION['image'] = $row['image'];

					?>
					<a target="_blank" href="./CREDENTIALS/<?php echo $_SESSION['image'];?>">
						<img src="./CREDENTIALS/<?php echo $_SESSION['image'];?>">
					</a>
				</div>
			</div>
			
			<div class="info" style="margin-top: 10px;">
				<div class="info1" id="infoid" style="width: ;">
					<label>ID :</label>
					<input type="text" value="<?php echo $_SESSION['id']; ?>" disabled>
				</div>
				<div class="info1">
					<label>Last Name :</label>
					<input type="text" name="" value="<?php echo $_SESSION['lastname']; ?>" disabled>
				</div>
				<div class="info1" style="width: ;">
					<label>First Name :</label>
					<input type="text" name="" value="<?php echo $_SESSION['firstname']; ?>" disabled>
				</div>
				<div class="info1" style="width: ;">
					<label>Middle Name :</label>
					<input type="text" name="" value="<?php echo $_SESSION['middlename']; ?>" disabled>
				</div>
			</div>
			<div class="info">
				<div class="info1" id="info2" style="width: ;">
					<label>Date of Birth :</label>
					<input type="text" name="" value="<?php echo $_SESSION['dateofbirth']; ?>" disabled>
				</div>
				<div class="info1" id="info2" style="width: ;">
					<label>Age :</label>
					<input type="text" name="" value="<?php echo $_SESSION['age']; ?>" disabled>
				</div>
				<div class="info1" id="info2" style="width: ;">
					<label>Gender :</label>
					<input type="text" name="" value="<?php echo $_SESSION['gender']; ?>" disabled>
				</div>
			</div>
			<div class="info">
				<div class="info1" id="info1" style="width: ;">
					<label>Address :</label>
					<input type="text" name="" value="<?php echo $_SESSION['barangay']; ?>, <?php echo $_SESSION['municipality']; ?> <?php echo $_SESSION['province']; ?>" disabled>
				</div>
				<div class="info1" id="info2">
					<label>Contact Number :</label>
					<input type="text" name="" value="<?php echo $_SESSION['contact']; ?>" disabled>
				</div>
				<div class="info1">
					<label>Email :</label>
					<input type="text" name="" value="<?php echo $_SESSION['email']; ?>" style="text-transform: none;" disabled>
				</div>
			</div>
			<div class="info" style="margin-bottom: 10px;">
				

			</div>
		</div>
		<div class="loanprofile">
			<div class="savingsprofile" id="savingsprofile">
				<div class="usersavings">
					<div class="usertotalsavings">
						<div class="usertotalsavings1">
						
						<div class="usersavingsamount">
							<label>₱ <?php echo $_SESSION['savings']; ?></label>
						</div>
						<div class="usertotalsavingsheader">
							<label>Total Savings</label>
						</div>
					</div>
						<!-- <div class="usertotalsavings2">
							<img src="asset/icons/7634045.PNG" width="40" height="40">
						</div> -->
					</div>

				</div>
				<div class="usersavingstransaction">
					<div class="loanprofileloanbtn">
						<button type="button" id="btn111">Deposit History</button>
						<button type="button" id="btn222">Withdraw History</button>
					</div>
					<div class="savingstransaction" id="deposithistory">
				<?php
				
					include_once("connection.php");
			        $conn = connection();

					$id = $_GET['id'];
				  	$sql = "SELECT * FROM deposit WHERE userid = '$id' order by id desc";
				  	
				    $result = $conn->query($sql) or die ($conn->error);
				    $row = $result->fetch_assoc();
	     
				?>
			<div class="table" id="table">
			<div class="tableheader" id="tableheader">
				<div class="tablename" id="tablename" style="width:50%;" >
					<label>Deposit ID</label>
				</div>
				<div class="tablename" id="tablename" style="width:50%;" >
					<label>Date</label>
				</div>
				
				<div class="tablename" style="width: 50%;">
					<label>Amount</label>
				</div>
				

			</div>
			 <?php do{ ?>
			<div class="list">
				<a  href="deposit_record_print.php?id=<?php echo $row['id'];?>" target="_blank">
					<div class="tablename" id="tablename" style="width: 50%;">
						<label># <?php echo $row['id']; ?></label>
					</div>
					<div class="tablename" id="tablename" style="width: 50%;">
						<label><?php echo $row['depositdate']; ?></label>
					</div>
					
					<div class="tablename" id="" style="width: 50%;">
						<label>₱ <?php echo $row['depositamount']; ?></label>
					</div>
					
				</a>
			</div>
			<?php }while ($row = $result->fetch_assoc()) ?>
		</div>

					</div>
					<div class="savingstransaction" id="withdrawhistory">
						<?php
				
					include_once("connection.php");
			        $conn = connection();

					$id = $_GET['id'];
				  	$sql = "SELECT * FROM withdraw WHERE userid = '$id' order by id desc";
				  	
				    $result = $conn->query($sql) or die ($conn->error);
				    $row = $result->fetch_assoc();
	     
				?>
			<div class="table" id="table">
			<div class="tableheader" id="tableheader">
				<div class="tablename" id="tablename" style="width:50%;" >
					<label>Withdraw ID</label>
				</div>
				<div class="tablename" id="tablename" style="width:50%;" >
					<label>Date</label>
				</div>
				
				<div class="tablename" style="width: 50%;">
					<label>Amount</label>
				</div>
				

			</div>
			 <?php do{ ?>
			<div class="list">
				<a  href="withdraw_record_print.php?id=<?php echo $row['id'];?>" target="_blank">
					<div class="tablename" id="tablename" style="width: 50%;">
						<label># <?php echo $row['id']; ?></label>
					</div>
					<div class="tablename" id="tablename" style="width: 50%;">
						<label><?php echo $row['withdrawdate']; ?></label>
					</div>
					
					<div class="tablename" id="" style="width: 50%;">
						<label>₱ <?php echo $row['withdrawamount']; ?></label>
					</div>
					
				</a>
			</div>
			<?php }while ($row = $result->fetch_assoc()) ?>
		</div>
					</div>
					<script type="">
						var btn111 = document.getElementById("btn111");
						var btn222 = document.getElementById("btn222");
						var deposithistory = document.getElementById("deposithistory");
						var withdrawhistory = document.getElementById("withdrawhistory");
						


						btn222.onclick = function(){
							btn222.style="background-color: #239cdf;";
							btn111.style="background-color: #a3a3a3;";
							withdrawhistory.style.display="block";
							deposithistory.style.display="none";
						}
						btn111.onclick = function(){
							btn222.style="background-color: #a3a3a3;";
							btn111.style="background-color: #239cdf;";
							withdrawhistory.style.display="none";
							deposithistory.style.display="block";

						}
					</script>
				</div>
				
			</div>
			<div class="loanprofileloan" id="loanprofileloan">

				<div class="loanprofileloanbtn">
					<button type="button" id="btn11">Loans</button>
					<button type="button" id="btn22">Loan Transactions</button>
				</div>
			<div class="loanrecord" id="loanrecord">
			<?php
				
				 include_once("connection.php");
			        $conn = connection();

					$id = $_GET['id'];
				  	$sql = "SELECT * FROM loanpayment WHERE userid = '$id'";
				  	
				    $result = $conn->query($sql) or die ($conn->error);
				    $row = $result->fetch_assoc();
	     
			?>
		<div class="table" id="table">
			<div class="tableheader" id="tableheader">
				<div class="tablename" id="tablename" style="width:15%;" >
					<label>Loan ID</label>
				</div>
				<div class="tablename" id="tablename" style="width:25%;" >
					<label>Date</label>
				</div>
				<div class="tablename" style="width: 55%;">
					<label>Loan Plan</label>
				</div>
				<div class="tablename" style="width: 30%;">
					<label>Loan Type</label>
				</div>
				<div class="tablename" id="" style="width: 25%;">
					<label>Total Payment</label>
				</div>
				<div class="tablename" id="" style="width: 20%;">
					<label>Balance</label>
				</div>
				<div class="tablename" id="" style="width: 30%;">
					<label>Monthly Payment</label>
				</div>
				<div class="tablename" id="" style="width: 25%;">
					<label>Status</label>
				</div>

			</div>
			 <?php do{ ?>
			<div class="list">
				<a target="_blank" href="loan_payment_print.php?id=<?php echo $row['id'];?>">
					<div class="tablename" id="tablename" style="width: 15%;">
						<label># <?php echo $row['id']; ?></label>
					</div>
					<div class="tablename" id="tablename" style="width: 25%;">
						<label><?php echo $row['loandate']; ?></label>
					</div>
					<div class="tablename" style="width: 55%;">
						<label><?php echo $row['months']; ?> Months, <?php echo $row['interest']; ?>% Interest, ₱ <?php echo $row['amount']; ?></label>

					</div>
					<div class="tablename" id="" style="width: 30%;">
						<label><?php echo $row['loantype']; ?></label>
					</div>
					<div class="tablename" id="" style="width: 25%;">
						<label>₱ <?php echo $row['totalpayableamount']; ?></label>
					</div>
					<div class="tablename" id="" style="width: 20%;">
						<label>₱ <?php echo $row['totalbalance']; ?></label>
					</div>
					<div class="tablename" id="" style="width: 30%;">
						<label>₱ <?php echo $row['monthlypayment']; ?></label>
					</div>
					<div class="tablename" id="" style="width: 25%;">
						<label><?php echo $row['status']; ?></label>
					</div>
				</a>
			</div>
			<?php }while ($row = $result->fetch_assoc()) ?>
		</div>
	</div>
				
	<div class="loanhistory" id="loanhistory">
	<?php
	
	 include_once("connection.php");
        $conn = connection();

		$id = $_GET['id'];
	  	$sql = "SELECT * FROM loanuserpayment WHERE userid = '$id'";
	  	
	    $result = $conn->query($sql) or die ($conn->error);
	    $row = $result->fetch_assoc();	   
	  	     
	?>
			<div class="table" id="table">
			<div class="tableheader" id="tableheader">
				<div class="tablename" id="" style="width: 40%;" >
					<label>Transaction ID</label>
				</div>
				<div class="tablename" id="tablename" style="width: 40%;" >
					<label>Date</label>
				</div>
				<div class="tablename">
					<label>Loan Plan</label>
				</div>
				<div class="tablename" id="" style="width: 40%;">
					<label>Total Payment</label>
				</div>
				<div class="tablename" id="" style="width: 40%;">
					<label>Balance</label>
				</div>
				<div class="tablename" id="" style="width: 50%;">
					<label>Payment</label>
				</div>
				<div class="tablename" id="" style="width: 50%;">
					<label>Status</label>
				</div>

			</div>
			 <?php do{ ?>
			<div class="list">
				<a href="loan_transaction_print.php?id=<?php echo $row['id'];?>" target="_blank" >
					<div class="tablename" id="" style="width: 40%;">
						<label># <?php echo $row['id']; ?></label>
					</div>
					<div class="tablename" id="tablename" style="width: 40%;">
						<label><?php echo $row['loandate']; ?></label>
					</div>
					<div class="tablename">
						<label><?php echo $row['months']; ?> Months, <?php echo $row['interest']; ?>% Interest, ₱ <?php echo $row['amount']; ?></label>

					</div>
					<div class="tablename" id="" style="width: 40%;">
						<label>₱ <?php echo $row['totalpayableamount']; ?></label>
					</div>
					<div class="tablename" id="" style="width: 40%;">
						<label>₱ <?php echo $row['totalbalance']; ?></label>
					</div>
					<div class="tablename" id="" style="width: 50%;">
						<label>₱ <?php echo $row['payment']; ?></label>
					</div>
					<div class="tablename" id="" style="width: 50%;">
						<label><?php echo $row['status']; ?></label>
					</div>
					
				</a>
			</div>
			<?php }while ($row = $result->fetch_assoc()) ?>
		</div>
	</div>
	</div>
<script type="">
	var btn11 = document.getElementById("btn11");
	var btn22 = document.getElementById("btn22");
	var loanrecord = document.getElementById("loanrecord");
	var loanhistory = document.getElementById("loanhistory");
	


	btn22.onclick = function(){
		btn22.style="background-color: #239cdf;";
		btn11.style="background-color: #a3a3a3;";
		loanhistory.style.display="block";
		loanrecord.style.display="none";
	}
	btn11.onclick = function(){
		btn22.style="background-color: #a3a3a3;";
		btn11.style="background-color: #239cdf;";
		loanhistory.style.display="none";
		loanrecord.style.display="block";

	}
</script>
			</div>
			
		</div>
		
	</div>
	<div class="addform" id="addform">
			<div class="close">
				<label>Edit</label>
				<a id="x" style="margin: auto; margin-right: 0px;">
					<img id="" src="asset/icons/352270.PNG" width="24" height="24">
				</a>
			</div>
			<form  method="POST" action="" autocomplete="off">
				<script src="generateage.js"></script>
				<script>
					function lettersonly(input){
						var regex = /[^a-zA-Z ]/gi;
						
						input.value = input.value.replace(regex,"");
					}
				</script>
				<div class="forminput">
					<div class="input">
						<label>Last Name :</label>
						<input type="text" name="lastname" value="<?php echo $_SESSION['lastname']; ?>" onkeyup="lettersonly(this)" required>
					</div>
					<div class="input">
						<label>First Name :</label>
						<input type="text" name="firstname" value="<?php echo $_SESSION['firstname']; ?>" onkeyup="lettersonly(this)" required>
					</div>
					<div class="input">
						<label>Midle Name :</label>
						<input type="text" name="middlename" value="<?php echo $_SESSION['middlename']; ?>" onkeyup="lettersonly(this)" required>
					</div>
				</div>
				<div class="forminput">
					<div class="input">
						<label>Date of Birth :</label>
						<input type="date" name="dateofbirth" id="txtbirthdate" value="<?php echo $_SESSION['dateofbirth']; ?>" onkeyup="getAgeVal(0)" onblur="getAgeVal(0);" required>
					</div>
					<div class="input">
						<label>Age :</label>
						<input type="text" name="age" id="txtage" value="<?php echo $_SESSION['age']; ?>" required>
					</div>
					<div class="input">
						<label>Gender :</label>
						<select type="text" name="gender" value="<?php echo $_SESSION['gender']; ?>" required>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
				</div>
				<div class="forminput">
					<div class="input">
						<label>Provice :</label>
						<input type="text" name="province" value="<?php echo $_SESSION['province']; ?>" onkeyup="lettersonly(this)" required>
					</div>
					<div class="input">
						<label>Municipality :</label>
						<input type="text" name="municipality" value="<?php echo $_SESSION['municipality']; ?>" onkeyup="lettersonly(this)" required>
					</div>
					<div class="input">
						<label>Barangay :</label>
						<input type="text" name="barangay" value="<?php echo $_SESSION['barangay']; ?>" onkeyup="lettersonly(this)" required>
					</div>
				</div>
				<div class="forminput">
					<div class="input">
						<label>Email :</label>
						<input type="text" name="email" value="<?php echo $_SESSION['email']; ?>"  style="text-transform: none;" required>
					</div>
					<div class="input">
						<label>Contact Number :</label>
						<input name="contact" value="<?php echo $_SESSION['contact']; ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="11" required>
					</div>
					
				</div>
				<div class="savebtn">
					<button type="submit" name="update">Update</button>
					<button type="button" id="close" name="save">Cancel</button>
				</div>


			</form>
		</div>
		<div class="addform" id="addform1">
			<div class="close">
				<label>Profile Picture</label>
				<a id="closeupdate" style="margin: auto; margin-right: 0px;">
					<img id="" src="asset/icons/352270.PNG" width="24" height="24">
				</a>
			</div>
			<form method="POST" action="" enctype="multipart/form-data" autocomplete="off">
				<div class="forminput">
					<div class="input">
						<label>Select Photo :</label>
						<input type="file" name="file" required>
					</div>
				</div>
				<div class="savebtn">

					<button type="submit" name="update1" style="margin-right: 0;">Save</button>
					<button type="submit" name="update2" style="margin-left: 10px;">Update</button>
					<button type="button" id="close1" name="save">Cancel</button>
				</div>
			</form>
		</div>
		<!-- <div class="addform" id="addform2">
			<div class="close">
				<label>Change Profile</label>
				<a id="closeupdateprofile" style="margin: auto; margin-right: 0px;">
					<img id="" src="asset/icons/352270.PNG" width="24" height="24">
				</a>
			</div>
			<form method="POST" action="" enctype="multipart/form-data" autocomplete="off">
				<div class="forminput">
					<div class="input">
						<label>Select Photo :</label>
						<input type="file" name="file" required>
					</div>
				</div>
				<div class="savebtn">
					<button type="submit" name="update2">Update</button>
					<button type="button" id="close2" name="save">Cancel</button>
				</div>
			</form>
		</div> -->
		<div class="addform" id="addform3">
			<div class="close">
				<label>Credentials</label>
				<a id="closeaddcredentials" style="margin: auto; margin-right: 0px;">
					<img id="" src="asset/icons/352270.PNG" width="24" height="24">
				</a>
			</div>
			<form method="POST" action="" enctype="multipart/form-data" autocomplete="off">
				<div class="forminput">
					<div class="input">
						<label>Select Photo :</label>
						<input type="file" name="file" required>
					</div>
				</div>
				<div class="savebtn">
					<button type="submit" name="update3" style="margin-right: 0;">Save</button>
					<button type="submit" name="update4" style="margin-left: 10px;">Update</button>
					<button type="button" id="close3" name="save">Cancel</button>
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
	var add = document.getElementById("edit");
	var addform = document.getElementById("addform");
	var close = document.getElementById("close");
	var leftdiv = document.getElementById("leftdiv");
	var x = document.getElementById("x");

	add.onclick = function(){
		addform.style.display="flex";
		
		addform.style.position="absolute";
		rightdiv.style="user-select: none";
		rightdiv.style="pointer-events: none";
		rightdiv.style.filter="blur(2px)";
		leftdiv.style="user-select: none";
		leftdiv.style="pointer-events: none";
		leftdiv.style.filter="blur(2px)";
	}
	close.onclick = function(){
		addform.style.display="none";
		
		rightdiv.style="user-select: all";
		rightdiv.style="pointer-events: all";
		rightdiv.style.filter="blur(0)";
		leftdiv.style="user-select: all";
		leftdiv.style="pointer-events: all";
		leftdiv.style.filter="blur(0)";
	}
	x.onclick = function(){
		addform.style.display="none";
		
		rightdiv.style="user-select: all";
		rightdiv.style="pointer-events: all";
		rightdiv.style.filter="blur(0)";
		leftdiv.style="user-select: all";
		leftdiv.style="pointer-events: all";
		leftdiv.style.filter="blur(0)";
	}
	var add1 = document.getElementById("update");
	var addform1 = document.getElementById("addform1");
	var close1 = document.getElementById("close1");
	var leftdiv = document.getElementById("leftdiv");
	var closeupdate = document.getElementById("closeupdate");

	add1.onclick = function(){
		addform1.style.display="flex";
		
		addform1.style.position="absolute";
		rightdiv.style="user-select: none";
		rightdiv.style="pointer-events: none";
		rightdiv.style.filter="blur(2px)";
		leftdiv.style="user-select: none";
		leftdiv.style="pointer-events: none";
		leftdiv.style.filter="blur(2px)";
	}
	close1.onclick = function(){
		addform1.style.display="none";
		
		rightdiv.style="user-select: all";
		rightdiv.style="pointer-events: all";
		rightdiv.style.filter="blur(0)";
		leftdiv.style="user-select: all";
		leftdiv.style="pointer-events: all";
		leftdiv.style.filter="blur(0)";
	}
	closeupdate.onclick = function(){
		addform1.style.display="none";
		
		rightdiv.style="user-select: all";
		rightdiv.style="pointer-events: all";
		rightdiv.style.filter="blur(0)";
		leftdiv.style="user-select: all";
		leftdiv.style="pointer-events: all";
		leftdiv.style.filter="blur(0)";
	}
	// var add2 = document.getElementById("update2");
	// var addform2 = document.getElementById("addform2");
	// var close2 = document.getElementById("close2");
	// var leftdiv = document.getElementById("leftdiv");
	// var closeupdateprofile = document.getElementById("closeupdateprofile");

	// add2.onclick = function(){
	// 	addform2.style.display="flex";
		
	// 	addform2.style.position="absolute";
	// 	rightdiv.style="user-select: none";
	// 	rightdiv.style="pointer-events: none";
	// 	rightdiv.style.filter="blur(2px)";
	// 	leftdiv.style="user-select: none";
	// 	leftdiv.style="pointer-events: none";
	// 	leftdiv.style.filter="blur(2px)";
	// }
	// close2.onclick = function(){
	// 	addform2.style.display="none";
		
	// 	rightdiv.style="user-select: all";
	// 	rightdiv.style="pointer-events: all";
	// 	rightdiv.style.filter="blur(0)";
	// 	leftdiv.style="user-select: all";
	// 	leftdiv.style="pointer-events: all";
	// 	leftdiv.style.filter="blur(0)";
	// }
	// closeupdateprofile.onclick = function(){
	// 	addform2.style.display="none";
		
	// 	rightdiv.style="user-select: all";
	// 	rightdiv.style="pointer-events: all";
	// 	rightdiv.style.filter="blur(0)";
	// 	leftdiv.style="user-select: all";
	// 	leftdiv.style="pointer-events: all";
	// 	leftdiv.style.filter="blur(0)";
	// }
	var add3 = document.getElementById("update3");
	var addform3 = document.getElementById("addform3");
	var close3 = document.getElementById("close3");
	var leftdiv = document.getElementById("leftdiv");
	var closeaddcredentials = document.getElementById("closeaddcredentials");

	add3.onclick = function(){
		addform3.style.display="flex";
		
		addform3.style.position="absolute";
		rightdiv.style="user-select: none";
		rightdiv.style="pointer-events: none";
		rightdiv.style.filter="blur(2px)";
		leftdiv.style="user-select: none";
		leftdiv.style="pointer-events: none";
		leftdiv.style.filter="blur(2px)";
	}
	close3.onclick = function(){
		addform3.style.display="none";
		
		rightdiv.style="user-select: all";
		rightdiv.style="pointer-events: all";
		rightdiv.style.filter="blur(0)";
		leftdiv.style="user-select: all";
		leftdiv.style="pointer-events: all";
		leftdiv.style.filter="blur(0)";
	}
	closeaddcredentials.onclick = function(){
		addform3.style.display="none";
		
		rightdiv.style="user-select: all";
		rightdiv.style="pointer-events: all";
		rightdiv.style.filter="blur(0)";
		leftdiv.style="user-select: all";
		leftdiv.style="pointer-events: all";
		leftdiv.style.filter="blur(0)";
	}
</script>
<script>
		var viewprofile = document.getElementById("viewprofile");
		var displaysavings = document.getElementById("displaysavings");
		var displayloan = document.getElementById("displayloan");
		var loanprofileloan = document.getElementById("loanprofileloan");
		var savingsprofile = document.getElementById("savingsprofile");
		var profile = document.getElementById("profile");
	
		displaysavings.onclick=function(){
			savingsprofile.style.display="flex";
			profile.style.display="none";
			loanprofileloan.style.display="none";
			displaysavings.style="background-color: #239cdf;";
			displayloan.style="background-color: #a3a3a3;";
			viewprofile.style="background-color: #a3a3a3;";
		}
		displayloan.onclick=function(){
			savingsprofile.style.display="none";
			profile.style.display="none";
			loanprofileloan.style.display="flex";
			displaysavings.style="background-color: a3a3a3;";
			displayloan.style="background-color: #239cdf;";
			viewprofile.style="background-color: #a3a3a3;";

		}
		viewprofile.onclick=function(){
			savingsprofile.style.display="none";
			profile.style.display="flex";
			loanprofileloan.style.display="none";
			displaysavings.style="background-color: #a3a3a3;";
			displayloan.style="background-color: #a3a3a3;";
			viewprofile.style="background-color: #239cdf;";

		}

</script>
<script src="script.js"></script>

</html>
<style type="text/css">
.table{
	width: 98%;
	border: 1px solid lightgray;
	margin-top: 5px;

}
.list a .tablename label{
		cursor: pointer;

	}
#displayloan, #displaysavings{
	background-color: #a3a3a3;
	margin-left: 10px;
	margin-right: 0;
}
#viewprofile{
	background-color: #239cdf;
	margin-right: 0;
}
#displayloan, #displaysavings, #viewprofile{
	width: 80px;
	display: flex;
	
}
#displayloan label, #displaysavings label, #viewprofile label{
	margin: auto;

}
#refresh-add{
	/*border: 1px solid red;*/
	display: flex;

}
#profile{
	margin-top: 10px;
}
#addform1, #addform2, #addform3{
	width: 30%;
}
#addform1 input, #addform2 input,  #addform3 input{
	width: 100%;
}
#printpersonalinfo{
	width: 80px;
	background-color: #1671B7;

}
#printpersonalinfo:hover{
	background-color: #1d7ec9;
}
@media screen and (max-width: 720px){
.addform{
	height: 85%;
	overflow: hidden;
}
 #addform1, #addform2, #addform3{
 	width: 85%;
 	height: auto;
 	
 	scroll-behavior: none;
 	}
.addform form{
	overflow-y: scroll;
}
.addform form .forminput{
	flex-direction: column;
	

}.addform form .forminput .input input, .addform form .forminput .input select{
	width: 100%;
}.usersavingstransaction .table{
	width: 98%;
	border: 1px solid lightgray;
	margin: auto;
	margin-top: 5px;
	margin-bottom: 5px;
}
}
</style>
