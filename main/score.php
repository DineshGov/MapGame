<?php
$page_name='score.php';
require('header.php');
require('../database_auth.php');

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
					<a href="menu_principal.php"><p class="text-danger" style="font-size: 150%; font-weight: bold">Retour au menu principal</p></a>
				</div>
			</div>
		</div>
	';

?>