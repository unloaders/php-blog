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

      <footer>
        <p>&copy; Nilsine & ULCO 2015</p>

      </footer>

    </div>

  </body>
</html>