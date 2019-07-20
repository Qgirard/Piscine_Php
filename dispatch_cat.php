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
		if (!isset($_POST['name']))
			die("Category name required\n");
		$name = mysqli_real_escape_string($bdd, $_POST['name']);
		$res = mysqli_query($bdd, "DELETE FROM categories WHERE nom = '$name'");
		if ($res == FALSE)
		{
			die ("error deleting category\n");
		}
		die ("category deleted\n");

	}
	else if (isset($_POST['add']))
	{
		if (!isset($_POST['name'])) 
		{
			die ("category name is required\n");
		}
		$name = mysqli_real_escape_string($bdd, $_POST['name']);
		$res = mysqli_query($bdd, "INSERT INTO categories (nom) VALUES ('$name')");
		if ($res == FALSE)
			die ("failed adding category\n");
		die ("category added succesfully\n");
	}
	else
	{
		echo 'unknown action';
	}
}
else
	echo "Error connecting to DB\n"
?>