
<!--
nom :delCompte.php
fonction : ce fichier vise a supprimer un compte administrateur-->




<?php session_start();if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && $_SESSION['loggedin'] == true) 
// script de sécurité, si la personne ne s'est pas connecté, il est impossible d'acceder a la page , renvoies ensuite vers la page d'erreur (cf bas de page)
{



	$id = htmlspecialchars($_POST['id']); // on récupere l'id de la ligne a laquelle on a cliqué


	$liste = []; // création d'un liste vide

	$fp = fopen('admin.csv', 'r'); // si on peut ouvrir le fichier csv en mode lecture
		while($data = fgetcsv($fp, 10000, ',')) // boucle qui parcours le fichier ligne par ligne
		{
			if ($id == $data[0]) // si cette ligne a le meme id que l'id qu'on on récupere ne rien faire
			{}
			else // sinon copier totus les infos de la ligen dans une nouvelle liste
			{
				$liste2 = [$data[0],$data[1],$data[2]];
				array_push($liste, $liste2); // toutes les infos qui sont réperé sont mid dans a liste vide
			}
		}
		fclose($fp); // fermeture du csv
	

	$fp = fopen('admin.csv', 'w'); // ouverture en mode écriture
	foreach ($liste as $i)  //boucel qui parcours la liste maintenant plein des infos sauf celle de la ligne qui porte l'id selectionné
	{
		fputcsv($fp, $i);// mets les données de la liste dans le csv
	}

	fclose($fp);// femture du csv

	header('Location:gestionGenerale.php'); // redirige vers la page de gestion de contact

	

}

else {header('location:logFirst.php'); }//renvoies vers la page erreur s'i on est pas connecté?>
