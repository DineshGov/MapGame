<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="favicon.ico">

		<title>Starter Template for Bootstrap</title>
		
		<!-- Bootstrap core CSS -->
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="../bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

		
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />

		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script src="../../assets/js/ie-emulation-modes-warning.js"></script>
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
	</head>
	
	
	
	<body>
			<nav class="navbar navbar-inverse navbar-fixed-top">		
				<div class="nav-header">
					<a class="navbar-brand" href="#">Leaflet</a>
				</div>
				
				<ul class="nav navbar-nav">
					<li><a href="#">Home</a></li>
					 <li>
						<a style="color: red" href="#" data-toggle="dropdown">Options</a>
						<ul class="dropdown-menu" role="menu">
							<li>choix 1</li>
							<li>choix 2</li>
						</ul>
					 </li>
				</ul>
				
				<div>
					<ul class="nav navbar-nav pull-right">
						<li>
							<form class="navbar-form navbar-right">
								<input type="text" class="form-control"/>
								<button class="btn btn-default"type="submit">rechercher</button>
							</form>
						</li>
					</ul>
				</div>			
			</nav>
	<br><br><br>
	
	
	
		
		
	<div class="container">	
		<div class="row">
			<div style="text-align: center"><p id="question"></p></div><br>
			<div id="carte" style="width: 800px; height: 600px; margin-left: auto; margin-right: auto;"></div>	
			<div class="col-lg-9"> <br><br><p id="test"></p></div>
			<div class="col-lg-9"><p id="points"></p><p id="total"></p></div>
			<br><br>
		</div>
			<div  style="margin-left: 100px;">
				<form>
					<p> Latitude : <input id="valLat" type="text" class="form-control" placeholder="latitude"/></p>
					<p> Longitude : <input id="valLong" type="text" class="form-control" placeholder="longitude"/></p>
				</form>
			</div>
	</div>
	
	
	</body>
	
	 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="js/jeuLeaflet.js" type="text/javascript"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../bootstrap/js/ie10-viewport-bug-workaround.js"></script>
	
</html>