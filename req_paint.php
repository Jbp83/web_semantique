<?php
session_start();

if (!isset($_SESSION['id'])) {

		header("Location: main.php");
	}


$id=$_SESSION['id'];
$commande=$_POST['drawingCommands'];
$picture=stripslashes ($_POST['picture']);
$email = $_SESSION['email'];
//echo "email :".$email;
$mot = $_POST["mot"];
$dest = $_POST["dest"];
$couleur=$_POST['color'];
$size=$_POST['size'];

/* echo $id;
echo $commande;
echo $picture;
echo $size;
echo $couleur; */



$dbh = new PDO('mysql:host=localhost;dbname=pictionnary', 'test', 'test'); 

$sql = $dbh->prepare("INSERT INTO DRAWINGS (EMAIL, COMMANDES, DESSIN, MOT, DEST) VALUES (:email, :commandes, :dessin, :mot, :dest)"); 
				
      $sql = $dbh->prepare("INSERT INTO DRAWINGS (EMAIL, COMMANDES, DESSIN, MOT, DEST) VALUES (:email, :commandes, :dessin, :mot, :dest)");
	$sql->bindValue(":email", $email);
	$sql->bindValue(":commandes", $commande);
	$sql->bindValue(":dessin", $picture);
	$sql->bindValue(":mot", $mot);
	$sql->bindValue(":dest", $dest); 
			 
			    

				  //$sql->execute();
				  
				   if (!$sql->execute()) {  
            echo "PDO::errorInfo():<br/>";  
            $err = $sql->errorInfo();  
            print_r($err);  
        }else {

		echo "Votre dessin a bien &eacute;t&eacute; enregistr&eacute; !<a href='main.php'>Retour</a>";
	}

?>