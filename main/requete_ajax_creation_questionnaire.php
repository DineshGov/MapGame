<?php
	require("../database_auth.php");

    if( isset($_GET['nomQuestionnaire']) && trim($_GET['nomQuestionnaire'])!=='' ){
        $req1=$bd->prepare('SELECT count(nomQuestionnaire) as bool_quest_absent from questionnaires where nomQuestionnaire=:questionnaireName');
        $req1->bindvalue(':questionnaireName',$_GET['nomQuestionnaire']);
        $req1->execute();
        $tab = $req1->fetch(PDO::FETCH_ASSOC);
        
        if($tab["bool_quest_absent"] == 0){

            $req2=$bd->prepare('INSERT INTO questionnaires (nomQuestionnaire) VALUES (:newQuestionnaire);');
            $req2->bindvalue(':newQuestionnaire',$_GET['nomQuestionnaire']);
            $req2->execute();

            echo 'Questionnaire crée';
        }
    }
    else{
        echo 'echec de la creation du questionnaire';
    }

?>