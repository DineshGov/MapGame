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
        echo "<p>idQuestionnaire: <input type='text' name='inputIdQuestionnaire' id='inputIdQuestionnaire' value='" . $_POST['idQuestionnaire'] . "'disabled></input></p>";
        echo "<p>nomQuestionnaire: <input type='text' name='inputNomQuestionnaire' id='inputNomQuestionnaire' value='" . $_POST['nomQuestionnaire'] . "'></input>";
        echo '<button type="button" class="btn btn-info btn-xs" id="majNomQuestionnaire">Mise à jour</button>';
        ?>
        <div id="resultat_requete_MAJ">
            
        </div>
    </div>

    <div class="col-lg-offset-1 col-lg-10 col-lg-offset-1 col-md-offset-1 col-md-10 col-md-offset-1 col-sm-offset-1 col-sm-10 col-sm-offset-1" id="mapContainer">   
    </div>
      
      
    <div class="col-lg-12 col-md-12 col-sm-12" id="div_gestion">

    <p>
        Latitude: <input type="text" id="clickedLatitude"> 
        Longitude: <input type="text" id="clickedLongitude">
    </p>
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
            </select>
            <button type="button" class="btn btn-info btn-xs" id="btn_attrib_coord" >Go</button>
        </p>

    </div>

    <div id="div_formulaire_question">

        <div class="col-lg-12 col-md-12 col-sm-12">
            <h4>Question 1</h4>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <h6>Question</h6>
                <textarea class="form-control" rows="1" name="nomQuestionExistant" disabled></textarea>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <h6>Latitude</h6>
                <input type="text" class="form-control" name="latitude" disabled></input>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <h6>Longitude</h6>
                <input type="text" class="form-control" name="longitude" disabled></input>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <h4>Question 2</h4>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <h6>Question</h6>
                <textarea class="form-control" rows="1" name="nomQuestionExistant" disabled></textarea>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <h6>Latitude</h6>
                <input type="text" class="form-control" name="latitude" disabled></input>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <h6>Longitude</h6>
                <input type="text" class="form-control" name="longitude" disabled></input>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <h4>Question 3</h4>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <h6>Question</h6>
                <textarea class="form-control" rows="1" name="nomQuestionExistant" disabled></textarea>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <h6>Latitude</h6>
                <input type="text" class="form-control" name="latitude" disabled></input>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <h6>Longitude</h6>
                <input type="text" class="form-control" name="longitude" disabled></input>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <h4>Question 4</h4>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <h6>Question</h6>
                <textarea class="form-control" rows="1" name="nomQuestionExistant" disabled></textarea>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <h6>Latitude</h6>
                <input type="text" class="form-control" name="latitude" disabled></input>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <h6>Longitude</h6>
                <input type="text" class="form-control" name="longitude" disabled></input>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <h4>Question 5</h4>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <h6>Question</h6>
                <textarea class="form-control" rows="1" name="nomQuestionExistant" disabled></textarea>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <h6>Latitude</h6>
                <input type="text" class="form-control" name="latitude" disabled></input>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <h6>Longitude</h6>
                <input type="text" class="form-control" name="longitude" disabled></input>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <h4>Question 6</h4>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <h6>Question</h6>
                <textarea class="form-control" rows="1" name="nomQuestionExistant" disabled></textarea>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <h6>Latitude</h6>
                <input type="text" class="form-control" name="latitude" disabled></input>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <h6>Longitude</h6>
                <input type="text" class="form-control" name="longitude" disabled></input>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <h4>Question 7</h4>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <h6>Question</h6>
                <textarea class="form-control" rows="1" name="nomQuestionExistant" disabled></textarea>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <h6>Latitude</h6>
                <input type="text" class="form-control" name="latitude" disabled></input>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <h6>Longitude</h6>
                <input type="text" class="form-control" name="longitude" disabled></input>
            </div>
        </div>
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

        map.on('click', recuperation_coordonnees);

    </script>
    <script type="text/javascript">
        $('#majNomQuestionnaire').on('click', maj_nom_questionnaire);
    </script>

  </div>



</body>
</html>