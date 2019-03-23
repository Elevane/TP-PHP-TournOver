

<!--
nom :gestionContact.php
fonction : ce fichier est un portail ou l'on peut gerer les mails recu par les utilisateurs qui ont utilisé le formulaire de contact.on petu surrpimer les messages un par un ou bien tous d'un coup.
-->



<?php session_start();if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && $_SESSION['loggedin'] == true) 
// script de sécurité, si la personne ne s'est pas connecté, il est impossible d'acceder a la page , renvoies ensuite vers la page d'erreur (cf bas de page)
{


	require_once ('backOfficeHeader.php');//  On importe le header des pages backoffice
	echo "<h1>gestion des Contacts</h1>";
	$fp = fopen('contact.csv', 'r'); // onenregistre dans une variable l'ouverture du fichier csv en mod lecture
	echo '<table><tr id="tr"><th>n°</th><th>nom</th><th>prenom</th><th>email</th><th>numéro</th><th>objet</th><th>text</th><th></th></tr>'; // on créer le tableau avec ses colonnes
	while ($data = fgetcsv($fp, 10000, ',')) // boucle qui parcours le ficheir csv et nous revoies les données séparées par ","
	{
		echo '<tr>'; // ou créer une ligne
		echo 	'<th>'.$data[0].'</th>'; // premiere colonne de cette ligne, l'id du "mail"
		echo 	'<th>'.$data[1].'</th>'; // nom
		echo 	'<th>'.$data[2].'</th>'; // prenom
		echo 	'<th>'.$data[3].'</th>'; // email du contactant
		echo 	'<th>'.$data[4].'</th>'; // numéro de telephone
		echo 	'<th>'.$data[5].'</th>'; // objet du mesage
		echo 	'<th>'.$data[6].'</th>'; // texte du message
		echo 	'<th>'; // ouveture d'un colonne pour y mettre le formulaire

		// formulaire de suppression du mail dans une ligne du tableau
		echo 		'<form action="delContact.php" method="post">';
		echo 			'<label for="id"></label>';
		echo 			'<input type="hidden" name="id"value="'.$data[0].'">'; // recupère l'id de la ligne à supprimer
		echo 			'<label for="del"></label>';
		echo 			'<input type="submit" value="supprimer" name="del">';
		echo 		'</form>';
		echo 	'</th>'; // fermeture de la colonne
		echo '</tr>'; // fermeture du la ligne
	}
	echo '</table>'; // fermeture du tableau


	?>


<!-- boutoun qui supprime tous les message de contacts-->

<button  class="reini" onclick="return confirm('voulez-vous vraiment supprimer tous les événements ?')"><a href="createContactCsv.php">supprimer tous les mails</a></button> <!-- ou moment du clique une boite de dialogue s'ouvre pour confirmer l'opération-->

<?php require_once('footerBackoffice.php'); //import le footer des pages de back office ?>

<?php } else {header('location:logFirst.php'); }//renvoies vers la page erreur s'i on est pas connecté?>
