<?php
session_start();
if ($bdd = mysqli_connect("localhost:3307", "root", "dVDFj7GL", "db_rush"))
{
	if ($_SESSION["login"] != NULL)
	{
		echo "Bienvenue : " . $_SESSION["login"] . ".";
		$_SESSION["action"] = "achat.php";
	}
	else
		$_SESSION["action"] = "connexion.html";
	if ($_SESSION["Ordinateur"] == NULL)
		$_SESSION["Ordinateur"] = 0;
	if ($_SESSION["Clavier et souris"] == NULL)
		$_SESSION["Clavier et souris"] = 0;
	if ($_SESSION["Refrigerateur"] == NULL)
		$_SESSION["Refrigerateur"] = 0;
	if ($_SESSION["Lave vaisselle"] == NULL)
		$_SESSION["Lave vaisselle"] = 0;
}
else
	echo "Erreur de connexion\n";
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Panier</title>
		<link rel="stylesheet" href="style.css"/>
	</head>
	<body style="background-color:teal">
		<h1 style="color:white;text-align:center"><font size="+5">Boutique de matériels informatiques et électroménagers</font></h1>
		<a href="index.php" style="color:white;text-align:left;width:150px"><font size="+3">Accueil</font></a><br />
		<ul>
			<li><a href="inscription.html">Inscription</a></li>
			<li><a href="connexion.html">Connexion</a></li>
			<li><a href="suppression.html">Désinscrire</a></li>
			<li><a href="deconnexion.php">Deconnexion</a><li>
		</ul>
		<form method="POST" action="<?=$_SESSION["action"]?>">
			<fieldset id="infos">
				<legend>Liste des articles dans le panier :</legend>
				<label for="ordinateurs">Ordinateurs Gamers :</label>
				<input type="text" name="Ordinateur" value="<?=$_SESSION["Ordinateur"]?>"/>
				<label>Prix : <?=$_SESSION["Ordinateur"] * 800 . " €"?></label>
				<br /><br />
				<label for="clavieretsouris">Packs clavier/souris :</label>
				<input type="text" name="claviersouris" value="<?=$_SESSION["Clavier et souris"]?>"/>
				<label>Prix : <?=$_SESSION["Clavier et souris"] * 60 . " €"?></label>
				<br /><br />
				<label for="refrigerateur">Réfrigérateurs :</label>
				<input type="text" name="Refrigerateur" value="<?=$_SESSION["Refrigerateur"]?>"/>
				<label>Prix : <?=$_SESSION["Refrigerateur"] * 1200 . " €"?></label>
				<br /><br />
				<label for="lavevaisselle">Lave vaisselle :</label>
				<input type="text" name="lavevaisselle" value="<?=$_SESSION["Lave vaisselle"]?>"/>
				<label>Prix : <?=$_SESSION["Lave vaisselle"] * 1000 . " €"?></label>
				<br /><br />
				<label for="prixtotal">Prix total TTC : <?=($_SESSION["Ordinateur"] * 800) + ($_SESSION["Clavier et souris"] * 60) + ($_SESSION["Refrigerateur"] * 1200) + ($_SESSION["Lave vaisselle"] * 1000). " €"?></label>
				<br /><br />
				<input type="submit" name="submit" value="Valider" />
			</fieldset>
		</form>
	</body>
</html>