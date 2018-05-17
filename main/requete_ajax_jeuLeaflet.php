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
		
		}
		else if (isset($_GET['idQ']) && $_GET['para']=="end")
		{
			if(!isset($_SESSION['login']))
			{
				echo "true";
			}
			
			$req0 = $bd->prepare("select id from users where login = :l"); //sert à recuperer l'id du joueur
			$req0->bindvalue(':l',$_SESSION['login']);
			$req0->execute();
			$tab0 = $req0->fetch(PDO::FETCH_ASSOC);
			
			$req = $bd->prepare("select * from score where id = :idU and idQuestionnaire = :id");
			$req->bindvalue(':idU',$tab0['id']);
			$req->bindvalue(':id',$_GET['idQ']);
			$req->execute();
			$tab = $req->fetchAll(PDO::FETCH_ASSOC);
			
			
			$req2=$bd->prepare('insert into score values(:idU,:l,:id,:nQ,:s,:d)');
			$req2->bindvalue(':idU',$tab0['id']);
			$req2->bindvalue(':l',$_SESSION['login']);
			$req2->bindvalue(':id',$_GET['idQ']);
			$req2->bindvalue(':nQ',$_GET['nomQ']);
			$req2->bindvalue(':s',$_GET['score']);
			$req2->bindvalue(':d',$datetime);				
			$req2->execute();
			
			
			$req3 = $bd->prepare("select progression from users where login = :l");
			$req3->bindvalue(':l',$_SESSION['login']);
			$req3->execute();
			$tab2 = $req3->fetch(PDO::FETCH_ASSOC);
			
			if(($_GET['idQ']<$tab2['progression'])) //si l'id du questionnaire en cours est inferieur au niveau de progression du joueur alors on ne fait aucune MaJ pour ne pas écraser sa progression
			{
				echo true;
			}
			else //sinon on déverouille le prochain questionnaire accessible en incrémentant le niveau de progression du joueur
			{
				$req4=$bd->prepare('update users set progression = :p where login = :l');
				$req4->bindvalue(':l',$_SESSION['login']);
				$req4->bindvalue(':p',((int)$_GET['idQ']+1));
				$req4->execute();
				echo true;
			}
			
		}
	
	
?>