

<!--
nom :createAdminCsv.php
fonction : le but de ce script est de créer un csv qui contient par défault les login admin et mot de passe admin
-->

<?php session_start();if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && $_SESSION['loggedin'] == true) 
// script de sécurité, si la personne ne s'est pas connecté, il est impossible d'acceder a la page , renvoies ensuite vers la page d'erreur (cf bas de page)
{


	// ce fichier sert a créer un ficheir csv, avec une ligne par défault, il peut aussi servir à réinistialiser le contenu de données de la billeterie
	$list = [
		[0,"admin", "admin"] // on définie une liste "type"
	];
	$fp = fopen('admin.csv','w'); // on enregistre dans une variable, l'ouverture du fichierr csv en mode écriture

	foreach ($list as $i)  // boucle qui parcours la liste "type" et on met dans le ficheir csv ses données
	{
		fputcsv($fp, $i);
	}
	fclose($fp); // fermeture du fichier csv
	//header('location:gestionBilleterie.php'); // le script renvoie directement vers le portail de gestion de billeterie

	header('location:gestionGenerale.php'); // renvoie la page de gestion
} 

else {header('location:logFirst.php'); }//renvoies vers la page erreur s'i on est pas connecté?>
