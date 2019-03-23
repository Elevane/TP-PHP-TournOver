<!-- cette page contient les infos du footer de chaque page du site visible au visiteurs--> 


<div id="scrollUp">
    <a href="#top">
        <img src="img/to_top.png"/>
    </a>
</div>

<?php 
$fp = fopen('footer.csv', 'r');
while($data = fgetcsv($fp, 100000, ','))
{
    echo "<footer>";
    echo    "<article>";
    echo        "<h3>".$data[0]."</h3>";
    echo        "<p>".$data[1]."</p>";
    echo        "<p>".$data[2]."</p>";
    echo    "</article>";
    echo    "<article>";
    echo        "<h3>".$data[3]."</h3>";
    echo        "<p>".$data[4]."</p>";
    echo        "<p>".$data[5]."</p>";
    echo    "</article>";
    echo    "<article>";
    echo       "<h3>".$data[6]."</h3>";
    echo        "<p>".$data[7]."</p>";
    echo    "</article>";
    echo "</footer>";
}
 ?>
         


        <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script> <!-- on import le jquery nécessaire pour certaines opération dynamique comme le carroussel-->
        <script type="text/javascript" src="slick/slick.min.js"></script><!---->
        <script type="text/javascript" src="js/script.js"></script><!---->
        <script src="js/to-top.js"></script>
    </body>
</html>