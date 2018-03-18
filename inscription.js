$(document).ready(function(){
	
	var msg_error_created = false;	
	
	$('#inputUsername').keyup(function(event){
		
		$.get('http://localhost/mapgame/verifS.php',
		{login_2: $('#inputUsername').val()},
		function(reponse)
		{
			
				if(reponse=="erreur")
				{				
					$('.auth_form_submitter').removeClass('active');
					$('.auth_form_submitter').addClass('disabled');
					$('.auth_form_submitter').css('pointer-events', 'none');
					$('#loginError').show();
					document.getElementById("signupConfirm").disabled=true;
				}
				else if(reponse=="ok")
				{
					$('.auth_form_submitter').removeClass('disabled');
					$('.auth_form_submitter').addClass('active');
					$('.auth_form_submitter').css('pointer-events', 'auto');
					$('#loginError').hide();
					document.getElementById("signupConfirm").disabled=false;
				}
			
		});

		
	});
	
	 
	$('#inputPassword').keyup(function()
	{
		if ( ($(this).val() !== $('#inputPasswordConfirm').val()) && ($(this).val() !== '' && $('#inputPasswordConfirm').val() !== '') ) 
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
	
	$('#inputPasswordConfirm').keyup(function(event)
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
