<?php

	include_once("common_include.php");

	//récupère toutes les combinaisons de genre dispo en bdd
	$sql = "SELECT DISTINCT(genres) FROM movies";

	$sth = $dbh->prepare($sql);
	$sth->execute();
	$uniqueGenreCombos = $sth->fetchAll();

	//stockera les noms uniques des catégories
	$genres = array();

	//on parcourt toutes les combinaisons présentes en bdd
	foreach($uniqueGenreCombos as $genreCombo){
		//on scinde la chaîne sur les / et on récupère les morceaux dans un array
		$genresArray = explode(" / ", $genreCombo['genres']);

		//on vérifie si chacun des éléments de cet array est déjà présent...
		foreach($genresArray as $genre){
			//si pas présent...
			if (!in_array($genre, $genres)){
				//on l'ajoute
				$genres[] = $genre;
			}
		}
	}

	//ordre alphabétique
	sort($genres);
