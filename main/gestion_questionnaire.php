<?php
    $page_name="gestion_questionnaire.php";
    require ('header.php');
    require('../database_auth.php');
?>
    <div>
        <a href="administration.php" class='return_links'>
            <span class="glyphicon glyphicon-step-backward"></span>
            Retour à la page d'administration
        </a>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12">

        <div class="col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-offset-1 col-sm-11"> <h1>Gestion questionnaire</h1>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12" id="div_gestion">
            <?php
            $req=$bd->prepare("SELECT idQuestionnaire, nomQuestionnaire FROM questionnaires WHERE idQuestionnaire = :id");
            $req->bindvalue(":id", $_POST['idQuestionnaire']);
            $req->execute();
            $tab = $req->fetch(PDO::FETCH_ASSOC);


            echo "<p>idQuestionnaire: <input type='text' name='inputIdQuestionnaire' id='inputIdQuestionnaire' value='" . $tab['idQuestionnaire'] . "'disabled></input></p>";
            echo '<p>nomQuestionnaire: <input type="text" name="inputNomQuestionnaire" id="inputNomQuestionnaire" value="' . $tab["nomQuestionnaire"] . '"></input>';
            echo '<button type="button" class="btn_gestion_questionnaire btn btn-info btn-xs" id="majNomQuestionnaire">Mise à jour</button>';
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

        <div>
            <p>Attribuer ces coordonnées à la question à modifier</p>
            <p><button type="button" class="btn_gestion_questionnaire btn btn-info btn-xs" id="btn_attrib_coord" >Go</button></p>
            <p id="explication_utilisation">(Cliquez sur une clé à molette et appuyez sur le bouton Go pour attribuer les coordonnées à la question.)</p>
        </div>

        </div>

        <div class="col-lg-12 col-md-12 col-sm-12" id="div_formulaire_question">

            <table id="table_question" class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 5%;">idQuestion</th>
                    <th style="width: 50%;">nomQuestion</th>
                    <th style="width: 22.5%;">latitude</th>
                    <th style="width: 22.5%;">longitude</th>
                    <th style="width: 5%;"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $req2=$bd->prepare('select * from questions where idQuestionnaire= :id order by idQuestion');
                    $req2->bindvalue(':id', $_POST['idQuestionnaire']);
                    $req2->execute();
                    $compteur_question = 1;
                    $nbr_question_total = 7;
                    $question_trouvee_dans_bdd = false;

                    $tab2 = $req2->fetchAll(PDO::FETCH_ASSOC);

                    for ($compteur_question = 1; $compteur_question <= $nbr_question_total; $compteur_question++) {
                        for ($i=0; $i < $nbr_question_total; $i++) {
                            if(isset($tab2[$i][idQuestion]) && $tab2[$i][idQuestion] == $compteur_question){
                                echo '<tr id="tr_question' . $tab2[$i]['idQuestion'] . '">';
                                echo "<td id='idQ" . $tab2[$i]['idQuestion'] . "'>" . $tab2[$i]['idQuestion'] . "</td>";
                                echo "<td id='nomQ" . $tab2[$i]['idQuestion'] . "'>" . $tab2[$i]['nomQuestion'] . "</td>";
                                echo "<td id='latiQ" . $tab2[$i]['idQuestion'] . "'>" . $tab2[$i]['latitude'] . "</td>";
                                echo "<td id='longQ" . $tab2[$i]['idQuestion'] . "'>" . $tab2[$i]['longitude'] . "</td>";
                                echo '<td><span  id="edit_question' . $tab2[$i]['idQuestion'] . '" class="glyphicon glyphicon-wrench"></span></td>';
                                echo '</tr>';

                                $question_trouvee_dans_bdd = true;
                            }
                        }
                        if(!$question_trouvee_dans_bdd){
                            echo '<tr id="tr_question' . $compteur_question . '">';
                            echo "<td id='idQ" . $compteur_question . "'> $compteur_question </td>";
                            echo "<td id='nomQ" . $compteur_question . "'> </td>";
                            echo "<td id='latiQ" . $compteur_question . "'> </td>";
                            echo "<td id='longQ" . $compteur_question . "'> </td>";
                            echo '<td><span  id="edit_question' . $compteur_question . '" class="glyphicon glyphicon-wrench"></span></td>';
                            echo '</tr>';
                        }
                        $question_trouvee_dans_bdd = false;
                        $i = 0;
                    }
                    //Cette boucle for permet de creer le tableau ligne par ligne
                    //Une ligne est vide si pour tout $i, il n'existe pas de question d'id correspondant
                    //Sinon on recupere les infos de la question et on l'ajoute au tableau
                  ?>
                </tbody>
            </table>

        </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
                <button type="button" class="btn_gestion_questionnaire btn btn-info btn-xs" id="buttonQuestionUpdate">Mise à jour question</button>
                <h6 id="reponse_MAJ"></h6>
            </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12" id="div_returnLink">
        <a href="administration.php" class='return_links'>
        <span class="glyphicon glyphicon-step-backward"></span>
        Retour à la page d'administration
        </a>
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
        map.on('mousemove', function(e){
            console.log(e.latlng);
        });

    </script>

    <script type="text/javascript">

        $('#majNomQuestionnaire').on('click', maj_nom_questionnaire);
        $('.glyphicon-wrench').on('click', add_edition_line_in_table);
        $('#buttonQuestionUpdate').on('click', maj_question);
        $('#btn_attrib_coord').on('click', attribution_coordonnes_via_bouton);
    </script>


</body>
</html>
