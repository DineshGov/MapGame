
function RedirectionVersConnexionFromMain(){
	var url = document.location.href;
	var url_sans_nom_fichier  = url.substring( 0 ,url.lastIndexOf( "/" ) );
	var url_sans_main  = url_sans_nom_fichier.substring( 0 ,url_sans_nom_fichier.lastIndexOf( "/" ) );
	var url_destination = url_sans_main.concat("/index.php");
  	document.location.href= url_destination;
}