<?php
if ($bdd = mysqli_connect("localhost:3307", "root", "dVDFj7GL", "db_rush"))
{
	if ($_POST["nom"] != NULL && $_POST["prenom"] != NULL && $_POST["login"] != NULL
	&& $_POST["password"] != NULL && $_POST["submit"] == "OK" && $_POST["login"] != "admin")
	{
		$nom = mysqli_real_escape_string($bdd, $_POST["nom"]);
		$prenom = mysqli_real_escape_string($bdd, $_POST["prenom"]);
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
				session_start();
				$_SESSION["login"] = $login;
				header('Location: index.php');
			}
		}
	}
	else
		echo "Remplissez tous les champs\n";
}
else
	echo "Erreur de connexion\n";
?>

<html>
	<head>
	</head>
	<body style="background-color:teal">
	</body>
</html>