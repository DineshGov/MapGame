
function transmet_infos_questionnaire(event){

	var bouton_click = event.target.id;
	// On recupere un string de la forme buttonQuestionnaireXX avec XX l'id du questionnaire selectionné.
	var id_questionnaire = bouton_click.replace('buttonQuestionnaire', '');
	// id_questionnaire correspond maintenant à XX
	var formulaire_a_soumettre = "formQuestionnaire" + id_questionnaire;
	$('#' + formulaire_a_soumettre).submit();
}

function desactive_button_statut(){
	console.log('test');
}

