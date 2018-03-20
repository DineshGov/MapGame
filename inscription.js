$(document).ready(function(){
	
	var msg_error_username_created = false;	
	
	$('#inputUsername').on('input',function(){  //la fonction s'activera des qu'on tapera du texte sur le champ de texte username
		
		$.get('verifS.php',  //on envoie en paramètre au fichier php (ici login_2) la valeur du champ de texte
		{login_2: $('#inputUsername').val()},
		function(reponse)						//reponse du fichier php
		{
			
				if(reponse=="erreur" && !msg_error_username_created)			//si la variable reponse equivaut à "erreur", on rend inutilisable le bouton de formulaire
				{
					var msg_error_username = "<p id='msg_error_username' class='h6 text-danger'>Ce nom d'utilisateur existe déjà.</p>";
					$('.auth_form_submitter').removeClass('active');
					$('.auth_form_submitter').addClass('disabled');
					$('.auth_form_submitter').css('pointer-events', 'none');
					$('#form_inscription').append(msg_error_username);
					msg_error_username_created = true;	
				}
				else if(reponse=="ok")			//si la variable reponse equivaut à "ok", on leve les restrictionx concernant le bouton de formulaire
				{
					$('#msg_error_username').remove();
					$('.auth_form_submitter').removeClass('disabled');
					$('.auth_form_submitter').addClass('active');
					$('.auth_form_submitter').css('pointer-events', 'auto');
					msg_error_username_created = false;	
				}
			
		});

	});

});
