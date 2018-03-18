$(document).ready(function(){
	
		
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
				}
				else if(reponse=="ok")
				{
					$('.auth_form_submitter').removeClass('disabled');
					$('.auth_form_submitter').addClass('active');
					$('.auth_form_submitter').css('pointer-events', 'auto');
				}
			
		});

		
	});
	
	var msg_error_created = false;
	 
	$('#inputPassword').keyup(function()
	{
		if ( ($(this).val() !== $('#inputPasswordConfirm').val()) && ($(this).val() !== '' && $('#inputPasswordConfirm').val() !== '') ) 
		{		
			  if(!msg_error_created)
			  {
				$('.auth_form_submitter').removeClass('active');
				$('.auth_form_submitter').addClass('disabled');
				$('.auth_form_submitter').css('pointer-events', 'none');
			  }
			  msg_error_created = true;		
		}
		else
		{
		  $('.auth_form_submitter').removeClass('disabled');
		  $('.auth_form_submitter').addClass('active');
		  $('.auth_form_submitter').css('pointer-events', 'auto');
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
			  }
			  msg_error_created = true;
		}
		else
		{
		  $('.auth_form_submitter').removeClass('disabled');
		  $('.auth_form_submitter').addClass('active');
		  $('.auth_form_submitter').css('pointer-events', 'auto');
		  if (msg_error_created)
			msg_error_created = false;
		}
	});
});
