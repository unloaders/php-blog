<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Mon blog</title>
    <meta name="description" content="Petit blog pour m'initier à PHP">		<!-- Log blog : identifiant = kevin.senet@gmail.com mdp = 123456	--> 
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
  <body>


    <div class="container">

      <div class="content">
      
        <div class="page-header well">
          <h1>Mon Blog <small>Pour m'initier à PHP</small></h1>
		  <?php
			if(isset($_GET['dc']) && $_GET['dc'] == true)
			{
				setcookie("sid",'',time()-1);
				header('Location: index.php');
			}
			if(isset($email_util))
			{
				echo'<p>Bonjour '.$email_util.' !';
			}
		  ?>
        </div>
        
        <div class="row">
        
          <div class="span8">
          <?php  
            $reponse = $pdo->query('SELECT * FROM articles;');
            
            while ($donnees = $reponse->fetch())
            {
			  if(isset($connecte) && $connecte == true)
			  {
				$link = "modif_article.php?id=".$donnees['id'];
				$link2 = "suppr_article.php?id=".$donnees['id'];
				echo '<p id="edit"><a href='.$link.'>Edit </a><a href='.$link2.'>Delete<p/> </a><div class="titre">'.$donnees['titre_article'].'</div>';
				if($donnees['chemin'] != null)
				{
					echo '<center><img src="upload/' . $donnees["chemin"] . '"></center>';
				}
				echo '<div class="cont">'.nl2br($donnees['cont_article']).'</div>';

			  }
			  else
			  {
				echo '<div class="titre">'.$donnees['titre_article'].'</div>';
				if($donnees['chemin'] != null)
				{
					echo '<center><img src="upload/' . $donnees["chemin"] . '"></center>';
				}
				echo '<div class="cont">'.$donnees['cont_article'].'</div>';

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
						echo'<li><a href="article.php">Rédiger un article</a></li>';
						echo'<li><a href="index.php?dc=true">Déconnexion</a></li>';
					}
					else
					{
						echo'<li><a href="connexion.php">Connexion</a></li>';
					}
				?>
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

