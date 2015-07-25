<?php

	// $_COOKIE;
	setcookie("nom_du_cook", "n'importe quelle chaune", time() + 60*60, "/");
	print_r($_COOKIE);
?>