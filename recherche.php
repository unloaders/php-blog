<?php
  include('includes/head.php');
?>
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
    		  <!-- moteur de recherche	--> 
          <form class="form-inline" role="form" action="recherche.php" method='POST'>
            <div class="form-group">
              <input type="text" class="form-control" id="search" name="search">
            </div>
            <button type="submit" class="btn btn-default">Rechercher</button>
          </form>
        </div>

        <div class="row">
        
          <div class="span8">
          	<?php

				if(isset($_POST['search']) && $_POST['search'] != NULL)
				{
					$requete = htmlspecialchars($_POST['search']);
					$mots = explode( " ", $requete );
					if( count( $mots ) > 0 ) 
					{
					   $query = "SELECT * FROM articles WHERE ";
					   for( $i = 0; $i < count( $mots ); $i++ ) {
					      $query .= "titre_article LIKE '%". $mots[$i] ."%' OR cont_article LIKE '%". $mots[$i] ."%' ";
					      if( $i < count( $mots ) - 1 )
					      {
					         $query .= " OR ";
					      }
				    	}
				    }	
					$query .= " ORDER BY id DESC";
					$reponse = $pdo->query($query);
					while ($donnees = $reponse->fetch())
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
          <!-- fin exo moteur de recherche	--> 
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
            echo'<li><a href="inscription.php">Inscription</a></li>';
						echo'<li><a href="connexion.php">Connexion</a></li>';
					}
				?>
            </ul>
            
          </nav>
        </div>
        
      </div>
      <?php
        include('includes/footer.php');
      ?>

    </div>

  </body>
</html>