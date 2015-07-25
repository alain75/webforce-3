<?php

	include_once("db.php");
	include("fonctions.php");

 	$id = $_GET['id'];

	$sql = "SELECT imdb_id, cast, genres
			FROM movies
			WHERE id = $id";

	$sth = $dbh->prepare($sql);
	$sth->bindValue(":id", $id);
	$sth->execute();
	$movies = $sth->fetchAll();

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>details</title>
	<link rel="stylesheet" type="text/css" href="css/details.css">
</head>
<body>

	<?php
		foreach ($movies as $movies) {
				$short_imdb_id = substr($movies['imdb_id'],2);
				
			?>

		<div>
				<!--<h2><?php //echo $movies["title"]; ?></h2> -->
				<!-- <p>
					<a href="movies.php?id=<?php //echo $movies['id']; ?>"> Détails </a>
 -->
			<div>
				<img class="imag" src="posters/<?php echo $short_imdb_id; ?>.jpg" /> 

			</div>
			<div>
				<p> <?php echo $movies['id']; ?>111</p>
				<p> <?php echo $movies['title']; ?>222 </p>
				<p> <?php echo $movies['cast']; ?> 333</p>

			</div>

		</div>

		<?php
			} //end foreach
	   	?>
</body>
</html>