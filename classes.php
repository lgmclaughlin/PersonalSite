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
                       'image'       => 'assets/images/sdn.jpg',
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
        'bt9' => array('title'       => 'Bit9: Certificate Tree GUI Web Application',
                       'link'        => 'https://www.bit9.com/',
                       'link-text'   => 'Bit9\'s Homepage',
                       'image'       => null,
                       'description' => 'Last summer (2014), I was fortunate enough to get a position as
                                        an intern at Bit9 as part of the server team. Bit9 provides advanced
                                        attack protection software to a large number of profile companies.
                                        What makes their software so unique is it\'s ability to detect threats
                                        at the kernel level which allows prevention of not only previously
                                        seen attacks, but also even
                                        <a href="https://blog.bit9.com/2014/03/31/zero-day-mitigation-how-bit9-blocks-the-latest-microsoft-word-vulnerability/"
                                        class="content-link" target="_blank">zero-days.</a><br /><br />
                                        I began my time at Bit9 working to improve the server team\'s test
                                        suite for certificate states. The Bit9 console recognizes previously
                                        seen certifcates and can either validate or invalidate them by assigning
                                        states (Banned, Approved, or Unapproved). Additionally, a network 
                                        administrator with access to the Bit9 console can assign states to
                                        certificate publishers as he or she sees fit to prevent executables
                                        signed by said publisher from running on any network machines. What
                                        results are trees of certificates, each with their own, state, publisher, 
                                        signature algorithm, etc., that sign one another.<br /><br />
                                        I was tasked with testing that certificate states in these trees were
                                        determined correctly taking into account all the certificates at
                                        higher levels. For instance, if a certificate signed by Verisign
                                        that was Banned had signed a number of certificates, any certificate
                                        further down the tree published by Verisign should be Banned as well.
                                        To test this, I used mainly SQL stored procedures, documenting thoroughly
                                        to ensure my suite was exhaustive.<br /><br />Around two weeks into the
                                        internship, I had an idea. Because the state propagation was very complex 
                                        and confused many Bit9 cemployees, I believed a visual representation of 
                                        the trees would be a great tool. As such, I suggested the idea to my
                                        advisor, and with his approval I began mocking up wireframes for a web 
                                        app in my spare time.<br /><br />After finishing the SQL test suite,
                                        I began work on the GUI. I built the front end using HTML, jQuery, and CSS.
                                        To build the tree view, I used a jQuery plugin called jsTree.
                                        I also needed to build a backend since the application would be making
                                        calls to a database for certificate information retreival. This was built
                                        using PHP and fit into the existing Bit9 server framework.<br /><br />
                                        By the end of the summer, I had a working application and got the chance
                                        to present it in front of around twenty company employees, one of whom
                                        approached me about accessing the application in hopes of gaining a better
                                        understanding of how the software deals with certificates. Overall, my
                                        time at Bit9 was extremely enjoyable and beneficial to me as a developer.
                                        I\'ve since gone on to use the knowledge I gained there to create and
                                        contribute to a number of web sites (including this one), and I\'ll
                                        certainly never forget the experience.' 
                       ),
        'dyn' => array('title'       => 'Dyn Hackedemy: The Moore Center iOS App',
                       'link'        => 'https://github.com/Hackademy2014/moore',
                       'link-text'   => 'GitHub repository',
                       'image'       => 'assets/images/hackademy2014.jpg',
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
                       'image'       => 'assets/images/chl.jpg',
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
        'end' => array('title'       => 'Endicia: Templating for Administrative Pages',
                       'link'        => 'http://www.endicia.com/',
                       'link-text'   => 'Endicia\'s customer facing website',
                       'image'       => 'assets/images/mockup.jpg',
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
                       'image'       => 'assets/images/axiomatic.jpg',
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
     * projects in HTML.
     *
     * @return The HTML for the past project content is returned
     */
    public function generateProjects($time) {
        // Get projects array, prefix for ids/names,
        // and the page title
        if ($time == 'past') {
            $projects = $this->pastProjects;
            $prefix = 'past-prj';
            $pageTitle = 'Past Projects';
        } else if ($time == 'current') {
            $prefix = 'current-prj';
            $projects = $this->currentProjects;
            $pageTitle = 'Current Projects';
        } else {
            return 'Error retrieving projects.';
        }

        // Open the outermost div
        $html = "<div class='outer-content-div' id='{$prefix}-div'>\n";

        // Create the title and top anchor
        $html .= "  <div class='title-and-content-nav-div'>";
        $html .= "      <a name='{$prefix}-nav'></a>\n";
        $html .= "      <h1 class='content-main-title'>{$pageTitle}</h1>\n";
        
        // Create the project content nav bar
        $html .= "      <div class='btn-group-vertical content-nav'>\n";
        foreach($projects as $key => $project) {
            $html .= "          <button type='button' class='btn btn-default btn-nav' onclick=\"location.href ='#{$key}'\">{$project['title']}</button>\n";
        }
        $html .= "      </div>\n";

        // Close the title/nav div
        $html .= "  </div>\n";

        // Loop through each item and create the HTML of the content
        $html .= "  <div class='remaining-content-div' id='{$prefix}-div'>\n";
        foreach($projects as $key => $project) {
            $html .= "      <div class='inner-content-div'>\n";
            $html .= "          <a name='{$key}'></a>\n";
            $html .= "          <h3 class='content-sub-title'>{$project['title']}</h3>\n";
            $html .= "          <h4 class='content-link-align'><a href='{$project['link']}' class='content-link' target='_blank'>{$project['link-text']}</a></h4>\n";
            $html .= "          <div class='content-img-div'>\n";
            $html .= "              <img src='{$project['image']}' class='content-image' />\n";
            $html .= "          </div>\n";
            $html .= "          <p class='content-p'>{$project['description']}</p>\n";
            $html .= "          <div class='content-nav'>\n";
            $html .= "              <button type='button' class='btn btn-default btn-to-top' onclick=\"location.href = '#{$prefix}-nav'\">To Top</button>\n";
            $html .= "          </div>\n";
            $html .= "      </div>\n";
        }
        $html .= "  </div>\n";

        // Close the outermost div
        $html .= "</div>\n";

        return $html;
    }
}

/**
 * Class for rendering the pictures on the Art page
 *
 * This class takes care of creating the HTML for all
 * of the pictures on the Art page.
 */
class Art {
    // The page description placed under the title
    private $pageDesc = 'Sketching and drawing have been hobbies of mine for my entire life.
                I love the attention to detail it requires and the feeling of 
                creating something others can enjoy. Ever so often, I sit down
                for hours on end and get lost in a new sketch.<br /><br />Below,
                I\'ve included pictures of some of my favorites sketches I\'ve 
                done over the years. While I certainly don\'t claim to be an
                expert, I still love sharing my work with others in hopes that
                someone can enjoy it!';

    /**
     * This array houses information for the pictures
     * on the Art page.
     */
    private $art = array(
        'imagine' => array('title' => 'Everything You Can Imagine is Real',
                           'src'   => 'assets/images/imagine.jpg'
                          ),
        'agera'   => array('title' => 'Koenigsegg Agera',
                           'src'   => 'assets/images/agera.jpg'
                          ),
        'lambo'   => array('title' => 'Lamborghini Gallardo Superleggera',
                           'src'   => 'assets/images/lambo.jpg'
                          ),
        'jaguar'  => array('title' => 'Jaguar C-X16',
                           'src'   => 'assets/images/jaguar.jpg'
                          )
    );

    /**
     * Generates pictures of my drawings for the Art page
     * based on current art array. Loops through the array and renders 
     * art in HTML.
     *
     * @return The HTML for the current project content is returned
     */
    public function generateArt() {
        // Get the the art array, prefix for ids/names, 
        // the page title, and the page description
        $art = $this->art;
        $prefix = 'art-page';
        $pageTitle = 'Art';
        $pageDesc = $this->pageDesc;

        // Create the html with the title and page description
        $html = "<div class='outer-content-div' id='{$prefix}-div'>\n";
        $html .= "  <div class='title-and-content-nav-div'>\n";
        $html .= "      <a name='{$prefix}-nav'></a>\n";
        $html .= "      <h1 class='content-main-title'>{$pageTitle}</h1>\n";
        $html .= "      <div class='remaining-content-div'>\n";
        $html .= "          <p class='desc-p content-p'>{$pageDesc}</h1>\n";
        $html .= "      </div>\n";
        
        // Create the project content nav bar
        $html .= "      <div class='btn-group-vertical content-nav'>\n";
        foreach($art as $key => $sketch) {
            $html .= "          <button type='button' class='btn btn-default btn-nav' onclick=\"location.href ='#{$key}'\">{$sketch['title']}</button>\n";
        }
        $html .= "      </div>\n";

        // Close the title/nav div
        $html .= "  </div>\n";

        // Loop through each item and create the HTML of the content
        $html .= "  <div class='remaining-content-div' id='{$prefix}-div'>\n";
        $i = 0; // Loop counter
        foreach($art as $key => $sketch) {
            $html .= "      <div class='inner-content-div'>\n";
            $html .= "          <a name='{$key}'></a>\n";
            $html .= "          <h3 class='content-sub-title'>{$sketch['title']}</h3>\n";
            $html .= "          <div class='modal-image'>\n";
            $html .= "              <img src='{$sketch['src']}' class='art-sketch' id='modal{$i}' />\n";
            $html .= "          </div>\n";
            $html .= "          <div class='content-nav'>\n";
            $html .= "              <button type='button' class='btn btn-default btn-to-top' onclick=\"location.href = '#{$prefix}-nav'\">To Top</button>\n";
            $html .= "          </div>\n";
            $html .= "      </div>\n";
            $i++;   
        }
        $html .= "  </div>\n";

        // Close the outermost div
        $html .= "</div>\n";

        return $html;
    }
}

?>