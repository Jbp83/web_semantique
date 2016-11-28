<?php

session_start(); 
 

if(isset($_SESSION['prenom']))
	
	{
		
	$prenom=$_SESSION['prenom'];
	echo "Bonjour, ".$prenom;
	?>
	
	<a href="logout.php">Se deconnecter</a>
	<?php
	} else
		
	{
		?>
		<form method="post" action="req_login.php">
		
		<label for="prenom">Prenom</label>
		<input type="text" name="prenom" id="prenom"/><br><br>
		
		
		<label for="password">Mot de passe</label>
		<input type="password" name="password" id="password"/>
		
		<input type="submit" value="Se connecter"/>
		</form>
		
		<a href="inscription.php">Inscription</a>
	<?php
	}

?>