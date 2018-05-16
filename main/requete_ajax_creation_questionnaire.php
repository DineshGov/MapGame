<?php
	require("../database_auth.php");

    if( isset($_GET['nomQuestionnaire']) && trim($_GET['nomQuestionnaire'])!=='' ){
        $req=$bd->prepare('SELECT max(idQuestionnaire) as maxID from questionnaires');
        $req->execute();
        $iD = $req->fetch(PDO::FETCH_ASSOC);

        $req1=$bd->prepare('SELECT count(nomQuestionnaire) as bool_quest_absent from questionnaires where nomQuestionnaire=:questionnaireName');
        $req1->bindvalue(':questionnaireName',$_GET['nomQuestionnaire']);
        $req1->execute();
        $tab = $req1->fetch(PDO::FETCH_ASSOC);
        
        if($tab["bool_quest_absent"] == 0){

            $req2=$bd->prepare('INSERT INTO questionnaires (idQuestionnaire, nomQuestionnaire, statut) VALUES (:newID, :newQuestionnaire, "desactive");');
            $req2->bindvalue(':newID', $iD['maxID']+1);
            $req2->bindvalue(':newQuestionnaire',$_GET['nomQuestionnaire']);
            $req2->execute();

            echo 'Questionnaire crée';
        }
    }
    else{
        echo 'echec de la creation du questionnaire';
    }

?>