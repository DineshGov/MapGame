<?php
    $page_name="jeuLeaflet.php";
    require ('header.php');
    require('../database_auth.php');
?>

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
	
	<div class="container">	
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
	
</html>