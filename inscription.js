$(document).ready(function(){
	
	var msg_error_created = false;	
	
	$('#inputUsername').keyup(function(){  //la fonction s'activera des qu'on tapera du texte sur le champ de texte username
		
		$.get('verifS.php',  //on envoie en paramètre au fichier php (ici login_2) la valeur du champ de texte
		{login_2: $('#inputUsername').val()},
		function(reponse)						//reponse du fichier php
		{
			
				if(reponse=="erreur")			//si la variable reponse equivaut à "erreur", on rend inutilisable le bouton de formulaire
				{				
					$('.auth_form_submitter').removeClass('active');
					$('.auth_form_submitter').addClass('disabled');
					$('.auth_form_submitter').css('pointer-events', 'none');
					$('#loginError').show();	//on rend visible le message d'erreur
					document.getElementById("signupConfirm").disabled=true; //on rend inactivable le bouton du formulaire 
				}
				else if(reponse=="ok")			//si la variable reponse equivaut à "ok", on leve les restrictionx concernant le bouton de formulaire
				{
					$('.auth_form_submitter').removeClass('disabled');
					$('.auth_form_submitter').addClass('active');
					$('.auth_form_submitter').css('pointer-events', 'auto');
					$('#loginError').hide();	//on rend invisible le message d'erreur
					document.getElementById("signupConfirm").disabled=false; //on rend de nouveau activable le bouton du formulaire
				}
			
		});

	});

});
