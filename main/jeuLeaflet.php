<?php
    $page_name="jeuLeaflet.php";
    require ('header.php');
    require('../database_auth.php');
?>

	<?php
		if(!isset($_POST['idQuestionnaire']))
		{
			echo "Vous devez vous connecter pour pouvoir coninuer<br>Redirection en cours...";
			echo("<script>setTimeout('RedirectionVersConnexionFromMain()', 1000)</script>");
			//header('menu_principal.php');
			//header('index.php');
			exit(1);
			
		}
		
		echo '<input id="idQuestionnaire" type="hidden" value="' . (int)$_POST["idQuestionnaire"] . '">';
		echo '<input id="nomQuestionnaire" type="hidden" value="' . $_POST['nomQuestionnaire'] . '">';
		
		if(!isset($_SESSION['login']))
			echo '<input id="invite" value="true" type="hidden"/>';
	?>

		<div id="table-container">
			<table border="1">
	    	  
	    	  <tr>
	    	  	<?php echo "<th>" . $_POST['nomQuestionnaire'] . "</th>";?>
	    	    <th id="question_numero">Question N°</th>
	    	    <!--Contenu géré en js -->
	    	  </tr>

	    	  <tr>
	    	    <td id="col1">
	    	    	<div id="carte">
	    	    	</div>
	    	    </td>
	    	    <td id="col2">
	    	    	<div id="dashboard">
						<div>
							<div>
								<p id="nom_question" class="well"></p>	
							</div>
							<div>
								<p id="nombre_essai" class="text-info"></p>
							</div>
							<div>
								<p id="points" class="text-info"></p>
								<p id="total"></p>
							</div>

							<div id="latlng" class="col-lg-12 col-md-12">
								<form>
									<p class="text-info"> Latitude : <input id="valLat" type="text" class="form-control" placeholder="Latitude"/></p>
									<p class="text-info"> Longitude : <input id="valLong" type="text" class="form-control" placeholder="Longitude"/></p>
								</form>
							</div>
							<span id="help" class="glyphicon glyphicon-eye-open"></span>
						</div>
						<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2 col-md-offset-2 col-md-8 col-md-offset-2 col-sm-offset-2 col-sm-8 col-sm-offset-2">
							<form method="post" action="correction.php" id="form_to_correction">
								<?php
								echo '<input name="idQuestionnaire" type="hidden" value="' . (int)$_POST["idQuestionnaire"] . '">';
								echo '<input name="nomQuestionnaire" type="hidden" value="' . $_POST['nomQuestionnaire'] . '">';
								?>
								<input type="submit" class="endGameButton btn btn-success" id="btnCorrection" value="Voir la correction">
							</form>
							<a  href="score.php" class="endGameButton btn btn-primary" id="btnScore" >Consulter vos scores</a>
						</div>
						<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2 col-md-offset-2 col-md-8 col-md-offset-2 col-sm-offset-2 col-sm-8 col-sm-offset-2">
							<a  href="menu_principal.php" class="endGameButton btn btn-danger" id="btnMenuPrincipal" >Retourner au menu principal</a>
						</div>
						
					</div>
					
	    	    </td>
				
	    	  </tr>
			  
			 

	    	</table>
	    </div>
	</body>
</html>