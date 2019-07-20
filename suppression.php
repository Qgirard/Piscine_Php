<?php
if ($bdd = mysqli_connect("localhost:3307", "root", "dVDFj7GL", "db_rush"))
{
	if ($_POST["nom"] != NULL && $_POST["prenom"] != NULL && $_POST["login"] != NULL
	&& $_POST["password"] != NULL && $_POST["submit"] == "Je supprime mon compte")
	{
		$nom = mysqli_real_escape_string($bdd, $_POST["nom"]);
		$prenom = mysqli_real_escape_string($bdd, $_POST["prenom"]);
		$login = mysqli_real_escape_string($bdd, $_POST["login"]);
		$password = mysqli_real_escape_string($bdd, $_POST["password"]);
		$password = hash("whirlpool", $password);
		$check = mysqli_query($bdd, "SELECT * FROM users WHERE nom = '$nom' and prenom = '$prenom' and login = '$login' and password = '$password';");
		$check = mysqli_fetch_array($check);
		if ($check == TRUE)
		{
			$check = mysqli_query($bdd, "DELETE FROM users WHERE nom = '$nom' and prenom = '$prenom' and login = '$login' and password = '$password';");
			if ($check == FALSE)
				echo "Erreur de suppression veuillez réessayer\n";
			else
				echo "Votre compte a été supprimé\n";
		}
		else
			echo "Ce compte n'existe pas\n";
	}
	else
		echo "Ce compte n'existe pas\n";
}
else
	echo "Erreur de connexion"
?>

<html>
	<head>
	</head>
	<body style="background-color:teal">
	</body>
</html>