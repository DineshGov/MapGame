<?php
    require ('header.php');
    require('../database_auth.php');
?>

  <div class="col-lg-12 col-md-12 col-sm-12">
    
    <div class="col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-offset-1 col-sm-11"> <h1>Administration</h1>
    </div>


    <div class="col-lg-offset-2 col-lg-10 col-md-offset-2 col-md-10 col-sm-offset-2 col-sm-10"> 
      <h3>Gestion utilisateurs <span id="menu-bas-user" class="glyphicon glyphicon-menu-down"></span></h3>
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
                    echo '<tr>';
                    echo "<td>" . $tab1['id'] . "</td>";
                    echo "<td>" . htmlspecialchars($tab1['login'], ENT_QUOTES) . "</td>";
                    echo "<td>" . $tab1['date_inscription'] . "</td>";
                    echo "<td> <span id='user" . $tab1['id'] . "'class='element_supprimable glyphicon glyphicon-remove-circle'> </td>"; 
                    echo '</tr>';
                  }
          ?>
        </tbody>
      </table>
    </div>
    

    <div class="col-lg-offset-2 col-lg-10 col-md-offset-2 col-md-10 col-sm-offset-2 col-sm-10"> 
      <h3>Gestion questionnaires <span id="menu-bas-questionnaire" class="glyphicon glyphicon-menu-down"></span></h3>
    </div>

    <div class="col-lg-offset-3 col-lg-6 col-lg-offset-3 col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-3 col-sm-6 col-sm-offset-3">
      <table id="table_questionnaire" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>id</th>
            <th>Nom questionnaire</th>
            <th><span class="glyphicon glyphicon-remove-sign"></span></th>
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
                    echo "<td> <span id='questionnaire" . $tab2['idQuestionnaire'] . "'class='element_supprimable glyphicon glyphicon-remove-circle'> </td>"; 
                    echo '</tr>';
                  }
          ?>
        </tbody>
      </table>
    </div>

    <script type="text/javascript"> $('.element_supprimable').on('click', supprimer_element_bdd); </script>

    <script type="text/javascript">
      $('#menu-bas-user').on('click',function(){
        if($('#menu-bas-user').hasClass('glyphicon-menu-down')){
          $('#menu-bas-user').removeClass('glyphicon-menu-down');
          $('#menu-bas-user').addClass('glyphicon-menu-up');
          $('#table_user').fadeOut();
        }
        else if($('#menu-bas-user').hasClass('glyphicon-menu-up')){
          $('#menu-bas-user').removeClass('glyphicon-menu-up');
          $('#menu-bas-user').addClass('glyphicon-menu-down');
          $('#table_user').fadeIn();
        }
      });

      $('#menu-bas-questionnaire').on('click',function(){
        if($('#menu-bas-questionnaire').hasClass('glyphicon-menu-down')){
          $('#menu-bas-questionnaire').removeClass('glyphicon-menu-down');
          $('#menu-bas-questionnaire').addClass('glyphicon-menu-up');
          $('#table_questionnaire').fadeOut();
        }
        else if($('#menu-bas-questionnaire').hasClass('glyphicon-menu-up')){
          $('#menu-bas-questionnaire').removeClass('glyphicon-menu-up');
          $('#menu-bas-questionnaire').addClass('glyphicon-menu-down');
          $('#table_questionnaire').fadeIn();
        }
      });
    </script>

  </div>

<div>
  <?php
        if( isset($_GET['elementId']) ){
          echo "<p>" . $_GET['elementId'] . "</p>";
        }
  ?>
</div>
