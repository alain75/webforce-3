<?php

	'<div class="alert">'.session_start().'<div/>';

	include("config.php");
	//pour inclure nos librairies composer
	include("vendor/autoload.php");
	include("functions.php");
	include("db.php");

	//tester la soumission du formulaire avec un print_r()
	$error = "";

	//si le form est soumis...
	if (!empty($_POST)){

		//on crée nos variables, tout en enlevant les balises HTML
		//et les espaces en début et fin de chaîne
		$email = trim(strip_tags($_POST['email']));
		$username = trim(strip_tags($_POST['username']));
		$password = trim(strip_tags($_POST['password']));
		$password_confirm = trim(strip_tags($_POST['password_confirm']));

		//validation

		//email vide ?
		if(empty($email)){
			$error = "Veuillez renseigner votre email !";
		}
		//email valide ?
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error = "Votre email n'est pas valide !";
		}
		//email trop long ?
		elseif(strlen($email) > 100){
			$error = "Votre email est long, trop long.";
		}
		else {
			//email déjà présent dans la base ?
			$sql = "SELECT email FROM users WHERE email = :email";
			$sth = $dbh->prepare($sql);
			//l'array remplace le bindValue()
			$sth->execute(array(":email" => $email));
			$foundEmail = $sth->fetchColumn();

			if ($foundEmail){
				$error = "Cet email est déjà enregistré ici !";
			}
		}

		//expression rationnelle pour nos usernames
		$usernameRegexp = "/^[\p{L}0-9._-]{2,100}$/u";

		//username vide ?
		if(empty($username)){
			$error = "Veuillez renseigner votre pseudo !";
		}
		//username trop long ?
		elseif(strlen($username) > 100){
			$error = "Votre pseudo est long, trop long.";
		}
		//username est un email ?
		elseif(filter_var($username, FILTER_VALIDATE_EMAIL)){
			$error = "Veuillez ne pas utiliser d'email comme pseudo !";
		}
		//contient uniquement des lettres, des chiffres et des tirets et underscore
		elseif(!preg_match($usernameRegexp, $username)){
 			$error = "Votre pseudo doit correspondre à /^[\p{L}0-9._-]{2,100}$/u";
		}
		else {
			//username déjà présent dans la base ?
			$sql = "SELECT username FROM users WHERE username = :username";
			$sth = $dbh->prepare($sql);
			//l'array remplace le bindValue()
			$sth->execute(array(":username" => $username));
			$foundUsername = $sth->fetchColumn();

			if ($foundUsername){
				$error = "Ce pseudo est déjà enregistré ici !";
			}
		}

		//mots de passe correspondent ?
		if ($password != $password_confirm){
			$error = "Vos mots de passe ne correspondent pas !";
		}
		//longueur minimale
		elseif(strlen($password) <= 6){
			$error = "Veuillez saisir un mot de passe d'au moins 7 caractères !";
		}
		else {
			//le mot de passe contient au moins une lettre ?
			$containsLetter  = preg_match('/[a-zA-Z]/', $password);
			//le mot de passe contient au moins un chiffre ?
			$containsDigit   = preg_match('/\d/', $password);
			//le mot de passe contient au moins un autre caractère ?
			$containsSpecial = preg_match('/[^a-zA-Z\d]/', $password);

			//si une des conditions n'est pas remplie... erreur
			if (!$containsLetter || !$containsDigit || !$containsSpecial){
				$error = "Veuillez choisir un mot de passe avec au moins une lettre, 
						un chiffre et un caractère spécial.";
			}
		}


		//si on n'a pas d'erreur 
		//en d'autre mots, si notre variable est encore vierge
		if (empty($error)){
			//insert dans la table users
			$sql = "INSERT INTO users (id, email, username, password, date_created, date_modified) 
					VALUES (NULL, :email, :username, :password, NOW(), NULL)";

			$sth = $dbh->prepare($sql);

			//on donne une valeur aux paramètres de la requête
			$sth->bindValue(":email", $email);
			$sth->bindValue(":username", $username);

			/*
			||||||| Attention : PHP 5.5 ou plus !!! |||||||||
			||||  Sinon, depuis 5.3.7 : https://github.com/ircmaxell/password_compat
			*/
			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
			$sth->bindValue(":password", $hashedPassword);

			$sth->execute();

			//connecter l'utilisateur programmatiquement
			//on va rechercher toutes les infos qu'on vient s'insérer (sans le mdp)
			//afin qu'elles soient structurées comme sur la page de login
			$sql = "SELECT id, email, username, date_created, date_modified 
					FROM users 
					WHERE id = :id";

			$sth = $dbh->prepare($sql);
			$sth->bindValue(":id", $dbh->lastInsertId());
			$sth->execute();
			$user = $sth->fetch();

			//on met l'array dans la session pour connecter le user
			$_SESSION['user'] = $user;
			//puis on redirige vers la page protégée
			header("Location: profile.php");
			die();
		}

	}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Inscription !</title>
