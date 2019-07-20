<?php
session_start();
if ($_SESSION["login"] != "admin")
{
	die ("nope");
}
if (($bdd = mysqli_connect("localhost:3307", "root", "dVDFj7GL", "db_rush")))
{
	if (isset($_POST['del']))
	{
		if (!isset($_POST['id']))
			die("product id required\n");
		$id = mysqli_real_escape_string($bdd, $_POST['id']);
		$res = mysqli_query($bdd, "DELETE FROM produits WHERE id = '$id'");
		if ($res == FALSE)
		{
			die ("error deleting product");
		}
		die ("product deleted");

	}
	else if (isset($_POST['add']))
	{
		if ((!isset($_POST['name'])) || (!isset($_POST['price'])) ||  (!isset($_POST['category'])) || (!isset($_POST['imgurl'])))
		{
			die ("product data is required\n");
		}
		$name = mysqli_real_escape_string($bdd, $_POST['name']);
		$price = mysqli_real_escape_string($bdd, $_POST['price']);
		$category = mysqli_real_escape_string($bdd, $_POST['category']);
		$imgurl = mysqli_real_escape_string($bdd, $_POST['imgurl']);
		$res = mysqli_query($bdd, "INSERT INTO produits (nom, prix, categorie, image) VALUES ('$name', '$price', '$category', '$imgurl')");
		if ($res == FALSE)
			die ("failed adding product\n");
		die ("product added succesfully\n");
	}
	else
	{
		echo 'unknown action';
	}
}
else
	echo "Error connecting to DB\n"
?>