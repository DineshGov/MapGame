<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Se7en</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="../bootstrap/favicon_Se7en.ico">
    
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../jquery/jquery-3.3.1.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <link href="../bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <script src="../bootstrap/js/ie-emulation-modes-warning.js"></script>
    <script src="js/redirection_pages_function_main.js"></script>
    <link href="css/header.css" rel="stylesheet">
    <link href="css/deconnexion.css" rel="stylesheet">
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
          if($page_name!=="deconnexion.php"){
            if(isset($_SESSION['login']) && isset($_SESSION['connecte'])){
              echo '<li><a href="#" id="connected_as"><span class="glyphicon glyphicon-education glyphicon_header"> </span> Connecté en tant que ' . $_SESSION['login'] . '</a></li>';
              echo '<li><a href="deconnexion.php"><span class="glyphicon glyphicon-off glyphicon_header"> </span> Déconnexion </a></li>';
            }
            else{
              echo "<li><a href='#' id='connected_as'><span class='glyphicon glyphicon-education glyphicon_header'> </span> Connecté en tant qu'invité</a></li>";
              echo '<li><a href="deconnexion.php"><span class="glyphicon glyphicon-off glyphicon_header"> </span> Déconnexion </a></li>';
            }
          }
          ?>
          </ul>
        </div>
      </div>
    </nav>