<?php
	if ($_POST["login"] != NULL && $_POST["password"] != NULL && $_POST["submit"] == "OK")
	{
		if (($_POST["login"] != 'admin') || ($_POST["password"] != 'toto'))
			die ("admin login failed\n");
		else
		{
			session_start();
			$_SESSION["login"] = 'admin';
			header('Location: admin_page.php');
		}
	}
	else
		echo "missing credentials\n";
?>
