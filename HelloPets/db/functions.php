<?php 

	include 'db-connection.php';

	function showAdoptData()
	{
		global $conn;

		$query 	= "SELECT * FROM postadopt WHERE status = 'APPROVED'";

		$result	= mysqli_query($conn,$query);
		$rows	= [];

		while ($row = mysqli_fetch_assoc($result)) {
			
			$rows[] = $row;
		}

		return $rows;
	}

	// Show post
	function showLostPost()	{


		global $conn;
		global $id;

		$query 	= "SELECT * FROM postlost WHERE status = 'LOST'" ;

		$result	= mysqli_query($conn,$query);
		$rows	= [];

		while ($row = mysqli_fetch_assoc($result)) {

			$rows[] = $row;
		}

		return $rows;
		

	}



 ?>