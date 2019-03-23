
<!--
nom :createContenuCsv.php
fonction : le but de ce script est de réinitialisé la contenu de la partie Nos evenements.
-->


<?php session_start();if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && $_SESSION['loggedin'] == true) 
// script de sécurité, si la personne ne s'est pas connecté, il est impossible d'acceder a la page , renvoies ensuite vers la page d'erreur (cf bas de page)
{

	// ce fichier sert a créer un ficheir csv, avec une ligne par défault, il peut aussi servir à réinistialiser le contenu de données de la page nos évenements

	$list = [
		[0,"titre","text","image"]// on définie une liste type
	];
	$fp = fopen('contenu.csv','w'); // on enregistre dans une variable, l'ouverture du fichier csv en mode écrite

	foreach ($list as $i) // boucler qui parcorus la liste "type" crée précédement
	{
		fputcsv($fp, $i); // insert les données de la liste dans le ficheir csv ligne par ligne
	}
	fclose($fp); // ferme le ficheir csv
	header('location:gestionNosEvenements.php'); // le script renvoie directement vers le portail de gestion de nos evenements
} 

else {header('location:logFirst.php'); }//renvoies vers la page erreur s'i on est pas connecté?>
