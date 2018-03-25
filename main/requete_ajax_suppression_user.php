<?php
	require('../database_auth.php');
	
	if( isset($_GET['elementId']) )
	{
		//un element Id est de la forme userXX avec XX = l'id de l'utilisateur dans la table 'users'.
		$id = $_GET['elementId'];
		if (strpos($id, 'user') !== false){
			//strpos retourne false si 'user' n'est pas dans $id, sinon elle retourne la position du 1er char de 'user'.
			//on veut désormais extraire la valeur XX de $id.
			$extract_id = str_replace('user','',$id);
			//on replace la sous chaine 'user' par une chaine vide, $extract_id correspond à l'id de l'utilisateur à supprimer.
			$req=$bd->prepare('DELETE FROM users where id=:num');
			$req->bindvalue(':num',$extract_id);
			$req->execute();

			echo 'Supprimé';
		}
		else
			echo 'Rien a faire';
	}
	
?>