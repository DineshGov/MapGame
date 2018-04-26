<?php
    $page_name="gestion_questionnaire.php";
    require ('header.php');
    require('../database_auth.php');
?>
	<head>	
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />

		
			
			<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
			<!--[if lt IE 9]>
			  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
			<![endif]-->
		<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
	</head>
	
	<?php
		if(!isset($_POST['idQuestionnaire']))
		{
			echo "erreur d'authetification<br>Redirection en cours...";
			echo("<script>setTimeout('RedirectionVersConnexionFromMain()', 1000)</script>");
			header('menu_principal.php');
			exit(1);
			
		}
		
		echo '<input id="idQuestionnaire" type="hidden" value='.$_POST['idQuestionnaire'].'>';
		echo '<input id="nomQuestionnaire" type="hidden" value='.$_POST['nomQuestionnaire'].'>';
	?>
	
	
	<div style="text-align:center;">
		<button id="intro" class="btn btn-primary btn-lg">Cliquez ici pour commencer l'exercice</button>
		<button id="corr" style="display:none" class="btn btn-primary btn-lg">Exercice terminé: cliquez ici pour commencer la correction</button>
	</div>
	
	<div class="container" >	
		<div class="row">
			<div class="intro2 " style="text-align: center; display:none;"><span id="question" class="label label-primary lg" style="font-size: 120%"></span></div><br>
			<div>
				<div id="carte" style="width: 1200px; height: 600px;"></div>
			</div>
			
		</div>
	</div>
	
	<div class="intro2" style="display:none; margin-left: 200px;">
		
		<div class="row">
			<div class="col-lg-9"> <br><br><p id="test" class="text-info" style="font-size: 120%; font-weight: bold"></p></div>
			<div class="col-lg-9"><p id="points" style="font-size: 120%; font-weight: bold" class="text-info"></p><p style="font-size: 120%; font-weight: bold" id="total"></p></div>
		</div>
		
		<div>
			<br>
			<form>
				<p class="text-info" style="font-size: 120%; font-weight: bold"> Latitude : <input id="valLat" type="text" class="form-control" placeholder="latitude"/></p>
				<p class="text-info" style="font-size: 120%; font-weight: bold"> Longitude : <input id="valLong" type="text" class="form-control" placeholder="longitude"/></p>
			</form>
		</div>
	</div>
	
		
	 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
	<script src="js/jeuLeaflet.js" type="text/javascript"></script>
</html>