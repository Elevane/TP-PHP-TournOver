<!--
nom :ajouterContenu.php
fonction : ce fichier reçoit des information du formulaire de "gestionNosEvenements.php", après une sécurité pour savoir si nous sommes bien connecté, celui-ci traite les informations données pour les mettre dans un fichier csv.
-->



<?php session_start();if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && $_SESSION['loggedin'] == true) 
// script de sécurité, si la personne ne s'est pas connecté, il est impossible d'acceder a la page , renvoies ensuite vers la page d'erreur (cf bas de page)
{



	if (isset($_FILES['img']) && isset($_POST['text']) && isset($_POST['titre'])) // si les champs ont bien été remplis
	{

		$text=htmlspecialchars($_POST['text']); // recupère le text dans une variable
		$titre = htmlspecialchars($_POST['titre']); // on récupère le titre
		$image= $_FILES['img']; // recupère l'image
		
		$destDir= 'img/'; // indique le repertoire de destination
		$destinationpath= $destDir . $image['name']; // chemin de destination
		
	    $id = 0; // on définit un id a 0 pour incrémenter par la suite
	    $fp = fopen('contenu.csv', 'r'); // ouverture du csv en lecture

	    while ($data = fgetcsv($fp, 10000, ',')) // boucle : parcours le csv, $id se calque a l'id de al ligne sur laquelle il est jusqu'a obtenir la valeur de la dernire ligne.
	    {
	    	$id = $data[0]; 
	    }// à la fin id = l'id de la derniere ligne

	    $data = [$id + 1,$titre,$text,$destinationpath]; // quand est créer une nouvelle liste pour une nouvelle ligne du csv, on prend la valeur de la dernire ligne du csv + 1 pour incrémenté manuellement

	    $fp = fopen('contenu.csv', 'a+'); // ouverture du csv en mode ajouter une ligne
	    
	             
	    fputcsv($fp, $data); // on met la nouvelle liste de données dans la nouvelle ligne du csv
	    
	    fclose($fp); // fermeture du csv




		if(move_uploaded_file($image['tmp_name'], $destinationpath)) // deplace l'image vers la destination
		{
			echo"upload reussi"; // si l'upload fonctionne, écrit uplaod réussi puis renvois a la pafe de gestion de contenu
			header("location:gestionNosEvenements.php");
		}

		else // si ne marche par retourne :
		{
			echo "échec de l'upload"; // écrit cela en cas d'échec de l'upload
			header("location:gestionNosEvenements.php");
		}

	}

	else
	{
		header('location:gestionNosEvenements.php'); // si aucun champs n'est entrée renvoies vers la page de gestion de contenu
	}


}

else {header('location:logFirst.php'); }//renvoies vers la page erreur s'i on est pas connecté?>
