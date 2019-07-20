<?php
session_start();
if ($_SESSION["login"] != "admin")
{
	die ("nope");
}

?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Connexion</title>
		<link rel="stylesheet" href="style.css"/>
	</head>
	<body style="background-color:teal">
	<form method="POST" action="dispatch_adminctl.php">
			<fieldset id="userctl">
				<legend>User control :</legend>
				<label for="login">User login:</label>
				<input type="text" name="login" value="" /><br /><br />
				<label for="password">User Password:</label>
				<input type="text" name="password" value="" /><br /><br />
				<label for="name">User name:</label>
				<input type="text" name="name" value="" /><br /><br />
				<label for="lastname">User last name:</label>
				<input type="text" name="lastname" value="" /><br /><br />
				<input type="submit" name="del" value="delete" />
				<input type="submit" name="add" value="add" />
			</fieldset>
	</form>
	<form method="POST" action="dispatch_productctl.php">
			<fieldset id="productctl">
				<legend>Product management:</legend>
				
				<label for="id">Product id:</label>
				<input type="text" name="id" value="" /><br /><br />
				
				<label for="name">Product name:</label>
				<input type="text" name="name" value="" /><br /><br />
				
				<label for="price">Product Price:</label>
				<input type="text" name="price" value="" /><br /><br />
				
				<label for="category">Product Category:</label>
				<input type="text" name="category" value="" /><br /><br />
				
				<label for="imgurl">Product image url:</label>
				<input type="text" name="imgurl" value="" /><br /><br />
				
				<input type="submit" name="del" value="delete" />
				<input type="submit" name="add" value="add" />
			</fieldset>
		</form>
	<form method="POST" action="dispatch_cat.php">
		<fieldset id="catctl">
			<legend>Category:</legend>
			<label for="name">Category :</label>
			<input type="text" name="name" value="" /><br /><br />
			<input type="submit" name="del" value="delete" />
			<input type="submit" name="add" value="add" />
		</fieldset>
		</form>
	</body>
</html>
/*nom categorie prix image*/