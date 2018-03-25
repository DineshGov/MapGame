/*function supprimer_element_bdd(event){
	console.log("class= " + event.target.className + " id= " + event.target.id);
	$.ajax({
		url : './administration.php',
		type : 'GET',
		data : 'elementId=' + event.target.id
	});
};*/

function supprimer_element_bdd(event){
	console.log("class= " + event.target.className + " id= " + event.target.id);
	var id = event.target.id;

	$.get("requete_ajax_suppression_user.php",
	{elementId: id},
	function(reponse)
	{
		if(reponse=="Supprimé"){
			$('#ligne_' + id).remove();
		}
		else if(reponse=="Rien a faire"){
			console.log(reponse);
		}	
	})
}