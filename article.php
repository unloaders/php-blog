<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Mon blog</title>
    <meta name="description" content="Petit blog pour m'initier à PHP">
    <meta name="author" content="Jean-philippe Lannoy">
    <?php
      $fic = false;
	  include('includes/pdo.php');
      include('includes/verif_util.php');
	  include('includes/vignette.jpg.php');
	  
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
    ?>
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
  </head>
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
        <?php 
			if(isset($connecte) && $connecte == true)
			{
				echo'<div class="span8">
						<form action="article.php" method="post" enctype="multipart/form-data">
							<p>Titre de l article : <input type="text" name="title" /></p>
							<p>Contenu de l article : <textarea name="cont" rows=8 cols = 200 wrap=physical></textarea></p>
							<p><input type="file" name="avatar" /></p>
							<p><input type="submit" value="OK"></p>
						</form>';
			}
			else
			{
				echo'<div class="span8">Accès interdit ! Veuillez vous connectez !';
			}
			if(isset($_POST['title']) && isset($_POST['cont']) && isset($_FILES['avatar']))
				{ 
				  
					$titre = mysql_real_escape_string($_POST['title']);
					$cont = mysql_real_escape_string($_POST['cont']);
					$chemin = $_FILES['avatar']['name'];
					$fic = true;
					if($titre != null && $cont != null && $pdo->exec("INSERT INTO articles(titre_article, cont_article, chemin) VALUES('$titre', '$cont', '$NomImageExploitable')") > 0 )
						{
							header('Location:index.php');
							exit();
						}
					else
						{
							echo "<script>alert(\"Echec Enregistrement\")</script>"; 
						}
				}
				else if(isset($_POST['title']) && isset($_POST['cont']))
				{ 
				  
					$titre = mysql_real_escape_string($_POST['title']);
					$cont = mysql_real_escape_string($_POST['cont']);
				
					
					if($titre != null && $cont != null && $pdo->exec("INSERT INTO articles(titre_article, cont_article) VALUES('$titre', '$cont')") > 0 )
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
            
          </nav>
		</div 
      <footer>
        <p>&copy; Nilsine & ULCO 2015</p>

      </footer>

  </body>
</html>

