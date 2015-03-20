<?php
	
	error_reporting(E_WARNING | E_ERROR);

	$dossier = 'fichiers';
	$dossierpreview = 'fichiers/preview';
	$files = scandir('./'.$dossierpreview);

		
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>TITRE</title>
		<meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
       
       
	</head>
		<body>

		<form id="upload" action="upload.php" method="POST" enctype="multipart/form-data">

					<legend>Choisissez une image</legend>

					<label for="ze_file">Fichier:</label>
					<input name="le_fichier" id="ze_file" type="file">
					<input type="submit" value="Upload"/>

				</form>
		
        <ol>
				<?php

				foreach ($files as $f){ 
			
	   				if ($f != '..' && $f != '.'){
		   			echo '<li><a href="'.$dossier.'/'.$f.'"><img src="'.$dossierpreview.'/'.$f.'"></li></a>';




	   				}
   				}

			?>
			</ol>
        
        </body>
</html>