<?php
    require ('header.php');
    require('../database_auth.php');
?>



    <div>
      <div class="col-lg-offset-1 col-md-offset-1 col-sm-offset-1"> <h2>Bienvenue !</h2> </div>

      <?php
        $req=$bd->prepare('select * from Users');
        $req->execute();

        echo '<div class="col-lg-offset-3 col-lg-6 col-lg-offset-3 col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-3 col-sm-6 col-sm-offset-3" style="text-align: center;">';
        while($tab = $req->fetch(PDO::FETCH_ASSOC)){
          echo "<button class='btn btn-lg btn-danger btn-block auth_form_submitter' id='buttonConnexion' type='submit'>" . htmlspecialchars($tab['login'], ENT_QUOTES) . "</button>";
        }
        echo "</div>";

      ?>

    </div>