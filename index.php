<?php require_once('navbar.php'); ?>

<DOCTYPE! html>
<head>
	<meta name="description" content="My personal website. Enjoy!"/>
	<meta name="author" content="Lucas McLaughlin"/>
	<meta charset="UTF-8"/>

	<link rel="stylesheet" href="css/main.css">
</head>

<body>

	<!-- Top container div for whitespace -->
	<div class="container top-container">
	</div>

	<!-- Main container div -->
	<div class="container">
		<!-- Nav bar -->
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="navbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand">
						<img src="assets/images/sig.png" alt="Lucas McLaughlin logo" class="brand"/>
					</a>
				</div> <!-- Close navbar-header -->
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
	</div>
</body>