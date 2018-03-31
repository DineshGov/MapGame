function recuperation_coordonnees(e) {
        /*Exemple de valeur retournée par e.latlng.toString()
        LatLng(45.58329, 2.640128)
        
        On veut extraire les coordonnées pour avoir deux variables latitude et longitude.
        */
        $(".leaflet-marker-icon").remove();
        $(".leaflet-marker-shadow").remove();
        //On supprime le marker (et son ombre) précédemment placé.
        var marker = L.marker(e.latlng).addTo(map);
        
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