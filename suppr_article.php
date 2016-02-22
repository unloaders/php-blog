<?php
	include('includes/head.php');          
	if(isset($_GET['id']))
		  { 
				$id = $_GET['id'];
			}        
?>
  <body>
    <div class="container">

      <div class="content">
      
        <div class="page-header well">
          <h1>Mon Blog <small>Pour m'initier à PHP</small></h1>
        </div>
        
        <div class="row">
          <?php     
        		if(isset($connecte) && $connecte == true)
        		{
        		  if(isset($_GET['id']))
        		    { 
        		  		if($id != null && $pdo->exec("DELETE FROM articles WHERE id = '$id' ") )
        				{
        					header('Location:index.php');
        					exit();
        				}
        				else
        				{
        					echo "<script>alert(\"Echec Suppression\")</script>"; 
        				}
        			}
        		}
        		else
        		{
        			echo "<script>alert(\"Vous n'êtes pas connecté\")</script>"; 
        		}
          ?>    
          </div>
          <nav class="span4">
            <h2>Menu</h2>
            
            <ul>
                <li><a href="index.php">Accueil</a></li>
                
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