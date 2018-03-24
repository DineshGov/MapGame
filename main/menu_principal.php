<?php
    require ('header.php');
    require('../database_auth.php');
?>



    <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-11 col-md-11 col-sm-11"> <h2>Bienvenue !</h2> </div>

    <?php
      $req=$bd->prepare('select * from Questionnaires');
      $req->execute();

      echo '<div class="col-lg-offset-3 col-lg-6 col-lg-offset-3 col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-3 col-sm-6 col-sm-offset-3" style="text-align: center;">';
      while($tab = $req->fetch(PDO::FETCH_ASSOC)){
        echo "<button class='btn btn-lg btn-danger btn-block auth_form_submitter' id='buttonConnexion' type='submit'>" . $tab['nomQuestionnaire'] . "</button>";
      }
      echo "</div>";

    
    if(isset($_SESSION['statut']) && $_SESSION['statut']==="admin")
      echo '<div id="panneau_config_link" class="col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-offset-1 col-sm-11">
        <a href="administration.php"><h2><span class="glyphicon glyphicon-cog"></span>Panneau de configuration</h2></a> 
      </div>'

    ?>