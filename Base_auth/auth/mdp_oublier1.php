<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>mdp_oublier1</title>
</head>
<body>
	<style type="text/css">
		body{
			background: #A2B5BF;
		}
		h2{
			height: 50px;
			line-height: 49px;
			background: #5CADFF;
			border-radius: 4px;
			text-align: center;
			box-shadow: 3px 3px 1px #888888;
		}

		.div{
			/*border: solid 1px #000;*/
			border-radius: 6px;
			margin: auto;
			width: 400px;
			height: 200px;
			background: #66E0C2;
			box-shadow: 5px 5px 2px #888888;
		}
		#mdpl{
			background: #CACACA;
			width: 110px;
			height: 30px;
			margin-left:15px; 
			margin-top: 15px;
			padding-top: 3px;
			padding-left: 2px;
			display: block;
			/*border: solid 1px red;*/
			border-radius: 4px;
			float: left;
			line-height: 25px; /*- aligne le text verticalement à l'interieur d'un objet -*/
			font-size: 14px;
			box-shadow: 3px 3px 1px #888888;
		}
		#mdpi{
			height: 30px;
			font-size: 20px;
			margin-top: 15px;
			margin-left: 10px;
			border-radius: 4px;
			/*box-shadow: 5px 5px 2px #888888;*/

		}
		#btn{
			width: 250px;
			height: 30px;
			margin-left:137px; 
			margin-top: 17px;
			box-shadow: 3px 3px 1px #888888;
		}


		
	</style>
	<h2>Vous avez oublier votre mot de passe ?</h2>
	<div class="div">
		<form method="POST" action="mdp_oublier1.php">	
			<label  id="mdpl" for="mdp_oublier">Entrée votre email</label>
			<input  id="mdpi" type="text" name="mdp_oublier" id="mdp_oublier" placeholder="Entrée votre email">
			<button id="btn" type="submit">Valider</button>	
		</form>
	</div>
</body>
</html>