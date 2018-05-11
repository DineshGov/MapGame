<?php
	session_start();
	require('../database_auth.php');
	
	if(isset($_GET['para']))
	{
		$ordre = $_GET['ordre'];
		
		if($_GET['para']=="questionnaire")
		{
			$req=$bd->prepare("select * from score where login=:l order by nomQuestionnaire $ordre");
			$req->bindvalue(':l',$_SESSION['login']);
			$req->execute();			
		}
		else if($_GET['para']=="score")
		{
			$req=$bd->prepare("select * from score where login=:l order by score $ordre");
			$req->bindvalue(':l',$_SESSION['login']);
			$req->execute();
		}
		else if($_GET['para']=="date")
		{
			$req=$bd->prepare("select * from score where login=:l order by date_partie $ordre");
			$req->bindvalue(':l',$_SESSION['login']);
			$req->execute();			
		}
		
		$tab=$req->fetchAll(PDO::FETCH_ASSOC);
		$res='';
		
		foreach($tab as $t)
		{
			$res.="<tr class='content'><td>".$t['login']."</td><td>".$t['nomQuestionnaire']."</td><td>".$t['score']."</td><td>".$t['date_partie']."</td></tr>";
		}
		
		echo $res;
	}
?>