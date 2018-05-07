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
			//header('menu_principal.php');
			//header('index.php');
			exit(1);
			
		}
		
		echo '<input id="idQuestionnaire" type="hidden" value="' . $_POST["idQuestionnaire"]   . '">';
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

						<div id="btnInfos" style="display:none; margin-left:20px; margin-right:20px;">
							<!--<button class="btn btn-primary"><a href="menu_principal.php" style="color:white;text-decoration:none">Test en mode invité terminé: cliquez sur ce lien pour retourner à la page d'accueil</a></button>-->
							<a href="menu_principal.php" class="btn btn-lg btn-primary" role="button"></a>
						</div>
						
						
					</div>
					
	    	    </td>
				
	    	  </tr>
			  
			 

	    	</table>
	    </div>
	</body>
</html>