<?php
    $page_name="verification_upload.php";
    require ('header.php');
    require('../database_auth.php');
?>

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


<?php

print_r($_FILES);
print_r($_POST);


	if(isset($_POST['description']) && isset($_POST['idQuestionnaire']) && isset($_POST['idQuestion']) && trim($_POST['description'])!=="" && trim($_POST['idQuestionnaire'])!=="" && trim($_POST['idQuestion'])!==""){
		$req=$bd->prepare('UPDATE questions set description = :newDescription where idQuestionnaire = :numQuestionnaire AND idQuestion = :numQuestion');
		$req->bindvalue(':newDescription', $_POST['description']);
		$req->bindvalue(':numQuestionnaire', $_POST['idQuestionnaire']);
		$req->bindvalue(':numQuestion', $_POST['idQuestion']);
		$req->execute();

		if ($_FILES['image']['error'] > 0) 
			echo "Erreur lors du transfert";
		else if ($_FILES['icone']['size'] > $maxsize) 
			echo "Le fichier est trop gros";
		else{

			$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
			//1. strrchr renvoie l'extension avec le point (« . »).
			//2. substr(chaine,1) ignore le premier caractère de chaine.
			//3. strtolower met l'extension en minuscules.
			$extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );

			if ( !in_array($extension_upload,$extensions_valides) ) {
				echo "Extension incorrecte";
			}
			else{
				$dossier = "img/";
				$nom_fichier_sans_extension = "" . $_POST["idQuestionnaire"] . "_" . $_POST["idQuestion"] . "";
				$nom_fichier_avec_extension = "" . $nom_fichier_sans_extension . "." . $extension_upload . "";
				
				$emplacement = "" . $dossier . "" . $nom_fichier_avec_extension . "";

				$resultat = move_uploaded_file($_FILES['image']['tmp_name'], $emplacement);

				if ($resultat) echo "Transfert réussi";
				else echo "Transfert échoué";
			}
		}
	}


?>


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