<?php
	require("../database_auth.php");

    if( isset($_GET['nomQuestionnaire']) && isset($_GET['idQuestionnaire']) ){
        $req=$bd->prepare('UPDATE questionnaires set nomQuestionnaire = :newName where idQuestionnaire = :id;');
        $req->bindvalue(':newName',$_GET['nomQuestionnaire']);
        $req->bindvalue(':id',$_GET['idQuestionnaire']);
        $req->execute();

        echo 'MAJ';
    }
    else{
        echo 'rien';
    }
?>