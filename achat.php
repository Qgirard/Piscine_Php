<?php
$i = 0;
session_start();
echo $_POST["Ordinateur"];
echo $_SESSION["Clavier et souris"];
if ($_POST["submit"] == "Valider")
{
	if ($_POST["Ordinateur"] != $_SESSION["Ordinateur"])
	{
		$i = 1;
		$_SESSION["Ordinateur"] = $_POST["Ordinateur"];
	}
	if ($_POST["claviersouris"] != $_SESSION["Clavier et souris"])
	{
		$i = 1;
		$_SESSION["Clavier et souris"] = $_POST["claviersouris"];
	}
	if ($_POST["Refrigerateur"] != $_SESSION["Refrigerateur"])
	{
		$i = 1;
		$_SESSION["Refrigerateur"] = $_POST["Refrigerateur"];
	}
	if ($_POST["lavevaisselle"] != $_SESSION["Lave vaisselle"])
	{
		$i = 1;
		$_SESSION["Lave vaisselle"] = $_POST["lavevaisselle"];
	}
	if ($i == 1)
		header('Location: panier.php');
	else
	{
		session_unset();
		header('Location: achat.html');
	}
}
else
	echo "Erreur veuillez réessayer\n";
?>