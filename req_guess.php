<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location: main.php");
}
try
{
  $mot=$_POST['mot'];
    $idimage=$_POST['idimage'];
    //echo "idimage : ".$idimage;

    $dbh = new PDO('mysql:host=localhost;dbname=pictionnary', 'test', 'test');
    $sql = $dbh->prepare("SELECT * FROM DRAWINGS WHERE `Word` ='$mot' AND  `id`='$idimage'");
    $sql->execute();

    //echo $sql->rowCount();

    if($sql->rowCount() == null)
    {
      echo 'Vous vous êtes fourvoyé dans la devination du mot </br>';
        echo "<a href='main.php'>Retour au Menu</a>";

    }
    else if ($sql->rowCount() ==1)
    {
      echo"Bravo vous avez deviné le dessin </br> ";
      $dbh = new PDO('mysql:host=localhost;dbname=pictionnary', 'test', 'test');
      $sql = $dbh->prepare("DELETE  FROM DRAWINGS WHERE `id`='$idimage'");
      $sql->execute();
      echo "<a href='main.php'>Retour au Menu</a>";
      //$commands = $sql->fetch(PDO::FETCH_COLUMN);
    }

}
catch (PDOException $e)
{
    print "Erreur !: " . $e->getMessage() . "<br/>";
    $dbh = null;
    die();
}
?>
