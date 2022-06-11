<?php

session_start();
if($_SESSION['position'] == 'Finance Manager'){
		$_SESSION['financemanager'] = "none";
	}else{
		$_SESSION['financemanager'] = "";
	}
	
if($_SESSION['position'] == 'Loan Officer'){
		$_SESSION['loanofficer'] = "none";
	}else{
		$_SESSION['loanofficer'] = "";
	}




?>