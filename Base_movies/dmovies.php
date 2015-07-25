<?php

	include_once("db.php");
	include("genres.php");
	// include("fonctions.php");


		// $directory = 'posters/';
		// si le formulaire n'est pas soumis, on fait cette requête
		if(empty($_GET)){
	$sql = "SELECT  id, imdb_id, title
			FROM movies
			ORDER BY RAND()
			LIMIT 20";
	}else{
		// sinon, on fait une requête avec un 'genres LIKE '%%'...
		   "SELECT  id, imdb_id, title
			FROM movies
			WHERE cast LIKE :genres
			ORDER BY RAND()
			LIMIT 20";
	}
	 
	$sth = $dbh->prepare($sql);
	// $sth -> $bindValue(":cat",'%'.$cat.'%');
	$sth ->execute();
	$movies = $sth->fetchAll();

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>projet-movies</title>
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div>
		<input class="input" type="search" id="dmovies" placeholder="Search for something.."><i class="fa fa-search"></i>
		<form action="dmovies.php" >
			<select id="select" name="carlist" form="carform">
				  <option value="volvo">Action</option>
				  <option value="saab">Adventure</option>
				  <option value="opel">Animation</option>
				  <option value="audi">Biography</option>
				  <option value="audi">Comedy></option>
				  <option value="audi">Crime</option>
				  <option value="audi">Documentary</option>
				  <option value="audi">Drama</option>
				  <option value="audi">Family</option>
				  <option value="audi">Fantasy</option>
				  <option value="audi">Film-Noir</option>
				  <option value="audi">History</option>
				  <option value="audi">Horror</option>
				  <option value="audi">Music</option>
				  <option value="audi">Musical</option>
				  <option value="audi">Mystery</option>
				  <option value="audi">Romance</option>
				  <option value="audi">Sci-Fi</option>
				  <option value="audi">Sport</option>
				  <option value="audi">Thriller</option>
				  <option value="audi">War</option>
				  <option value="audi">Western</option>
			</select>
			<button value="submit">Valide</button>
		</form>

		<!--p id="demo">Search</p>
		<script>
			function myFunction() {
    		var x = document.getElementById("mySearch").placeholder;
    		document.getElementById("demo").innerHTML = x;
			}
		</script-->

	</div>
	<div>
		
	</div>
	<div class="primary">

	<?php
		foreach ($movies as $movie) { 
		$short_imdb_id = substr($movie['imdb_id'],2);

		?>
			<a href="details.php?id=<?php echo $movie['id']; ?>"><img class="img" src="posters/<?php echo $short_imdb_id; ?>.jpg" /> </a>

		<?php } ?>

	</div>

	<!-- <div class="primary">
		<h2 class="titre"><?php //echo $movies["title"]; ?></h2>
	</div> -->
</body>
</html>