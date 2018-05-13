<?php
    $page_name="correction.php";
    require ('header.php');
    require('../database_auth.php');
?>

	<div id="table-container">
			<table border="1">
	    	  
				<tr>
					<th  id="ligne1"> nomQuestionnaire </th>
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
								<button type="button" class="btn btn-danger btn-md">
	          						<span class="glyphicon glyphicon-arrow-left"></span>
	          						Prec.
	        					</button>
	        				</div>
						</div>
						<div id="image_container" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">

						</div>

						<div id="description_container" class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
							<p class="well"> test </p>
						</div>

						<div id="btn_right_container" class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
							<div id="div_btn_right">
								<button type="button" class="btn btn-danger btn-md">
	          						Suiv.
	          						<span class="glyphicon glyphicon-arrow-right"></span>
	        					</button>
	        				</div>
						</div>
					</td>
				</tr>
			  
			 

	    	</table>
	    </div>
</body>
</html>

			<!--<tr id="ligne1">
				<?php //echo "<th>" . $_POST['nomQuestionnaire'] . "</th>";?>
			</tr>
			<tr id="ligne2">
				<td>
					<div id="carte" class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
					</div>
				</td>
			</tr>
			<tr id="ligne3">
			</tr>-->