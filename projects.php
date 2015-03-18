<div class="git-hub-link" id="git-hub-link">
	<a href="https://github.com/lgmclaughlin" target="_blank">
		<img class="git-hub-icon" src="assets/images/GH-icon.png" alt="GitHub icon, linked to my GitHub page." />
	</a>
	<p class="projects-page-description">Click the below buttons to see some descriptions of some of my past and current projects, or visit my <a href="https://github.com/lgmclaughlin" target="_blank">GitHub</a> profile to see my work in code.</p>
</div>
<div class="past-current-btns btns-inactive" id="past-current-btns">
	<div class="btn-group btn-group-justified" role="group">
		<div class="btn-group">
			<button type="button" class="btn btn-default past" id="past-btn">Past</button>
		</div>	
		<div class="btn-group">
			<button type="button" class="btn btn-default current" id="current-btn">Current</button>
		</div>
	</div>
</div>
<div class="outer-content-div" id="past-prj-div">
	<h1 class="project-category-title">Past Projects</h1>
	<?php
		$pastProjects = new Projects();
		echo $pastProjects->generatePast();
	?>
</div>
<div class="outer-content-div" id="current-prj-div">
	
</div>