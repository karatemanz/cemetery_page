<?php 

$db = new PDO('mysql:host=127.0.0.1;dbname=pagination', 'root', '');

// User Input //
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 5;


// Positioning //
$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

// Query //
$articles = $db->prepare("
	SELECT SQL_CALC_FOUND_ROWS id, title
	FROM pages
	LIMIT {$start}, {$perPage}
");

$articles->execute();
$articles = $articles->fetchAll(PDO::FETCH_ASSOC);

//var_dump($articles);

// Pages //
$total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
$pages = ceil($total / $perPage);

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


	<div class="modal">!!!!!!!!!!!!!!!!<br><br><br> <h1>SORRY, <br> CURRENTLY <br> UNDER <br> CONSTRUCTION</h1> <br><br><br>!!!!!!!!!!!!!!!!</div>

	<header>
		<nav class="navbar">
			<div class="nav-item"><a href="www.rehobothcemetery.org/">Rehoboth Cemetery</a></div>
			<div class="nav-item"><a href="www.rehobothcemetery.org/rates.html">Rates</a></div>
			<div class="nav-item"><a href="www.rehobothcemetery.org/history.html">History</a></div>
			<div class="nav-item"><a href="www.rehobothcemetery.org/chapel.html">Chapel</a></div>
			<div class="nav-item"><a href="www.rehobothcemetery.org/contributions.html">Contributions</a></div>
			<div class="nav-item select"><a href="www.rehobothcemetery.org/search.php">Search</a></div>
			<div class="nav-item"><a href="www.rehobothcemetery.org/contactus.html">ContactUs</a></div>
		</nav>

		<div class="nav-side">
			Rehobeth Cemetery
			<a class="nav-toggle" href="#"></a>
			<div class="nav-item"><a href="www.rehobothcemetery.org/">Home</a></div>
			<div class="nav-item"><a href="www.rehobothcemetery.org/rates.html">Rates</a></div>
			<div class="nav-item"><a href="www.rehobothcemetery.org/history.html">History</a></div>
			<div class="nav-item"><a href="www.rehobothcemetery.org/chapel.html">Chapel</a></div>
			<div class="nav-item"><a href="www.rehobothcemetery.org/contributions.html">Contributions</a></div>
			<div class="nav-item select"><a href="www.rehobothcemetery.org/search.php">Search</a></div>
			<div class="nav-item"><a href="www.rehobothcemetery.org/contactus.html">ContactUs</a></div>		
		</nav>
	</header>



	<div class="subhead">
		<div class="center-wrapper">
			Rehobeth Cemetery Association
			<hr>
		</div>
	</div>

<div class="panel">
<!-- ^^^^^^^^^^^^ ABOVE IS GENERIC MULTI-PAGE CODE ^^^^^^^^^^^^^^^^^^^ -->

		<h1>!!!!  --  UNDER CONSTRUCTION  --  !!!!</h1>
		<div class="page">
			<div class="container">

				<?php foreach($articles as $article): ?> 

			 		<div class="article">
			 			<p> <?php echo $article['id'];  ?>.) <?php echo $article['title']; ?> </p>
			 		</div>

			 	<?php endforeach; ?> 

			 	<div class="pagination">
			 		<?php for($x = 1; $x <= $pages; $x++): ?>
			 			<a href="?page=<?php echo $x; ?>&per-page=<?php echo $perPage; ?>"<?php if($page === $x) { echo ' class="selected"'; } ?>>
			 				<?php echo $x ?>
			 			</a>
			 		<?php endfor; ?>
			 	</div>


			</div>
		</div>



<!-- \/\/\/\/\/\/\//\/\/\/ BELOW IS GENERIC MULTI-PAGE CODE \/\/\/\/\/\/\/\/\/\/\/ -->
</div>

	<div class="footer">
		<div class="hitbox">
			<a href="http://www.simplehitcounter.com" target="_blank">
			<img src="http://simplehitcounter.com/hit.php?uid=1844579&f=0&b=16777215">
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="assets/js/slide.js"></script>

</body>
</html>