<?php require_once('classes.php'); ?>

<!DOCTYPE html>
<html><head> <meta name="description" content="My personal website. Enjoy!"/> <meta name="author" content="Lucas McLaughlin"/> <meta name="viewport" content="initial-scale=.75, maximum-scale=.75"/> <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'/> <link rel="stylesheet" href="css/main.css"/></head><body> <div class="wrapper"> <div class='main-container' id='main-container'> <div class="container top-container"></div><header> <nav class="navbar navbar-default navbar-fixed" role="navigation"> <div class="container"> <div class="navbar-header"> <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a href="#" class="navbar-brand"> <img src="http://heyimlucas.com/assets/images/LM-logo.svg" class="lm-logo" alt=""/> </a> </div><div id="top-nav" class="collapse navbar-collapse top-nav-container"> <ul class="nav navbar-nav navbar-right"> <?php $nav=new NavBar(); echo $nav->generateNav("top"); ?> </ul> </div></div></nav> </header>

            <?php
                // Render the requested page
                if (isset($_GET['p'])) {
                    $p = $_GET['p'];

                    switch($p) {
                        case 'home':
                            include_once('home.php');
                            break;
                        case 'projects':
                            include_once('projects.php');
                            break;
                        case 'art':
                            include_once('art.php');
                            break;
                        case 'music':
                            include_once('music.php');
                            break;
                        case 'about':
                            include_once('about.php');
                            break;
                        default:
                            include_once('error.php');
                            break;
                    }
                } else {
                    include_once('home.php');
                }
            ?>
        </div><div class="bottom-container"></div><footer class="footer" id="footer"> <div class="container"> <div class="hidden-xs"> <div class="footer-nav-container"> <div class="nav navbar-footer"> <?php $nav=new NavBar(); echo $nav->generateNav("foot"); ?> </div></div></div><div class="con-res-links-div"> <div class="nav-container"> <a href="mailto:lgmclaughlin905@gmail.com" target="_blank" class="con-res-link-footer">Contact</a> <a href="assets/files/lucas-mclaughlin-resume.pdf" target="_blank" class="con-res-link-footer">Resume</a> </div></div><div class="social-icons"> <a class="social-icon-link" href="https://www.facebook.com/McLovin905" target="_blank"> <img class="fb-icon-inv"/> </a> <a class="social-icon-link" href="https://www.facebook.com/lucasmband" target="_blank"> <img class="fb-pages-icon-inv"/> </a> <a class="social-icon-link" href="https://www.youtube.com/user/DormRoomSerenade" target="_blank"> <img class="yt-icon-inv"/> </a> <a class="social-icon-link" href="https://www.linkedin.com/in/lucasmclaughlin" target="_blank"> <img class="li-icon-inv"/> </a> <a class="social-icon-link" href="https://github.com/lgmclaughlin" target="_blank"> <img class="gh-icon-inv"/> </a> </div><p class="content-p copyright-p"> &copy; 2015 Lucas McLaughlin. All Rights Reserved. </p></div></footer>
    
    <!-- GET SCRIPTS -->
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.3.min.js"></script><script type="text/javascript" src="http://heyimlucas.com/assets/javascripts/bootstrap/transition.js"></script><script type="text/javascript" src="http://heyimlucas.com/assets/javascripts/bootstrap/collapse.js"></script><script type="text/javascript" src="http://heyimlucas.com/assets/javascripts/bootstrap/modal.js"></script>

    <!-- Inline small scripts -->

    <!-- Main page script -->
    <script>
        $(document).ready(function(){$(window).scroll(function(){var e=12,c=new Image;c.src=$(document.body).css("background-image").replace("url","").replace("(","").replace(")","").replace('"',"").replace('"',""),$(document.body).css("background-position","50% "+-window.pageYOffset/e+"px")})});
    </script>

    <?php
        if (isset($_GET['p'])) {
            $p = $_GET['p'];

            switch($p) {
                case 'home':
                    echo '<script type="text/javascript" src="http://heyimlucas.com/assets/javascripts/home.min.js"></script>';
                    break;
                case 'projects':
                    echo '<script type="text/javascript" src="http://heyimlucas.com/assets/javascripts/projects.min.js"></script>';
                    break;
                case 'art':
                    echo '<script type="text/javascript" src="http://heyimlucas.com/assets/javascripts/art.min.js"></script>';
                    break;
                case 'music':
                    echo '<script>
                        $(document).ready(function(){$("#footer").css("visibility","visible"),$(".music-video").bind("error",function(){window.location.reload()})});
                    </script>';
                    break;
                case 'about':
                    echo '<script>
                        $(document).ready(function(){$("#footer").css("visibility","visible")});
                    </script>';
                    break;
                default:
                    echo '<script>
                        $(document).ready(function(){$("#footer").css("visibility","visible")});
                    </script>';
                    break;
            }
        }
    ?>
</body>
</html>