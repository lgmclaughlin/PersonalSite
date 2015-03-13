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
		$html = '';
		foreach($navbar as $link) {
			$html .= "<li class='{$link['class']}'><a href='{$link['url']}'>{$link['text']}</a>\n";
		}

		return $html;
	}
}

?>