<?php
	 require('../database_auth.php');
	$req2=$bd->prepare('select * from questions where idQuestionnaire= :id order by idQuestion');
                    $req2->bindvalue(':id', $_GET['idQuestionnaire']);
                    // idQuestion, nomQuestion, longitude, latitude
                    $req2->execute();
	$tab2 = $req2->fetchAll(PDO::FETCH_ASSOC);
	
	print_r($tab2);
	
	header('Content-Type: application/json');
	echo json_encode($tab2);
?>