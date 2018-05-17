
function supprimer_element_bdd(event){
	/*
		Suppression d'un utilisateur dans la bdd et retrait de cet
		utilisateur dans la liste affichée.
	*/

	var id = event.target.id;

	$.get("requete_ajax_administration.php",
	{elementId: id},
	function(reponse)
	{
		if(reponse=="Supprimé"){
			$('#ligne_' + id).remove();
		}
		else if(reponse=="Rien a faire"){
			console.log(reponse);
		}	
	})
};

function masque_menu(event){
	/*
		Masque le menu correspondant à la flèche cliquée
	*/
	var id_menu_a_masquer;

	if(event.target.id == "menu_user_fleche")
		id_menu_a_masquer = "table_user";
	else if (event.target.id == "menu_questionnaire_fleche")
		id_menu_a_masquer = "table_questionnaire";

    if($('#' + event.target.id).hasClass('glyphicon-menu-down')){
      $('#' + event.target.id).removeClass('glyphicon-menu-down');
      $('#' + event.target.id).addClass('glyphicon-menu-up');
      $('#' + id_menu_a_masquer).fadeOut();
    }
    else if($('#' + event.target.id).hasClass('glyphicon-menu-up')){
      $('#' + event.target.id).removeClass('glyphicon-menu-up');
      $('#' + event.target.id).addClass('glyphicon-menu-down');
      $('#' + id_menu_a_masquer).fadeIn();
    }
}

function modifie_questionnaire(event){
	/*
		L'id d'un questionnaire est de la forme #questionnaireXX
		On cherche a extraire XX et de la concatener à la chaine de caractère 'form_'
		pour soumettre le formulaire correspondant au questionnaire a modifier.
	*/
	var questionnaire_a_modifier = event.target.id;
	var id_questionnaire = questionnaire_a_modifier.replace('questionnaire', '');
	var formulaire_a_soumettre = "form_" + id_questionnaire;

	$('#' + formulaire_a_soumettre).submit();
}
