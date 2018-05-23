<?php
    $page_name="verification_upload.php";
    require ('header.php');
    require('../database_auth.php');
?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<h3>Upload fichier</h3>

<?php


	if(isset($_POST['description']) && isset($_POST['idQuestionnaire']) && isset($_POST['idQuestion']) && trim($_POST['description'])!=="" && trim($_POST['idQuestionnaire'])!=="" && trim($_POST['idQuestion'])!==""){
		$req=$bd->prepare('UPDATE questions set description = :newDescription where idQuestionnaire = :numQuestionnaire AND idQuestion = :numQuestion');
		$req->bindvalue(':newDescription', $_POST['description']);
		$req->bindvalue(':numQuestionnaire', $_POST['idQuestionnaire']);
		$req->bindvalue(':numQuestion', $_POST['idQuestion']);
		$req->execute();

		echo '<div class="well">Description mise à jour.</div>';
	}
	else
		echo '<div class="well">Description non mise à jour.</div>';
			
	if( !empty($_FILES['image']['name']) ){
		if ($_FILES['image']['error'] > 0) 
			echo '<div class="well">Erreur lors du transfert.</div>';
		else if ($_FILES['icone']['size'] > $maxsize) 
			echo '<div class="well">Le fichier est tros gros.</div>';
		else{

			$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
			//1. strrchr renvoie l'extension avec le point (« . »).
			//2. substr(chaine,1) ignore le premier caractère de chaine.
			//3. strtolower met l'extension en minuscules.
			$extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );

			if ( !in_array($extension_upload,$extensions_valides) ) {
				echo '<div class="well">Extension incorrecte.</div>';
			}
			else{
				$dossier = "img/";
				$nom_fichier_sans_extension = "" . $_POST["idQuestionnaire"] . "_" . $_POST["idQuestion"] . "";
				$nom_fichier_avec_extension = "" . $nom_fichier_sans_extension . "." . $extension_upload . "";
				//Une image a pour format de nom: idQuestionnaire_idQuestion.extension
				$emplacement = "" . $dossier . "" . $nom_fichier_avec_extension . "";

				$resultat = move_uploaded_file($_FILES['image']['tmp_name'], $emplacement);

				if ($resultat) echo '<div class="well">Transfert réussi.</div>';
				else echo '<div class="well">Transfert échoué.</div>';
			}
		}
	}
	else
		echo '<div class="well">Pas de fichier uploadé.</div>';
?>

</div>


<?php
if(isset($_POST['idQuestionnaire'])){
	echo '<div class="col-lg-12 col-md-12 col-sm-12" id="div_returnLink">';
		echo '<form method="post" action="gestion_questionnaire.php">';
			echo '<input type="hidden" name="idQuestionnaire" value="' . $_POST["idQuestionnaire"] . '"> ';
			echo '<button type="submit" class="btn btn-link">';
			echo '<span class="glyphicon glyphicon-step-backward"></span>';
			echo 'Retour à la page de gestion du questionnaire ' . $_POST["idQuestionnaire"] . '';
			echo '</button>';
		echo '</form>';
	echo '</div>';
}
?>