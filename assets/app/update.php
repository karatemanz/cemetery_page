<?php

	require_once 'assets/app/init.php';

	echo "Todays date: " . date("Y-d-m") . " <br>";

	// Query //
	$updateQuery = mysql_query("
		SELECT * FROM rehdbaowner.update
	");


	if(!$updateQuery){

		echo "<br> FAILURE TO CONNECT <br>";
		die("Invalid query: " . mysql_error() . " <br>");

	}



	if($update = mysql_fetch_array($updateQuery)){

		$update_date = $update['date'];
		$update_content = $update['update_text'];

	}else{

		$update_date = date("Y-d-m");
		$update_content = "No Update Yet";

	}
	

		echo "Date Of Last Update: " . $update_date . " <br><br>";
		echo $update_content;


 ?>