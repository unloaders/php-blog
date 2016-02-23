<?php
    include('includes/head.php');
	if(isset($_FILES['avatar2']))
		{ 
			$dossier = 'upload/';
			$fichier = basename($_FILES['avatar2']['name']);
			if(move_uploaded_file($_FILES['avatar2']['tmp_name'], $dossier . $fichier)) 
			{
				echo 'Upload effectué avec succès !';
			}
			else 
			{
				echo 'Echec de l\'upload !';
			}
		}          
	if(isset($_GET['id']))
	    { 
			$id = $_GET['id'];
			$reponse = $pdo->query('SELECT * FROM articles WHERE id='.$id);
			$donnees = $reponse->fetch();
		}     
?>
  <body>
  <div class="container">
      <div class="content">
        <div class="page-header well">
          <h1>Mon Blog <small>Pour m'initier à PHP</small></h1>
		  <?php
		  	if(isset($email_util))
			{
				echo'<p>Bonjour '.$email_util.' !';
			}
		  ?>
        </div>
        
        <div class="row">
			<div class="span8">
		    <?php  
				if(isset($connecte) && $connecte == true)
				{
				    echo '<div class="span8"><form action="" method="post" enctype="multipart/form-data">
							<p>Titre de l article : <input type="text" name="title" value="'.$donnees['titre_article'].'"/></p>
							<p>Contenu article : <textarea name="cont" >'.$donnees['cont_article'].'</textarea></p>
							<p id="id">id : <input name="id_livre" value="'.$donnees['id'].'"/></p>
							<p><INPUT type="checkbox" name="check" > Supprimer image ?</p>
							<p><input type="file" name="avatar2" /></p>
							<input type="submit"/>
						   </form></div>';
					if($donnees['chemin'] != null)
					{
						echo '<center><img src="upload/' . $donnees["chemin"] . '"></center>';
					}
					else
					{
						echo "pas d image";
					}	  
				}
				else
					{
						echo'<div class="span8"></div>Accès interdit ! Veuillez vous connectez !';
					}		
				if(isset($_POST['title']) && isset($_POST['cont']))
				    { 
						$titre = $_POST['title']." ";
						$cont = $_POST['cont']." ";
						
						if(isset($_FILES['avatar2']))
						{
							$img = $_FILES['avatar2']['name'];
							echo'test 1 ';
						}
						else if($_POST['check']==true)
						{
							echo'test 2 ';
							$img = null;
						}	
						
						if($titre != '' && $cont != '' && $pdo->exec("UPDATE articles SET titre_article = '$titre', cont_article = '$cont', chemin = '$img' WHERE id = '$id' ") )
						{		
							header('Location:index.php');
							exit();
						}
						else
						{
						
							echo "<script>alert(\"Echec Enregistrement\")</script>"; 
						}

					}

		    ?>    
          </div>
			<?php
				include('includes/menu.php');
			?>

        </div>
        
      </div>

      <?php
        include('includes/footer.php');
      ?>

    </div>

  </body>
</html>