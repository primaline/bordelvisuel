<?php

		if ($_FILES["le_fichier"]["error"] > 0)
		{
			echo"vous n'avez téléversé aucune image";
		}
		
		else
		
		{
			$filename = $_FILES["le_fichier"]["name"];
			$fileext = substr($filename, strpos($filename, ".")+1);
			if ($fileext == "jpg" || $fileext == "jpeg" || $fileext == "png")
      		{

			move_uploaded_file($_FILES["le_fichier"]["tmp_name"], "fichiers/" . $_FILES["le_fichier"]["name"]);
			$width = 16;
			$height = 16;
			$image_p = imagecreatetruecolor($width, $height);

			if ($fileext == "jpg" || $fileext == "jpeg") {
				$image = imagecreatefromjpeg("fichiers/" . $_FILES["le_fichier"]["name"]);
			}
			else {
				if ($fileext == "png") {
					$image = imagecreatefrompng("fichiers/" . $_FILES["le_fichier"]["name"]);
				}
				else {
					exit('Unsupported type');
				}
			}
			$old_width  = imagesx($image);
			$old_height = imagesy($image);
			
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $old_width, $old_height);
			ob_start();
			imagejpeg($image_p, "fichiers/preview/". $_FILES["le_fichier"]["name"], 90);
			$data = ob_get_clean();
			imagedestroy($image);
			imagedestroy($image_p);
			header('Location: ./index.php');
			exit;
			}

			else

			{
				echo"seuls les fichiers .jpg, .jpeg ou .png sont acceptés";
			}
		
		}


	
?>
		