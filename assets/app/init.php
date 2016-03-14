<?php 

	session_start();

	$username = 'rehdbaowner';
	$hostname = 'rehdbaowner.db.4206159.hostedresource.com';
	$dbname = 'rehdbaowner';
	$password = 'Reh15012!';
	$tablename = 'rehdbaowner';

	//$db = new PDO('mysql:host=rehdbaowner.db.4206159.hostedresource.com;dbname=rehdbaowner', 'rehdbaowner', 'Reh15012!');

	mysql_connect($hostname, $username, $password);

	mysql_select_db($dbname);

?>