<?php
session_start();
if ($bdd = mysqli_connect("localhost:3307", "root", "dVDFj7GL", "db_rush"))
{
	if ($_SESSION["login"] != NULL)
		echo "Bienvenue : " . $_SESSION["login"] . ". Cliquez sur le panier lorsque vos choix sont faits.";
	else
		echo "Bienvenue, vous devez vous connecter ou vous inscrire pour pouvoir valider votre panier.";
}
else
	echo "Erreur de connexion\n";
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Boutique en ligne</title>
		<link rel="stylesheet" href="style.css"/>
	</head>
	<body style="background-color:teal">
		<h1 style="color:white;text-align:center"><font size="+5">Boutique de matériels informatiques et électroménagers</font></h1>
		<ul>
			<li><a href="inscription.html">Inscription</a></li>
			<li><a href="connexion.html">Connexion</a></li>
			<li><a href="suppression.html">Désinscrire</a></li>
			<li><a href="deconnexion.php">Deconnexion</a><li>
		</ul>
		<a href="panier.php">
			<img
			src="https://image.flaticon.com/icons/png/512/126/126083.png"
			width="70px"
			height="70px"
			title="Panier"
			/>
		</a>
		<p style="color:white;text-align:left"><font size="+3">Catégories :</font></p>
		<a href="index.php" style="color:white;text-align:left;width:150px"><font size="+3">Tout</font></a><br />
		<?php $check = mysqli_query($bdd, "SELECT * FROM categories");
		foreach ($check as $prod):?>
		<a href="cat_category.php?value=<?=$prod["nom"]?>" style="color:white;text-align:left;width:150px"><font size="+3"><?=$prod["nom"]?></font></a><br />
		<?php endforeach;?>
		<?php $value = $_GET["value"];
		$check = mysqli_query($bdd, "SELECT * FROM produits WHERE categorie='$value'");
		foreach ($check as $prod):
		?>
		<div class="flip-card-1">
			<div class="flip-card-inner">
				<div class="flip-card-front">
					<img
					src=<?=$prod["image"]?>
					class="ordi"
					/>
				</div>
				<div class="flip-card-back">
					<h1><?=$prod["nom"]?></h1><br/>
					<h1><?=$prod["prix"]?> euros</h1><br />
					<a href="add_to_basket.php?value=<?=$prod["nom"]?>"><h1>Ajouter au panier</h1></a>
				</div>
			</div>
		</div><br /><br /><br /><br /><br /><br />
		<?php endforeach;?>
	</body>
</html>