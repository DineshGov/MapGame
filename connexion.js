$(document).ready(function(){
	
	$('#inputLogin').keyup(function(){
		
		$.get('http://localhost/mapgame/verif.php',
		{login: $(this).val(), pass: $('#inputPassword').val()},
		function(reponse)
		{
			
			if(reponse=="erreur")
			{
				
				$('.auth_form_submitter').removeClass('active');
				$('.auth_form_submitter').addClass('disabled');
				$('.auth_form_submitter').css('pointer-events', 'none');
				$('#loginError').show();
				
				
			}
			else if(reponse=="ok")
			{
				$('.auth_form_submitter').removeClass('disabled');
				$('.auth_form_submitter').addClass('active');
				$('.auth_form_submitter').css('pointer-events', 'auto');
				$('#loginError').hide();
    }
		});
		
	});
	
	$('#inputPassword').keyup(function(){
		
		$.get('http://localhost/mapgame/verif.php',
		{login: $(this).val(), pass: $('#inputPassword').val()},
		function(reponse)
		{
			
			if(reponse=="erreur")
			{
				
				$('.auth_form_submitter').removeClass('active');
				$('.auth_form_submitter').addClass('disabled');
				$('.auth_form_submitter').css('pointer-events', 'none');
				$('#loginError').show();
				
			}
			else if(reponse=="ok")
			{
				$('.auth_form_submitter').removeClass('disabled');
				$('.auth_form_submitter').addClass('active');
				$('.auth_form_submitter').css('pointer-events', 'auto');
				$('#loginError').hide();
				
			}
		});
		
	});
	
});