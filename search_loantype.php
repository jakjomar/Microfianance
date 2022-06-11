<!-- <?php
							
		$loantype=$_REQUEST['search_loantype'];
	    include_once("connection.php");
	    $conn = connection();

	  	if($search!==""){
	    
	    $sql =mysqli_query($conn, "SELECT * FROM loanplans WHERE loanplansid = '$loantype'");
	    // $result = $conn->query($sql) or die ($conn->error);
	    $row = mysqli_fetch_array($sql);
	    $_SESSION['loanplansid'] = $row["loanplansid"];
	}
	$result = array("$loanplans");
	$myJSON = json_encode($result);
	echo $myJSON;


	?> -->