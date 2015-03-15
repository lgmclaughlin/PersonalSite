<?php

class NavBar {
	private $navbar = array(
		'home'     => array('text' => 'Home',     'url' => '?p=home',     'class' => 'navbar-link'),
		'projects' => array('text' => 'Projects', 'url' => '?p=projects', 'class' => 'navbar-link'),
		'art'      => array('text' => 'Art',      'url' => '?p=art',      'class' => 'navbar-link'),
		'music'    => array('text' => 'Music',    'url' => '?p=music',    'class' => 'navbar-link'),
		'about'    => array('text' => 'About',    'url' => '?p=about',    'class' => 'navbar-link')
	);

	private function getActive($navbar) {
		// Set the current link to be active
		if (isset($_GET['p']) && isset($navbar[$_GET['p']])) {
			$navbar[$_GET['p']]['class'] .= ' active';
		}

		return $navbar;
	}

	public function generateNav() {
		// Get the nav and class
		$navbar = $this->navbar;

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

?>