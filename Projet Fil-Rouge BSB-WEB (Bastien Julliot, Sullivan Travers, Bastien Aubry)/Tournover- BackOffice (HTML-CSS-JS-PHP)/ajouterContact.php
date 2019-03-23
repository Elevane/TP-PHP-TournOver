
<!--
nom :ajouterContact.php
fonction : ce fichier reçoit des information du formulaire de "quiSommeNous.php" il traite les informations données pour les mettre dans un fichier csv.
-->

<?php


	if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['textArea']) && isset($_POST['email']) && isset($_POST['objet']) && isset($_POST['num'])) // si les champs ont bien été remplis
	{
		$nom = htmlspecialchars($_POST['nom']); // récuperation de la variable nom
		$prenom = htmlspecialchars($_POST['prenom']); // prenom
		$textArea = htmlspecialchars($_POST['textArea']);	// récuperation de la variable qui contient le texte du formulaire de contact
		$email = htmlspecialchars($_POST['email']);// récuperation de la variable email
		$objet = htmlspecialchars($_POST['objet']);// récuperation de la variable de l'objet
		$num = htmlspecialchars($_POST['num']);// récuperation de la variable numéro

		$id = 0; // on définit un id a 0 pour incrémenter par la suite
		$fp = fopen('contact.csv', 'r'); //ouverture du csv en mode lecture

		// parcours la liste du csv, id grandit au fur et a mesure.
		while ($data =fgetcsv($fp,10000, ',')) 
		{
			$id = $data[0];
		}// id = valeur de l'id de la derniere ligen du csv


		// liste de valeurs obtenu via le formulaire, la valeur ajouté incrémente l'id
		$data = [[$id + 1,$nom,$prenom,$email,$num,$objet,$textArea]];


		$fp = fopen('contact.csv', 'a');// ouverture du csv en mode ajouter

	foreach ($data as $i) //on rentre les données de la liste dans la ligen du csv
		{
		fputcsv($fp, $i);
		}
		


		header('location:quiSommesNous.php'); // une fois toutes les instructions effectuées, renvoie vers la page qui quiSommesNous.php
	}

	

	else {
		header('location:quiSommesNous.php'); // si tous les champs ne sont pas remplis, renvoies vers la page quiSommesNous.php
	}


?>