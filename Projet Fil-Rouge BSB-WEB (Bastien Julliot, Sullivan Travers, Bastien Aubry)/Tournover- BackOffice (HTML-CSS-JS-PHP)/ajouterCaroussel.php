<!--
nom :ajouterCaroussel.php
fonction : ajouter des image aux csv qui contient les images du caroussel
-->
<?php session_start();if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && $_SESSION['loggedin'] == true) 
// script de sécurité, si la personne ne s'est pas connecté, il est impossible d'acceder a la page , renvoies ensuite vers la page d'erreur (cf bas de page)
{


	if (isset($_FILES['imgCaroussel'])) // on vérifie que tous les champs ont bien été remplis, le titre, le texte et l'image.
	 {
		$image= $_FILES['imgCaroussel']; // recupère l'image
		
		$destDir= 'img/'; // indique le repertoire de destination
		$destinationpath= $destDir . $image['name']; // chemin de destination

		$fp = fopen('caroussel.csv', 'r'); // ouverture du csv en lecture

		while ($data = fgetcsv($fp, 10000, ',')) // boucle : parcours le csv, $id se calque a l'id de al ligne sur laquelle il est jusqu'a obtenir la valeur de la dernire ligne.
	    {
	    	$id = $data[0]; 
	    }// à la fin id = l'id de la derniere ligne


		$list = [
			[$id + 1, $destinationpath,] // on incrémente l'id de 1 et on ajoute le chemi nde l'image
		]
		;
		$fp = fopen('caroussel.csv','a+'); // on enregistre dans une variable, l'ouverture du fichierr csv en mode écriture

		foreach ($list as $i)  // boucle qui parcours la liste "type" et on met dans le ficheir csv ses données
		{
		fputcsv($fp, $i);
		}

		if(move_uploaded_file($image['tmp_name'], $destinationpath)) // deplace l'image vers la destination
		{
			echo"upload reussi"; // si l'upload fonctionne, écrit uplaod réussi puis renvois a la pafe de gestion de l'acceuil
			header('location:gestionAcceuil.php');
		}

		else // si ne marche par retourne :
		{
			echo "échec de l'upload"; // écrit cela en cas d'échec de l'upload
			header('location:gestionAcceuil.php');
		}

		
		fclose($fp); // fermeture du fichier csv
		

		header('location:gestionAcceuil.php');// une fois que tous à fonctionné, renvoies vers la gestion de l'acceuil

	}

	else{header('location:gestionAcceuil.php'); // si les champs ne sont pas correct et / ou remplis renvoie vers la gestion de l'acceuil
	}

}

 else {header('location:logFirst.php'); }//renvoies vers la page erreur s'i on est pas connecté?>

