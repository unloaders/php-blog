<?php
 
  // Create connection
  try
    {

      $pdo = new PDO('mysql:host=localhost;dbname=articles','root','');
	  
    }
  catch(Exception $e)
    {
      die('Erreur : '.$e->getMessage());
    }
?>