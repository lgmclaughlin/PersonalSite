<?php require_once('navbar.php'); ?>

<DOCTYPE! html>
<head>
	<meta name="description" content="My personal website. Enjoy!"/>
	<meta name="author" content="Lucas McLaughlin"/>
	<meta charset="UTF-8"/>

	<link rel="stylesheet" href="css/main.css">
</head>

<body>
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

	

	<div class="container">
		

		<!-- Welcome title -->
		<h1>Welcome!</h1>

		<!-- Page description -->

		<!-- Three boxes with pictures and text, link to pages -->

	</div>
</body>