
<!--
nom :gestionAcceuil.php
fonction : ce fichier sert de gestion de la partie acceuil, on peut changer les informations ainsi que modifier les image du carroussel
-->



<?php session_start();if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && $_SESSION['loggedin'] == true) 
// script de sécurité, si la personne ne s'est pas connecté, il est impossible d'acceder a la page , renvoies ensuite vers la page d'erreur (cf bas de page)
{?>

<!--
/**********************************************/
                /* Accueil */
/**********************************************/
-->

<?php
    require_once('backOfficeHeader.php'); // on importe le header des pages backoffice
    echo "<h1>gestion de l'acceuil</h1>";
    echo "<h2>Acceuil</h2>";
    $fp = fopen('acceuil.csv', 'r'); // l'ouverture du fichier csv en mode lecture est enregistré dans une variable
    while ($data = fgetcsv($fp, 100000, ',')) { // boucle qui parcours le fichir csv
        echo "<form action='ajouterAcceuil.php' method='post' enctype='multipart/form-data'>";
        echo    "<section id='articleAcceuil'>";
        echo        "<img src='".$data[0]."'>"; // on resort le lien de l'image du csv
        echo         "<label for='img'></label>";
        echo          "<input type='file' name='img'>";
        echo        "<article>";
        echo            "<h3>".$data[1]."</h3>"; // on resort le titre du csv
        echo         "<label for='h1'></label>";
        echo          "<input type='text' name='h1' value='".$data[1]."'>"; // input servant a changer le titre
        echo            "<p>".$data[2]."</p>"; // on resort le texte du csv
        echo         "<label for='p'></label>";
        echo          "<input type='text' name='p'  value='".$data[2]."'>"; // input servant pour le changement de texte
        echo         "<label for='sub'></label>";
        echo          "<input type='submit' name='sub'>";
        echo        "</article>";
        echo    "</section>";
        echo "</form>";
        echo "<form action='createAcceuilCsv.php' method='POST'>";
        echo         "<label for='sub'></label>";
        echo          "<input type='submit' name='sub' value='reinitialiser'>";// formalaire pour reinitialiser les infos      
        echo "</form>";  
    }
?>

<!--
/**********************************************/
                /* CAROUSSEL */
/**********************************************/-->
<div class="divTrait"></div>
<?php 
echo "<h2>Caroussel</h2>";
echo "<section  id='gestionCaroussel'>";

$fp = fopen("caroussel.csv", "r");
while ($data = fgetcsv($fp,100000,',')) {
    
    echo    "<div>";
    echo        "<img class='imgCarousselGestion' src=".$data[1]." alt='imgCarousselGestion'>";
    echo        "<form action='delCaroussel.php' method='POST'>";
    echo            "<input type='hidden' name='id' value='".$data[0]."' >";
    echo            "<input type='submit' value='supprimer'>";
    echo        "</form>";
    echo    "</div>";
    
}   
    echo "</section>";
    echo "<div class='divTrait'></div>";
    echo "<section id='imgCarousselGestion'>";
    echo    "<form action='ajouterCaroussel.php' method='POST' enctype='multipart/form-data'>";
    echo        "<input type='file' name='imgCaroussel'>";
    echo        "<input type='submit' value='ajouter image'>";
    echo    "</form>";
    echo "</section>";
 ?>

<!--
/**********************************************/
                /* FOOTER */
/**********************************************/
-->
<?php require_once('footerBackoffice.php'); //import le footer des pages de back office ?>


<?php } else {header('location:logFirst.php'); }//renvoies vers la page erreur s'i on est pas connecté?>
