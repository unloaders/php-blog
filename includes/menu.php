<nav class="span4">
<h2>Menu</h2>
<div id="menu-slide">
<ul>
	<li id="index"><a href="index.php">Accueil</a></li>

	
	<?php
		if(isset($email_util) && isset($connecte) && $connecte == true)
		{
			echo'<li class="menu"><a href="article.php">Rédiger un article</a></li>';
			echo'<li class="menu"><a href="index.php?dc=true">Déconnexion</a></li>';
		}
		else
		{
			echo'<li class="menu"><a href="inscription.php">Inscription</a></li>';
			echo'<li class="menu"><a href="connexion.php">Connexion</a></li>';
		}
		echo'<li class="menu"><a href="newsletter.php">Newsletter</a></li>';
	?>
</ul>
</div>
</nav>