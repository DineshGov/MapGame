var question_affichee = 1;
//Variable global, utilisée avec window afin de séparer les copies locales aux fonctions de la variable globale.
var question =	[];

function select_all_from_question(){
	$.get("requete_ajax_correction.php",
	{
		idQuestionnaire: $('#idQuestionnaire').val()
	},
	function(reponse){
		if(reponse !== 'echec'){
			var i = 0;
			
			while(i<reponse.length){
				question.push({
					idQuestion: reponse[i].idQuestion,
					q: reponse[i].nomQuestion,
				 	latitude: reponse[i].latitude,
				  	longitude: reponse[i].longitude,
				  	description: reponse[i].description
				});
				i++;
			}
			set_description_container(question_affichee);
			/*Fonction executée lorsque le while se termine.
			Si on l'a place dans le init il y a un problème de synchronisation
			qui fait que la fonction set_description_container est lancée avant
			que le tableau question soit totalement initialisé.
			*/
		}
	});
}

function fichier_existe(chemin) {
    var xhr = new XMLHttpRequest();
    xhr.open('HEAD', chemin, false);
    xhr.send();
     
    if (xhr.status == "404") {
        return false;
    } else {
        return true;
    }
}

function set_image(question_affichee){
	idquestionnaire = $('#idQuestionnaire').val();
	idquestion = window.question_affichee;

	extensions_valides = ['jpg' , 'jpeg' , 'gif' , 'png'];

	idimage= "" + idquestionnaire + "_" + idquestion + "";
	pwd_image = "img/" + idimage;
	//Chemin vers l'image sans l'extension

	//Ajout des différentes extensions possibles
    jpg_image  = "" + pwd_image + "." + extensions_valides[0] + "";
    jpeg_image = "" + pwd_image + "." + extensions_valides[1] + "";
    gif_image  = "" + pwd_image + "." + extensions_valides[2] + "";
    png_image  = "" + pwd_image + "." + extensions_valides[3] + "";

    hauteur_div_container = $('#image_container').height();
    largeur_div_container = $('#image_container').width();

    if (fichier_existe(jpg_image))
    	$('#image_question').attr('src', jpg_image);
    if (fichier_existe(jpeg_image))
    	$('#image_question').attr('src', jpeg_image);
    if (fichier_existe(gif_image))
    	$('#image_question').attr('src', gif_image);
    if (fichier_existe(png_image))
    	$('#image_question').attr('src', png_image);

    /*
		3 erreurs apparaitront dans la console js,
		en effet seule 1 de ces image existe vraiment.
		Les 3 autres n'existent pas.
    */

    $('#image_question').css('height',hauteur_div_container);
    $('#image_question').css('width',largeur_div_container);
}

function centerLeafletMapOnMarker(map, marker) {
	var latLngs = [ marker.getLatLng() ];
	var markerBounds = L.latLngBounds(latLngs);
	map.fitBounds(markerBounds);
}

function gestion_marqueur(question_affichee){
	$(".leaflet-marker-icon").remove();
	$(".leaflet-marker-shadow").remove();
	//On supprime le marker (et son ombre) si précédemment placé.

	idquestion = window.question_affichee - 1;

	latitude = question[idquestion].latitude;
	longitude = question[idquestion].longitude;

	marker = L.marker([latitude, longitude]).addTo(map);

	centerLeafletMapOnMarker(map, marker);

}

function set_description_container(question_affichee){
	idquestion = window.question_affichee - 1;

	intitule_question = question[idquestion].q;
	description_question = question[idquestion].description;
	
	$('#nom_question_container').text(intitule_question);
	$('#description_question_container').text(description_question);
}

function desactive_btn_prec_suiv(question_affichee){
	//Permet de bloquer les boutons s'il n'y a pas de questions suivante ou précédente.
	if (question_affichee == 1)
		$('#btn_left').addClass("disabled");
	else if (question_affichee == 7)
		$('#btn_right').addClass("disabled");
	else{
		if ($('#btn_left').hasClass("disabled"))
			$('#btn_left').removeClass("disabled");
		if ($('#btn_right').hasClass("disabled"))
			$('#btn_right').removeClass("disabled");
	}

}

function click_on_btn_right(question_affichee){
	window.question_affichee ++;
	$('.well').text(window.question_affichee);

	desactive_btn_prec_suiv(window.question_affichee);
	set_description_container(window.question_affichee);
	set_image(question_affichee);
	gestion_marqueur(question_affichee);
}

function click_on_btn_left(question_affichee){
	window.question_affichee --;
	$('.well').text(window.question_affichee);

	desactive_btn_prec_suiv(window.question_affichee);
	set_description_container(window.question_affichee);
	set_image(question_affichee);
	gestion_marqueur(question_affichee);
}

function init(){
	map = L.map('carte').setView([48.858376, 2.294442], 3);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZW5pZ21hNzc3NyIsImEiOiJja2szNnZ0dnkwcWZ4MnBxbzFvbXJhOXZzIn0.TmXyfODNPIi0hmAJYru9Tw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		maxZoom: 18,
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1,
		accessToken: 'pk.eyJ1IjoiZW5pZ21hNzc3NyIsImEiOiJja2szNnZ0dnkwcWZ4MnBxbzFvbXJhOXZzIn0.TmXyfODNPIi0hmAJYru9Tw'
      }).addTo(map);

    select_all_from_question();

    desactive_btn_prec_suiv(question_affichee);
    set_image(question_affichee);
    gestion_marqueur(question_affichee);

}

$(document).ready(init);

