<?php 

	function connection(){

		
		$host =  "localhost";
		$username ="root";
		$password ="";
		$db = "microfinance1";

		$conn = new mysqli($host, $username, $password, $db);

		if ($conn->connect_error){
			echo "$conn->connect_error";
		}
		else
		{

			return $conn;
		}



	}




 ?>