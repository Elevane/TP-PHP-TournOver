<!--
nom :ajouterAcceuil.php
fonction : ce fichier reçoit des information du formulaire de "gestionAcceuil.php", après une sécurité pour savoir si nous sommes bien connecté, celui-ci traite les informations données pour les mettre dans un fichier csv.
-->
<?php session_start();if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && $_SESSION['loggedin'] == true) 
// script de sécurité, si la personne ne s'est pas connecté, il est impossible d'acceder a la page , renvoies ensuite vers la page d'erreur (cf bas de page)
{


	if (isset($_FILES['img']) 
		&& isset($_POST['h1'])
		&& isset($_POST['p'])) // on vérifie que tous les champs ont bien été remplis, le titre, le texte et l'image.
	 {
		

		$valeur1 = htmlspecialchars($_POST['h1']); // on mets les infos récuperées par le formulaire dans des variables
		$valeur2 = htmlspecialchars($_POST['p']); // h1 -> titre, p -> texte

		$image= $_FILES['img']; // recupère l'image
		
		$destDir= 'img/'; // indique le repertoire de destination
		$destinationpath= $destDir . $image['name']; // chemin de destination




		$list = 
			[$destinationpath, $valeur1, $valeur2] // on définie une liste "type"
		;
		$fp = fopen('acceuil.csv','w'); // on enregistre dans une variable, l'ouverture du fichierr csv en mode écriture

		  
		
		fputcsv($fp, $list);//on mets la liste dans le fichier csv

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

		
		fclose($fp); // fermeture du fichier csv
		

		header('location:gestionAcceuil.php');// une fois que tous à fonctionné, renvoies vers la gestion de l'acceuil

	}

	else{header('location:gestionAcceuil.php'); // si les champs ne sont pas correct et / ou remplis renvoie vers la gestion de l'acceuil
	}

}

 else {header('location:logFirst.php'); }//renvoies vers la page erreur s'i on est pas connecté?>

