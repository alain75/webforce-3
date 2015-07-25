<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>mdp_oublier1</title>
</head>
<body>
	<style type="text/css">
		h2{
			background: #5CADFF;
			border-radius: 4px;
			text-align: center;
		}

		.div{
			border: solid 1px #000;
			border-radius: 6px;
			margin: auto;
			width: 400px;
			height: 200px;
		}

		.dvr{
			margin-top: 15px;
			/*background: #99FFCC;*/
		}

		#gauche{
			margin-left:15px; 
		}
		
	</style>
	<h2>Vous avez oublier votre mot de passe</h2>
	<div class="div">
		<form method="POST" action="chercher_mdp.php">	
			<label class="dvr" id="gauche" for="mdp_oublier">Mdp oublier: </label>
			<input class"dvr" id="gauche" type="text" name="mdp_oublier" id="mdp_oublier" placeholder="Mot de passe">
			<button class="dvr" id"gauche" type="submit">Valider</button>	
		</form>
	</div>
</body>
</html>