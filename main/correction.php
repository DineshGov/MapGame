<?php
    $page_name="correction.php";
    require ('header.php');
    require('../database_auth.php');
?>
	<div id="champs_invisible">
		<?php
			echo '<input id="idQuestionnaire" type="hidden" value="' . (int)$_POST["idQuestionnaire"] . '">';
			echo '<input id="nomQuestionnaire" type="hidden" value="' . $_POST['nomQuestionnaire'] . '">';
		?>
	</div>


	<div id="table-container">
			<table border="1">
	    	  
				<tr>
					<th  id="ligne1"> 
					<?php
						echo $_POST['nomQuestionnaire'];
					?>
					</th>
				</tr>

				<tr>
					<td id="ligne2">
						<div id="carte">
						</div>
					</td>
				</tr>

				<tr>
					<td id="ligne3">

						<div id="btn_left_container" class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
							<div id="div_btn_left">
								<button id="btn_left" type="button" class="btn btn-danger btn-md">
	          						<span class="glyphicon glyphicon-arrow-left"></span>
	          						Prec.
	        					</button>
	        				</div>
						</div>

						<div id="image_container" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
							<img src="" alt="Image non disponible" id="image_question">
						</div>

						<div id="description_container" class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
							<pre id="nom_question_container"> 
							</pre>
							<p id="description_question_container" class="well">
							</p>
						</div>

						<div id="btn_right_container" class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
							<div id="div_btn_right">
								<button id="btn_right" type="button" class="btn btn-danger btn-md">
	          						Suiv.
	          						<span class="glyphicon glyphicon-arrow-right"></span>
	        					</button>
	        				</div>
						</div>

					</td>
				</tr>
	    	</table>

	    </div>

	    <script type="text/javascript">
	    	$('#btn_left').on('click', function(){ click_on_btn_left(question_affichee) });
	    	$('#btn_right').on('click', function(){ click_on_btn_right(question_affichee) });
	    </script>
</body>
</html>