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

        </div>

        <div class="row">
        
          <div class="span8">
          	<?php
				if(isset($_GET['id']) && $_GET['id']!=null)
				{
					$id = $_GET['id'];
					$query = "SELECT * FROM articles WHERE id = ".$id;
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