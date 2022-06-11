<?php 

include 'config.php';
error_reporting(0);

if (isset($_POST["save"])){

	
			
	
		$months = mysqli_real_escape_string($conn, $_POST["months"]);
		$interest = mysqli_real_escape_string($conn, $_POST["interest"]);
		$amount = mysqli_real_escape_string($conn, $_POST["amount"]);
		$monthlypayment = mysqli_real_escape_string($conn, $_POST["monthlypayment"]);
		$totalpayment = mysqli_real_escape_string($conn, $_POST["totalpayment"]);
		
		$check_loanplans = mysqli_num_rows(mysqli_query($conn, "SELECT loanplans FROM loanplans WHERE loanplans='$loanplans'"));

		if ($check_loanplans > 0) {
				echo "<script>alert('Loan Plans already exist');</script>";
		} else{
			$sql = "INSERT INTO loanplans (months, interest, amount, monthlypayment, totalpayment) VALUES ('$months', '$interest', '$amount', '$monthlypayment','$totalpayment')";
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
    
        $id = $_GET['id'];
        
        $sql = "SELECT * FROM loanplans order by id";
        $result = $conn->query($sql) or die ($conn->error);
        $row = $result->fetch_assoc();

         if(isset($_GET['id'])){
			$id = $_GET['id'];
			
			$sql = "DELETE FROM loanplans WHERE id = '$id'";
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
			<a href="admin_home.php">
					<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27">
					<label>Members</label>
			</a>
			<a href="loans.php">
					<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27">
					<label>Loans</label>
			</a>
			<a href="loan_plans.php" style="background-color: #dfdfdf;">
					<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27">
					<label>Loan Plans</label>
			</a>
			<a href="loan_types.php">
					<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27">
					<label>Loan Types</label>
			</a>
		</div>
	</div>
	<!-- for desktop -->
	<div class="leftdiv" id="leftdiv">
		<div class="logo">
		</div>
		<div class="btn" id="btn">
			<a href="admin_home.php">
					<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27">
					<label>Members</label>
			</a>
			<a href="loans.php">
					<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27">
					<label>Loans</label>
			</a>
			<a href="loan_plans.php" style="background-color: #dfdfdf;">
					<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27">
					<label>Loan Plans</label>
			</a>
			<a href="loan_types.php">
					<img id="menuimg" src="asset/icons/985040.PNG" width="27" height="27">
					<label>Loan Types</label>
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
			<label>Loan Plans</label>
		</div>
		<div class="search-add">
			
			<button id="add">Add Loan Plans</button>
		</div>
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
							<label id="label1">Months :</label ><label id="label2"><?php echo $row['months']; ?> month/s</label>
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
					<div class="tablename" id="tablename" style="width: 30%;">
						<form>
           					<a  href="#?id=<?php echo $row['id'];?>" name="edit"><img src="asset/icons/icons8-edit-24.PNG" width="25" height="25"></a>
           					<a  href=" ?id=<?php echo $row['id'];?>" name="delete"><img src="asset/icons/352270_close_icon.PNG" width="25" height="25"></a>
           				</form>
           				
					</div>
					
				
			</div>
			<?php }while ($row = $result->fetch_assoc()) ?>
		</div>
		
	</div>
	<!-- Add loan plans -->
		<div class="addform" id="addform">
			<div class="close">
				<label>Add Loan Plans</label>
			</div>
			<form  method="POST" action="" autocomplete="off">
				<div class="forminput" style="flex-direction: column;">
					<div class="input">
						<label>Amount :</label>
						<input type="number" name="amount" id="amount" required>
					</div>
					<div class="input">
						<label>Plan (Months) :</label>
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
						<input type="number" name="monthlypayment" id="monthlypayment">
					</div>
					<div class="input">
						<label>Monthly Payment :</label>
						<input type="number" name="totalpayment" id="totalpayment" required>
					</div>
					<!-- <div class="input">
						<label>Monthly Payment :</label>
						<input type="number" id="ami">
					</div> -->
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
<style type="text/css">
	.addform{
		width: 30%;
	}
	.addform .forminput{
		gap: 10px;
	}
	.addform form .forminput .input input, .addform form .forminput .input label{
		margin: auto;
		margin-left: 15px;
		margin-bottom: 5px;
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
	.table{
		width: 80%;	
		margin-left: 10px;
		display: flex;

	}
	.table .tableheader{

	}
	.rightdiv .table .list{
		display: flex;
		flex-direction: row;

	}
	.table .list, .table .list .tablename{
		height: auto;
		flex-direction: column;
		width: auto;
		

	}
	.table .list .tablename .tablelist{
		width: 100%;
		height: 25px;
		display: flex;
		flex-direction: row;
		margin-top: 5px;
		margin-bottom: 5px;
	}
	.table .list .tablename .tablelist #label1{
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
		width: 96%;	
		
	}

	}
</style>