<!--
nom :ajouterBilleterie.php
fonction : ce fichier reçoit des information du formulaire de "gestionBilleterie.php", après une sécurité pour savoir si nous sommes bien connecté, celui-ci traite les informations données pour les mettre dans un fichier csv.
-->

<?php session_start();if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && $_SESSION['loggedin'] == true) 
// script de sécurité, si la personne ne s'est pas connecté, il est impossible d'acceder a la page , renvoies ensuite vers la page d'erreur (cf bas de page)
{



	if (isset($_FILES['img']) && isset($_POST['titre']) && isset($_POST['titreEvenement']) && isset($_POST['date']) && isset($_POST['lieux']) && isset($_POST['adress']) && isset($_POST['prix'])) // si les champs on bie nété remplis
	{

		$titre=htmlspecialchars($_POST['titre']); // recupère le titre dans une variable
		$titreEvenement = htmlspecialchars($_POST['titreEvenement']); // on récupère le titre de l'évenements
		$date = htmlspecialchars($_POST['date']); // date
		$lieux = htmlspecialchars($_POST['lieux']); // le lieux / salle
		$adresse = htmlspecialchars($_POST['adress']); // adresse
		$prix = htmlspecialchars($_POST['prix']); // le prix
		$image= $_FILES['img']; // recupère l'image
		
		$destDir= 'img/'; // indique le repertoire de destination
		$destinationpath= $destDir . $image['name']; // chemin de destination
		
	    $id = 0; // on définit un id a 0 pour incrémenter par la suite
	    $fp = fopen('billeterie.csv', 'r'); // ouverture du csv en lecture

	    while ($data = fgetcsv($fp, 10000, ',')) // boucle : parcours le csv, $id se calque a l'id de al ligne sur laquelle il est jusqu'a obtenir la valeur de la dernire ligne.
	    {
	    	$id = $data[0]; 
	    }// à la fin id = l'id de la derniere ligne

	    $data = [$id + 1,$titre,$titreEvenement,$date,$lieux,$adresse,$prix,$destinationpath]; // quand est créer une nouvelle liste pour une nouvelle ligne du csv, on prend la valeur de la dernire ligne du csv + 1 pour incrémenté manuellement

	    $fp = fopen('billeterie.csv', 'a+'); // ouverture du csv en mode ajouter une ligne
	    
	             
	    fputcsv($fp, $data); // on met la nouvelle liste de données dans la nouvelle ligne du csv
	    
	    fclose($fp); // fermeture du csv




		if(move_uploaded_file($image['tmp_name'], $destinationpath)) // deplace l'image vers la destination
		{
			echo"upload reussi"; // si l'upload fonctionne, écrit uplaod réussi puis renvois a la pafe de gestion de contenu
			header("location:gestionBilleterie.php");
		}

		else // si ne marche par retourne :
		{
			echo "échec de l'upload"; // écrit cela en cas d'échec de l'upload
			header("location:gestionBilleterie.php");
		}

	}

	else
	{
		header('location:gestionBilleterie.php'); // si aucun image n'est entrée renvoies vers la page de gestion de contenu
	}





} 

else {header('location:logFirst.php'); }//renvoies vers la page erreur s'i on est pas connecté?>
