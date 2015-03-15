<?php require_once('classes.php'); ?>

<DOCTYPE! html>
<head>
	<meta name="description" content="My personal website. Enjoy!"/>
	<meta name="author" content="Lucas McLaughlin"/>
	<meta charset="UTF-8"/>

	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/main.css" />
</head>

<body>

	<!-- Top container div for whitespace -->
	<div class="container top-container"></div>

	<!-- Nav Container -->
	<div class="nav-container">
		<!-- Nav bar -->
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="collapse navbar-collapse" id="navbar">
					<ul class="nav navbar-nav">
						<?php 
							$nav = new NavBar();
							echo $nav->generateNav();
						?>
					</ul>
				</div> <!-- Close navbar-collapse -->
			</div> <!-- Close container-fluid -->
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

	<!-- Bottom container div for whitespace -->
	<div class="bottom-container"></div>
</body>