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

/**
 * Class for rendering the projects on the Projects page
 *
 * This class takes care of displaying the HTML for all
 * content of each project div on the Projects page.
 */
class Projects {
	/**
	 * This array houses the Past projects on the Projects page.
	 * By changing information and such here, the changes will
	 * be reflected on the Projects page.
	 */
	private $pastProjects = array(
		'sdn' => array('title'       => 'Fully Functional Software Defined Network',
					   'link'        => 'https://github.com/lgmclaughlin/SoftwareDefinedNetwork',
					   'link-text'   => 'GitHub repository',
					   'description' => 'This project implements a Software Defined Network. 
										An SDN effectively allows a Controller to sit on a network 
										and give Hosts commands to modify routes, firewall rules, 
										NAT settings, network discovery caches, etc. while the 
										network is still operating. The ability to change the network 
										on the fly is extremely practical, and is commonly used in LANs, 
										WANs, and Data Centers.<br /><br />The project was completed on 
										December 12, 2014 by myself and my project partner, Batyrlan 
										Nurbekov. We chose to use object-oriented design techniques with 
										C++ in order to keep things organized.<br /><br />We tested the 
										system on a network of 6 VMs all running Ubuntu Linux. These VMs 
										included a DNS Server (using BIND 9), a Controller, and four 
										Hosts.<br /><br />From designing the protocol to
										implementing the code, the SDN project is certainly the most challenging
										on which I\'ve worked, and the experience I gained from it in 
										regards to networking was invaluable.'
					   ),
		'chl' => array('title'       => 'The Community Healthlink Website',
					   'link'        => 'http://communityhealthlink.org',
					   'link-text'   => 'Community Healthlink website',
					   'description' => 'During freshman and sophomore year of college, I volunteered as webmaster for 
										a company called Community Healthlink, or CHL. At the time I came in,
										CHL was about two months away from releasing a completely new website, and
										they needed massive amounts of help to get it ready for public viewing.
										<br /><br />The site was built with the Joomla CMS, and because I was just 
										beginning to develop for the web, it was a great way to get my feet wet.
										I was charged with creating content for a number of new pages 
										and analyzing the site structure to ensure it was up to snuff.
										I\'m very proud to say that I was able to pick up Joomla quickly enough to get
										everything added and prepared in time for the site\'s release.<br /><br />
										Following the release, I continued to add to and maintain CHL\'s website.
										Over the two years that I spent doing so, I gained considerable experience 
										in creating sites with CMSs. In order to fix some issues with the underlying
										theme chose by CHL, I even dug into and modified the Joomla template HTML and code.
										<br /><br />There have certainly been slight changes to the site since I left,
										but almost all of them were created while I was there. Looking back, there are
										many things I would have changed; however, I see this as a sign
										of improvement in my knowledge of web design.'
					   	),
		'dyn' => array('title'       => 'Dyn Hackedemy: The Moore Center iOS App',
					   'link'        => 'https://github.com/Hackademy2014/moore',
					   'link-text'   => 'GitHub repository',
					   'description' => 'At the beginning of the summer after my sophomore year in college, I 
					   					was fortunate enough to participage in an event called Dyn Hackedemy 2014.
					   					It was a four-day hackathon with the end goal of creating apps for six differnet 
					   					nonprofits. Myself and nineteen other students from schools in the New England
					   					area were split into teams of four and assigned a company, each with different
					   					unique ideas for an application.<br /><br />My group was given 
					   					<a href="http://moorecenter.org/" target="_blank" class="content-link">The Moore Center</a> which offers numerous
					   					benefits including residential services, family support, etc. Being in New England
					   					where weather issues are common, they wanted an app that would allow them
					   					to notify their clients about any cancellations of their services.<br /><br />
					   					Because many of the participants were unexperienced in iOS development, we spent
					   					the first two days of the event in an XCode crash course. We also had a chance 
					   					to meet with staff from the Moore Center to hear their needs.<br /><br />The third
					   					day was purely coding. Our team got together at 8AM to begin the 
					   					project. Our idea was to have an app with an RSS feed showing cancellations. The
					   					information for this would be sent out by a web application housing the cancellations
					   					in a database and allowing an administrator to send out new notifications at any time.
					   					We also used automated messaging services to send a text and email to anyone who signed
					   					up for the updates. To accomplish all this, we split up the work among the four of us,
					   					one member working on getting push notification working, one on the database and web
					   					application, one on the automated messaging services, and one on the app itself. I worked
					   					on the app designing the interface and figuring out how to make it talk to the database,
					   					parse information, and display current and past updates.<br /><br />We continued work 
					   					until 10AM the fourth day. We had an exceptional app and were very pleased with the
					   					outcome.<br /><br />To finish the event, each team gave a presentation of their
					   					application. Our exhibition went very well, and we even had multiple audience
					   					members volunteer to try our service including the company COO. Overall, the
					   					experience was incredible, unforgettable, and introduced me to application
					   					development in the best way. To learn more about Dyn Hackademy 2014, view
					   					their <a href="http://dyn.com/blog/students-gain-first-hand-tech-experience-at-dyns-hackademy-weekend/"
					   					target="_blank" class="content-link">Blog Article</a> on the subject.' 
						)
	);

	/**
	 * Generates the past projects content for the Projects page
	 * based on projects array. Loops through the array and renders 
	 * project in HTML.
	 *
	 * @return The HTML for the past project content is returned
	 */
	public function generatePast() {
		// Get the nav and class
		$pastProjects = $this->pastProjects;

		// Loop through each item and create the HTML of the content
		$html = "";
		foreach($pastProjects as $project) {
			$html .= "<div class='inner-content-div'>\n";
			$html .= "	<h3 class='content-title'>{$project['title']}</h3>\n";
			$html .= "	<h4 class='content-link-align'><a href='{$project['link']}' class='content-link' target='_blank'>{$project['link-text']}</a></h4>\n";
			$html .= "	<p class='content-p'>{$project['description']}</p>\n";
			$html .= "</div>\n";
		}

		return $html;
	}
}

?>