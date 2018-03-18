<?php 
$page_name = "inscription.php";
require('header.php');
require('database_auth.php'); ?>
	
	<script type="text/javascript"> 
 
</script>
	
    <div class="container">

      <form class="form-signin" id="form_inscription">
        <h2 class="form-signin-heading">Inscription</h2>
        
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input type="text" id="inputUsername" class="form-control" placeholder="Nom d'utilisateur" required autofocus>
        </div>

        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required autofocus>
        </div>
		
		 <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-hand-up"></i></span>
          <input type="password" id="inputPasswordConfirm" class="form-control" placeholder="confirmer le mot de passe" required autofocus>
        </div>

        <button id="signupConfirm" class="btn btn-lg btn-danger btn-block auth_form_submitter active" type="submit">Inscription</button>
		
		<br><span style="color: red; display: none;" id="loginError">Ce nom d'utilisateur éxiste déja</span>
		<br><span style="color: red; display: none;" id="passError">Les mots de passe doivent être identiques</span>
      </form>

    </div>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrapjs/ie10-viewport-bug-workaround.js"></script>
	<script src="inscription.js"></script>
  </body>
</html>




