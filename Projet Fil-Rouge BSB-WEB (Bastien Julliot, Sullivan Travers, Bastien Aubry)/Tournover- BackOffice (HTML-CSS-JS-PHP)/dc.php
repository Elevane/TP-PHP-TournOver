
<!--
nom :dc.php
fonction : script qui déconnecte l'administrateur
-->


<?php 
session_start(); // connexion a la session
$_SESSION['loggedin'] = false; // le boléen loggedin devient false
session_destroy(); // déconnecte de la session
header('location:admin.php'); // retourne a la page de connection?>