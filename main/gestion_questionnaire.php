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
            $req=$bd->prepare("SELECT idQuestionnaire, nomQuestionnaire, statut FROM questionnaires WHERE idQuestionnaire = :id");
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
                    //Ce tableau contient toutes les informations d'un questionnaire.

                    for ($compteur_question = 1; $compteur_question <= $nbr_question_total; $compteur_question++) {
                        for ($i=0; $i < $nbr_question_total; $i++) {
                            if(isset($tab2[$i]['idQuestion']) && $tab2[$i]['idQuestion'] == $compteur_question){
                                echo '<tr id="tr_question' . $tab2[$i]['idQuestion'] . '">';
                                echo "<td id='idQ" . $tab2[$i]['idQuestion'] . "'>" . $tab2[$i]['idQuestion'] . "</td>";
                                echo '<td id="nomQ' . $tab2[$i]["idQuestion"] . '">' . $tab2[$i]["nomQuestion"] . '</td>';
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
                            echo '<td id="nomQ' . $compteur_question . '"> </td>';
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

        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Insertion image et description pour chaque question</h3>

            <?php
                $nbr_question = 7;
                $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
                for ($div_question = 1; $div_question <= $nbr_question; $div_question++) {
                    echo '<div class="col-lg-12 col-md-12 col-sm-12">';
                        echo '<h4>Question ' . $div_question . '</h4>';

                        $indiceQuestionDansTab2 = $div_question - 1;
                        $id_image = $tab['idQuestionnaire'] . "_" . $div_question;

                        $pwd_image = "img/" . $id_image . "";
                        //Chemin vers l'image sans l'extension

                        //Ajout des différentes extensions possibles
                        $jpg_image  = "" . $pwd_image . "." . $extensions_valides[0] . "";
                        $jpeg_image = "" . $pwd_image . "." . $extensions_valides[1] . "";
                        $gif_image  = "" . $pwd_image . "." . $extensions_valides[2] . "";
                        $png_image  = "" . $pwd_image . "." . $extensions_valides[3] . "";

                        if(file_exists($jpg_image)){
                            echo '<div class="col-lg-12 col-md-12 col-sm-12 img_container">';
                                echo '<img src="' . $jpg_image . '" alt="img' . $id_image . '" height="160" width="100" >';
                            echo '</div>';
                        }
                        else if(file_exists($jpeg_image)){
                            echo '<div class="col-lg-12 col-md-12 col-sm-12 img_container">';
                                echo '<img src="' . $jpeg_image . '" alt="img' . $id_image . '" height="160" width="100" >';
                            echo '</div>';
                        }
                        else if(file_exists($gif_image)){
                            echo '<div class="col-lg-12 col-md-12 col-sm-12 img_container">';
                                echo '<img src="' . $gif_image . '" alt="img' . $id_image . '" height="160" width="100" >';
                            echo '</div>';
                        }
                        else if(file_exists($png_image)){
                            echo '<div class="col-lg-12 col-md-12 col-sm-12 img_container">';
                                echo '<img src="' . $png_image . '" alt="img' . $id_image . '" height="160" width="100" >';
                            echo '</div>';
                        }
                        else
                            echo "Pas d'image enregistrée.";

                        echo '<form class="form-horizontal" method="post" action="verification_upload.php" enctype="multipart/form-data">';
                            
                            echo '<div class="form-group">';
                                echo '<label class="control-label col-sm-2" for="image">Fichier: (JPG , JPEG , GIF , PNG & max. 4 Mo)</label>';
                                echo '<div class="col-sm-10">';
                                    echo '<input type="file"  name="image" id="image" >';
                                echo "</div>";
                            echo '</div>';

                            echo '<div class="form-group">';
                                echo '<label class="control-label col-sm-2" for="description">Description:</label>';
                                echo '<div class="col-sm-10">';
                                    if(isset($tab2[$indiceQuestionDansTab2]['description']) && !is_null($tab2[$indiceQuestionDansTab2]['description']) ){
                                        echo '<textarea name="description" class="form-control" id="description">' . $tab2[$indiceQuestionDansTab2]['description'] . '</textarea required>';    
                                    }
                                    else{
                                        echo '<textarea name="description" class="form-control" id="description"></textarea required>';
                                    }
                                    //Affiche la description dans le champs si une description pour cette question existe dans la bdd
                                echo "</div>";
                            echo '</div>';

                            //Informations à transmettre via $_POST:
                            echo '<input type="hidden" name="idQuestionnaire" value="' . $tab["idQuestionnaire"] . '"> ';
                            echo '<input type="hidden" name="idQuestion" value="' . $div_question . '"> ';
                            //idQuestionnaire et idQuestion serviront à créer le nom de l'image.

                            echo '<button type="submit" class="btn btn-default">Envoyer </button>';

                        echo '</form>';

                    echo '</div>';

                }//Fin for
            ?>

        </div>

        <div class="col-lg-12 col-md-12 col-sm-12" id="div_statut_questionnaire">
            <h3>Statut du questionnaire</h3>
            <form id="questionnaireStatutForm">

                <?php
                if($tab['statut'] !== 'desactive'){
                    echo '<label class="radio">
                        <input type="radio" name="questionnaireStatut" class="questionnaireStatut" id="active" checked="checked">
                        Questionnaire activé</label>';
                    echo '<label class="radio">
                        <input type="radio" name="questionnaireStatut" class="questionnaireStatut" id="desactive" >
                        Questionnaire désactivé</label>';
                    }
                else{
                    echo '<label class="radio">
                        <input type="radio" name="questionnaireStatut" class="questionnaireStatut" id="active">
                        Activer le questionnaire</label>';
                    echo '<label class="radio">
                        <input type="radio" name="questionnaireStatut" class="questionnaireStatut" id="desactive" checked="checked">
                        Desactiver le questionnaire</label>';
                }
                ?>
            </form>
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
        $('.questionnaireStatut').on('click', change_statut_questionnaire);

    </script>


</body>
</html>
