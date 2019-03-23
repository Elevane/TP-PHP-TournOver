<!--
Nom : ajouterCompte.php
fonction: ce fichier ajoute un compte administrateur
-->

<?php session_start();if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && $_SESSION['loggedin'] == true) 
{
    // script de sécurité, si la personne ne s'est pas connecté, il est impossible d'acceder a la page , renvoies ensuite vers la page d'erreur (cf bas de page)



	if (isset($_POST['newLogin']) && isset($_POST['newMdp'])) // si les champs ont bien été remplis
	{

		$login=htmlspecialchars($_POST['newLogin']); // recupère le text dans une variable
		$mdp = htmlspecialchars($_POST['newMdp']); // on récupère le titre

	    $fp = fopen('admin.csv', 'r'); // ouverture du csv en lecture

	    while ($data = fgetcsv($fp, 10000, ',')) // boucle : parcours le csv, $id se calque a l'id de al ligne sur laquelle il est jusqu'a obtenir la valeur de la dernire ligne.
	    {
	    	$id = $data[0]; 
	    }// à la fin id = l'id de la derniere ligne

	    $data = [$id +1,$login,$mdp]; // quand est créer une nouvelle liste pour une nouvelle ligne du csv, on prend la valeur de la dernire ligne du csv + 1 pour incrémenté manuellement

	    $fp = fopen('admin.csv', 'a+'); // ouverture du csv en mode ajouter une ligne
	    
	             
	    fputcsv($fp, $data); // on met la nouvelle liste de données dans la nouvelle ligne du csv
	    
	    fclose($fp); // fermeture du csv

	    header('location:gestionGenerale.php'); // si aucun champs n'est entrée renvoies vers la page de gestion generale


	}

	else
	{
		header('location:gestionGenerale.php'); // si aucun champs n'est entrée renvoies vers la page de gestion generale
	}


}

else {header('location:logFirst.php'); }//renvoies vers la page erreur s'i on est pas connecté?>
