/**
 * Set up the page display depending on the clicked button, past
 * or current.
 *
 * @param clickedBtn The element that was clicked, should be
 *                  actual object
 */
function setUpContent(clickedBtn) {
	if (clickedBtn.is($('#past-btn'))) {
		// Get the button that was not clicked
		var otherBtn = $('#current-btn');
		// Get the div corresponding to the clicked button
		var clickedDiv = $('#past-prj-div');
		// Get the other div corresponding to the unclicked button
		var otherDiv = $('#current-prj-div');
	} else {
		// Reverse all the values
		var otherBtn = $('#past-btn');
		var clickedDiv = $('#current-prj-div');
		var otherDiv = $('#past-prj-div');
	}
	
	if (clickedBtn.hasClass('active')) {
		// If the button was already active, disable it
		clickedBtn.removeClass('active');
		// Update the button div to the correct class
		$('#past-current-btns').removeClass('btns-active').addClass('btns-inactive');
		// Unhide the GitHub link
		$('#git-hub-link').slideDown();
		// Hide the correct div, past or current
		clickedDiv.slideUp();
	} else {
		// Otherwise, always remove the active state
		// from the other element and add it to the new one

		// Check if there was already an active element
		var activeFlag = 0;
		if (otherBtn.hasClass('active')) {
			activeFlag = 1;
		}
		// Remove from unclicked button, add to clicked
		otherBtn.removeClass('active');
		clickedBtn.addClass('active');
		// Inform the div that one of the buttons is active
		$('#past-current-btns').removeClass('btns-inactive').addClass('btns-active');
		// Hide the GitHub link
		$('#git-hub-link').slideUp();
		if (activeFlag) {
			// Fade out open div and fade in clicked
			otherDiv.fadeOut(300);
			clickedDiv.fadeIn(300);
		} else {
			// Display the correct div, past or current
			clickedDiv.slideDown();
		}
	}
}

$(document).ready(function() {
	/**
	 * Implement parallax scrolling
	 */
	$(window).scroll(function() {
        var speed = 8;
        var img = new Image;
        img.src = $(document.body).css('background-image').replace('url', '').replace('(', '').replace(')', '').replace('"', '').replace('"', '');
        $(document.body).css('background-position', "50% " + (-window.pageYOffset / speed) + "px");
    });

	$('#past-btn').click(function() {
		setUpContent($(this));
	});

	$('#current-btn').click(function() {
		setUpContent($(this));
	});
});


