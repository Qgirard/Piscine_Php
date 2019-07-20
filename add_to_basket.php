<?php
session_start();
$prod = $_GET["value"];
?>

<html>
	<head>
		<meta charset="utf-8">
		<title><?=$prod?></title>
		<link rel="stylesheet" href="style.css"/>
	</head>
	<body style="background-color:teal">
		<h1 style="color:white;text-align:center"><font size="+5">Boutique de matériels informatiques et électroménagers</font></h1>
		<form method="POST" action="add_quantity.php?prod=<?=$prod?>">
			<fieldset id="infos">
				<legend>Combien de <?=$prod?> voulez-vous :</legend>
				<label for="nom">Entrez la quantité de matériels que vous désirez :</label>
				<input type="text" name="quantity" value=""/><br /><br />
				<input type="submit" name="submit" value="OK" />
			</fieldset>
		</form>
	</body>
</html>