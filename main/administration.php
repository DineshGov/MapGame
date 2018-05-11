<?php
	$page_name="administration.php";
    require ('header.php');
    require('../database_auth.php');
	
	if(!$_SESSION['login'] || !isset($_SESSION['statut']))
	{
		echo "Vous n'avez pas les droits nécessaires pour acceder à cette page";
		header('location: menu_principal.php');
		exit(1);
	}
?>

  <div class="col-lg-12 col-md-12 col-sm-12">
    
    <div class="col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-offset-1 col-sm-11"> <h1>Administration</h1>
    </div>


    <div class="col-lg-offset-2 col-lg-10 col-md-offset-2 col-md-10 col-sm-offset-2 col-sm-10"> 
      <h3>Gestion utilisateurs <span id="menu_user_fleche" class="glyphicon glyphicon-menu-down"></span></h3>
    </div>
      
    <div class="col-lg-offset-3 col-lg-6 col-lg-offset-3 col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-3 col-sm-6 col-sm-offset-3">
      <table id="table_user" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>id</th>
            <th>Nom d'utilisateur</th>
            <th>Date d'inscription</th>
            <th><span class="glyphicon glyphicon-remove-sign"></span></th>
          </tr>
        </thead>
        <tbody>
          <?php
            $req1=$bd->prepare('select * from users order by id');
            $req1->execute();
                  while($tab1 = $req1->fetch(PDO::FETCH_ASSOC)){
                    if(htmlspecialchars($tab1['login'], ENT_QUOTES) !== "admin"){
                      echo "<tr id='ligne_user" . $tab1['id'] . "' >";
                      echo "<td>" . $tab1['id'] . "</td>";
                      echo "<td>" . htmlspecialchars($tab1['login'], ENT_QUOTES) . "</td>";
                      echo "<td>" . $tab1['date_inscription'] . "</td>";
                      echo "<td> <span id='user" . $tab1['id'] . "'class='element_supprimable glyphicon glyphicon-trash'> </td>"; 
                      echo '</tr>';
                    }
                    //On ne souhaite pas afficher l'utilisateur admin dans la liste des utilisateurs pouvant etre supprimé.
                  }
          ?>
        </tbody>
      </table>
    </div>
    

    <div class="col-lg-offset-2 col-lg-10 col-md-offset-2 col-md-10 col-sm-offset-2 col-sm-10"> 
      <h3>Gestion questionnaires <span id="menu_questionnaire_fleche" class="glyphicon glyphicon-menu-down"></span></h3>
    </div>

    <div class="col-lg-offset-3 col-lg-6 col-lg-offset-3 col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-3 col-sm-6 col-sm-offset-3">
      <table id="table_questionnaire" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>id</th>
            <th>Nom questionnaire</th>
            <th><span class="glyphicon glyphicon-info-sign"></span></th>
          </tr>
        </thead>
        <tbody>
          <?php
            $req2=$bd->prepare('select * from questionnaires order by idQuestionnaire');
            $req2->execute();
                  while($tab2 = $req2->fetch(PDO::FETCH_ASSOC)){
                    echo '<tr>';
                    echo "<td>" . $tab2['idQuestionnaire'] . "</td>";
                    echo "<td>" . $tab2['nomQuestionnaire'] . "</td>";
                    echo "<td> <span id='questionnaire" . $tab2['idQuestionnaire'] . "'class='element_modifiable glyphicon glyphicon-wrench'> </td>"; 
                    echo '</tr>';
                    /* Formulaire masqué permettant de rediriger vers la page gestion_questionnaire.
                    Ce formulaire envoie l'id et le nom du formulaire à modifier à la page. */
                    echo "<form method='post' action='gestion_questionnaire.php' id='form_" . $tab2['idQuestionnaire'] . "'>";
                    echo '<input type="hidden" name="idQuestionnaire" value="' . $tab2["idQuestionnaire"] . '">';
                    echo '<input type="hidden" name="nomQuestionnaire" value="' . $tab2["nomQuestionnaire"] . '">';
                    echo "</form>";
                  }
          ?>
        </tbody>
      </table>
    </div>

    <div class="col-lg-offset-3 col-lg-6 col-lg-offset-3 col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-3 col-sm-6 col-sm-offset-3"> 
      <a href="creation_questionnaire.php" id="btn_creation_questionnaire" class="btn btn-lg btn-success btn-block" role="button">Création questionnaire</a>
    </div>

    <script type="text/javascript"> 
      $('.element_supprimable').on('click', supprimer_element_bdd);
      $('.element_modifiable').on('click', modifie_questionnaire);
      $('#menu_user_fleche').on('click', masque_menu);
      $('#menu_questionnaire_fleche').on('click', masque_menu);
    </script>

  </div>
</body>
</html>