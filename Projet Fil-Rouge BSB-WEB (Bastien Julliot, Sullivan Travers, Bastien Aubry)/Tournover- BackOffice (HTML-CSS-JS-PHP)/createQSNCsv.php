
<!--
nom :createQSNCsv.php
fonction : le but de ce script est de changer lesi nformations contenus dans la partis qui sommes nous
-->


<?php session_start();if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && $_SESSION['loggedin'] == true) 
// script de sécurité, si la personne ne s'est pas connecté, il est impossible d'acceder a la page , renvoies ensuite vers la page d'erreur (cf bas de page)
{

	// ce fichier sert a créer un ficheir csv pour données de la partie qui sommes nous

	if (isset($_FILES['img1']) 
		&& isset($_FILES['img2'])
		&& isset($_FILES['img3']) // on vérifie que tous les champs ont bien été remplis
		&& isset($_POST['p1'])
		&& isset($_POST['p2'])
		&& isset($_POST['p3'])
		&& isset($_POST['s1'])
		&& isset($_POST['s2'])
		&& isset($_POST['s3'])
		&& isset($_POST['role1'])
		&& isset($_POST['role2'])
		&& isset($_POST['role3'])) {
		
		$image1= $_FILES['img1']; // recupère l'image
		$image2= $_FILES['img2']; // recupère l'image
		$image3= $_FILES['img3']; // recupère l'image
		$valeur4 = htmlspecialchars($_POST['p1']);
		$valeur5 = htmlspecialchars($_POST['p2']);
		$valeur6 = htmlspecialchars($_POST['p3']);
		$valeur7 = htmlspecialchars($_POST['s1']);
		$valeur8 = htmlspecialchars($_POST['s2']);
		$valeur9 = htmlspecialchars($_POST['s3']);
		$valeur10 = htmlspecialchars($_POST['role1']);
		$valeur11 = htmlspecialchars($_POST['role2']);
		$valeur12 = htmlspecialchars($_POST['role3']);


		
		$destDir= 'img/'; // indique le repertoire de destination
		$destinationpath1= $destDir . $image1['name']; // chemin de destination
		$destinationpath2= $destDir . $image2['name']; // chemin de destination
		$destinationpath3= $destDir . $image3['name']; // chemin de destination



		$list = 
			[$destinationpath1,$destinationpath2, $destinationpath3, $valeur4, $valeur5,$valeur6, $valeur7, $valeur8, $valeur9, $valeur10, $valeur11, $valeur12] // on définie une liste "type"
		;

		$fp = fopen('quiSommesNous.csv','w'); // on enregistre dans une variable, l'ouverture du fichierr csv en mode écriture

		fputcsv($fp, $list);

		if(move_uploaded_file($image1['tmp_name'], $destinationpath1)) // deplace l'image vers la destination
		{
			echo"upload reussi"; // si l'upload fonctionne, écrit uplaod réussi puis renvois a la pafe de gestion de contenu
			header("location:gestionNosEvenements.php");
		}

		else // si ne marche par retourne :
		{
			echo "échec de l'upload"; // écrit cela en cas d'échec de l'upload
			header("location:gestionNosEvenements.php");
		}

			if(move_uploaded_file($image2['tmp_name'], $destinationpath2)) // deplace l'image vers la destination
		{
			echo"upload reussi"; // si l'upload fonctionne, écrit uplaod réussi puis renvois a la pafe de gestion de contenu
			header("location:gestionNosEvenements.php");
		}

		else // si ne marche par retourne :
		{
			echo "échec de l'upload"; // écrit cela en cas d'échec de l'upload
			header("location:gestionNosEvenements.php");
		}

			if(move_uploaded_file($image3['tmp_name'], $destinationpath3)) // deplace l'image vers la destination
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
		

		header('location:gestionGenerale.php'); // une fois toutes les instructions effectués renvoies vers la gestion generale

	}

	else{header('location:gestionGenerale.php');} // si les champs ne sont pas remplis, renvoie vers la gestion generale


} 

else {header('location:logFirst.php'); }//renvoies vers la page erreur s'i on est pas connecté?>

