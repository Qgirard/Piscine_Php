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
		if (!isset($_POST['login']))
			die("user login required.\n");
		$user = mysqli_real_escape_string($bdd, $_POST['login']);
		$res = mysqli_query($bdd, "DELETE FROM users WHERE login = '$user'");
		if ($res == FALSE)
		{
			die ("Error deleting user");	
		}
		die("user deleted");
	}
	else if (isset($_POST['add']))
	{
		if ((!isset($_POST['login'])) || (!isset($_POST['password']))
			|| (!isset($_POST['name'])) || (!isset($_POST['lastname'])))
		{
			die("user credentials required.\n");
		}
		$nom = mysqli_real_escape_string($bdd, $_POST["lastname"]);
		$prenom = mysqli_real_escape_string($bdd, $_POST["name"]);
		$login = mysqli_real_escape_string($bdd, $_POST["login"]);
		$password = mysqli_real_escape_string($bdd, $_POST["password"]);
		$password = hash("whirlpool", $password);
		$check = mysqli_query($bdd, "SELECT * FROM users WHERE login = '$login';");
		$check = mysqli_fetch_array($check);
		if ($check == TRUE)
			echo "Ce nom d'utilisateur existe déjà\n";
		else
		{
			$res = mysqli_query($bdd, "INSERT INTO users (nom, prenom, login, password) VALUES ('$nom', '$prenom', '$login', '$password');");
			if ($res == FALSE)
				echo "Echec de l'enregistrement veuillez réessayer\n";
			else
			{
				echo "succesfully added user\n";
				header('Location: admin_page.php');
			}
		}
	}
	else
	{
		echo 'unknown action';
	}
}
else
{
	die("error connecting to database");
}
?>