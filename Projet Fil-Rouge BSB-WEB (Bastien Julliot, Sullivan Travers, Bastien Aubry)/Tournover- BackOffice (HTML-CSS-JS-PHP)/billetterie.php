<!--
nom :billeterie.php
fonction : ce fichier est al page billeterie du site tournover
-->



 <!-- HEADER-->
<?php require_once('header.php');?> <!-- importation du header commun -->

<div class="divTrait"></div> <!--  Trait noir   -->

<div id="twitchH1">
    <h1> BILLETTERIE : </h1> <!--titre-->
</div>  


<section class="affiche"><!--section de l'affiche -->
    <img src="img/affichetournois.jpg"/><!--   Affiche Principal     -->        
</section>

<div class="divTrait"></div><!--  Trait noir   -->

   
    <!--  Réservation   -->

    <?php


    $fp = fopen('billeterie.csv', 'r'); // ouverture du fichier csv billeterie en lecture
    while ($data = fgetcsv($fp, 10000, ',')) { // boucle dans le fichier csv qui parcours le fichier ligne par ligne
    echo $data[0]; // l'id de la ligne du csv
    echo '<section id="cadreNoir">'; //on placera les infos dans un conteneur identifié "cadreNoir"
    echo    '<section id="conteneur-flexbox">';
    echo        '<div id="flexbox-1">';// conteneur de l'image
    echo            '<img src="'.$data[7].'"/> '; // les infos du lien relatif de l'image 
    echo        '</div>';
    echo        '<div id="flexbox-2">'; 
    echo            '<h2>'.$data[1].'</h2>'; // le titre de l'annonce
    echo            '<p>'.$data[2].'</p>'; // type de l'évenements
    echo            '<p>'.$data[3].'</p>'; // date
    echo        '</div>';
    echo        '<div id="flexbox-3">'; 
    echo            '<div id="address">';
    echo                '<p>'.$data[4].'</p>'; //lieux
    echo                '<p>'.$data[5].'</p>'; // adresse
    echo            '</div>';
    echo            '<h2>'.$data[6].'€</h2>'; // prix
    echo            '<div class="btn">';
    echo                '<a href="paiment.php" class="bouton1">Reservez</a>'; // bouton de réservation
    echo            '</div>';
    echo        '</div>';
    echo     '</section>';
    echo'</section>';}?>
    
<div class="divTrait"></div>  

<!--FOOTER -->
<?php require_once('footer.php');  // importation du footer?>