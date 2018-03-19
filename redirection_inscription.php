<?php
$page_name = "redirection_inscription.php"; 
require('header.php');
require('database_auth.php'); ?>



<div class="div_redirection">
<?php

	if( isset($_POST['inputPassword']) && isset($_POST['inputPasswordConfirm']) && ( $_POST['inputPassword'] !== $_POST['inputPasswordConfirm'] ) ){
		echo '<div class="redirection_span"> Erreur. </div>';
		echo '<p>Les mots de passe ne correspondent pas</p>' . "\n<a href='inscription.php'> Retour à la page d'inscription </a>";
		echo("<script>setTimeout('RedirectionVersInscription()', 4000)</script>");
	}
//Si lors de l'inscription le mdp n'est pas correctement saisi deux fois alors echec de l'inscription.
//Normalement impossible car envoi du formulaire bloqué par jquery.
	elseif ( isset($_POST['inputUsername']) && isset($_POST['inputPassword']) && isset($_POST['inputPasswordConfirm']) && trim($_POST['inputUsername']) !== "" && trim($_POST['inputPassword']) !== "" && trim($_POST['inputPasswordConfirm']) !== "" && ( $_POST['inputPassword'] === $_POST['inputPasswordConfirm'] ) ){

		$req=$bd->prepare('select count(*) as resultat from Users where login=:log');
		$req->bindvalue(':log', $_POST['inputUsername']);
		$req->execute();
		$tab = $req->fetch(PDO::FETCH_ASSOC);
		if($tab['resultat']==0){
			$req = $bd->prepare("insert into Users(login,password) values (:log,:pass)");
			$req->bindvalue(':log' , $_POST['inputUsername']);
			$req->bindvalue(':pass', md5($_POST['inputPassword']) );
			$req->execute();

			echo "<div class='redirection_span'> Bienvenue " . htmlspecialchars($_POST['inputUsername'], ENT_QUOTES) . "! </div>";
			echo "<p>Votre compte a bien été crée.</p> <p>Vous allez maintenant être redirigé vers le formulaire de connexion.</p>";
			echo "<p><a href='connexion.php'> Cliquez ici si l'attente est trop longue. </a></p>";
			echo("<script>setTimeout('RedirectionVersConnexion()', 4000)</script>");
		}
		else{
			echo '<div class="redirection_span"> Erreur. </div>';
			echo "<p>Nom d'utilisateur déjà utilisé. Merci d'en saisir un nouveau.</p>";
			echo "<p><a href='inscription.php'> Retour à la page d'inscription </a></p>";
			echo("<script>setTimeout('RedirectionVersInscription()', 4000)</script>");
		}

	}
	else{
		echo '<div class="redirection_span"> Erreur. </div>';
		echo "<p>Erreur lors de l'inscription. Attention à ne pas un mot de passe constitué uniquement d'espace.</p> <p>Veuillez contacter l'administrateur au 06 82 52 23 20 si le problème persiste.</p>" . "\n<a href='inscription.php'> Retour à la page d'inscription </a>";
		echo("<script>setTimeout('RedirectionVersInscription()', 4000)</script>");
	}
?>
</div>



<input name="bouton_terminer" type="button" value="Terminer"
    onclick="RedirectionVersInscription()">
