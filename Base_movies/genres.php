<?php

	// include_once("db.php");
	// récupère toutes les combinaisons de genre dispo en dbd
	$sql = "SELECT DISTINCT(genres) FROM movies";

	$sth = $dbh->prepare($sql);
	$sth -> execute();
	$uniqueGenreCombos = $sth->fetchAll();

	// stokera les noms uniques des catégories
	$genres = array();

	// on parcourt toutes les combinaisions présentes en dbd
	foreach ($uniqueGenreCombos as $genreCombo){
		// on scinde la chaine sur les / et on récupère les morceaux dans un array
		$genreArray = explode(" / ", $genreCombo['genres']);
		// on scinde la chaine des éléments de cet array est déjà présent
		foreach ($genreArray as $genre) {
			// si pas présent ...
			if(!in_array($genre, $genres)){
				// on l'ajoute
				$genres[] = $genre;
			}
		}
	}
	// ordre alphabétique


?>