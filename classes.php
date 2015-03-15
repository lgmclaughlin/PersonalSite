<?php
/**
 * This file contains the PHP classes utilized by the web page
 *
 * The whole point of these classes is to allow easy editing and  
 * instantiation of page elements that are common across pages or
 * have an HTML structure that repeats with different different 
 * content in each repetition.
 *
 * @author Lucas McLaughlin
 * /


/**
 * Class for rendering the navbar links dynamically
 *
 * This class takes care of displaying the HTML for the entire
 * navbar that sits on the top of every page. It also decides
 * which link is active depending on the current page and adds the
 * 'active' class name to it.
 */
class NavBar {
	/** 
	 * This array houses every link in the navbar. By changing
	 * links here, changes will be reflected in the navbar.
	 */
	private $navbar = array(
		'home'     => array('text' => 'Home',     'url' => '?p=home',     'class' => 'navbar-link'),
		'projects' => array('text' => 'Projects', 'url' => '?p=projects', 'class' => 'navbar-link'),
		'art'      => array('text' => 'Art',      'url' => '?p=art',      'class' => 'navbar-link'),
		'music'    => array('text' => 'Music',    'url' => '?p=music',    'class' => 'navbar-link'),
		'about'    => array('text' => 'About',    'url' => '?p=about',    'class' => 'navbar-link')
	);

	/**
	 * Gets the active link by checking for the 'p' Post value
	 * and setting the class value of the corresponding link in
	 * the navbar to 'active';
	 *
	 * @navbar This should be an array with the same format as
	 *         the above navbar array
	 *
	 * @return The function will either exit without doing anything
	 *         if no 'p' Post value is available or will assign
	 *         the link in 'p' a class of 'active'
	 */
	private function getActive($navbar) {
		// Set the current link to be active
		if (isset($_GET['p']) && isset($navbar[$_GET['p']])) {
			$navbar[$_GET['p']]['class'] .= ' active';
		}

		return $navbar;
	}

	/**
	 * Generates the page navbar based on the navbar array. Loops
	 * through the array and renders each link in HTML.
	 *
	 * @return The HTML for the navbar is returned
	 */
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