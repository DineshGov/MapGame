<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Se7en</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="../bootstrap/favicon_Se7en.ico">
    <?php
    if($page_name==="gestion_questionnaire.php" || $page_name==="jeuLeaflet.php" || $page_name==="correction.php"){
      echo '<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>';
      echo '<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>';
    }
    ?>    

    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../jquery/jquery-3.3.1.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    

    <script src="js/redirection_pages_function_main.js"></script>
    <script src="js/menu_principal.js"></script>
    <script src="js/administration.js"></script>
    <script src="js/gestion_questionnaire.js"></script>
    <script src="js/creation_questionnaire.js"></script>
	  <script src="js/score.js"></script>
    <?php
    if($page_name==="correction.php")
      echo '<script src="js/correction.js"></script>';
    ?>
    <?php
    if($page_name==="jeuLeaflet.php")
      echo '<script src="js/jeuLeaflet.js"></script>';
    ?>
    

    <link href="css/header.css" rel="stylesheet">
    <link href="css/deconnexion.css" rel="stylesheet">
    <link href="css/menu_principal.css" rel="stylesheet">
    <link href="css/administration.css" rel="stylesheet">
    <link href="css/gestionnaire_questionnaire.css" rel="stylesheet">
    <link href="css/creation_questionnaire.css" rel="stylesheet">
	  <link href="css/score.css" rel="stylesheet">
    <?php
    if($page_name==="correction.php")
      echo '<link href="css/correction.css" rel="stylesheet">';
    ?>
    <?php
    if($page_name==="gestion_questionnaire.php" || $page_name==="jeuLeaflet.php")
      echo '<link href="css/jeuLeaflet.css" rel="stylesheet">';
    ?>
    
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

      <?php
      if($page_name != 'deconnexion.php'){
        echo '<script type="text/javascript">
          $(".navbar-brand").on("click", RedirectionVersMenuPrincipal);
        </script>';
      }
      ?>
    </nav>