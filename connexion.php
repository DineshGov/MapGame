<?php 
$page_name = "connexion.php";
require('header.php');
require('database_auth.php');?>

    <div class="container">

      <form class="form-signin">
        <h2 class="form-signin-heading">Connexion</h2>
        
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input type="text" id="inputUsername" class="form-control" placeholder="Nom d'utilisateur" required autofocus>
        </div>

        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe">
        </div>

        <button class="btn btn-lg btn-danger btn-block auth_form_submitter" type="submit" >Connexion</button>
      </form>

    </div>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrapjs/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>