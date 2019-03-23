<!--
nom :paiments.php
fonction :c'est la page de paiments
-->

<?php require_once('header.php');  // importation du header?>


<!--
/**********************************************/
                /* PAIMENTS */
/**********************************************/
-->
<div id="paie">
	<h3> Reglement de vos places</h3>
    <form>
		<label for="nom">Nom</label>
		<input type="text" name="nom">

		<label for="prenom">Prenom</label>
		<input type="text" name="prenom">

		<label for="email">Email</label>
		<input type="text" name="email">

		<label for="select">Carte</label>
		<select name="select">
			<option value="mastercard">Mastercard</option>
			<option value="visa">Visa</option>
			<option value="carte bancaire">Carte bancaire</option>
			<option value="paypal">Paypal</option>	
		</select>  

		<section id="carte">
			<label for="cNum"></label>
			<input type="text" placeholder="Numéro de carte" name="cNum">

			<label for="date"></label>
			<input type="numéro" placeholder="Date de validité" name="date">

			<label for="crypto"></label>  
			<input type="text" placeholder="Cryptogramme" name="crypto">
		</section>

	    <label for="submit"></label>
		<input id="bouton" type="submit" name="submit">
	</form>
</div>

        <!--
/**********************************************/
                /* FOOTER */
/**********************************************/
-->
        
     <?php require_once('footer.php');  // importation du footer de la page?>