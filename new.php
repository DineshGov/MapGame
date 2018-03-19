<?php

require('page.php');
$page=new page("connexion.php");
require('database_auth.php');


echo page::start_tag("head");

	echo page::tag('meta','',array('charset'=>'utf-8'));
	echo page::tag('meta','',array('http-equiv'=>'X-UA-Compatible','content'=>'IE=edge'));
	echo page::tag('meta','',array('content'=>'width=device-width, initial-scale=1'));
	echo page::tag('meta','',array('name'=>'description','content'=>''));
	echo page::tag('meta','',array('name'=>'author','content'=>''));

	echo page::tag("link",'',array('rel'=>'icon','href'=>'bootstrap/favicon_Se7en.ico'));
    echo page::tag("title","Se7en");
	
	echo page::tag("script",'',array('src'=>'js/jquery-3.3.1.js'));
	echo page::tag("link",'',array('href'=>'bootstrap/css/bootstrap.min.css','rel'=>'stylesheet'));
	echo page::tag("link",'',array('href'=>'bootstrap/css/ie10-viewport-bug-workaround.css','rel'=>'stylesheet'));
	echo page::tag("link",'',array('href'=>'authentification.css','rel'=>'stylesheet'));
	echo page::tag("script",'',array('src'=>'bootstrap/js/ie-emulation-modes-warning.js'));
	echo page::tag("script",'',array('src'=>'connexion.js'));



echo page::end_tag("head");

echo $page->navbar();

?>

<div class="container">

      <form class="form-signin" action="test.php" method="post">
        <h2 class="form-signin-heading">Connexion</h2>
        
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input type="text" name="inputLogin" id="inputLogin" class="form-control" placeholder="Nom d'utilisateur" maxlength="20" minlength="4" required autofocus>
        </div>

        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input type="password" name="inputPassword" id="inputPassword" maxlength="100" minlength="6" class="form-control" placeholder="Mot de passe">
        </div>

        <button class="btn btn-lg btn-danger btn-block auth_form_submitter" id="buttonConnexion" type="submit">Connexion</button>
		<br><span style="color: red; display: none;" id="loginError">Le nom d'utilisateur et le mot de passe n'éxistent pas</span>
      </form>

    </div>
