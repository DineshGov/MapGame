function recuperation_coordonnees(e) {
        /*Exemple de valeur retournée par e.latlng.toString()
        LatLng(45.58329, 2.640128)
        
        On veut extraire les coordonnées pour avoir deux variables latitude et longitude.
        */
        $(".leaflet-marker-icon").remove();
        $(".leaflet-marker-shadow").remove();
        //On supprime le marker (et son ombre) précédemment placé.
        var marker = L.marker(e.latlng).addTo(map);
        //Sinon utiliser e.latlng.lat et e.latlng.lng
        
        var coordonnees = e.latlng.toString();
        var position_parenthese_ouvrante = coordonnees.indexOf('(') + 1;
        var position_parenthese_fermante = coordonnees.indexOf(')');
        
        var coordonnees_sans_parenthese = coordonnees.substring(position_parenthese_ouvrante, position_parenthese_fermante);
        
        var extractionCoordonnees = coordonnees_sans_parenthese.split(", ");
        //La fonction split renvoie un tableau.
        
        $("#clickedLatitude").val(extractionCoordonnees[0]);
        $("#clickedLongitude").val(extractionCoordonnees[1]);
}

function maj_nom_questionnaire(){
    $.get("requete_ajax_gestion_questionnaire.php",{
        nomQuestionnaire: $('#inputNomQuestionnaire').val(),
        idQuestionnaire: $('#inputIdQuestionnaire').val()
    },
    function(reponse)
    {
        if(reponse == "MAJ"){
            $('#resultat_requete_MAJ').append('<p class="resultat_remove">Nom mis à jour. <span class="glyphicon glyphicon-remove"></span></p>');
            $('.resultat_remove').on('click', function(){
                $('.resultat_remove').remove();
            });

        }
        else{
            console.log('rien');
        }     
    })
};

    
    $('.questionnaireStatut').on('click',function(){
        console.log($(this).attr('id')); //AJOUTER AJAX POUR ACTIVER/DESACTIVER QUESTIONNAIRE
    });

function change_statut_questionnaire(){
    $.get("requete_ajax_gestion_questionnaire.php",{
        nvxStatut: $(this).attr('id'),
        idQuestionnaire: $('#inputIdQuestionnaire').val()
    })
    //On ignore le retour
};



function add_edition_line_in_table(event){

    var question_a_modifier = event.target.id;
    var id_question = question_a_modifier.replace('edit_question', '');
    var nom_existant = $('#nomQ' + id_question).text();
    var longitude_existant = $('#longQ' + id_question).text();
    var latitude_existant = $('#latiQ' + id_question).text();
    $('#add_question').remove();
    $('#tr_question' + id_question).after('\
        <tr class="active" id="add_question">\
        <td id="updating_question_id" >' + id_question + '</td>\
        <td><input type="text" id="newQuestion" class="form-control" value="' + nom_existant + '"></td>\
        <td><input type="text" id="newLatitude" class="form-control" value="' + latitude_existant + '"></td>\
        <td><input type="text" id="newLongitude" class="form-control" value="' + longitude_existant + '"></td>\
        <td>' + '<span id="cancel_add" class="glyphicon glyphicon-remove"></span>' + '</td>\
        </tr>');
    
    $('#cancel_add').on('click', delete_edition_line_in_table);
};


function delete_edition_line_in_table(){
    $('#add_question').remove();
}

function attribution_coordonnes_via_bouton(){
    $('#newLatitude').val($("#clickedLatitude").val());
    $('#newLongitude').val($("#clickedLongitude").val());
}


function maj_question(){

    var id_questionnaire_insertion = $('#inputIdQuestionnaire').val();
    var majQuestion= $('#newQuestion').val();
    var majLatitude= $('#newLatitude').val();
    var majLongitude= $('#newLongitude').val();

    var id_question_a_modifier = $('#updating_question_id').text();

    console.log("id_questionnaire_insertion= " + id_questionnaire_insertion);
    console.log("majQuestion= " + majQuestion);
    console.log("majLatitude= " + majLatitude);
    console.log("majLongitude= " + majLongitude);
    console.log("id_question_a_modifier= " + id_question_a_modifier);

    $.get("requete_ajax_gestion_questionnaire.php",{
        id_questionnaire : id_questionnaire_insertion,
        id_question : id_question_a_modifier,
        question : majQuestion,
        latitude : majLatitude,
        longitude : majLongitude
    },
    function(reponse)
    {
        if(reponse == "Mise a jour terminée"){
            $('#nomQ' + id_question_a_modifier).text(majQuestion);
            $('#latiQ' + id_question_a_modifier).text(majLatitude);
            $('#longQ' + id_question_a_modifier).text(majLongitude);
        }
        else{
            console.log('PAS DE MISE A JOUR');
        }     
    })

};