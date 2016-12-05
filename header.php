<?php

session_start(); 
 

if(isset($_SESSION['id']))
	
	{
	$id=$_SESSION['id'];
	$dbh = new PDO('mysql:host=localhost;dbname=pictionnary', 'test', 'test'); 
	$sql = $dbh->query("SELECT * FROM `users` WHERE `id`='$id'");
	$columns = $sql->fetch();
	$prenom = $columns['prenom'];
	$mail=$columns['email'];



	
	
	echo "Bonjour, ".$prenom;
	?>
	
	<a href="logout.php">Se deconnecter</a>
	<?php
	$dbh = new PDO('mysql:host=localhost;dbname=pictionnary', 'test', 'test'); 
	$sql ="SELECT * FROM `drawings` WHERE `EMAIL`='$mail'"; 
	foreach  ($dbh->query($sql) as $row) {
        $iddessin=$row['id'] . "\t";
        echo "<a href='guess.php?id=$iddessin'>Guess</a> ";
  }
	
	} else
		
	{
		?>
		<form method="post" action="req_login.php">
		
		<label for="email">E-mail</label>
		<input type="text" name="email" id="email"/><br><br>
		
		
		<label for="password">Mot de passe</label>
		<input type="password" name="password" id="password"/>
		
		<input type="submit" value="Se connecter"/>
		</form>
		
		<a href="inscription.php">Inscription</a>
	<?php
	}

?>