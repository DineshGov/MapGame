<?php
	$page_name="gestion_questionnaire.php";
    require ('header.php');
    require('../database_auth.php');
?>

  <div class="col-lg-12 col-md-12 col-sm-12">

    <div class="col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-offset-1 col-sm-11"> <h1>Gestion questionnaire</h1>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12" id="div_gestion">
        <?php
        echo "<p>idQuestionnaire: " . $_POST['idQuestionnaire'] . "</p>";
        echo "<p>nomQuestionnaire: <input type='text' name='inputNomQuestionnaire' id='inputNomQuestionnaire' value='" . $_POST['nomQuestionnaire'] . "'</input>";
        echo '<button type="button" class="btn btn-info btn-xs">Mise à jour</button>';
        ?>
    </div>

    <div class="col-lg-offset-1 col-lg-10 col-lg-offset-1 col-md-offset-1 col-md-10 col-md-offset-1 col-sm-offset-1 col-sm-10 col-sm-offset-1" id="mapContainer">   
    </div>
      
      
    <div class="col-lg-12 col-md-12 col-sm-12" id="div_gestion">

        <p>Latitude: <input type="text" id="clickedLatitude"> 
        Longitude: <input type="text" id="clickedLongitude"></p>
        <p>Attribuer ces coordonnées à la question 
            <select id="questionSelect">
                <option value="default" selected></option> 
                <option value="valeur1">1</option> 
                <option value="valeur2">2</option>
                <option value="valeur3">3</option>
                <option value="valeur4">4</option> 
                <option value="valeur5">5</option>
                <option value="valeur6">6</option>
                <option value="valeur7">7</option> 
        </p>

    </div>

    <script type="text/javascript">
        
        map = L.map('mapContainer').setView([48.858376, 2.294442], 3);
        //La map est créée mais elle ne possède pas encore de tuiles.

        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', 
        {
        attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
        maxZoom: 13,
        id: 'mapbox.streets',
        accessToken: 'pk.eyJ1IjoiZGppbiIsImEiOiJjamZheWg1OWoxaHYzM3VtejB5OWZxcXVwIn0.i_GA2vSOytwgViYnIvlGGA'
        }).addTo(map);

        function onMapClick(e) {
        /*Exemple de valeur retournée par e.latlng.toString()
        LatLng(45.58329, 2.640128)

        On veut extraire les coordonnées pour avoir deux variables latitude et longitude.
        */
        var marker = L.marker(e.latlng).addTo(map);

        var coordonnees = e.latlng.toString();
        var position_parenthese_ouvrante = coordonnees.indexOf('(') + 1;
        var position_parenthese_fermante = coordonnees.indexOf(')');

        console.log("coordonnees = " + coordonnees);
        console.log("position_parenthese_ouvrante = " + position_parenthese_ouvrante);
        console.log("position_parenthese_fermante = " + position_parenthese_fermante);

        var coordonnees_sans_parenthese = coordonnees.substring(position_parenthese_ouvrante, position_parenthese_fermante);
        
        console.log("coordonnees_sans_parenthese = " + coordonnees_sans_parenthese);

        var extractionCoordonnees = coordonnees_sans_parenthese.split(", ");

        console.log("latitude= " + extractionCoordonnees[0]);
        console.log("longitude= " + extractionCoordonnees[1]);

        $("#clickedLatitude").val(extractionCoordonnees[0]);
        $("#clickedLongitude").val(extractionCoordonnees[1]);
        }

        map.on('click', onMapClick);

    </script>

  </div>