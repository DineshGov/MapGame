<?php 
$page_name = "inscription.php";
require('header.php');
require('../database_auth.php'); ?>

<script type="text/javascript"> 
  var msg_error_created = false;
  function egalite_mdp(){
    if ($('#inputPasswordConfirm').val() !== $('#inputPassword').val()){
        if($('#inputPassword').val() !== '' && $('#inputPasswordConfirm').val() !== ''){
          if(!msg_error_created){
            var msg_error = '<p id="msg_error" class="h6 text-danger">Mots de passe différents</p>';
            $('.auth_form_submitter').removeClass('active');
            $('.auth_form_submitter').addClass('disabled');
            $('.auth_form_submitter').css('pointer-events', 'none');
            $('#form_inscription').append(msg_error);
          }
          msg_error_created = true;
        }
      }
    else{
      $('#msg_error').remove();
      $('.auth_form_submitter').removeClass('disabled');
      $('.auth_form_submitter').addClass('active');
      $('.auth_form_submitter').css('pointer-events', 'auto');
      if (msg_error_created)
        msg_error_created = false;
    }
  }
</script>

	<body>
	
		<div class="container">

		  <form class="form-signin" id="form_inscription">
			<h2 class="form-signin-heading">Inscription</h2>
			
			<div class="input-group">
			  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			  <input type="text" id="inputUsername" class="form-control" maxlength="50" minlength="6" placeholder="Nom d'utilisateur" required autofocus>
			</div>

			<div class="input-group">
			  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			  <input type="password" id="inputPassword" class="form-control" maxlength="100" minlength="6" placeholder="Mot de passe" required>
			  <script type="text/javascript"> $('#inputPassword').on('input', egalite_mdp); </script>
			</div>
			
			 <div class="input-group">
			  <span class="input-group-addon"><i class="glyphicon glyphicon-hand-up"></i></span>
			  <input type="password" id="inputPasswordConfirm" class="form-control" maxlength="100" minlength="6" placeholder="Confirmer le mot de passe" required>
			  <script type="text/javascript"> $('#inputPasswordConfirm').on('input', egalite_mdp); </script>
			</div>

			<button id="signupConfirm" class="btn btn-lg btn-danger btn-block auth_form_submitter active" type="submit">Inscription</button>
			
		  </form>

		</div>
		
	</body>

	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="../bootstrap/js/ie10-viewport-bug-workaround.js"></script>
		<script src="../inscription.js"></script>
		
</html>