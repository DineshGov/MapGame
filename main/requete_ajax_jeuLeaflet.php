<?php
	session_start();
	 require('../database_auth.php');
	 
		date_default_timezone_set("Europe/Paris");
		$datetime = date("Y-m-d H:i:s");
		
		if (isset($_GET['idQ']) && $_GET['para']=="start") //ctype_digit permet de savoir si une chaine de caractère contient que des chiffres
		{
				$val = $_GET['idQ'];
				$_SESSION['idQuestionnaire']=$val;
				$req2=$bd->prepare('select * from questions where idQuestionnaire= :id order by idQuestion');
								$req2->bindvalue(':id',$val);
								// idQuestion, nomQuestion, longitude, latitude
								$req2->execute();
				$tab = $req2->fetchAll(PDO::FETCH_ASSOC);
					
				header('Content-Type: application/json');

				echo json_encode($tab);
		
		} //Récupération de toutes les questions et formatage des questions sous forme json
		else if (isset($_GET['idQ']) && $_GET['para']=="end")
		{
			if(!isset($_SESSION['login']))
			{
				echo "true";
			}	
			
			$req = $bd->prepare("select * from score where login = :l and idQuestionnaire = :id");
			$req->bindvalue(':l',$_SESSION['login']);
			$req->bindvalue(':id',$_GET['idQ']);
			$req->execute();
			$tab = $req->fetchAll(PDO::FETCH_ASSOC);
			
			
			$req2=$bd->prepare('insert into score values(:l,:id,:nQ,:s,:d)');
			$req2->bindvalue(':l',$_SESSION['login']);
			$req2->bindvalue(':id',$_GET['idQ']);
			$req2->bindvalue(':nQ',$_GET['nomQ']);
			$req2->bindvalue(':s',$_GET['score']);
			$req2->bindvalue(':d',$datetime);
				
			$req2->execute();
			
			echo true;
		}
		//Insertion dans la table Score du score du joueur
?>