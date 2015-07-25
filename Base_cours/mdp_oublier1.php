<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>mdp_oublier1</title>
</head>
<body>
	<style type="text/css">
		body{
			background: #000;
		}
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
			background: #33ADD6;
		}
		#mdpl{
			width: 100px;
			height: 30px;
			margin-left:15px; 
			margin-top: 17px;
			display: block;
			border: solid 1px red;
			border-radius: 4px;
			float: left;
			text-align: center;
			/*vertical-align: -20px;*/
		}
		#mdpi{
			height: 30px;
			font-size: 20px;
			margin-top: 15px;
			margin-left: 10px;
			border-radius: 4px;

		}
		#btn{
			width: 250px;
			height: 30px;
			margin-left:128px; 
			margin-top: 17px;
		}


		
	</style>
	<h2>Vous avez oublier votre mot de passe ?</h2>
	<div class="div">
		<form method="POST" action="chercher_mdp.php">	
			<label  id="mdpl" for="mdp_oublier">Mdp oublier: </label>
			<input  id="mdpi" type="text" name="mdp_oublier" id="mdp_oublier" placeholder="Mot de passe">
			<button id="btn" type="submit">Valider</button>	
		</form>
	</div>
</body>
</html>