<!--
nom :logFirst.php
fonction :c'est la page d'acceuil sur l'aquelle on est envoyé si on essay d'acceder au back office sans y etre connecté
-->

<!DOCTYPE html> <!-- ouverture du ficheir html-->
<html><!-- balise d'ouverture du fichier html, tous le contenu html doti ce trouver dedans -->
	<head> <!-- ouverture de la balise head, les meta données et données sémentiques de la page doivent s'y trouver, exp : auteur, titre de la page, langue....-->
		<meta charset="utf-8"> <!--norme de caractère de la page-->
		<meta author="BSB-WEB"> <!-- entreprise qui a réalisé le site -->
		<link href="css/backOffice.css" rel="stylesheet"><!--  lien vers le fichier css de la page-->
		<title>back-Office du site tournover</title> <!-- titre de la page -->
	</head><!-- fermeture de la balise head-->
		<body><!--ouverture de la balise body, le cotnenu de la page suit -->

			<?php

			echo "<h2>Veuillez vous connecter</h2>"; ?>

			<a href="admin.php">page de login</a>

		</body>
	</html>