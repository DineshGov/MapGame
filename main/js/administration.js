function supprimer_element_bdd(event){
	console.log("class= " + event.target.className + " id= " + event.target.id);
	$.ajax({
		url : './administration.php',
		type : 'GET',
		data : 'elementId=' + event.target.id
	});
};