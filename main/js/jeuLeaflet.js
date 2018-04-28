$(document).ready(function(){
	
	
	var exoStart=false;
	var question =	[];
	var cercle1;
	var cercle2;
	var cercle3;
	
	var phase = 0;
	var essai = 3;
	var point = 0;
	var exoFini = false;
	
	

	$.get("jeuLeafletAjax.php",
		{para: "start", idQ: $('#idQuestionnaire').val()},
		function(reponse)
		{

			var i = 0;
			
			while(i<reponse.length)
			{
				question.push({
					idQuestion: reponse[i].idQuestion,
					q: reponse[i].nomQuestion,
				 	latitude: reponse[i].latitude,
				  	longitude: reponse[i].longitude
				})
				i++;
			}
			$('#question_numero').text("Question N°" + question[0].idQuestion);
			$('#nom_question').text(question[0].q);
			cercle1 = L.circle([question[0].latitude,question[0].longitude],500,{color: "red" ,weight: 8,fillColor: "blue"}).addTo(map);  //on est obligé de tout initialiser dans cette fct sinon les variables définis plus bas ne reconnaitront pas les champs du tableau question
			cercle2 = L.circle([question[0].latitude,question[0].longitude],1000,{color: "red" ,weight: 8,fillColor: "blue"}).addTo(map);
			cercle3 = L.circle([question[0].latitude,question[0].longitude],1500,{color: "red" ,weight: 8,fillColor: "blue"}).addTo(map);
	 
		}
	);
	
	exoStart=true;

	
	$('#points').text("Vous n'avez actuellement aucun point");
	$('#nombre_essai').text("Vous avez droit à "+essai+" essais");
	
	console.log("Phase : "+phase);
	console.log("Points actuels : "+point);
	console.log("Essais : "+essai);
	
	var map = L.map('carte').setView([48.858376, 2.294442], 3);

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', 
    {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
    maxZoom: 13,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoiZGppbiIsImEiOiJjamZheWg1OWoxaHYzM3VtejB5OWZxcXVwIn0.i_GA2vSOytwgViYnIvlGGA'
    }).addTo(map);
	
	function sauvegarde()
	{
		$.get("jeuLeafletAjax.php",
		{para: "end", idQ: $('#idQuestionnaire').val(), nomQ: $('#nomQuestionnaire').val(), score: point},
		function(reponse)
		{
			if(reponse!=true)
				alert("echec de l'enregistrement");
		});
	}
	
	console.log($('#nomQuestionnaire').val());

	function miseAJour()
	{
		
		if(phase==question.length-1)
		{
			$('#total').text('Test fini : vous avez au total '+point+' point(s)');
			sauvegarde();
			exoFini = true;
			$('#question_numero').hide();
			$('#nom_question').hide();
			$('#corr').show();
		}
		else
		{
			phase++;
			essai=3;
			cercle1.setLatLng([question[phase].latitude,question[phase].longitude]);
			cercle2.setLatLng([question[phase].latitude,question[phase].longitude]);
			cercle3.setLatLng([question[phase].latitude,question[phase].longitude]);
		
			$('#question_numero').text("Question N°" + question[phase].idQuestion);
			$('#nom_question').text(question[phase].q);
			$('#nombre_essai').text("Vous avez droit à "+essai+" essais");				
			$('#points').text("Vous avez "+point+" point(s)");
		}
		
	}

				
	function click(e) {
		if(!exoStart)
		{
			e.preventDefault();
		}
		$("#valLat").val(e.latlng.lat);
		$("#valLong").val(e.latlng.lng);
		
		//var mark = L.marker([e.latlng.lat,e.latlng.lng],{title:"point",alt:"point",draggable:false}).addTo(map);
		
		var pop = L.popup();		
						
		var dist = e.latlng.distanceTo([question[phase].latitude,question[phase].longitude]);  //à ne pas effacer (distanceTo sert à calculer la distance entre 2 points)
		
		if(exoFini!=true)
		{
			if(essai==0)
			{
				alert("nombre d'essai dépassé");
				miseAJour();
			}
			else
			{
				if(dist<=cercle1.getRadius())
				{
					alert("Bonne réponse, vous avez eu 5 points");
					point+=5;
					miseAJour();
				}
					
				else if(dist>cercle1.getRadius() && dist<=cercle2.getRadius())
				{
					alert("Vous y étiez presque, vous avez eu 3 points");
					point+=3;
					miseAJour();
				}
				else if(dist>cercle2.getRadius() && dist<=cercle3.getRadius())
				{
					alert("Pas mal vous avez eu 1 point");
					point+=1;
					miseAJour();
				}
				else
				{
					pop.setLatLng([e.latlng.lat,e.latlng.lng]).setContent("vous êtes loin de la réponse").openOn(map);
					console.log("Distance entre le point de réference et le click : "+dist);
					essai--;
				}
						
				$('#nombre_essai').text("Vous avez droit à "+essai+" essais");
						
				console.log("Phase : "+phase);
				console.log("Points actuels : "+point);
				console.log("Essais : "+essai);
			}
			
		}

	}
		

	map.on('click',click);
	
});