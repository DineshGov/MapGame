$(document).ready(function(){
	
	var msg_error_created = false;	
	
	$('#inputUsername').keyup(function(event){  //la fonction s'activera des qu'on tapera du texte sur le champ de texte username
		
		$.get('http://localhost/mapgame/verifS.php',  //on envoie en paramètre au fichier php (ici login_2) la valeur du champ de texte
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
	
	 
	$('#inputPassword').keyup(function() //cette fonction s'activera si le mot de passe entré est different du mot de passe de confirmation
	{
		if ( ($(this).val() !== $('#inputPasswordConfirm').val()) && ($(this).val() !== '' && $('#inputPasswordConfirm').val() !== '') ) //on desactive le bouton de validation si le mot de passe entré est different du mot de passe de confirmation 
		{		
			  if(!msg_error_created) //si cette variable n'a pas encore été activé on applique les restrictions
			  {
				$('.auth_form_submitter').removeClass('active'); 
				$('.auth_form_submitter').addClass('disabled');
				$('.auth_form_submitter').css('pointer-events', 'none');
				$('#passError').show(); //on rend visible le message d'erreur
			  }
			  msg_error_created = true;	
		}
		else //si tout va bien on leve les restrictions
		{
		  $('.auth_form_submitter').removeClass('disabled');
		  $('.auth_form_submitter').addClass('active');
		  $('.auth_form_submitter').css('pointer-events', 'auto');
		  $('#passError').hide();
		  if (msg_error_created)
			msg_error_created = false; 
		}
	});
	
	$('#inputPasswordConfirm').keyup(function(event) //meme fonction que celle du dessus sauf qu'elle s'active en manipulant le champ de confirmation du mot de passe
	{
		if ( ($(this).val() !== $('#inputPassword').val()) && ($('#inputPassword').val() !== '' && $(this).val() !== '') ) 
		{		
			  if(!msg_error_created)
			  {
				$('.auth_form_submitter').removeClass('active');
				$('.auth_form_submitter').addClass('disabled');
				$('.auth_form_submitter').css('pointer-events', 'none');
				$('#passError').show();
			  }
			  msg_error_created = true;
		}
		else
		{
		  $('.auth_form_submitter').removeClass('disabled');
		  $('.auth_form_submitter').addClass('active');
		  $('.auth_form_submitter').css('pointer-events', 'auto');
		  $('#passError').hide();
		  if (msg_error_created)
			msg_error_created = false;
		}
	});
});
