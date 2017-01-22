<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8 />
    <title>Pictionnary - Accueil</title>
</head>
<body>
<header>
	<?php
		include "header.php";
	?>
</header>

<?php
	if(isset($_SESSION['email']))
	{
	try
	{
    ?>

    <div class = "container">
      <div id="listeDessin">
        <?php
		$dbh = new PDO('mysql:host=localhost;dbname=pictionnary', 'test', 'test');

		$sql = $dbh->prepare("SELECT id FROM drawings WHERE u_id= :uid");
		$sql->bindValue(":uid", $_SESSION['sid']);
		$sql->execute();
		$i = 0;
		foreach ($sql->fetchAll(PDO::FETCH_ASSOC) as $ligne)
		{
			echo "<a type='button' class='btn btn-primary btn-lg btn-block' href=guess.php?id=" . $ligne['id'] . ">Dessin " . ++$i . "</a><br/>";
		}
	}
	catch (PDOException $e)
	{
		print "Erreur !: " . $e->getMessage() . "<br/>";
		$dbh = null;
		die();
	}


  echo "</table></div>";

  $sql = $dbh->prepare("SELECT * FROM drawings WHERE destinataire = '" . $_SESSION['email'] . "'");
  $sql->execute();

  echo "<div><table style=\"float:left\">";
  echo "<th>Vos demandes :</th> ";


  $i = 0;

  foreach ($sql as $row) {

    if ($i == 0) {

      echo "<tr>";
    }

    echo "<td>";
    echo "<a href=\"guess.php?id=".$row["id"]."\"><img src=\"" . $row["images"] . "\" style=\"width:100px; height:100px;\" alt='Dessin' /></a>";
    echo "</td>";

    if ($i == 2) {

      echo "</tr>";
      $i = 0;
    } else {

      $i++;
    }
  }

  echo "</table></div>";
  }
  ?>

</div>
</div>
</body>
<html>
