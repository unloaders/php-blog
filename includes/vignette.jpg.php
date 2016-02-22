<?php
	include('includes/pdo.php');
	if(isset($_FILES['avatar']))
	{
		if ($_FILES['avatar']['error'] <= 0)
		{
			if ($_FILES['avatar']['size'] <= 2097152)
			{
				$avatar = $_FILES['avatar']['name'];			
				$ImageChoisie = imagecreatefromjpeg($_FILES['avatar']['tmp_name']);
				$TailleImageChoisie = getimagesize($_FILES['avatar']['tmp_name']);
				$ImageNews = getimagesize($_FILES['avatar']['tmp_name']);
				$NouvelleLargeur = 450;
				$Reduction = ( ($NouvelleLargeur * 100)/$TailleImageChoisie[0] );
				$NouvelleHauteur = ( ($TailleImageChoisie[1] * $Reduction)/100 );
				$NouvelleImage = imagecreatetruecolor($NouvelleLargeur , $NouvelleHauteur) or die ("Erreur");
				imagecopyresampled($NouvelleImage , $ImageChoisie, 0, 0, 0, 0, $NouvelleLargeur, $NouvelleHauteur, $TailleImageChoisie[0],$TailleImageChoisie[1]);
				imagedestroy($ImageChoisie);
				$NomImageExploitable = time();
				$ExtensionPresumee = "jpg";
				imagejpeg($NouvelleImage , 'upload/'.$NomImageExploitable.'.'.$ExtensionPresumee, 100);
				$LienImageNews = 'upload/'.$NomImageExploitable.'.'.$ExtensionPresumee;
				imagejpeg($NouvelleImage , 'upload/'.$NomImageExploitable.'.'.$ExtensionPresumee, 100);
				$NomImageExploitable = $NomImageExploitable.'.'.$ExtensionPresumee;
			}
		}
	}
?>



