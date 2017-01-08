<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8 />
    <title>Pictionnary - Acceuil</title>
</head>
<body>
<header>
	<?php
		include "header.php";
	?>
</header>
<div class = "container">
  <div id="listeDessin">
<?php
	if(isset($_SESSION['email']))
	{
	try
	{
		$dbh = new PDO('mysql:host=localhost;dbname=pictionnary', 'test', 'test');

		$sql = $dbh->prepare("SELECT id FROM drawings WHERE u_id= :uid");
		$sql->bindValue(":uid", $_SESSION['sid']);
		$sql->execute();
		$i = 0;
		foreach ($sql->fetchAll(PDO::FETCH_ASSOC) as $ligne)
		{
			echo "<a type='button' class='btn btn-secondary btn-lg btn-block' href=guess.php?id=" . $ligne['id'] . ">Dessin " . ++$i . "</a><br/>";
		}
	}
	catch (PDOException $e)
	{
		print "Erreur !: " . $e->getMessage() . "<br/>";
		$dbh = null;
		die();
	}
	}
?>
</div>
</div>
</body>
<html>
