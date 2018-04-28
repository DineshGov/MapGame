<?php
	$page_name="menu_principal.php";
    require ('header.php');
    require('../database_auth.php');
?>



    <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-11 col-md-11 col-sm-11"> <h2>Bienvenue !</h2> </div>
	
    <?php
      $req=$bd->prepare('select * from Questionnaires');
      $req->execute();

      echo '<div class="col-lg-offset-3 col-lg-6 col-lg-offset-3 col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-3 col-sm-6 col-sm-offset-3 container_questionnaire" style="text-align: center;">';
      while($tab = $req->fetch(PDO::FETCH_ASSOC)){
        echo "<button class='btn btn-lg btn-danger btn-block questionnaire_form_submitter' id='buttonQuestionnaire" . $tab['idQuestionnaire'] . "'>" . $tab['nomQuestionnaire'] . "</button>";
        echo "<form method='POST' action='jeuLeaflet.php' id='formQuestionnaire" . $tab['idQuestionnaire'] . "'>";
        echo "<input type='hidden' name='idQuestionnaire' value='" . $tab['idQuestionnaire']."'>";
        echo "<input type='hidden' name='nomQuestionnaire' value='" . $tab['nomQuestionnaire'] . "'>";
        echo "</form>";
      }
      echo "</div>";
	  
	  echo '
			<div class="col-lg-offset-3 col-lg-6 col-lg-offset-3 col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-3 col-sm-6 col-sm-offset-3" style="text-align: center;">
				<a href="score.php" style="color: white; text-decoration:none">
          <button class="btn btn-lg btn-info btn-block">Score</button>
        </a>
			</div>
			';

    
    if(isset($_SESSION['statut']) && $_SESSION['statut']==="admin")
      echo '<div id="panneau_config_link" class="col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-offset-1 col-sm-11">
        <a href="administration.php"><h2><span class="glyphicon glyphicon-cog"></span>Panneau de configuration</h2></a> 
      </div>'

    ?>

    <script type="text/javascript"> 
      $('.questionnaire_form_submitter').on('click', transmet_infos_questionnaire);
    </script>


    <!--echo "<form method='post' action='gestion_questionnaire.php' id='form_" . $tab2['idQuestionnaire'] . "'>";
                    echo '<input type="hidden" name="idQuestionnaire" value="' . $tab2["idQuestionnaire"] . '">';
                    echo '<input type="hidden" name="nomQuestionnaire" value="' . $tab2["nomQuestionnaire"] . '">';
                    echo "</form>";-->