<?php
	error_reporting(0);
	session_start();
		// // $id = $_GET['id'];
		// session_unset();
	// unset($_SESSION['id']);
	function pathTo($destination){
		echo "<script>window.location.href = './$destination.php'</script>";
	}
		session_destroy();
		pathTo('login');
	
?>