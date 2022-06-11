<?php
session_start();
if($_SESSION['position'] == 'Finance Manager'){
	echo "<script>window.location.href = './dashboard.php'</script>";
}else{

}
if($_SESSION['position'] == 'Loan Officer'){
	echo "<script>window.location.href = './dashboard.php'</script>";
}else{
	
}

?>