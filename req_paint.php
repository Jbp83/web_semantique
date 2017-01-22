<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location: main.php");
}
$drawingCommands=stripslashes($_POST['drawingCommands']);
$picture=stripslashes($_POST['picture']);
$userId = $_SESSION['sid'];
$mot=$_POST['mot'];
$destinataire=$_POST['destinataire'];
try
{
    $dbh = new PDO('mysql:host=localhost;dbname=pictionnary', 'test', 'test');

    $sql = $dbh->prepare("INSERT INTO drawings(commandes, images, u_id,destinataire,Word) VALUES (:commandes, :image, :uid,  :destinataire,:mot);");
	$sql->bindValue(':commandes', $drawingCommands);
	$sql->bindValue(':image', $picture);
  	$sql->bindValue(':uid', $userId);
	$sql->bindValue(':mot', $mot);
  $sql->bindValue(':destinataire', $destinataire);

	if (!$sql->execute())
	{
		echo "PDO::errorInfo():<br/>";
		$err = $sql->errorInfo();
		print_r($err);
	}
	else
	{
		header('Location: main.php');
	}
	$dbh = null;
}
catch (PDOException $e)
{
    print "Erreur !: " . $e->getMessage() . "<br/>";
    $dbh = null;
    die();
}
?>
