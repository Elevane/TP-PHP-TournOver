<!--
nom :gestionNosEvenements.php
fonction : sur cette page on peut gérer les évenements du site
-->


<?php session_start();if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && $_SESSION['loggedin'] == true) 
// script de sécurité, si la personne ne s'est pas connecté, il est impossible d'acceder a la page , renvoies ensuite vers la page d'erreur (cf bas de page)
{
	// script qui a pour fonction de d'afficher les evenements et un formulaire pour ajouter des evenements


	require_once ('backOfficeHeader.php'); // header des pages backoffice
	echo "<h1>gestion de Nos Evenements</h1>";
	$fp = fopen('contenu.csv', 'r'); // l'ouverture du fichier csv en mode lecture ("r") est mis dans une variable
	while ($data = fgetcsv($fp, 10000, ','))  // boucle qui parcours le fichier csv ligne par ligne
	{
		echo "<article class='articleEvenements'>";
		echo '<img src="'.$data[3].'" alt="photo">'; // le chemi nde l'image est enregistré dans le ficheir csv et est ici incorporé dans la balise html
		echo "<div>";
		echo 	'<h3>'.$data[1]. '</h3>'; // le titre
		echo 	'<p>'.$data[2]. '<p>'; // lex texte de l'évenements
		echo "</div>";
		echo "</article>";

		// le formulaire de suppression d'un evenements particulier pointé par son id
		echo '<form action="delContenu.php" method="post">';
		echo 	'<label for="id"></label>';
		echo 	'<input type="hidden" name="id"value="'.$data[0].'">';
		echo 	'<label for="del"></label>';
		echo 	'<input type="submit" value="supprimer" name="del">';
		echo '</form>';
	}?>


	<!-- FORMULAIRE D'AJOUT-->
	<form action="ajouterContenu.php" method="post" id="formEvenements" enctype="multipart/form-data"><!--le formulaire envoies vers un fichier php avec la methode POST-->
		<label for="titre">titre</label><!---->
		<input type ="text" name="titre"><!--on remplis le titre de l'évenement -->
		
		<label for="text">texte</label><!-- -->
		<textarea type="textarea" name="text" id="texte"></textarea><!--on remplis le texte qu'aura l'évenement-->
		
		<label for="img">image</label><!-- -->
		<input type="file" name="img"><!--on récupère l'image-->
		
		<input type="submit" value=" ajouter une idée"><!--bouton submit, qui valide le formulaire et envoie les données vers le fichier php -->
	</form><!-- -->

	<!-- le bouton suivant sert à réinitaliser les données et a supprimer tous les événements-->
	<button class="reini" onclick="return confirm('voulez-vous vraiment supprimer tous les événements ?')"><a href="createContenuCsv.php">Réinitialiser les evenements </a></button> <!-- ou moment du clique une boite de dialogue s'ouvre pour confirmer l'opération-->


	<?php require_once('footerBackoffice.php'); //import le footer des pages de back office ?>

<?php
} 
else {header('location:logFirst.php'); }//renvoies vers la page erreur s'i on est pas connecté?>
