<!--
nom :auth.php
fonction : ce fichier reçoit des information du formulaire de "admin.php", il vérifie si le login et le mot de passe sotn correct et existent bien dans le registre (admin.csv);
-->



<?php 
if (isset($_POST['login']) && isset($_POST['pwd'])) // on verifie que les champs on bien été remplis
{

	$login = htmlspecialchars($_POST['login']); // les valeurs données sont sécurisées et misent dans des varaibles
	$pwd = htmlspecialchars($_POST['pwd']);

	

	$fp = fopen('admin.csv', 'r'); // on ouvre le fichier csv en mode lecture dans uen variable

	while($data = fgetcsv($fp, 100000, ',')) // boucle qui parcours le ficheir csv
		if ($data[1] == $login && $data[2] == $pwd) // si le login et le mot de passe correspondent
		{
			session_start(); // démare la session
			$_SESSION['login'] = $login; // le login de la session est celui qui c'est loggé
			$_SESSION['pwd'] = $pwd; // pareil pour le mot de passe
			$_SESSION['loggedin'] = true; // un bollean qui dit que nous sommes connectés
			
			header('location:gestionAcceuil.php'); // envoies vers la page de gestion
		}

		else
		{
			header('location:admin.php'); // si les login et mdp ne sont pas dans le ficher csv , ce ne sont aps les bon donc renvois vers la page de login
		}
}

else
{
	header('location:admin.php'); // si les conditions ne sont aps remplis, exp = pas de mdp remplis, pas de login remplis
}



 ?>