<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Se7en</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="bootstrap/favicon_Se7en.ico">
    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="jquery/jquery-3.3.1.js"></script>
    <script src="js/redirection_pages_function.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link href="bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/authentification.css" rel="stylesheet">
    <script src="bootstrap/js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>

	
		<nav class="navbar navbar-inverse navbar-static-top">
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="#" id="game_name_link">Se7en</a>
			</div>
	
	
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a id="about_link">About</a></li>
            <script type="text/javascript"> 
              $('#about_link').on('click', function(){
                alert('Se7en est un jeu intéractif ayant pour but d\'enrichir la culture générale du joueur en lui faisant découvrir plusieurs lieux \nCe site a été codé en PHP et Javascript en utilisant la bibliothèque Leaflet');
              })
            </script>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <?php 
            	if ($page_name === "inscription.php")
            		echo '<li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>';
            	elseif ($page_name === "index.php")
            		echo '<li><a href="inscription.php"><span class="glyphicon glyphicon-log-in"></span> Inscription</a></li>';
            
              if($page_name !== "redirection_connexion.php")
                echo '<li><a href="redirection_invite.php"><span class="glyphicon glyphicon-user "></span> Invité</a></li>'
            ?>
          </ul>
        </div>
      </div>
    </nav>