
<!--
nom :index.php
fonction :c'est la page d'acceuil du site Tournover
-->

<?php require_once('header.php');  // importe le header?>
        
<!--
/**********************************************/
                /* Accueil */
/**********************************************/
-->

<?php  ?>

    <?php
    $fp = fopen('acceuil.csv', 'r'); // l'ouverture du fichier csv en mode lecture est enregistré dans une variable
    while ($data = fgetcsv($fp, 100000, ',')) { // boucle qui parcours le fichir csv

        echo "<div class='divTrait'></div>";
        echo    "<section id='articleAcceuil'>";
        echo        "<img src='".$data[0]."'>"; // on resort le lien de l'image du csv
        echo        "<article>";
        echo            "<h1>".$data[1]."</h1>"; // on resort le titre du csv
        echo            "<p>".$data[2]."</p>"; // on resort le texte du csv
        echo        "</article>";
        echo    "</section>";
    }
?>
<div class="divTrait"></div>

<!--
/**********************************************/
                /* CAROUSSEL */
/**********************************************/
-->

<section class="your-class">
    <?php 
    $fp = fopen("caroussel.csv", 'r');
    while ($data = fgetcsv($fp, 100000, ',')) {
        echo "<img src=".$data[1]." alt='photoCaroussel'>";
    }
        
     ?>
</section>




<div class="divTrait"></div>
    
<!--
/**********************************************/
                /* FOOTER */
/**********************************************/
-->


<?php require_once('footer.php');// importe le footer ?>