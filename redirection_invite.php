<?php session_start(); ?>
<?php
$page_name = "redirection_invite.php"; 
require('header.php');?>


	<div class="div_redirection">
	<?php
		echo "<div class='redirection_div'> Bienvenue invité! </div>";
		echo "<p>Vous êtes connecté en tant qu'invité.</p> <p>Vous allez maintenant être redirigé vers le menu principal.</p>";
		echo "<p><a href='main/menu_principal.php'> Cliquez ici si l'attente est trop longue. </a></p>";
		echo("<script>setTimeout('RedirectionVersMenuPrincipal()', 1000)</script>");

	?>
	</div>
</body>
</html>