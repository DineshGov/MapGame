<?php
	require('database_auth.php');
	
	if( isset($_GET['login']) and isset($_GET['pass']) )
	{
		$login=$_GET['login'];
		$pass=$_GET['pass'];
		
		$req=$bd->prepare('select login, password from Users where login=:log and password=:pass');
		$req->bindvalue(':log',$login);
		$req->bindvalue(':pass',$pass);
		$req->execute();
		$tab = $req->fetch(PDO::FETCH_ASSOC);
		
		if( $tab['login']==null and $tab['password']==null )
			echo "erreur";
		else
			echo "ok";
	}

	
	
	


?>