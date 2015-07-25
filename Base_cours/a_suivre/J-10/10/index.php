<?php
	require("common_include.php");
	require("extract_genres.php");

	$cat = "";

	//si le formulaire n'est pas soumis, on fait cette requête
	if (empty($_GET)){
		$sql = "SELECT id, imdb_id, title 
				FROM movies  
				ORDER BY RAND()
				LIMIT 20";
		$sth = $dbh->prepare($sql);
	}
	//sinon, on fait une requête avec un 'genres LIKE '%%'...
	else {
		$cat = $_GET['cat'];
		$sql = "SELECT id, imdb_id, title 
				FROM movies 
				WHERE genres LIKE :cat
				ORDER BY RAND()
				LIMIT 20";
		$sth = $dbh->prepare($sql);
		$sth->bindValue(":cat", '%'.$cat.'%');
	}


	$sth->execute();
	$movies = $sth->fetchAll();
	
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Movies !</title>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
	<link href="css/style.css" rel="stylesheet" />
</head>
<body>
	<div class="container">

		<header>
			<h1>MOVIES !</h1>

			<form>
				<select name="cat">
					<option value="">Filter by genre</option>
					<?php foreach($genres as $genre): ?>
					<option <?php if ($cat == $genre){echo 'selected';} ?> value="<?php echo $genre; ?>"><?php echo $genre; ?></option>
					<?php endforeach; ?>
				</select>
				<input type="submit" value="OK" />
			</form>
		</header>

	<?php 
		foreach($movies as $movie): 
			$short_imdb_id = str_replace("tt", "", $movie['imdb_id']);
	?>
		<a class="movie" href="movie.php?id=<?php echo $movie['id']; ?>" title="<?php echo $movie['title']; ?>">
			<div class="movie_title"><?php echo $movie['title']; ?></div>
			<img src="posters/<?php echo $short_imdb_id; ?>.jpg" alt="<?php echo $movie['title']; ?>" />
		</a>
	<?php endforeach; ?>
		<a class="movie more_movies" href="index.php" title="Charger d'autres films !">
			+
		</a>
	</div>
</body>
</html>