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
			echo "erreur";
			exit(1);
		}
		
		echo '<input type="hidden" id="idQuestionnaire" value='.$_POST['idQuestionnaire'].'>';
	?>
	
	<div id="intro" style="text-align:center;">
		<button class="btn btn-info btn-lg">Cliquez ici pour commencer l'exercice</button>
	</div>
	
	<div class="container" >	
		<div class="row">
			<div class="intro2" style="text-align: center; display:none"><p id="question"></p></div><br>
			<div>
				<div id="carte" style="width: 1200px; height: 600px;"></div>
			</div>
			<div class="col-lg-4"><p>aaaaaa</p></div>
		</div>
	</div>
	
	<div class="intro2" style="display:none; margin-left: 200px;">
		<div class="row">
			<div class="col-lg-9"> <br><br><p id="test"></p></div>
			<div class="col-lg-9"><p id="points"></p><p id="total"></p></div>
		</div>
		
		<div>
			<br>
			<form>
				<p> Latitude : <input id="valLat" type="text" class="form-control" placeholder="latitude"/></p>
				<p> Longitude : <input id="valLong" type="text" class="form-control" placeholder="longitude"/></p>
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