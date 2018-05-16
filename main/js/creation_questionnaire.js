function add_questionnaire(){
    $.get("requete_ajax_creation_questionnaire.php",{
        nomQuestionnaire: $('#newQuestionnaire').val()
    },
    function(reponse)
    {
        if(reponse == "Questionnaire crée"){
            $('#creationStatus').text("REDIRECTION VERS LA PAGE D'ADMINISTRATION!");
            setTimeout('RedirectionVersAdministration()', 1000);
        }
        else{
            $('#creationStatus').text("Echec lors de la création du questionnaire.");
            console.log(reponse);
        }     
    })
};