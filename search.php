<?php 

	require_once 'assets/app/init.php';

	// User Input //
	$page = isset($_GET['page']) && (int)$_GET['page'] <= 22 ? (int)$_GET['page'] : 1;
	$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 500 ? (int)$_GET['per-page'] : 100;
	$letter = isset($_GET['letter']) ? $_GET['letter'] : $currentLetter;
	$order = isset($_GET['orderby']) ? $_GET['orderby'] : 'lastname'; 


	$letters = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

	// Positioning //
	$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

	// Query //
	$peopleQuery = mysql_query("
		SELECT SQL_CALC_FOUND_ROWS id, lastname, firstname, birth_date, death_date, age
		FROM people
		WHERE $order
		LIKE '$letter%'
		LIMIT {$start}, {$perPage}
	");

	// Pages //
	$total = mysql_query("SELECT FOUND_ROWS() AS total");
	$total = mysql_fetch_array($total);

	$pages = ceil($total['total'] / $perPage);


 ?>

<!DOCTYPE HTML>

<html>
<head>

		<!-- Metadata Content -->
		<meta charset="UTF-8">
		<meta name="viewport" width="device-width, initial-scale=1 maximum-scale=1.0"> 
		<meta name="verify-v1" content="oJeBLW8b8G4g6sgfWYVxh7xX20YUcXu5HByHq4PStws=">
		<meta name="title" content="Rehoboth Cemetery Association">
		<meta name="author" content="Rehoboth Cemetery Association">
		<meta name="description" content="Rehoboth Cemetery Association, Belle Vernon PA">
		<meta name="keywords" content="Rehoboth Cemetery, Cemetery, Belle Vernon, 15012, Association, Burials, Tombstone, Civil War Veterns, Veterens, Historic, Colonel Edward Cook, Rehoboth Valley">
	  	<meta name="robots" content="index,follow">
	    <meta name="revisit-after" content="1 weeks">

	<title>Rehoboth Cemetery Association</title>

		<link rel="stylesheet" href="assets/css/app.css">
</head>
<body>


	<!--<div class="modal">!!!!!!!!!!!!!!!!<br><br><br> <h1>SORRY, <br> CURRENTLY <br> UNDER <br> CONSTRUCTION</h1> <br><br><br>!!!!!!!!!!!!!!!!</div>-->

	<header>
		<nav class="navbar">
			<div class="nav-item"><a href="/">Rehoboth Cemetery</a></div>
			<div class="nav-item"><a href="/rates.html">Rates</a></div>
			<div class="nav-item"><a href="/history.html">History</a></div>
			<div class="nav-item"><a href="/chapel.html">Chapel</a></div>
			<div class="nav-item"><a href="/contributions.html">Contributions</a></div>
			<div class="nav-item select"><a href="/search.php">Search</a></div>
			<div class="nav-item"><a href="/contactus.html">ContactUs</a></div>
		</nav>

		<div class="nav-side">
			<div class="top-label">Rehoboth Cemetery</div>
			<a class="nav-toggle" href="#"></a>
			<div class="nav-item"><a href="/">Home</a></div>
			<div class="nav-item"><a href="/rates.html">Rates</a></div>
			<div class="nav-item"><a href="/history.html">History</a></div>
			<div class="nav-item"><a href="/chapel.html">Chapel</a></div>
			<div class="nav-item"><a href="/contributions.html">Contributions</a></div>
			<div class="nav-item select"><a href="/search.php">Search</a></div>
			<div class="nav-item"><a href="/contactus.html">ContactUs</a></div>		
		</nav>
	</header>



	<div class="subhead">
		<div class="center-wrapper">
			Rehoboth Cemetery Association
			<hr>
		</div>
	</div>

<div class="panel">
<!-- ^^^^^^^^^^^^ ABOVE IS GENERIC MULTI-PAGE CODE ^^^^^^^^^^^^^^^^^^^ -->

		<br><br><div class="page-head">Burial Listings</div><br><br>

		<div class="alphabet">
			 	<div class="order-radio">
				 	OrderBy: 
				 	<input type='radio' name='orderby' value='lastname' <?php if($order === 'lastname') { echo ' checked="checked"'; } ?> id='last'>
				 	<label for='last'>lastname</label>
				 	<input type='radio' name='orderby' value='firstname' <?php if($order === 'firstname') { echo ' checked="checked"'; } ?> id='first'>
				 	<label for='first'>firstname</label>
			 	</div>
			 	<br>
			 		<a href="search.php?letter=' '&orderby=<?php echo $order; ?>">ALL</a>
			 	<?php foreach($letters as $letter): ?>
			 		<a href="search.php?letter=<?php echo $letter; ?>&orderby=<?php echo $order; ?>"><?php $currentLetter = $letter; echo $letter; ?></a>
			 	<?php endforeach; ?>

		</div>


		<div class="page">
			<div class="container search">

				<table>
					<tr>
						<th>Lastname</th>
						<th>Firstname</th>
						<th>Age</th>
						<th class="hide-mobile">Birth Date</th>
						<th class="hide-mobile">Death Date</th>
					</tr>	
				<?php while($person = mysql_fetch_array($peopleQuery)): ?> 	
			 		<tr>
			 			<td><?php echo $person['lastname']; ?></td>
			 			<td><?php echo $person['firstname']; ?></td>
			 			<td><?php echo $person['age']; ?></td>
			 			<td class="hide-mobile"><?php echo $person['birth_date']; ?></td>
			 			<td class="hide-mobile"><?php echo $person['death_date']; ?></td>
			 		</tr>	 	 	 
			 	<?php endwhile; ?> 
			 	</table>

			 	<br>
			 	<br>
			 	<br>

			 	<div class="pagination">
			 		<?php for($x = 1; $x <= $pages; $x++): ?>
			 			<a href="?page=<?php echo $x; ?>&per-page=<?php echo $perPage; ?>&letter=<?php echo $_GET['letter']; ?>"<?php if($page === $x) { echo ' class="selected"'; } ?>>
			 				<?php echo $x ?>
			 			</a>
			 		<?php endfor; ?>
			 	</div>


			</div>
		</div>



<!-- \/\/\/\/\/\/\//\/\/\/ BELOW IS GENERIC MULTI-PAGE CODE \/\/\/\/\/\/\/\/\/\/\/ -->
</div>

	<div class="footer"></div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="assets/js/slide.js"></script>

</body>
</html>