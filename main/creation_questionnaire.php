<?php
	$page_name="creation_questionnaire.php";
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
	    
		<div class="col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-offset-1 col-sm-11"> <h1>Création questionnaire</h1>
		</div>

		<!--aller à la page gestion_questionnaire si questionnaire crée.-->
		<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2 col-md-offset-2 col-md-8 col-md-offset-2 col-sm-offset-2 col-8 6 col-sm-offset-11"> 
			<h3>Liste des questionnaire existants</h3>
			<table class="table table-striped table-bordered">
		        <thead>
		          <tr>
		            <th>Questionnaires</th>
		          </tr>
		        </thead>
		        <tbody>

			<?php
			    $req=$bd->prepare("SELECT * FROM questionnaires");
			    $req->execute();
			    while($tab = $req->fetch(PDO::FETCH_ASSOC)){
					echo "<tr>";
					echo "<td>" . htmlspecialchars($tab['nomQuestionnaire'], ENT_QUOTES) . "</td>";
					echo "</tr>";
			    }
			?>
				</tbody>
			</table>
		</div>

		<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2 col-md-offset-2 col-md-8 col-md-offset-2 col-sm-offset-2 col-8 6 col-sm-offset-11" id="form_create_questionnaire">
			<h3>Créer un nouveau questionnaire</h3>
				<input type="text" id="newQuestionnaire" class="form-control" placeholder="Entrez le nom de votre nouveau questionnaire.">
				<button type="button" id="buttonSubmitNewQuestionnaire" class="btn btn-sm btn-warning">Création</button>
				<p id="creationStatus"> </p>
		</div>

	</div>

	<div>
	    <a href="administration.php" class='return_links'>
	        <span class="glyphicon glyphicon-step-backward"></span>
	        Retour à la page d'administration
	    </a>
	</div>

    <script type="text/javascript">
        $('#buttonSubmitNewQuestionnaire').on('click', add_questionnaire);
    </script>
</body>
</html>