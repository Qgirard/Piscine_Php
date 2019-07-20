<?php
if ($bdd = mysqli_connect("localhost:3307", "root", "dVDFj7GL", "db_rush"))
{
	if ($_POST["login"] != NULL && $_POST["password"] != NULL && $_POST["submit"] == "OK")
	{
		$login = mysqli_real_escape_string($bdd, $_POST["login"]);
		$password = mysqli_real_escape_string($bdd, $_POST["password"]);
		$password = hash("whirlpool", $password);
		$res = mysqli_query($bdd, "SELECT * FROM users WHERE login = '$login' and password = '$password';");
		$res = mysqli_fetch_array($res);
		if ($res == FALSE)
			echo "Réessayez de vous connecter ou inscrivez-vous si cela n'est pas deja fait\n";
		else
		{
			session_start();
			$_SESSION["login"] = $login;
			header('Location: index.php');
		}
	}
	else
		echo "Réessayez de vous connecter ou inscrivez-vous si cela n'est pas deja fait\n";
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