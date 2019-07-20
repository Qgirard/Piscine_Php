<?php
if ($bdd = mysqli_connect("localhost:3307", "root", "dVDFj7GL"))
{
	if (mysqli_query($bdd, "CREATE DATABASE db_rush"))
	{
		echo "Database create successfully\n";
		if ($bdd = mysqli_connect("localhost:3307", "root", "dVDFj7GL", "db_rush"))
		{
			if (mysqli_query($bdd, "CREATE TABLE users (id INT(11) AUTO_INCREMENT PRIMARY KEY, nom VARCHAR(255), prenom VARCHAR(255), login VARCHAR(255), password VARCHAR(255))"))
				echo "Table users created successfully\n";
			else
				echo "Error creating table users\n";
			if (mysqli_query($bdd, "CREATE TABLE categories (id INT(11) AUTO_INCREMENT PRIMARY KEY, nom VARCHAR(255))"))
			{
				echo "Table categories created successfully\n";
				if (mysqli_query($bdd, "INSERT INTO categories (nom) VALUES ('Informatique')"))
					echo "Insertion is a success\n";
				else
					echo "Error insertion\n";
				if (mysqli_query($bdd, "INSERT INTO categories (nom) VALUES ('Electromenager')"))
					echo "Insertion is a success\n";
				else
					echo "Error insertion\n";
			}
			else
				echo "Error creating table categories\n";
			if (mysqli_query($bdd, "CREATE TABLE produits (id INT(11) AUTO_INCREMENT PRIMARY KEY, nom VARCHAR(255), prix INT (11), categorie VARCHAR(255), image VARCHAR(1000), quantity INT(11))"))
			{
				echo "Table produits created successfully\n";
				if (mysqli_query($bdd, "INSERT INTO produits (nom, prix, categorie, image, quantity) VALUES ('Ordinateur', '800', 'Informatique', 'https://www.megaport.fr/media/catalog/product/cache/2/small_image/400x/9df78eab33525d08d6e5fb8d27136e95/i/n/inter_tech_hades_main_8.png', '0')"))
					echo "Insertion is a success\n";
				else
					echo "Error insertion\n";
				if (mysqli_query($bdd, "INSERT INTO produits (nom, prix, categorie, image) VALUES ('Clavier et souris', '60', 'Informatique', 'https://cookie.fr/6630-large_default/pack-clavier-souris-filaire-msi-vigor-gk40-combo.jpg')"))
					echo "Insertion is a success\n";
				else
					echo "Error insertion\n";
				if (mysqli_query($bdd, "INSERT INTO produits (nom, prix, categorie, image) VALUES ('Refrigerateur', '1200', 'Electromenager', 'https://www.braultetmartineau.com/wcsstore/BMCatalogAssetStore/images/main/00296146_10_FRONT.png')"))
					echo "Insertion is a success\n";
				else
					echo "Error insertion\n";
				if (mysqli_query($bdd, "INSERT INTO produits (nom, prix, categorie, image) VALUES ('Lave vaisselle', '800', 'Electromenager', 'https://pngimage.net/wp-content/uploads/2018/06/lave-vaisselle-png-3.png')"))
					echo "Insertion is a success\n";
				else
					echo "Error insertion\n";
			}
			else
				echo "Error creating table\n";
		}
		else
			die("Connection failed: " . mysqli_connect_error());
	}
	else
		echo "Error creating database: " . mysqli_error($bdd);
}
else
	die("Connection failed: " . mysqli_connect_error());
?>
