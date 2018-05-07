$(document).ready(function()
{
	var parametre;
	$(".main_row").click(function()
	{
		if($(this).attr("title")=="trier par nom (questionnaire)")
			parametre="questionnaire";
		else if($(this).attr("title")=="trier par score")
			parametre="score";
		else if($(this).attr("title")=="trier par date")
			parametre="date";	
		
		if($(this).hasClass('glyphicon-arrow-up'))
		{
			$(this).removeClass('glyphicon-arrow-up');
			$(this).addClass('glyphicon-arrow-down');
			
			$.get
			(
				"requete_ajax_score.php",
				{para: parametre, ordre: 'asc'},
				function(reponse)
				{
					$('.content').remove();
					$('#table_content').append(reponse);
				}
			);
		}
		else if($(this).hasClass('glyphicon-arrow-down'))
		{
			$(this).removeClass('glyphicon-arrow-down');
			$(this).addClass('glyphicon-arrow-up');
			
			$.get
			(
				"requete_ajax_score.php",
				{para: parametre, ordre: 'desc'},
				function(reponse)
				{
					$('.content').remove();
					$('#table_content').append(reponse);
				}
			);
		}
		
	});
});

