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
          <!-- Nouvelle fonctionnalité inscription -->
          <?php
            if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']))
            {
              
              $nom = $_POST['nom'];
              $prenom = $_POST['prenom'];
              $mail = $_POST['email'];
              $mdp = md5($_POST['password']);
              
              if($pdo->exec("INSERT INTO membres(nom, prenom, email, mdp) VALUES('$nom', '$prenom', '$mail', '$mdp')") > 0 )
              {
                header('Location:index.php');
                exit();
              }
              else
              {
                header('Location:index.php');
                echo "<script>alert(\"Inscription impossible !\")</script>"; 
              }   
            }
          ?>  
        </div>
        <div class="row"> 
          <div class="span8">
          <form action="inscription.php" method="post">
            <p>Nom : <input type="text" name="nom" /></p>
            <p>Prenom : <input type="text" name="prenom" /></p>
            <p>email : <input type="email" name="email" /></p>
            <p>mot de passe : <input type="password" name="password" /></p>
            <input type="submit" value="OK">
          </form> 
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
      <?php
        include('includes/footer.php');
      ?>

    </div>

  </body>
</html>

