<!--
nom :NosEvenements.php
fonction :c'est la page ou l'on peut voir les évenemnts de l'entreprise
-->

<?php require_once('header.php');// importe le header ?>
        
        <!--
/**********************************************/
                /* NOS EVENEMENTS */
/**********************************************/
-->
        
<div class="divTrait"></div>
<div id="twitchH1">
<h1>NOS EVENEMENTS : </h1>
</div>

<section class="boxEvent">
   <div class="divEvent">
    <!--     /* Event */      --> 
       <?php

            $fp = fopen('contenu.csv', 'r'); // ouverture du fichier csv en mode lecture
            while ($data = fgetcsv($fp, 10000, ',')) 
            { // boucle dans le fichier ligne par ligne
            echo '<article class="articleEvent"><img src="'.$data[3].'" alt="photo">'; // place le chemin contenu dans le fichier csv, dans la balise html
            echo '<div><h2>'.$data[1]. '</h2>'; // le titre
            echo '<p>'.$data[2]. '<p></div></article>'; // le texte
            }


        ?>
    </div>
    
</section>
<div class="divTrait"></div>  

        
<!--
/**********************************************/
                /* FOOTER */
/**********************************************/
-->
   
<?php require_once('footer.php');  // importe le footer?>