<?php
$page_name='score.php';
require('header.php');
require('../database_auth.php');
?>

    <div>
        <a href="menu_principal.php" class='return_links'>
            <span class="glyphicon glyphicon-step-backward"></span>
            Retour au menu principal
        </a>
    </div>

<?php
 if(!isset($_SESSION['login']))
 {
	echo '<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2">';
		echo "seul les membres inscrits peuvent voir leurs score<br><br>";
		echo '<a href="menu_principal.php"><p class="text-danger" style="font-size: 150%; font-weight: bold">Retour au menu principal</p></a>';
	echo '</div>';
	exit;
 }

$req = $bd->prepare('select * from score where login=:l');
$req->bindvalue(':l',$_SESSION['login']);
$req->execute();

$i=0;

echo '	<br><br>
		<div class="container">
			<div class="row">
				<div class="col-lg-offset-2 col-lg-8 col-lg-offset-2">
					<table class="table table-bordered table-hover">
						<tr><th>Nom </th><th>Nom du questionnaire </th><th>Score </th><th>Date</th></tr>';
						
						while($tab = $req->fetch(PDO::FETCH_ASSOC))
						{
							echo "<tr><td>".$tab['login']."</td><td>".$tab['nomQuestionnaire']."</td><td>".$tab['score']."</td><td>".$tab['date_partie']."</td></tr>";
							$i++;
						}

echo				'</table>
					<br><br>
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