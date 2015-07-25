
<?php
	
	session_start();
	include("config.php");
	include("vendor/autoload.php");
	include("functions.php");
	include("db.php");

	$email = $_POST['mdp_oublier1'];

	/*--------Verifier si la boite mail existe dans la base de donnée--------*/ 

	$sql = "SELECT * FROM users 
			WHERE email = :email ";

	$sth = $dbh->prepare($sql);
	$sth->bindValue(":email", $email);
	$sth->execute();

	$foundUser = $sth->fetch();

		/*||||||| Attention : PHP 5.5 ou plus !!! ||||--||||  Sinon, depuis 5.3.7 : https://github.com/ircmaxell/password_compat --*/
		/*--il genere le clé du token--*/ 
	if ($foundUser){
		$factory = new RandomLib\Factory;
		$generator = $factory->getGenerator(new SecurityLib\Strength(SecurityLib\Strength::MEDIUM));
			$randomString = $generator->generateString(64, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_');
		echo $randomString;


		/*----------mise a jour de la base de donnée --------------------------------*/
		$sql = "UPDATE users
				SET token = :token
				WHERE email = :email";

				$sth = $dbh->prepare($sql);
				$sth->bindValue(":token", $randomString);
				$sth->bindValue(":email", $email);

				$sth->execute();

				// include('change_password');
		/*-----------redirection vers la page protégée ----------*/ 		
			$_SESSION["user"] = $foundUser;
			header("localhost/13/auth");
			die();

	} 
		/*else{
			echo " utilisateur non trouvé";

		} */
		