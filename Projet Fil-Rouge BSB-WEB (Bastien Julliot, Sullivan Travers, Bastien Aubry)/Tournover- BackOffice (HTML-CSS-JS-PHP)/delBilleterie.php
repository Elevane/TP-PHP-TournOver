
<!--
nom :delBilleterie.php
fonction : supprimer un evenement payant sur la page billeterie
-->



<?php session_start();if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && $_SESSION['loggedin'] == true) 
// script de sécurité, si la personne ne s'est pas connecté, il est impossible d'acceder a la page , renvoies ensuite vers la page d'erreur (cf bas de page)
{

	$id = htmlspecialchars($_POST['id']); // on récupère l'id, grace a un input hidden, de la ligne qu'on veut supprimer 


	$liste = []; // création d'une liste vide, qui servira ensuite a recevoir toutes les infos sauf celles que l'on veut supprimer

	if ($fp = fopen('billeterie.csv', 'r')) // ouvrir le csv en lecture
	{
		while($data = fgetcsv($fp, 10000, ',')) // boucle qui parcours le fichier csv ligne par ligne, la virgule sépare les données
		{

			if ($id == $data[0]) // si l'id de la ligne ou est rendu la boucle et la même que celle que l'on veut supprimer
			{

			}
			else // si c'est une autre ligne, recopie les infos dans une ligne temporaire
			{
				$liste2 = [$data[0],$data[1],$data[2],$data[3],$data[4],$data[5],$data[6],$data[7]]; // liste temporaire ou sont stockés les infos
				array_push($liste, $liste2); // on met ensuite toutes les infos de la liste2 dans la liste initiale
				
			}
		}
		fclose($fp); // fermeture du csv en lecture
	}
		else{header('Location:gestionBilleterie.php'); // renvois au panneaux de gestion de contenu}
	 } 

	$fp = fopen('billeterie.csv', 'w'); // ouvrir le csv en écriture

	foreach ($liste as $i) // boucle qui re-remplis le csv avec la liste sans la ligne de l'id correspondant
	{
		fputcsv($fp, $i); 
	}

	fclose($fp); // ferme le ficheir csv


	header('Location:gestionBilleterie.php'); // renvois au panneaux de gestion de contenu
	}



 else {header('location:logFirst.php'); }//renvoies vers la page erreur s'i on est pas connecté?>
