
function supprimer_element_bdd(event){
	console.log("class= " + event.target.className + " id= " + event.target.id);
	var id = event.target.id;

	$.get("requete_ajax_suppression_user.php",
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