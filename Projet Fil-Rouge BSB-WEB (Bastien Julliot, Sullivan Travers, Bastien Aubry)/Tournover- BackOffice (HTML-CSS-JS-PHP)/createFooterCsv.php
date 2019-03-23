
<!--
nom :createFooterCsv.php
fonction : le but de ce script est de changer les information contenus dans le footer
-->

<?php session_start();if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && $_SESSION['loggedin'] == true) 
// script de sécurité, si la personne ne s'est pas connecté, il est impossible d'acceder a la page , renvoies ensuite vers la page d'erreur (cf bas de page)
{?>


<?php 

// ce fichier sert a créer un ficheir csv, avec une ligne par défault, il peut aussi servir à réinistialiser le contenu de données du footer

if (isset($_POST['1']) 
	&& isset($_POST['2'])
	&& isset($_POST['3']) // on vérifie que tous les champs ont bien été remplis
	&& isset($_POST['4'])
	&& isset($_POST['5'])
	&& isset($_POST['6'])
	&& isset($_POST['7'])
	&& isset($_POST['8'])) {
	
	$valeur1 = htmlspecialchars($_POST['1']);
	$valeur2 = htmlspecialchars($_POST['2']);
	$valeur3 = htmlspecialchars($_POST['3']);
	$valeur4 = htmlspecialchars($_POST['4']);
	$valeur5 = htmlspecialchars($_POST['5']); // on assigne les infos récupérées par le fomrulaire dans des variables
	$valeur6 = htmlspecialchars($_POST['6']);
	$valeur7 = htmlspecialchars($_POST['7']);
	$valeur8 = htmlspecialchars($_POST['8']);


	$list = [
		[$valeur1,$valeur2, $valeur3, $valeur4, $valeur5,$valeur6, $valeur7, $valeur8] // on mets les varaibles dans une liste
	];
	$fp = fopen('footer.csv','w'); // on enregistre dans une variable, l'ouverture du fichierr csv en mode écriture

	foreach ($list as $i)  // boucle qui parcours la liste et on met dans le ficheir csv ses données
	{
		fputcsv($fp, $i);
	}
	fclose($fp); // fermeture du fichier csv


	header('location:gestionGenerale.php'); // uen fois les instructions éxécutées le script renvoie vers

}

else{header('location:gestionGenerale.php');} // si les champs ne sont pas remplis
 ?>


 <?php } else {header('location:logFirst.php'); }//renvoies vers la page erreur s'i on est pas connecté?>

