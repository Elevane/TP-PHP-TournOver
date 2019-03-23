
<!--
nom :createContactCsv.php
fonction : le but de ce script est de supprimer tous les mails de contact.
-->


<?php session_start();if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && $_SESSION['loggedin'] == true) 
// script de sécurité, si la personne ne s'est pas connecté, il est impossible d'acceder a la page , renvoies ensuite vers la page d'erreur (cf bas de page)
{

	// ce fichier sert a créer un ficheir csv, avec une ligne par défault, il peut aussi servir à réinistialiser le contenu de données de contact

	$list = [
		[1,"nom","prenom","email","numero","objet","text"] //on définie une liste "type"
	
	];
	$fp = fopen('contact.csv','w');// on enregistre dans une variable, l'ouverture du ficheir csv en mode écriture

	foreach ($list as $i) // boucle qui parcours la liste "type" et on met dans le ficheir csv ses données
	{
		fputcsv($fp, $i);
	}
	fclose($fp);// fermeture du fichier csv
	header('location:gestionContact.php');// le fichier renvoie directement vers le portail de gestion de contact

	 


	 
}

 else {header('location:logFirst.php'); }//renvoies vers la page erreur s'i on est pas connecté?>
