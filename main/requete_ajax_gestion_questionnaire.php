<?php
	require("../database_auth.php");

    if( isset($_GET['nomQuestionnaire']) && isset($_GET['idQuestionnaire']) ){
        $req=$bd->prepare('UPDATE questionnaires set nomQuestionnaire = :newName where idQuestionnaire = :id;');
        $req->bindvalue(':newName',$_GET['nomQuestionnaire']);
        $req->bindvalue(':id',$_GET['idQuestionnaire']);
        $req->execute();

        echo 'MAJ';
    }
    else if( isset($_GET['id_questionnaire']) && isset($_GET['id_question']) && isset($_GET['question']) && isset($_GET['longitude']) && isset($_GET['latitude']) && trim($_GET['id_questionnaire'])!=="" && trim($_GET['id_question'])!=="" && trim($_GET['question'])!=="" && trim($_GET['longitude'])!=="" && trim($_GET['latitude'])!==""){

        $req=$bd->prepare('INSERT INTO questions (idQuestion, idQuestionnaire, nomQuestion, longitude, latitude)
            VALUES (:idquestion, :idquestionnaire, :nom, :long, :lat)
            ON DUPLICATE KEY UPDATE nomQuestion = :nom, longitude = :long, latitude = :lat');

        $req->bindvalue(':idquestion',$_GET['id_question']);
        $req->bindvalue(':idquestionnaire',$_GET['id_questionnaire']);
        $req->bindvalue(':nom',$_GET['question']);
        $req->bindvalue(':long',$_GET['longitude']);
        $req->bindvalue(':lat',$_GET['latitude']);
        $req->execute();

        echo 'Mise a jour terminée';
    }
    else if( isset($_GET['id_questionnaire']) && isset($_GET['id_question']) && isset($_GET['question']) && trim($_GET['id_questionnaire'])!=="" && trim($_GET['id_question'])!=="" && trim($_GET['question'])!==""){

        $req=$bd->prepare('INSERT INTO questions (idQuestion, idQuestionnaire, nomQuestion)
            VALUES (:idquestion, :idquestionnaire, :nom)
            ON DUPLICATE KEY UPDATE nomQuestion = :nom');

        $req->bindvalue(':idquestion',$_GET['id_question']);
        $req->bindvalue(':idquestionnaire',$_GET['id_questionnaire']);
        $req->bindvalue(':nom',$_GET['question']);
        $req->execute();

        echo 'Mise a jour terminée';
    }
    elseif ( isset($_GET['nvxStatut']) && isset($_GET['idQuestionnaire']) ) {
        $req=$bd->prepare('UPDATE questionnaires set statut = :newStatut where idQuestionnaire = :id;');
        $req->bindvalue(':newStatut',$_GET['nvxStatut']);
        $req->bindvalue(':id',$_GET['idQuestionnaire']);
        $req->execute();
    }
    else{
        echo 'rien';
    }

?>
