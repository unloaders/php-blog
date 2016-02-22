<?php
	if(isset($_COOKIE['sid']))
	{
			$base = mysqli_connect('localhost', 'root', '');
			mysqli_select_db($base, 'articles');
			$sid_util = $_COOKIE['sid'];
			$connecte = true;
			$sql = 'SELECT * FROM membres WHERE sid="'.$sid_util.'"';
			$req = mysqli_query($base, $sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
			$data = mysqli_fetch_array($req);
			if ($data[0] != null){
				$email_util = $data[1];
				
				}

			
		$connecte = true;
	}

	
?>