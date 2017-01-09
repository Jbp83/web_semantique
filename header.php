<link rel="stylesheet" media="screen" href="css/styles.css" >
	<link rel="stylesheet" media="screen" href="css/styles.css" >
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


<?php
	session_start();
	if(isset($_SESSION['email']))
	{
		?>

<nav class="navbar navbar-default">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
      </button>
      <a class="navbar-brand" href="main.php">Pictionnary</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="paint.php">DRAW !<span class="sr-only">(current)</span></a></li>

         <li class="active"><a href="logout.php">Deconnexion<span class="sr-only">(current)</span></a></li>

         <div id="userInfo">

		<?php

         if($_SESSION['profilepic'] != null)
		{

			echo '<img src=' . $_SESSION['profilepic'] . '/>';
		}

			echo '<h4> Bonjour ' . $_SESSION['prenom']. '<h4>';

	 	?>

	 	</div>

    </div>
  </div>
</nav>

<?php

}
	else {
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
      </button>
      <a class="navbar-brand" href="#">Pictionnary</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="paint.php">DRAW !<span class="sr-only">(current)</span></a></li>

         <li class="active"><a href="inscription.php">Inscription<span class="sr-only">(current)</span></a></li>


      <form id="signin" action="req_login.php" method="post" class="navbar-form navbar-right" role="form">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="email" type="email" class="form-control" name="email" value="" placeholder="Email Address">
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password" value="" placeholder="Password">
                        </div>

               <button type="submit" href="" class="btn btn-primary">Login</button>

      </form>

    </div>
  </div>
</nav>

