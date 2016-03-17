<!-- Nouvelle fonctionnalité inscription -->
<?php
  include('includes/head.php');
  if(isset($_POST['email']))
  {

    $mail = $_POST['email'];

    
    if($pdo->exec("INSERT INTO newsletter(email) VALUES('$mail')") > 0 )
    {
      echo 'Votre email a bien été ajouté à la newsletter';
    }
    else
    {
      echo 'Echec enregistrement';
    }   
  }
?>  