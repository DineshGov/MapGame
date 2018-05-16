<?php
$page_name='score.php';
require('header.php');
require('../database_auth.php');
?>


<?php
 if(!isset($_SESSION['login']))
 {
	echo '<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2">';
		echo "seul les membres inscrits peuvent voir leurs score<br><br>";
		echo '<a href="menu_principal.php"><p class="text-danger" style="font-size: 150%; font-weight: bold">Retour au menu principal</p></a>';
	echo '</div>';
	exit;
 }
 
$req = $bd->prepare('select nomQuestionnaire,max(score) as record from score where login=:l group by nomQuestionnaire');
$req->bindvalue(':l',$_SESSION['login']);
$req->execute();
 
$req2 = $bd->prepare('select * from score where login=:l order by date_partie desc');
$req2->bindvalue(':l',$_SESSION['login']);
$req2->execute();

$i=0;

echo '	<br><br>
		<div class="container">
			<div class="row">
				<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2">
				
					
					<h2 class="text-info">Records personnels <span class="glyphicon glyphicon-king"></span></h2>
					<br>
					<table class="table table-bordered table-hover">
						<tr id="table_header"><th>Nom du questionnaire</th><th>Score</th></tr>';
						
						while($tab = $req->fetch(PDO::FETCH_ASSOC))
						{
							echo "<tr><td>".$tab['nomQuestionnaire']."</td><td>".$tab['record']."</td></tr>";
							$i++;
						}

echo				'</table>
					
				</div>
				
			</div>
		</div>
	';

echo '	<br><br>
		<div class="container">
			<div class="row">
				<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2">
				
					<h2 class="text-info">Score <span class="glyphicon glyphicon-education"></span></h2>
					<br>
				
					<table id="table_content" class="table table-bordered table-hover">
						<tr id="table_header"><th>Nom</th><th>Nom du questionnaire <span class="main_row glyphicon glyphicon-arrow-down" title="trier par nom (questionnaire)"></span></th><th>Score <span class="main_row glyphicon glyphicon-arrow-down" title="trier par score"></span></th><th>Date <span class="main_row glyphicon glyphicon-arrow-down" title="trier par date"></span></th></tr>';
						
						while($tab = $req2->fetch(PDO::FETCH_ASSOC))
						{
							echo "<tr class='content'><td>".$tab['login']."</td><td>".$tab['nomQuestionnaire']."</td><td>".$tab['score']."</td><td>".$tab['date_partie']."</td></tr>";
							$i++;
						}

echo				'</table>
					
				</div>
				
			</div>
		</div>
	';

?>

    <div>
        <a href="menu_principal.php" class='return_links'>
            <span class="glyphicon glyphicon-step-backward"></span>
            Retour au menu principal
        </a>
    </div>
</body>
</html>