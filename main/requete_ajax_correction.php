<?php
	require("../database_auth.php");

    if( isset($_GET['idQuestionnaire']) ){
        $req= $bd->prepare('SELECT * FROM questions WHERE idQuestionnaire = :idQ order by idQuestion');
        $req->bindvalue(':idQ', $_GET['idQuestionnaire']);
        $req->execute();

        $tab_questions = $req->fetchAll(PDO::FETCH_ASSOC); 
            
        header('Content-Type: application/json');
        echo json_encode($tab_questions);  
    }
    else{
        echo 'echec';
    }

?>