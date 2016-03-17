<?php
  include('includes/head.php');

?>

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
          include('diap.php');
            $reponse = $pdo->query('SELECT * FROM articles;');
           
            while ($donnees = $reponse->fetch())
            {
		      	  if(isset($connecte) && $connecte == true)
			       {
		        		$link = "modif_article.php?id=".$donnees['id'];
		        		$link2 = "suppr_article.php?id=".$donnees['id'];
		        		echo '<li><p id="edit"><a href='.$link.'>Edit </a><a href='.$link2.'>Delete<p/> </a><div class="titre">'.$donnees['titre_article'].'</div>';
		        		if($donnees['chemin'] != null)
		        		{
		        			echo '<center><img src="upload/' . $donnees["chemin"] . '"></center>';
		        		}
			         	echo '<div class="cont">'.nl2br($donnees['cont_article']).'</div></li>';
            }
		    	  else
		    	  {
			         	echo '<li><div class="titre">'.$donnees['titre_article'].'</div>';
			         	if($donnees['chemin'] != null)
		        		{
		        			echo '<center><img src="upload/' . $donnees["chemin"] . '"></center>';
		        		}
		        		echo '<div class="cont">'.$donnees['cont_article'].'</div></li>';
		    	  }
           
          }

          ?>
          </ul>
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

