$(document).ready(function(){
	
	/*Erreur dans la console javascript possible pour la variable question
	En effet, cette variable peut prendre quelques ms pour charger, elle peut donc etre considérée
	non définie au chargement de la page.
	Cette erreur n'a aucune conséquence sur le fonctionnement du moteur du jeu.
	*/

	var exoStart=false;	//tant que cette valeur reste à false l'exercice ne peut pas commencer
	var question =	[];	//tableau d'objet qui contiendra les données de chaque questions
	var cercle1;	//cercles nécessaires à l'attribution des points
	var cercle2;
	var cercle3;
	var cercle4;
	var cercle5;
	var cercle6;	//cercle nécessaire à l'affichage de l'indice	
	var phase = 0;	//permet de naviguer dans le tableau d'objet à chaque question répondu
	var essai = 3;	
	var point = 0;
	var exoFini = false; 

	$.get("requete_ajax_jeuLeaflet.php",
		{para: "start", idQ: $('#idQuestionnaire').val()}, //requete ajax permettant d'oir les données de chaque questions
		function(reponse)
		{

			var i = 0;
			
			while(i<reponse.length) //on joute chaque objet au tableau créée précédement
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
			cercle1 = L.circle([question[0].latitude,question[0].longitude],8000,{color: 'transparent'}).addTo(map);  //on est obligé de tout initialiser dans cette fct sinon les variables définis plus bas ne reconnaitront pas les champs du tableau question
			cercle2 = L.circle([question[0].latitude,question[0].longitude],16000,{color: 'transparent'}).addTo(map);
			cercle3 = L.circle([question[0].latitude,question[0].longitude],24000,{color: 'transparent'}).addTo(map);
			cercle4 = L.circle([question[0].latitude,question[0].longitude],32000,{color: 'transparent'}).addTo(map);
			cercle5 = L.circle([question[0].latitude,question[0].longitude],40000,{color: 'transparent'}).addTo(map);
			cercle6 = L.circle([question[0].latitude,question[0].longitude],100000,{color: 'transparent'}).addTo(map); 
			

		}
	);
	
	exoStart=true;

	
	$('#points').text("Vous n'avez actuellement aucun point");
	$('#nombre_essai').text("Vous avez droit à "+essai+" essais");

	
	var map = L.map('carte').setView([48.858376, 2.294442], 3);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZW5pZ21hNzc3NyIsImEiOiJja2szNnZ0dnkwcWZ4MnBxbzFvbXJhOXZzIn0.TmXyfODNPIi0hmAJYru9Tw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		maxZoom: 18,
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1,
		accessToken: 'pk.eyJ1IjoiZW5pZ21hNzc3NyIsImEiOiJja2szNnZ0dnkwcWZ4MnBxbzFvbXJhOXZzIn0.TmXyfODNPIi0hmAJYru9Tw'
      }).addTo(map);
	
	function sauvegarde()
	{
		
		$.get("requete_ajax_jeuLeaflet.php",
		{para:"end", idQ: $('#idQuestionnaire').val(), nomQ: $('#nomQuestionnaire').val(), score: point},
		function(reponse)
		{
			if(reponse!=true)
			{
				if($('#invite').val()!='true')
					alert("score non enregistré");	
				
			}
		});
	}
	
	function miseAJour()
	{
		
		$('#btnInfos').hide();
		if(phase==question.length-1)
		{
			$('#total').text('Test fini : vous avez au total '+point+' point(s) sur 70');
			$('#points').hide();
			
			sauvegarde();
			
			exoFini = true;
			$('#question_numero').text("");
			$('#nom_question').text("Questionnaire terminé.");
			$('.endGameButton').css("display", "block");

		}
		else
		{
			phase++;
			essai=3;
			cercle1.setLatLng([question[phase].latitude,question[phase].longitude]);
			cercle2.setLatLng([question[phase].latitude,question[phase].longitude]);
			cercle3.setLatLng([question[phase].latitude,question[phase].longitude]);
			cercle4.setLatLng([question[phase].latitude,question[phase].longitude]);
			cercle5.setLatLng([question[phase].latitude,question[phase].longitude]);
			cercle6.setLatLng([question[phase].latitude,question[phase].longitude])
		
			$('#question_numero').text("Question N°" + question[phase].idQuestion);
			$('#nom_question').text(question[phase].q);
			$('#nombre_essai').text("Vous avez droit à "+essai+" essais");				
			$('#points').text("Vous avez "+point+" point(s)");
		}
		
	}

	map.on('mousemove',function(e){
		
		$("#valLat").val(e.latlng.lat);
		$("#valLong").val(e.latlng.lng);
		
		if(e.latlng.distanceTo([question[phase].latitude,question[phase].longitude])<=cercle6.getRadius())
			$('#help').show();
		else
			$('#help').hide();
	});
	
				
	map.on('click',function click(e) {
		if(!exoStart)
		{
			e.preventDefault();
		}
		$("#valLat").val(e.latlng.lat);
		$("#valLong").val(e.latlng.lng);
		
		//var mark = L.marker([e.latlng.lat,e.latlng.lng],{title:"point",alt:"point",draggable:false}).addTo(map);
		
		var pop = L.popup();		
						
		var dist = e.latlng.distanceTo([question[phase].latitude,question[phase].longitude]);  //sert à calculer la distance entre 2 points (clique et celui de la réponse)
		
		if(exoFini!=true)
		{
			if(essai==1)	//si il ne reste plus que un seul essai au joueur
			{
						
				attrib_pts(); //attribue les points à chaque click (fonction défini en bas)
				
				miseAJour(); //met à jour les coordonnées de la réponse
				
				
			}
			else
			{	
				attrib_pts();	
			}
			
			function attrib_pts()	//fonction permettant d'ettribuer le score du joueur en fonction de la distance entre le click effectué et la réponse
			{
				if(dist<=cercle1.getRadius())	// si la distance calculée est un inferieur au rayon du cercle le plus petit
				{
					pop.setLatLng([e.latlng.lat,e.latlng.lng]).setContent("Bonne réponse, vous avez eu 10 points").openOn(map); //affiche au joueur le nombre de point obtenu
					point+=10;	
					miseAJour();	//met à jour les coordonnées de la réponse
				}
					
				else if(dist>cercle1.getRadius() && dist<=cercle2.getRadius())
				{
					pop.setLatLng([e.latlng.lat,e.latlng.lng]).setContent("Vous y étiez presque, vous avez eu 8 points").openOn(map);
					point+=8;
					miseAJour();
				}
				else if(dist>cercle2.getRadius() && dist<=cercle3.getRadius())
				{
					pop.setLatLng([e.latlng.lat,e.latlng.lng]).setContent("Pas mal, vous avez eu 6 points").openOn(map);
					point+=6;
					miseAJour();
				}
				else if(dist>cercle3.getRadius() && dist<=cercle4.getRadius())
				{
					pop.setLatLng([e.latlng.lat,e.latlng.lng]).setContent("Pas mal, vous avez eu 4 points").openOn(map);
					point+=4;
					miseAJour();
				}
				else if(dist>cercle4.getRadius() && dist<=cercle5.getRadius())
				{
					pop.setLatLng([e.latlng.lat,e.latlng.lng]).setContent("Pas mal, vous avez eu 2 points").openOn(map);
					point+=2;
					miseAJour();
				}
				else
				{
					pop.setLatLng([e.latlng.lat,e.latlng.lng]).setContent("vous êtes loin de la réponse").openOn(map);
					essai--;
				}
						
				$('#nombre_essai').text("Vous avez droit à "+essai+" essais");
		
			}
		}

	});
	
});