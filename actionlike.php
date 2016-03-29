<!-- Nouvelle fonctionnalité inscription -->
<?php
  include('includes/head.php');
  if(isset($_POST['id']))
  {

    $id = $_POST['id'];
    $nb = $_POST['nb'] + 1;
    $ip = $_SERVER['REMOTE_ADDR'];
    $reponse = $pdo->query('SELECT COUNT(*) FROM votes WHERE id_article = "'.$id.'" AND ip = "'.$ip.'"')->fetchColumn();


    if($reponse == 0  )
    {
      if($pdo->exec("UPDATE articles SET like_article = '$nb' WHERE id = '$id' ") )
      {
        $pdo->exec("INSERT INTO votes(ip,id_article) VALUES('$ip','$id')");
      }
      else
      {
        echo 'Echec j aime';
      }      
    }

  }
?>  