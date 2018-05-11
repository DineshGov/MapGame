<?php
	$page_name="menu_principal.php";
    require ('header.php');
    require('../database_auth.php');
?>



    <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-11 col-md-11 col-sm-11"> <h2>Bienvenue !</h2> </div>
	
    <?php
      $req=$bd->prepare('select * from Questionnaires');
      $req->execute();
	  $req2=$bd->prepare('select * from users where login=:l');
	  $req2->bindvalue(':l',@$_SESSION['login']);
      $req2->execute();
	  $tab2 = $req2->fetch(PDO::FETCH_ASSOC);
	  

     if(!isset($_SESSION['login']))
	{
      echo '<div class="col-lg-offset-3 col-lg-6 col-lg-offset-3 col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-3 col-sm-6 col-sm-offset-3 container_questionnaire" style="text-align: center;">';

      echo "<button class='btn btn-lg btn-danger btn-block questionnaire_form_submitter' id='buttonQuestionnaire1'>Les 7 merveilles du monde</button>";
      echo "<form method='POST' action='jeuLeaflet.php' id='formQuestionnaire1'>";
      echo "<input type='hidden' name='idQuestionnaire' value='1'>";
      echo "<input type='hidden' name='nomQuestionnaire' value='Les 7 merveilles du monde'>";
      echo "</form>";

      echo "</div>";
      echo '<div class="col-lg-12 col-md-12 col-sm-12" id="message_invite">
        Vous êtes connecté en tant qu’invité.' . '</br>' . 'Pour avoir accès à tout les questionnaires proposés, inscrivez-vous ou connectez-vous.
      </div>';

	}
	else
	{
		echo '<div class="col-lg-offset-3 col-lg-6 col-lg-offset-3 col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-3 col-sm-6 col-sm-offset-3 container_questionnaire" style="text-align: center;">';
      while($tab = $req->fetch(PDO::FETCH_ASSOC))
	  {

      /* if($tab['statut'] == 'desactive'){
       echo "<button class='btn btn-lg btn-danger btn-block questionnaire_form_submitter disabled' id='buttonQuestionnaire" . $tab['idQuestionnaire'] . "'>" . $tab['nomQuestionnaire'] . "</button>"; 
      }
      else{
        echo "<button class='btn btn-lg btn-danger btn-block questionnaire_form_submitter active' id='buttonQuestionnaire" . $tab['idQuestionnaire'] . "'>" . $tab['nomQuestionnaire'] . "</button>";
      }
        echo "<form method='POST' action='jeuLeaflet.php' id='formQuestionnaire" . $tab['idQuestionnaire'] . "'>";
        echo "<input type='hidden' name='idQuestionnaire' value='" . $tab['idQuestionnaire']."'>";
     	 echo "<input type='hidden' name='nomQuestionnaire' value='" . $tab['nomQuestionnaire'] . "'>";
        echo "<input type='hidden' name='statutQuestionnaire' value='" . $tab['statut'] . "'>";
        echo "</form>";
*/
  		if($tab2['progression']<$tab['idQuestionnaire']) //si le niveau de progression du joueur est inférieur  à l'id du questionnaire, cela veut dire qu'il n'a pas encore terminé le questionnaire précédent et on bloque donc le questionnaire concerné
  		{
  			echo "<button readonly='readonly' class='btnHidden btn btn-lg btn-danger btn-block' id='buttonQuestionnaire" . $tab['idQuestionnaire'] . "'>". $tab['nomQuestionnaire'] . "    <span class='glyphicon glyphicon-lock'></span</button>";
  			echo "<form method='POST' action='jeuLeaflet.php' id='formQuestionnaire" . $tab['idQuestionnaire'] . "'>";
  			echo "<input type='hidden' name='idQuestionnaire' value='" . $tab['idQuestionnaire']."'>";
  			echo "<input type='hidden' name='nomQuestionnaire' value='" . $tab['nomQuestionnaire'] . "'>";
  			echo "</form>";
  		}
  		else //sinon on le rend accessible (par défaut le 1er questionnaire est accessible à tous)
  		{
  			echo "<button class='btn btn-lg btn-danger btn-block questionnaire_form_submitter' id='buttonQuestionnaire" . $tab['idQuestionnaire'] . "'>" . $tab['nomQuestionnaire'] . "</button>";
  			echo "<form method='POST' action='jeuLeaflet.php' id='formQuestionnaire" . $tab['idQuestionnaire'] . "'>";
  			echo "<input type='hidden' name='idQuestionnaire' value='" . $tab['idQuestionnaire']."'>";
  			echo "<input type='hidden' name='nomQuestionnaire' value='" . $tab['nomQuestionnaire'] . "'>";
  			echo "</form>";
  		}
    }
    echo "</div>";
	  echo '
			<div class="col-lg-offset-3 col-lg-6 col-lg-offset-3 col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-3 col-sm-6 col-sm-offset-3" style="text-align: center;">
				<a href="score.php" style="color: white; text-decoration:none">
          <button class="btn btn-lg btn-info btn-block">Score</button>
        </a>
			</div>
			';
	echo"<br><div class='col-lg-offset-4 col-lg-4 col-lg-offset-4 popUpInfo'>";
		echo "<p class='text-danger'>Vous devez terminez le questionnaire précédent pour pouvoir acceder à celui-ci</p>";
    echo"</div>";
	} 
	 
	
	
    if(isset($_SESSION['statut']) && $_SESSION['statut']==="admin")
      echo '<div id="panneau_config_link" class="col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-offset-1 col-sm-11">
        <a href="administration.php"><h2><span class="glyphicon glyphicon-cog"></span>Panneau de configuration</h2></a> 
      </div>'

    ?>

    <script type="text/javascript"> 
      $('.questionnaire_form_submitter').on('click', transmet_infos_questionnaire);
    </script>
</body>
</html>