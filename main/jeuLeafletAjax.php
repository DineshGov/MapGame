<?php
	session_start();
	 require('../database_auth.php');
	 
		date_default_timezone_set("Europe/Paris");
		$datetime = date("Y-m-d H:i:s");
		
		if (isset($_GET['idQ']) && ctype_digit($_GET['idQ'])) //ctype_digit permet de savoir si une chaine de caractère contient que des chiffres
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
		
		}				
		else if (isset($_GET['idQ']) && $_GET['idQ']=="sauvegarde")
		{

			$req = $bd->prepare("select * from score where login = :l");
			$req->bindvalue(':l',$_SESSION['login']);
			$req->execute();
			$tab = $req->fetchAll(PDO::FETCH_ASSOC);
			if(empty($tab))
			{
				
				$req2=$bd->prepare('insert into score values(:l,:id,:s,:d)');
				$req2->bindvalue(':l',$_SESSION['login']);
				$req2->bindvalue(':id',$_SESSION['idQuestionnaire']);
				$req2->bindvalue(':s',$_GET['score']);
				$req2->bindvalue(':d',$datetime);
				
				$req2->execute();
			}
			else
			{
				$req3 = $bd->prepare("update score set date_partie = :d, score = :s where login = :l;");
				$req3->bindvalue(':l',$_SESSION['login']);
				$req3->bindvalue(':s',$_GET['score']);
				$req3->bindvalue(':d',$datetime);				
				$req3->execute();
			}
			echo true;
		}
	
	
?>