</head>
<body>
	<style type="text/css">
	body{
		background: #A2B5BF;
	}
		.alert{
			background: #66E0C2;
		}
		h1{
			height: 50px;
			margin:auto;
			/*margin-left: -8px; 	/* pour étandre le bondeau ou maximume côté gauche */
			/*margin-right: -8px; 	/* pour étandre le bondeau ou maximume côté droit */
			padding-top: 3px;
			background: #3399FF;
			text-align: center;
			border-radius: 4px;
			box-shadow: 5px 5px 2px #888888;
		}
		#carre{
			margin:auto;
			margin-top: 15px;
			padding-top: 15px;
			border-radius: 6px;
			width: 600px;
			height: 400px;
			background:#66E0C2;
			box-shadow: 5px 5px 2px #888888;
			/*border: solid 1px #000;*/
		}

		#cadre{
			border: solid 1px red;
		}

		#mail{
			width: 300px;
			height: 40px;
			font-size: 20px;
			margin-left: 160px;
			margin-bottom: 6px;
			padding-top: 4px;
			border-radius: 4px;
			display: block;
		}
		#pseudo{
			width: 300px;
			height: 40px;
			font-size: 20px;
			margin-left: 160px;
			margin-bottom: 6px;
			padding-top: 4px;
			border-radius: 4px;
			display: block;
		}
		#password{
			width: 300px;
			height: 40px;
			font-size: 20px;
			margin-left: 160px;
			margin-bottom: 6px;
			padding-top: 4px;
			border-radius: 4px;
			display: block;
		}
		#c_password{
			display: block;
			width: 300px;
			height: 40px;
			font-size: 20px;
			margin-left: 160px;
			margin-bottom: 6px;
			padding-top: 4px;
			border-radius: 4px;
			display: block;
			
		}
		#label{
			background: #CACACA;
			margin-left: 4px;
			margin-bottom: 4px;
			padding-top: 4px; 
			padding-left: 4px;
			border-radius: 3px;
			width: 140px;
			height: 30px;
			display: block;
			float: left;
			box-shadow: 3px 3px 1px #888888;
			text-align: left;
		}

		#btn{
			width: 300px;
			height: 40px;
			font-size: 20px;
			margin-left: 160px;
			margin-top: 15px;
			margin-bottom: 4px;
			padding-top: 4px;
			box-shadow: 3px 3px 1px #888888;
		}
		
		#divphp{
			display: block;
			width: 300px;
			height: 80px;
			font-size: 20px;
			margin-top: 15px;
			margin-left: 160px;
			margin-bottom: 6px;
			padding-top: 6px;
			border: solid 1px #000;
			border-radius: 4px;
			display: block;
			background: #FF9966;
			text-align: center;
			box-shadow: 3px 3px 1px #888888;
		}

		/*input:hover{
			float:left;
		}

		label:hover{
			float: right;
		}
*/



	</style>
	<h1>Inscription !</h1>
	<form id="carre" method="POST" id="login_form">
		<div id="carde">
			<label id="label" for="email">Votre email</label>
			<input id="mail" type="email" name="email" id="email" placeholder="email" />
		</div>
		<div>
			<label id="label" for="username">Votre pseudo</label>
			<input id="pseudo" type="text" name="username" id="username" placeholder="pseudo" />
		</div>
		<div>
			<label id="label" for="password">Votre mot de passe</label>
			<input id="password" type="password" name="password" id="password" placeholder="password" />
		</div>
		<div>
			<label id="label" for="password_confirm"> Confirm password !</label>
			<input id="c_password" type="password" name="password_confirm" id="password_confirm" placeholder="confirm_password" />
		</div>
		<button id="btn" type="submit">OK !</button>
		<?php 
		if (!empty($error)){
			echo '<div id="divphp">' . $error . '</div>';
		}
		?>
	</form>
</body>
</html>