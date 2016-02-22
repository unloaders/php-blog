<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Mon blog</title>

    <meta name="description" content="Petit blog pour m'initier à PHP">
    <meta name="author" content="Jean-philippe Lannoy">
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
        </div>
        
        <div class="row">
        
          <div class="span8">
		  
			<form class="navbar-form navbar-right" action="connexion.php" method="POST">
                 <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Mail">
                 </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                </div>
                <div class="btn-group">
	                <button type="submit" class="btn btn-default btn-success">Connexion</button>
	            </div>
	          
            </form>'
    <?php

		if ((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['password']) && !empty($_POST['password']))){

			$base = mysqli_connect('localhost', 'root', '');
			mysqli_select_db($base, 'articles');
			$mdp = MD5($_POST['password']);
			$email = $_POST['email'];
			
			$sql = 'SELECT count(*) FROM membres WHERE email="'.$email.'" AND mdp="'.$mdp.'"';
			$req = mysqli_query($base, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
			$data = mysqli_fetch_array($req);

			mysqli_free_result($req);
			
			if ($data[0] == 1){
				echo 'Connexion réussi !';
				$sid = MD5($email.time());
				$update = 'UPDATE membres SET sid = "'.$sid.'" WHERE email="'.$email.'" AND mdp="'.$mdp.'"';
				$req2 = mysqli_query($base, $update) or die('Erreur SQL !<br />'.$update.'<br />'.mysql_error());
				setcookie("sid",$sid,time()+3600);
				header('Location: index.php');
			}

			else if ($data[0] == 0){
				$erreur = 'Compte non reconnu.';
				setcookie("sid",'',time()-1);
				echo $erreur;
				//header('Location: index.php?err=1');
			}
			else
			{
				$erreur = 'Echec de la connexion';
				echo $erreur;
				//header('Location: index.php?err=1');
			}
			mysqli_close($base);
		}
	
	?>
          
          </div>
          
          <nav class="span4">
            <h2>Menu</h2>
            
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="article.php">Rédiger un article</a></li>
				
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

