<?php

$email=$_POST["email"];
$password=$_POST["password"];

 
    // Connect to server and select database.  
    $dbh = new PDO('mysql:host=localhost;dbname=pictionnary', 'test', 'test');  
  
    // Vérifier si un utilisateur avec cette adresse email existe dans la table.  
    // En SQL: sélectionner tous les tuples de la table USERS tels que l'email est égal à $email.  
    $sql = $dbh->query("SELECT * FROM `users` WHERE `email`='$email'"); 
	$columns = $sql->fetch();
    $nb=$sql->rowCount();
	
	if ($nb==1)
	{
		$mdp=$columns['password'];
		
		if($password ==$mdp)
		{
			session_start();
			$_SESSION['id']=$columns['id'];
			$_SESSION["email"] = $columns["email"];
        $_SESSION["password"] = $columns["password"];
        $_SESSION["nom"] = $columns["nom"];
        $_SESSION["prenom"] = $columns["prenom"];
        $_SESSION["tel"] = $columns["tel"];
        $_SESSION["website"] = $columns["website"];
        $_SESSION["sexe"] = $columns["sexe"];
        $_SESSION["birthdate"] = $columns["birthdate"];
        $_SESSION["ville"] = $columns["ville"];
        $_SESSION["taille"] = $columns["taille"];
        $_SESSION["couleur"] = $columns["couleur"];
        $_SESSION["profilepic"] = $columns["profilepic"];
			
			header("Location: main.php?rowCount=".$sql->rowCount()); 
		} else echo "Mauvais password"; 
		
	}else echo "Il nexiste pas d'utilisateur avec cette email !";




?>