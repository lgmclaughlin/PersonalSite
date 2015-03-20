<div class="outer-content-div" id="art-page-div">
	<h1 class="content-main-title">Art</h1>
	<div class="inner-content-div">
		<p class="content-p">
			Drawing and art has been a hobby of mine for my entire life.
			I love the attention to detail it requires and the feeling of 
			creating something others can enjoy. Ever so often, I sit down
			for hours on end and get lost in a new sketch.<br /><br />Below,
			I've included pictures of some of my favorites sketches I've 
			done over the years. While I certainly don't claim to be an
			expert, I still love sharing my work with others in hopes that
			someone can enjoy it!
		</p>
	</div>
	<?php
		$art = new Art();
		echo $art->generateArt();
	?>
</div>