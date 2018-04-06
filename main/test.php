<?php
	$page_name="gestion_questionnaire.php";
	require ('header.php');
	require('../database_auth.php');
?>
	<div>
		<a href="administration.php" class='return_links'>
			<span class="glyphicon glyphicon-step-backward"></span>
			Retour à la page d'administration
		</a>
	</div>

	<div class="col-lg-12 col-md-12 col-sm-12">

		<div class="col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-offset-1 col-sm-11"> <h1>Gestion questionnaire</h1>
		</div>

		<div class="col-lg-12 col-md-12 col-sm-12" id="div_gestion">
			<?php
			$req=$bd->prepare('SELECT idQuestionnaire, nomQuestionnaire FROM questionnaires WHERE idQuestionnaire = :id');
			$req->bindvalue(':id', $_POST['idQuestionnaire']);
			$req->execute();
			$tab = $req->fetch(PDO::FETCH_ASSOC);


			echo "<p>idQuestionnaire: <input type='text' name='inputIdQuestionnaire' id='inputIdQuestionnaire' value='" . $tab['idQuestionnaire'] . "'disabled></input></p>";
			echo "<p>nomQuestionnaire: <input type='text' name='inputNomQuestionnaire' id='inputNomQuestionnaire' value='" . $tab['nomQuestionnaire'] . "'></input>";
			echo '<button type="button" class="btn btn-info btn-xs" id="majNomQuestionnaire">Mise à jour</button>';
			?>
			<div id="resultat_requete_MAJ">
			</div>
		</div>

		<div class="col-lg-offset-1 col-lg-10 col-lg-offset-1 col-md-offset-1 col-md-10 col-md-offset-1 col-sm-offset-1 col-sm-10 col-sm-offset-1" id="mapContainer">   
		</div>
		  
		  
		<div class="col-lg-12 col-md-12 col-sm-12" id="div_gestion">

		<p>
			Latitude: <input type="text" id="clickedLatitude"> 
			Longitude: <input type="text" id="clickedLongitude">
		</p>
			<p>Attribuer ces coordonnées à la question 
				<select id="questionSelect">
					<option value="default" selected></option> 
					<option value="valeur1">1</option> 
					<option value="valeur2">2</option>
					<option value="valeur3">3</option>
					<option value="valeur4">4</option> 
					<option value="valeur5">5</option>
					<option value="valeur6">6</option>
					<option value="valeur7">7</option>
				</select>
				<button type="button" class="btn btn-info btn-xs" id="btn_attrib_coord" >Go</button>
			</p>

		</div>

	  	<div id="div_formulaire_question">

	  		<table id="table_questionnaire" class="table table-striped table-bordered">
				<thead>
				  <tr>
					<th style="width: 15%;">idQuestion</th>
					<th style="width: 50%;">nomQuestion</th>
					<th style="width: 20%;">longitude</th>
					<th style="width: 20%;">latitude</th>
				  </tr>
				</thead>
				<tbody>
				  <?php
					$req2=$bd->prepare('select * from questions where idQuestionnaire= :id order by idQuestion');
					$req2->bindvalue(':id', $_POST['idQuestionnaire']);
					// idQuestion, nomQuestion, longitude, latitude
					$req2->execute();
						while($tab2 = $req2->fetch(PDO::FETCH_ASSOC)){
							echo '<tr>';
							echo "<td>" . $tab2['idQuestion'] . "</td>";
							echo "<td>" . $tab2['nomQuestion'] . "</td>";
							echo "<td>" . $tab2['longitude'] . "</td>";
							echo "<td>" . $tab2['latitude'] . "</td>";
							echo '</tr>';
						}
				  ?>
				</tbody>
			</table>

	  	</div>

	  	<div id="div_returnLink">
	  		  <a href="administration.php" class='return_links'>
	  		  <span class="glyphicon glyphicon-step-backward"></span>
	  		  Retour à la page d'administration
	  		  </a>
	  	</div>
	</div>

	<script type="text/javascript">
		
		map = L.map('mapContainer').setView([48.858376, 2.294442], 3);
		//La map est créée mais elle ne possède pas encore de tuiles.

		L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', 
		{
		attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
		maxZoom: 13,
		id: 'mapbox.streets',
		accessToken: 'pk.eyJ1IjoiZGppbiIsImEiOiJjamZheWg1OWoxaHYzM3VtejB5OWZxcXVwIn0.i_GA2vSOytwgViYnIvlGGA'
		}).addTo(map);

		map.on('click', recuperation_coordonnees);

	</script>

	<script type="text/javascript">
		$('#majNomQuestionnaire').on('click', maj_nom_questionnaire);
	</script>

</body>
</html>