<!--
nom :quiSommesNous.php
fonction :c'est la page d'acceuil du site Tournover
-->


<?php require_once('header.php'); // importation du header  ?>

<!----------------------------------->
<!--Img et présentation des membres-->
<!----------------------------------->
<!--  Trait noir   -->
<div class="divTrait"></div> 
<section id="titre">   
    <h1>qui sommes-nous?</h1>
</section>
<?php
$fp = fopen('quiSommesNous.csv', 'r');// l'ouverture du fichier csv est mit dans uen variable en mode lecture

while ($data = fgetcsv($fp, 10000, ',')) {// boucle a travers le ficheir csv
     // on créer quatres bloque html qui sont les quatres partis du qui sommes nous, image, texte,  nom et fonction
    echo "<section id='bloc'>";
    echo    "<h2> la dream team</h2>";
    echo    "<div id='img'>";  
    echo       "<div>";
    echo            "<img src='".$data[0]."' alt='photo du collaborateur'/>";
    echo       "</div>";
    echo       "<div>";
    echo            "<img src='".$data[1]."' alt='photo du collaborateur'/>"; // image
    echo       "</div>"; 
    echo       "<div>";
    echo            "<img src='".$data[2]."' alt='photo du collaborateur'/>";
    echo       "</div>";   
    echo    "</div>";


    echo    "<div id='texte'>";
    echo        "<div>";
    echo        "<p>".$data[3]."</p>";
    echo        "</div>";
    echo        "<div>";
    echo        "<p>".$data[4]."</p>";// texte
    echo        "</div>";
    echo        "<div>";
    echo        "<p>".$data[5]."</p>";
    echo        "</div>";
    echo        "</div>";


    echo    "<div id=texte_2>";
    echo        "<div>";
    echo            "<strong>".$data[6]."</strong>";
    echo        "</div>";
    echo        "<div>";
    echo            "<strong>".$data[7]."</strong>";// nom
    echo        "</div>";
    echo        "<div>";
    echo            "<strong>".$data[8]."</strong>";
    echo        "</div>";
    echo    "</div>";



    echo    "<div id=role>";
    echo        "<div>";
    echo        "<p>fondateur</p>";
    echo        "</div>";
    echo        "<div>";
    echo        "<p>fondateur</p>"; // fonction
    echo        "</div>";
    echo        "<div>";
    echo        "<p>fondateur</p>";
    echo        "</div>";
    echo    "</div>";
    echo"</section>";

}
?>
 <div class="divTrait"></div>
<!------------------------->
<!--Formulaire de contact-->
<!------------------------->
<div id="contour">
    <section id="contact">
        <h3> contact </h3>
        <form method="post" action="ajouterContact.php">

        	<label for="nom">Nom</label>
        	<input type="text" name="nom" required/>

        	<label for="prenom">Prénom</label>
        	<input type="text" name="prenom" required/>
        	
        	<label for="email">Email</label>
        	<input type="email" name="email" required/>
        	
        	<label for="num">Numéro</label>
        	<input type="text" name="num" required/>
        	
        	<label for="objet">Objet</label>
        	<input type="text" name="objet" required/>

        	<label for="textArea">Message</label>
        	<textarea name="textArea" required></textarea>
        	
        	<label for="submit"></label>
        	<input id="btn" type="submit" name="submit">
        </form>
    </section>
</div>
<div class="divTrait"></div>
           <!--
/**********************************************/
                /* FOOTER */
/**********************************************/
-->

<?php require_once('footer.php'); // importation du footer?>