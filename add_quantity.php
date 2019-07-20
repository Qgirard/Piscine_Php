<?php
session_start();
$quantity = $_POST["quantity"];
$prod = $_GET["prod"];
if ($quantity != NULL && is_numeric($quantity) == TRUE && $_POST["submit"] == "OK")
{
	$_SESSION[$prod] = $quantity;
	header('Location: index.php');
}
else
	echo "Nombre invalide\n";
?>

<html>
	<head>
	</head>
	<body style="background-color:teal">
	</body>
</html>