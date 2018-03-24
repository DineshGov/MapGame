<?php
    require ('header.php');
    require('../database_auth.php');
?>

<script type="text/javascript">
  $('html').on('click',function(){
    console.log("test");
  });
</script>

    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="col-lg-offset-1 col-lg-11 col-md-offset-1 col-md-11 col-sm-offset-1 col-sm-11"> <h1>Administration</h1> </div>
      <div class="col-lg-offset-2 col-lg-10 col-md-offset-2 col-md-10 col-sm-offset-2 col-sm-10"> 
        <h3 id="chevron-bas">Gestion utilisateur <span class="glyphicon glyphicon-chevron-down"></span></h3>
      </div>

      <div class="col-lg-offset-3 col-lg-6 col-lg-offset-3 col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-3 col-sm-6 col-sm-offset-3">
        <table style="background-color: #ddd;" class="table table-striped table-bordered">
          <thead>
            <tr style="background-color: #aaa; font-weight: bold;">
              <th>id</th>
              <th>Nom d'utilisateur</th>
              <th>Date d'inscription</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $req=$bd->prepare('select * from Users');
              $req->execute();
                    while($tab = $req->fetch(PDO::FETCH_ASSOC)){
                      echo '<tr>';
                      echo "<td>" . $tab['id'] . "</td>";
                      echo "<td>" . htmlspecialchars($tab['login'], ENT_QUOTES) . "</td>";
                      echo "<td>" . $tab['date_inscription'] . "</td>";
                      echo '</tr>';
                    }
            ?>
          </tbody>
        </table>
      </div>
    </div>