
<!--
nom :gestionGenerale.php
fonction : sur cette page on peut gérer la partis qui somme nous et modifier le footer. on peut également gérer le compte administrateur.
-->


<?php session_start();if (isset($_SESSION['login']) && isset($_SESSION['pwd']) && $_SESSION['loggedin'] == true) 
{
    // script de sécurité, si la personne ne s'est pas connecté, il est impossible d'acceder a la page , renvoies ensuite vers la page d'erreur (cf bas de page)







    require_once('backOfficeHeader.php');  // importation du header de la partie back office
    echo "<h1>gestions Annexes</h1>";
    echo "<h2>Gestion de Qui Sommes Nous</h2>"; // titre de la page
    $fp = fopen('quiSommesNous.csv', 'r'); // l'ouverture du fichier csv est mit dans uen variable en mode lecture

    while ($data = fgetcsv($fp, 10000, ',')) { // boucle a travers le ficheir csv
        // on créer quatres bloque html qui sont les quatres partis du qui sommes nous, image, texte,  nom et fonction
        echo "<section id='bloc'>"; 
        echo    "<h2> la dream team</h2>";
        echo    "<form action='createQSNCsv.php' method='post'enctype='multipart/form-data'>";
        echo    "<div id='img'>";  
        echo       "<div>";
        echo            "<img src='".$data[0]."' alt='photo du collaborateur'/>";
        echo                "<label for='img1'></label>";
        echo                "<input type='file' name='img1'>";
        echo       "</div>";
        echo       "<div>";
        echo            "<img src='".$data[1]."' alt='photo du collaborateur'/>"; // IMAGES
        echo                "<label for='img2'></label>";
        echo                "<input type='file' name='img2'>";
        echo       "</div>"; 
        echo       "<div>";
        echo            "<img src='".$data[2]."' alt='photo du collaborateur'/>";
        echo                "<label for='img3'></label>";
        echo                "<input type='file' name='img3'>";
        echo       "</div>";   
        echo    "</div>";


        echo    "<div id='texte'>";
        echo        "<div>";
        echo            "<p>".$data[3]."</p>";
        echo            "<label for='p1'></label>";
        echo            "<textarea name='p1'>".$data[3]."</textarea>";
        echo        "</div>";
        echo        "<div>";
        echo            "<p>".$data[4]."</p>";
        echo            "<label for='p2'></label>";
        echo            "<textarea name='p2'>".$data[4]."</textarea>"; // texte
        echo        "</div>";
        echo        "<div>";
        echo            "<p>".$data[5]."</p>";
        echo            "<label for='p3'></label>";
        echo            "<textarea name='p3'>".$data[5]."</textarea>";
        echo        "</div>";
        echo        "</div>";


        echo    "<div id=texte_2>";
        echo        "<div>";
        echo            "<strong>".$data[6]."</strong>";
        echo            "<label for='s1'></label>";
        echo            "<input name='s1' type='text' value='".$data[6]."'>";
        echo        "</div>";
        echo        "<div>";
        echo            "<strong>".$data[7]."</strong>";
        echo            "<label for='s2'></label>";
        echo            "<input name='s2' type='text' value='".$data[7]."'>"; // NOM
        echo        "</div>";
        echo        "<div>";
        echo            "<strong>".$data[8]."</strong>";
        echo            "<label for='s3'></label>";
        echo            "<input name='s3' type='text' value='".$data[8]."'>";
        echo        "</div>";
        echo    "</div>";



        echo    "<div id=role>";
        echo        "<div>";
        echo        "<p>fondateur</p>";
        echo        "<label for='role1'></label>";
        echo        "<input type='text' name='role1' value='".$data[9]."'>";
        echo        "</div>";
        echo        "<div>";
        echo        "<p>fondateur</p>";
        echo        "<label for='role2'></label>";
        echo        "<input type='text' name='role2' value='".$data[10]."'>"; // FONCTION
        echo        "</div>";
        echo        "<div>";
        echo        "<p>fondateur</p>";
        echo        "<label for='role3'></label>";
        echo        "<input type='text' name='role3' value='".$data[11]."'>";
        echo        "</div>";
        echo    "</div>";
        echo    "<label for='sub'></label>";
        echo    "<input type='submit' name='sub' id='formGenerale'>";
        echo    "</form>";
        echo"</section>";

}
?>


<?php 
$fp = fopen('footer.csv', 'r');// l'ouverture du fichier csv est mit dans uen variable en mode lecture
while($data = fgetcsv($fp, 100000, ','))// boucle a travers le ficheir csv
    {

        // bloque de modification du footer 

        echo "<h2>Gestion du footer</h2>";
        echo "<form action='createFooterCsv.php' method='POST'>";
        echo "<section id ='footerLike'>";
        echo    "<article>";
        echo        "<h3>".$data[0];
        echo                "<label for='1'></label>";
        echo                "<input type='text' name='1' value='".$data[0]."'>";
        echo        "</h3>";
        echo        "<p>".$data[1];
        echo                "<label for='2'></label>";
        echo                "<input type='text' name='2' value='".$data[1]."'>";
        echo        "</p>";
        echo        "<p>".$data[2];
        echo                "<label for='3'></label>";
        echo                "<input type='text' name='3' value='".$data[2]."'>";
        echo        "</p>";
        echo    "</article>";
        echo    "<article>";
        echo        "<h3>".$data[3];
        echo                "<label for='4'></label>";
        echo                "<input type='text' name='4' value='".$data[3]."'>"; 
        echo        "</h3>";
        echo        "<p>".$data[4];
        echo                "<label for='5'></label>";
        echo                "<input type='text' name='5' value='".$data[4]."'>";
        echo        "</p>";
        echo        "<p>".$data[5];
        echo                "<label for='6'></label>";
        echo                "<input type='text' name='6' value='".$data[5]."'>";
        echo        "</p>";
        echo    "</article>";
        echo    "<article>";
        echo       "<h3>".$data[6];
        echo                "<label for='7'></label>";
        echo                "<input type='text' name='7' value='".$data[6]."'>";
        echo        "</h3>";
        echo        "<p>".$data[7];
        echo                "<label for='8'></label>";
        echo                "<input type='text' name='8' value='".$data[7]."'>";
        echo        "</p>";
        echo        "</article>";
        echo        "<label for='sub'></label>"; 
        echo        "<input name='sub' type='submit'>"; 
        echo "</section>";
        echo "</form>";  
    }


    ?>
    <?php
    echo "<table border='1' id='tableAdmin'>"; // ouverturedu tableau
    echo   "<tr><th>id</th><th>login</th><th>mot de passe</th><th></th></tr>"; // tableau de gestion des compte administrateurs
    $fp = fopen('admin.csv', 'r');
    while ($data = fgetcsv($fp, 10000, ',')) {
         
         echo   "<tr>";
         echo       "<th>".$data[0]."</th>"; // affiche l'id
         echo       "<th>".$data[1]."</th>"; // affiche le login
         echo       "<th>".$data[2]."</th>"; // affiche le motde passe
         echo       "<th><form action='delCompte.php' method='post'>";
         echo           "<input type='hidden'name='id' value='".$data[0]."'>"; // bouton de suppression de compte
         echo           "<label for='sub'></label>";
         echo            "<input type='submit' name='sub' value='supprimer'>"; // bouton d'envoie
         echo       "</form></th>";
         echo "</tr>";

     } 
         echo "</table>"; // fermeture du tableau


         // formulaire de création d'un nouveau compte
         echo "<form action='ajouterCompte.php' method='POST' id='formAdmin'>"; 
         echo       "<label for='newLogin'> nouveau login</label>";
         echo       "<input type='text' name='newLogin'>"; // nouveau login
         echo       "<label for='newMdp'> nouveau mot de passe</label>";
         echo       "<input type='text' name='newMdp'>"; // nouveau mot de passe
         echo       "<label for='sub'></label>";
         echo       "<input type='submit' name='sub' value='ajouter un compte'>"; // bouton envoyer
         echo  "</form>";
     ?>
     <button  class="reini" onclick="return confirm('voulez-vous vraiment supprimer tous les événements ?')"><a href="createAdminCsv.php"> reintialiser les comptes admin</a></button> <!-- bbouton qui envoie vers le script qui reinitialise les comptes administrateurs-->

     <?php require_once('footerBackoffice.php'); //import le footer des pages de back office ?>

<?php 
} else {header('location:logFirst.php'); }//renvoies vers la page erreur s'i on est pas connecté?>
