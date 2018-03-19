<html>
<head>
	<title>test</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
	<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>

	<link rel="stylesheet" href="test.css" />
</head>
<body>

<?php 
require('database_auth.php');
echo "<pre>";
print_r($_POST);
echo "</pre>";
?>

	<div id="maDiv" class="col-lg-8" ></div>
	<script>
	var map = L.map('maDiv',
	{
	center: [48.858376, 2.294442],
	zoom: 18
	});
	L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(map); 

	var polygone = L.polygon([[48.88044, 2.35533],[48.83997, 2.31921],[48.84232,
2.36563]], {color: 'red',weight:6,fillColor:'blue',fillOpacity:0.5})
.addTo(map);
polygone.on('click', function(){ alert("test"); });
	</script>
<span>
<?php

	if(isset($_POST['inputLogin']) || isset($_POST['inputPassword']) || trim($_POST['inputLogin']) != "" || trim($_POST['inputPassword']) != ""){
		$req=$bd->prepare('select count(*) as resultat from Users where login=:log and password=:pas');
		$req->bindvalue(':log', $_POST['inputLogin']);
		$req->bindvalue(':pas', $_POST['inputPassword']);
		$req->execute();
		$tab = $req->fetch(PDO::FETCH_ASSOC);
			if($tab['resultat']==1){ //Si le login et le password ont été trouvé dans la bdd alors connexion.
				echo '<p>Authentifié</p>';
			}
			else{
				echo '<p>Echec lors de l\'authentification, login ou mot de pass erroné.</p>';
			}
	}
?>
</span>

</body>
</html>