<?php 
echo "<pre>";
print_r($_POST);
echo "</pre>";
?>

<?php 
require("connexion.php");
?>

<?php

if(	(isset($_POST['submit_sign']))	&&	(($_POST['password'] != $_POST['passwordConfirm']))	) 
	echo '<p>Les mots de passe ne correspondent pas</p>' . "\n<a href='inscription.php'> Retour à la page d'inscription </a>";
//Si lors de l'inscription le mdp n'est pas correctement saisie deux fois alors echec de l'inscription.

elseif(isset($_POST['submit_log']) && (!isset($_POST['submit_sign']))){ //Si le formulaire de connexion est saisi et non le formulaire d'inscription

	if(!isset($_POST['login']) || !isset($_POST['password']) || trim($_POST['login']) == "" || trim($_POST['password']) == "")
		echo '<p>Identifiant ou mot de passe incorrect.</p>'; //Si un champ est vide

	elseif(isset($_POST['login']) || isset($_POST['password']) || trim($_POST['login']) != "" || trim($_POST['password']) != ""){
		$req=$bd->prepare('select count(*) as resultat from Users where login=:log and password=:pas');
		$req->bindvalue(':log', $_POST['login']);
		$req->bindvalue(':pas', $_POST['password']);
		$req->execute();
		$tab = $req->fetch(PDO::FETCH_ASSOC);
			if($tab['resultat']==1){ //Si le login et le password ont été trouvé dans la bdd alors connexion.
				echo '<p>Authentifié</p>';
				$marqueur_connexion=true;
			}
			else{
				echo '<p>Echec lors de l\'authentification, login ou mot de pass erroné.</p>';
				$marqueur_connexion=false;	
			}
	}
}
else{
	if(isset($_POST['submit_sign'])	&&	($_POST['password'] == $_POST['passwordConfirm'])){

		$req=$bd->prepare('select count(*) as resultat from Users where login=:log');
		$req->bindvalue(':log', $_POST['id']);
		$req->execute();
		$tab = $req->fetch(PDO::FETCH_ASSOC);
		if($tab['resultat']==0){
			$req = $bd->prepare("insert into Users(login,password) values (:log,:pass)");
			$req->bindvalue(':log', $_POST['id']);
			$req->bindvalue(':pass', $_POST['password']); //A CRYPTER
			$req->execute();
			$marqueur_connexion=true;
		}
		else{
			echo 'NOM d\'utilisateur deja pris';
			$marqueur_connexion=false;	
		}
	}
}


if($marqueur_connexion==true)
	echo '<h1>PAGE D\'ACCUEIL</h1>';
?>