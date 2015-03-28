<?php require_once('classes.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta name="description" content="My personal website. Enjoy!"/>
    <meta name="author" content="Lucas McLaughlin"/>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1" />

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/main.css" />
    <script type="text/javascript" src="assets/javascripts/jquery-2-1-3.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class='main-container' id='main-container'> <!-- gets closed in the generated php below -->
            <!-- Top container div for whitespace -->
            <div class="container top-container"></div>

            <!-- Nav Container -->
            <div class="nav-container">
                <!-- Nav bar -->
                <nav class="navbar navbar-default">
                    <ul class="nav navbar-nav">
                        <?php 
                            $nav = new NavBar();
                            echo $nav->generateNav();
                        ?>
                    </ul>
                </nav>
            </div>

            <?php
                // Render the requested page
                if (isset($_GET['p'])) {
                    $p = $_GET['p'];

                    switch($p) {
                        case 'home':
                            include_once('home.php');
                            break;
                        case 'projects':
                            echo '<script type="text/javascript" src="assets/javascripts/projects.js"></script>';
                            include_once('projects.php');
                            break;
                        case 'art':
                            echo '<script type="text/javascript" src="assets/javascripts/art.js"></script>';
                            include_once('art.php');
                            break;
                        case 'music':
                            echo '<script type="text/javascript" src="assets/javascripts/music.js"></script>';
                            include_once('music.php');
                            break;
                        case 'about':
                            echo '<script type="text/javascript" src="assets/javascripts/about.js"></script>';
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

        <!-- Bottom container div for whitespace between content and footer -->
        <div class="bottom-container"></div>
        
        <!-- This footer will only be unhidden for pages that need it -->
        <div class="footer" id="footer">
            <div class="nav-container">
                <div class="nav navbar-footer">
                    <?php 
                        $nav = new NavBar();
                        echo $nav->generateNav();
                    ?>
                </div>
            </div>
            <div class="social-icons">
                <a href="https://www.facebook.com/McLovin905" target="_blank">
                    <img class="fb-icon-inv" />
                </a>
                <a href="https://www.facebook.com/lucasmband" target="_blank">
                    <img class="fb-pages-icon-inv" />
                </a>
                <a href="https://www.youtube.com/user/DormRoomSerenade" target="_blank">
                    <img class="yt-icon-inv" />
                </a>
                <a href="https://www.linkedin.com/in/lucasmclaughlin" target="_blank">
                    <img class="li-icon-inv" />
                </a>
                <a href="https://github.com/lgmclaughlin" target="_blank">
                    <img class="gh-icon-inv" />
                </a>
            </div>
        </div>
    </div>
</body>
</html>