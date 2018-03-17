$(document).ready(function(){
	
	$('#inputLogin').keyup(function(){
		
		$.get('http://localhost/mapgame/verif.php',
		{login: $(this).val(), pass: $('#inputPassword').val()},
		function(reponse)
		{
			
			if(reponse=="erreur")
			{
				
				var msg_error = '<p id="msg_error" class="h6 text-danger">Mots de passe différents</p>';
				$('.auth_form_submitter').removeClass('active');
				$('.auth_form_submitter').addClass('disabled');
				$('.auth_form_submitter').css('pointer-events', 'none');
				$('.form-signin').append(msg_error);
				
				
			}
			else if(reponse=="ok")
			{
				$('#msg_error').remove();
				$('.auth_form_submitter').removeClass('disabled');
				$('.auth_form_submitter').addClass('active');
				$('.auth_form_submitter').css('pointer-events', 'auto');
				
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
				
				var msg_error = '<p id="msg_error" class="h6 text-danger">Mots de passe différents</p>';
				$('.auth_form_submitter').removeClass('active');
				$('.auth_form_submitter').addClass('disabled');
				$('.auth_form_submitter').css('pointer-events', 'none');
				$('.form-signin').append(msg_error);
				
				
			}
			else if(reponse=="ok")
			{
				$('#msg_error').remove();
				$('.auth_form_submitter').removeClass('disabled');
				$('.auth_form_submitter').addClass('active');
				$('.auth_form_submitter').css('pointer-events', 'auto');
				
			}
		});
		
	});
	
	$('#signupConfirm').click(function(){
		
		$.get('http://localhost/mapgame/verifS.php',
		{login_2: $('#inputUsername').val()},
		function(reponse)
		{
			
			if(reponse=="erreur")
			{
				
				var msg_error = '<p id="msg_error" class="h6 text-danger">Ce nom d\'utilisateur existe déja</p>';
				$('.auth_form_submitter').removeClass('active');
				$('.auth_form_submitter').addClass('disabled');
				$('.auth_form_submitter').css('pointer-events', 'none');
				$('#form_inscription').append(msg_error);
								
				
			}
			else if(reponse=="ok")
			{
				$('#msg_error').remove();
				$('.auth_form_submitter').removeClass('disabled');
				$('.auth_form_submitter').addClass('active');
				$('.auth_form_submitter').css('pointer-events', 'auto');
				
			}
		});
	});
});