
<!--
nom :gestionBilleterie.php
fonction : ce fichier sert de gestion de la partie billeterie, on peut ajouter et supprimer des evenements payants
-->



<?php session_start();if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && $_SESSION['loggedin'] == true) 
// script de sécurité, si la personne ne s'est pas connecté, il est impossible d'acceder a la page , renvoies ensuite vers la page d'erreur (cf bas de page)
{


	// ce script a deux fonction, tout d'abord afficher les données qui sont dans le ficheir csv "billeterie". Ensuite il contient un formulaire pour rajouter des evenements payant et un autre pour supprimer un evenements payant.


	require_once('backOfficeHeader.php'); // on importe le header des pages backoffice
	echo "<h1>gestion de la billeterie</h1>";
	$fp = fopen('billeterie.csv', 'r'); // ouverture du fichier csv billeterie en lecture
	while ($data = fgetcsv($fp, 10000, ',')) 
	{ // boucle dans le fichier csv qui parcours le fichier ligne par ligne

		echo '<section id="cadreNoir">';
		echo    '<section id="conteneur-flexbox">';
		echo        '<div id="flexbox-1">';
		echo            '<img src="'.$data[7].'"/> '; // ligne du tableau qui contient le chemin de l'image
		echo        '</div>';
		echo        '<div id="flexbox-2">'; 
		echo            '<h2>'.$data[1].'</h2>'; // le titre de l'evenement
		echo            '<p>'.$data[2].'</p>'; // type d'evenements
		echo            '<p>'.$data[3].'</p>'; // la date
		echo        '</div>';
		echo        '<div id="flexbox-3">'; 
		echo            '<div id="address">';
		echo                '<p>'.$data[4].'</p>'; // ville / salle
		echo                '<p>'.$data[5].'</p>'; // adresse
		echo            '</div>';
		echo            '<h2>'.$data[6].'€</h2>'; // prix
		echo            '<div class="btn">';
								// formulaire de suppression, cliquer sur le bouton envoie vers un fichier qui supprimera cete evenement
		echo 				'<form action="delBilleterie.php" method="post">';
		echo 					'<label for="id"></label>';
		echo 					'<input type="hidden" name="id"value="'.$data[0].'">'; // donne l'id de la ligne du csv
		echo 					'<label for="del"></label>';
		echo 					'<input type="submit" value="supprimer" name="del">';
		echo 				'</form>';
		echo            '</div>';
		echo        '</div>';
		echo     '</section>';
		echo'</section>';


}?>
<h2>ajouter un evenement Payant</h2>
<form action="ajouterBilleterie.php" method="post" id="formAjouter" enctype="multipart/form-data"><!-- formulaire d'ajout d'évenements payant, on récupères toutes les données necessaire pour la création d'un évenement et on les envoie ver le fichier ajouter billeterie.php-->
	<article>
		<label for="titre">titre de l'annonce</label>
		<input type ="text" name="titre">
	

		<label for="titreEvenement">type de l'événement</label>
		<input type ="text" name="titreEvenement"><!-- input du titre de l'évenement-->

		<label for="date">date</label>
		<input type ="text" name="date"><!-- input du titre de l'évenement-->

	</article>
	<article>
		<label for="lieux">lieux</label>
		<input type ="text" name="lieux"><!-- input du titre de l'évenement-->

		
		<label for="adress">adresse </label>
		<input type="textarea" name="adress"><!-- input du titre de l'évenement-->

		
		<label for="prix">prix</label>
		<input type ="text" name="prix"><!-- input du titre de l'évenement-->
	</article>
	
	<article>
		<label for="img">image</label><!-- input du titre de l'évenement-->

		<input type="file" name="img">

		<input type="submit" value=" ajouter une idée">
	</article>
</form>

<!--bouton pour réinitialiser les evenements-->
<button  class="reini" onclick="return confirm('voulez-vous vraiment supprimer tous les événements ?')"><a href="createBilleterieCsv.php">Réinitialiser les evenements payants</a></button><!-- ou moment du clique une boite de dialogue s'ouvre pour confirmer l'opération-->
<?php require_once('footerBackoffice.php'); //import le footer des pages de back office ?>

<?php } else {header('location:logFirst.php'); }//renvoies vers la page erreur s'i on est pas connecté?>
