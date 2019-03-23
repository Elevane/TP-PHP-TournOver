<!--
nom :Admin.php
fonction : Formulaire de connection a la partie back office, l'utilisateur doit renter un login et un mot de passe. 
il renvoie vers le fichier auth.php.
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

			<section  id="login">
				<h1>Login</h1>
				<form action="auth.php" method="POST"> <!-- ouverture de la balise formulaire le formulaire enverra les infos vers le fichier auth.php avec la méthode POST-->
				    
				    <label for="login">login</label> <!-- input de type texte pour le login -->
				    <input type="text" name="login">

				    <label for="pwd">mot de passe</label>
				    <input type="password" name="pwd"><!-- input de type texte pour le mot de passe -->

				    <label for="submit"></label><!-- input de type submit pour le bouton de validation-->
				    <input type="submit" name="submit" value="se connecter">
				</form><!-- fermeture de la balise form-->
			</section>
		</body>
	</html>

			