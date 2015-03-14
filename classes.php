<?php

class NavBar {
	private $class = 'navbar navbar-default';
	private $navbar = array(
		'home'     => array('text' => 'Home',     'url' => '?p=home',     'class' => null),
		'projects' => array('text' => 'Projects', 'url' => '?p=projects', 'class' => null),
		'art'      => array('text' => 'Art',      'url' => '?p=art',      'class' => null),
		'music'    => array('text' => 'Music',    'url' => '?p=music',    'class' => null),
		'about'    => array('text' => 'About',    'url' => '?p=about',    'class' => null)
	);

	private function getActive($navbar) {
		// Set the current link to be active
		if (isset($_GET['p']) && isset($navbar[$_GET['p']])) {
			$navbar[$_GET['p']]['class'] = 'active';
		}

		return $navbar;
	}

	public function generateNav() {
		// Get the nav and class
		$navbar = $this->navbar;
		$class = $this->class;

		// Get the active link, if any
		$navbar = $this->getActive($navbar);

		// Loop through each item and create the HTML of the Nav
		$html = "";
		foreach($navbar as $link) {
			$html .= "<li class='{$link['class']}'><a href='{$link['url']}'>{$link['text']}</a>\n";
		}

		return $html;
	}
}

class InfoColumns {
	private $class = 'info-column';
	private $infoColumns = array(
		'col1' => array('title' => 'Me',       
						'url' => '?p=about',    
						'image' => 'me.png',     
						'alt' => 'Pictures, Lucas McLaughlin.',
						'description' => 'To learn a bit more about me, visit the About page. This includes my resume and a more in depth description of my passions and background.'),
		'col2' => array('title' => 'Projects', 
						'url' => '?p=projects', 
						'image' => 'coding.png', 
						'alt' => 'Stock coding photo.',
						'description' => 'To learn a bit more about my current school and side projects, visit the Projects page.'),
		'col3' => array('title' => 'Music',    
						'url' => '?p=music',    
						'image' => 'music.png', 
						'alt' => 'Stock photo of a guitar, close up.',
						'description' => 'While I pride myself on my computer related project work, I also have a love music, and have recorded multiple songs and videos showcasing this.')
	);

	public function generateColumns() {
		// Get the columns
		$infoColumns = $this->infoColumns;

		// Loop through each column and create the HTML of the Info Columns
		$html = "";
		foreach($infoColumns as $col) {
			$html .= "<div class='info-column'>\n";
			$html .= "	<div class='info-column-content'>\n";
			$html .= "		<h3>{$col['title']}</h2>\n";
			$html .= "		<div>\n";
			$html .= "			<img src='assets/images/{$col['image']}' alt='{$col['alt']} class='image'>\n";
			$html .= "		</div>\n";
			$html .= "		<p>{$col['description']}</p>\n";
			$html .= "	</div>\n";
			$html .= "</div>\n";
		}

		return $html;
	}
}

?>