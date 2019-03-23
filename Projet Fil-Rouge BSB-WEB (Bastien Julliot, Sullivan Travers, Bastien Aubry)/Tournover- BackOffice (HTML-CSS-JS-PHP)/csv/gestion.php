<!DOCTYPE html>
<html>
<head>
	<link href="style.css" rel="stylesheet">
	<title></title>
</head>
<body>
	


<?php


	$fp = fopen('contenu.csv', 'r');
	while ($data = fgetcsv($fp, 10000, ',')) {
	echo $data[0];
	echo '<p>'.$data[1]. '<p>';
	echo '<p>'.$data[2]. '<p>';
	echo '<img src="'.$data[3].'" alt="photo">';
	echo '<form action="delContenu.php" method="post">
	<label for="id"></label>
	<input type="hidden" name="id"value="'.$data[0].'">
	<label for="del"></label>
	<input type="submit" value="supprimer" name="del">
	
	</form>';

	echo '<form action="modMail.php" method="post">
	<label for="id"></label>
	<input type="hidden" name="id" value="'.$data[0].'">
	<label for="mod"></label>
	<input type="submit" value="modifier" name="mod">
	</form>';
	}


 	?>

	<form action="ajouterContenu.php" method="post" id="formAjouter" enctype="multipart/form-data">
		<label for="titre">titre</label>
		<input type ="text" name="titre">
		<label for="text">text</label>
		<input type="textarea" name="text">
		<label for="img">image</label>
		<input type="file" name="img">
		<input type="submit" value=" ajouter une idée">
	</form>

	<a href="contenu.php">contenu</a>

</body>
</html>