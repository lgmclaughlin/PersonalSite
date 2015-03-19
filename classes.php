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
					   					experience was incredible, gave me a chance to learn XCode and Objective-C, 
					   					and introduced me to application development in the best way. To learn more 
					   					about Dyn Hackademy 2014, view their 
					   					<a href="http://dyn.com/blog/students-gain-first-hand-tech-experience-at-dyns-hackademy-weekend/"
					   					target="_blank" class="content-link">Blog Article</a> on the subject.' 
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
					   	)
	);
	
	/**
	 * This array houses the Present projects on the Projects page.
	 * By changing information and such here, the changes will
	 * be reflected on the Projects page.
	 */
	private $currentProjects = array(
		'sdn' => array('title'       => 'Endicia: Templating for Administrative Pages',
					   'link'        => 'http://www.endicia.com/',
					   'link-text'   => 'Endicia\'s customer facing website',
					   'description' => 'As a final project for graduation, Worcester Polytechnic Institute,
					   					where I attend college, requires that students complete something called
					   					the <a href="https://www.wpi.edu/academics/ugradstudies/mqp.html" target="_blank" class="content-link">
					   					Major Qualifying Project</a>, or MQP. It\'s meant to provide students
					   					with real world experience solving large problems within their field
					   					of study.<br /><br />For my MQP, I\'m lucky enough to have the opportunity
					   					to travel to California and work for Endicia, an electronic postage
					   					solutions company based in Palo Alto. They are in the process of recreating
					   					their administrative site which is heavily used by employees from every
					   					team in the company. This of course means the site is used for
					   					a myriad of purposes, such as maintaining customer accounts, applying discounts to
					   					orders, handling custom stamp and postage prints, etc.<br /><br />
					   					The issue with the current administrative site is that the organization
					   					and accesibility is rather atrocious. As such, Endicia would like the new
					   					site to be organized, have a beautiful UI, and increase efficiency as a result.
					   					<br /> <br />My MQP team, which includes myself and two project partners, is working
					   					on creating an extensive set of templates and libraries so that when
					   					developers are recreating the old pages on the new site, they don\'t have
					   					to worry about inconsistenly styled pages. Furthermore, we\'re analyzing the
					   					site structure to ensure it is intuitive to newcomers as much as it is
					   					quick and efficient for experts.<br /><br />The plan is to supply the devs
					   					with a collection of example pages and elements in a similar way to the
					   					<a href="http://getbootstrap.com/css/" class="content-link" target="_blank">
					   					Bootstrap</a> documentation. To accomplish this, we\'re using HTML,
					   					AngularJS, and Bootstrap with Sass.<br /><br />Because of the nature of the project,
					   					we won\'t be needing to design our own back end. However, there are some improvements
					   					we\'d like to make, such as adding a "Favorite Links" sections, that would 
					   					require us to modify the existing structure. In the case that we
					   					get the chance to do so, we\'ll be using ASP.NET with C# and MVC razor.'
					   ),
		'adw' => array('title'       => 'Axiomatic Design Website',
					   'link'        => 'http://axiomaticdesign.org/',
					   'link-text'   => 'Axiomatic Design home page',
					   'description' => 'Before I had left for California, I was approached by one of the
					   					mechanical engineering professors at WPI about recreating his website
					   					about Axiomatic Design (AD). Being a mechanical engineering concept, I had
					   					never heard of AD before, yet I was intrigued by the offer 
					   					and took on the project.<br /><br />What I soon found out is that the
					   					professor, who\'s name is Christopher Brown, is 
					   					<a href="http://www.wpi.edu/news/20123/icadconf.html" class="content-link" target="_blank">
					   					internationally known</a> for his work in mechanical engineering and has
					   					even served as a Conference Co-chair for the International Conference
					   					on Axiomatic Design (ICAD). Because of his passion for the subject, 
					   					Professor Brown wants the website to be an international hub for discovering
					   					and learning AD. He envisions pages for tutorial videos, a forum,
					   					research papers, etc.<br /><br />With all these goals, I\'ve been excited to 
					   					work on the site, and have gotten a good start thus far. In order to have it 
					   					able to be modified by someone without technical skills, I\'ve rebuilt the 
					   					site from scratch using Drupal. At the moment, there are
					   					hardly any pages; however, I plan to make some large additions in the near
					   					future since I\'ve come across a bit more free time as of late. I believe 
					   					with a little creativity and well-thought-out design, Professor Brown\'s 
					   					vision could become reality.'
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

	/**
	 * Generates the current projects content for the Projects page
	 * based on current projects array. Loops through the array and renders 
	 * project in HTML.
	 *
	 * @return The HTML for the current project content is returned
	 */
	public function generateCurrent() {
		// Get the nav and class
		$currentProjects = $this->currentProjects;

		// Loop through each item and create the HTML of the content
		$html = "";
		foreach($currentProjects as $project) {
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