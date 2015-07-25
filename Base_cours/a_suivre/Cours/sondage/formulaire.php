
<?php

	session_start();
	include("db.php");

	//récupère les paramètres d'URL
	$option = $_GET['option'];
	$valeur = $_GET['valeur'];
	$choix = $_SERVER['choix'];
	$message = $_SERVER['message'];


	// on veut vérifier que l'id existe bel et bien

		

	// UPDATE ideas SET vote
	$sql = "INSERT INTO vote_client (option, valeur, choix, message) 
			VALUES (:option, :valeur, :choix, message, NOW(), NOW())";

	

	// J'incrément le nombre de votes dans la table ideas
			
		

	
	// J'incrément le nombre de votes dans la table ideas
				

?>
	

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
	<title>Formulaire</title>
</head>
<body>
	<h1 class="fh1">Enquete De Satisfaction</h1>
	<div class="fdiv1">
	<form method="get" action="formulaire.php"  target="_blank">
			<label>1. comment noterier-vous, sur 10 la qualité du service que vous avez reçu de WebTech2000 (10 étant la meilleur évaluation possible) ?</label><br>
			 <select class="fvote" name="note">
				<option value="0"></option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">8</option>
				<option value="10">10</option>
			</select>
		</div>
		<div class="fdiv2">
			<label class="fradio1">2. Est-ce que vous avez recomenndé WebTech2000 à un quelqu'un depuis que vous avez utilisez nos services ?</label><br>
		 		<INPUT type="radio" = name"Oui" value="valeur du bouton">Oui<br>
		 		<INPUT type="radio" name="Non" value="valeur du bouton">Non<br>
		 		<INPUT type="radio" name="pas encore" value="valeur du bouton">pas encore mais ça viendra<br>
				
				<label class="flabel2">3. Quels sont les aspets que vous avez aprécié le plus dans nos services (plusieurs réponses possibles) ? </label><br>
		 		<INPUT type="checkbox" name="choix1" value="1"> La réactivité<br/>
		 		<INPUT type="checkbox" name="choix2" value="2"> Le professionanisme<br/>
		 		<INPUT type="checkbox" name="choix3" value="3"> L'aimablité<br/>
		 		<INPUT type="checkbox" name="choix4" value="4"> La qualité des prestations<br/>
		 		<INPUT type="checkbox" name="choix4" value="4"> Aucune de ces réponses <br/>

		 		<label for="msg">Si vous avez des commentaire sur les services reçus, des critic ou des question, laissé-les ci-dessous !:</label><br>
	   			<textarea name="message" name="user_message"></textarea><br>

			  <input type="submit" name="submit" value="Submit">
			  <INPUT TYPE="reset" NAME="nom" VALUE="Reset">
	</form> 
	</div>
	
</body>
</html>