<?php
	//mes fonctions perso

	// affiche un array dans une balise
	
	function pre($affiche){
		echo '<pre style="backgound-color: #000; color: #FFF;">';
		print_r($afficher);
		echo '</pre>';
	}
		

	//convertit ue date du format MySQL, vers le français
	function convertDateToFrench($dateMysql){
		$unix = strtotime($dateMysql);
		$frenchDate = date("d-m-Y H:i:s", $unix);

		return $frenchDate;
	}


?>