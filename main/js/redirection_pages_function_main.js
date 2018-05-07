
function RedirectionVersConnexionFromMain(){
	var url = document.location.href;
	var url_sans_nom_fichier  = url.substring( 0 ,url.lastIndexOf( "/" ) );
	var url_sans_main  = url_sans_nom_fichier.substring( 0 ,url_sans_nom_fichier.lastIndexOf( "/" ) );
	var url_destination = url_sans_main.concat("/index.php");
  	document.location.href= url_destination;
}
//Fonction utilisée en cas de déconnexion. On sort alors du repertoire main d'ou la répétition du substring /

function RedirectionVersMenuPrincipal(){
	var url = document.location.href;
	var url_sans_nom_fichier  = url.substring( 0 ,url.lastIndexOf( "/" ) );
	var url_destination = url_sans_nom_fichier.concat("/menu_principal.php");
  	document.location.href= url_destination; 
}
//Fonction utilisée au click sur le nom du jeu

function RedirectionVersAdministration(){
	var url = document.location.href;
	var url_sans_nom_fichier  = url.substring( 0 ,url.lastIndexOf( "/" ) );
	var url_destination = url_sans_nom_fichier.concat("/administration.php");
  	document.location.href= url_destination; 
}
//Fonction utilisée lors de la création d'un nouveau questionnaire pour retourner à la page d'administration