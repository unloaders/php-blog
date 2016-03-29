<div id="conteneur">
	<ul class="bjqs" >
  <script class="secret-source">
    jQuery(document).ready(function($) {

      $('#conteneur').bjqs({
        height      : 620,
        width       : 620,
        responsive  : true
      });

    });
  </script>
  <?php
    include('includes/head.php');
    $reponse = $pdo->query('SELECT * FROM articles;');
   
    while ($donnees = $reponse->fetch())
    {
      	  if(isset($connecte) && $connecte == true)
	       {

        		echo '<li><div class="titre">'.$donnees['titre_article'].'</div>';
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