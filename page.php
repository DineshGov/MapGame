<?php

class page
{
	private $page_name;
	
	public function __construct($val)
	{
		$this->page_name=$val;
	}
	
	public function navbar()
	{
		echo '
		<nav class="navbar navbar-inverse navbar-static-top">
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="#" id="game_name_link">Se7en</a>
			</div>
		
		
		 <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a id="about_link">About</a></li>
            <script type="text/javascript"> 
              $(\'#about_link\').on(\'click\', function(){
                alert(\'Informations sur les développeurs blabla\');
              })
            </script>
          </ul>
		
		
		
		<ul class="nav navbar-nav navbar-right">';
            	if ($this->page_name == "inscription.php")
            		echo '<li><a href="connexion.php"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>';
            	else if ($this->page_name == "connexion.php")
            		echo '<li><a href="inscription.php"><span class="glyphicon glyphicon-log-in"></span> Inscription</a></li>';
         
		echo '<li><a href="#"><span class="glyphicon glyphicon-user "></span> Invité</a></li>
         </ul>
        </div>
		</div>
		</nav>		
		';
	}
	
	
	
	public static function attributes(array $attributes = null) {
        
        $output = '';
		if (is_array($attributes))
		{
			foreach ($attributes as $name => $val) {
					$output .= ' ' . $name . '="' . $val . '"';
			}
		}
        
        return $output;
    }

	
	public static function start_tag($tagname, array $attributes = null) {
        return '<' . $tagname . self::attributes($attributes) . '>';
    }
	
	public static function end_tag($tagname) {
        return '</' . $tagname . '>';
    }
	
	public static function tag($tagname, $contents, array $attributes = null) {
        return self::start_tag($tagname, $attributes) . $contents . self::end_tag($tagname);
    }
}


?>