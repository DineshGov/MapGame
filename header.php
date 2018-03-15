<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="bootstrap/favicon_Se7en.ico">
    <title>Se7en</title>

    <script src="js/jquery-3.3.1.js"></script>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="authentification.css" rel="stylesheet">
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
                alert('Informations sur les développeurs blabla');
              })
            </script>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <?php 
            	if ($page_name === "inscription.php")
            		echo '<li><a href="connexion.php"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>';
            	elseif ($page_name === "connexion.php")
            		echo '<li><a href="inscription.php"><span class="glyphicon glyphicon-log-in"></span> Inscription</a></li>';
            ?>
            <li><a href="#"><span class="glyphicon glyphicon-user "></span> Invité</a></li>
          </ul>
        </div>
      </div>
    </nav>