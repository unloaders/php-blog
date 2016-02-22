<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Mon blog</title>
    <meta name="description" content="Petit blog pour m'initier à PHP">
    <meta name="author" content="Jean-philippe Lannoy">
    <?php
	  include('includes/pdo.php');
      include('includes/verif_util.php');

    ?>
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
  </head>

<?php
 
	if(isset($_FILES['avatar']))
		{ 
			$dossier = 'upload/';
			$fichier = basename($_FILES['avatar']['name']);
			if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) 
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
					<p><input type="file" name="avatar" /></p>
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
				$titre = mysql_real_escape_string($_POST['title']." ");
				$cont = mysql_real_escape_string($_POST['cont']." ");
				$img = '';
				if(isset($_FILES['avatar']))
				{
					$img = $_FILES['avatar']['name'];
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
			<nav class="span4">
            <h2>Menu</h2>
            
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <?php
					if(isset($email_util) && isset($connecte) && $connecte == true)
					{
						echo'<li><a href="index.php?dc=true">Déconnexion</a></li>';
					}
					else
					{
						echo'<li><a href="connexion.php">Connexion</a></li>';
					}
				?>
            </ul>
            </ul>
            
          </nav>

        </div>
        
      </div>

      <footer>
        <p>&copy; Nilsine & ULCO 2015</p>

      </footer>

    </div>

  </body>
</html>