<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Mon blog</title>
    <meta name="description" content="Petit blog pour m'initier à PHP">   <!-- Log blog : identifiant = kevin.senet@gmail.com mdp = 123456  --> 
    <meta name="author" content="Jean-philippe Lannoy">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
	<script type="text/javascript" src="./assets/js/script.js"></script>
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