<?php 
$page_name = "connexion.php";
require('header.php');
require('../database_auth.php'); ?>

	<body>
		<div class="container">

		  <form class="form-signin" action="test.php" method="post">
			<h2 class="form-signin-heading">Connexion</h2>
			
			<div class="input-group">
			  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
			  <input type="text" name="inputLogin" id="inputLogin" class="form-control" placeholder="Nom d'utilisateur" maxlength="20" minlength="4" required autofocus>
			</div>

			<div class="input-group">
			  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
			  <input type="password" name="inputPassword" id="inputPassword" maxlength="100" minlength="6" class="form-control" placeholder="Mot de passe">
			</div>

			<button class="btn btn-lg btn-danger btn-block auth_form_submitter" id="buttonConnexion" type="submit">Connexion</button>
			<br><span style="color: red; display: none;" id="loginError">Le nom d'utilisateur et le mot de passe n'éxistent pas</span>
		  </form>

		</div>	
	</body>
	
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrapjs/ie10-viewport-bug-workaround.js"></script>
	
</html>