<?php
	require("common_include.php");

	$id = $_GET['id'];

	$sql = "SELECT * 
			FROM movies  
			WHERE id = :id";

	$sth = $dbh->prepare($sql);
	$sth->execute(array(":id" => $id));
	$movie = $sth->fetch();

	$short_imdb_id = str_replace("tt", "", $movie['imdb_id']);
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?php echo $movie['title']; ?> :: Movies !</title>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
	<link href="css/style.css" rel="stylesheet" />
</head>
<body>
	<div class="container">

		<header>
			<h1><?php echo $movie['title']; ?> :: Movies !</h1>
		</header>

		<img class="poster" src="posters/<?php echo $short_imdb_id; ?>.jpg" alt="<?php echo $movie['title']; ?>" />

		<div class="movie_info">
			<?php
			foreach($movie as $key => $value){
				echo "$key : $value<br />";
			}
			?>
		</div>
	</div>
</body>
</html>