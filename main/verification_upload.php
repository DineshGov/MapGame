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
	}

/*if ($_FILES['image']['error'] > 0) 
	$erreur = "Erreur lors du transfert";
else{
	echo "bien ouèj </br>";

	print_r($_FILES);
	
	echo "description: " . $_POST['description'] . "</br>";

	$nom = "img/test.jpeg";
	echo $nom;



	$resultat = move_uploaded_file($_FILES['image']['tmp_name'], $nom);
	
	echo "$resultat" . $resultat . "";

	if (is_dir("img/")){
		echo "</br>c'est bien un dossier.";
		if(is_writable("img/"))
			echo "</br>acces autorisé";
		else
			echo "</br>probleme de droit";
	}

	if ($resultat) 
		echo "</br>Transfert réussi";
	else
		echo "</br>echec transfert.";

} */
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