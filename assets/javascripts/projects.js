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
		var clickedDiv = $('#past-div');
		// Get the other div corresponding to the unclicked button
		var otherDiv = $('#current-div');
	} else {
		// Reverse all the values
		var otherBtn = $('#past-btn');
		var clickedDiv = $('#current-div');
		var otherDiv = $('#past-div');
	}
	
	if (clickedBtn.hasClass('active')) {
		// If the button was already active, disable it
		clickedBtn.removeClass('active');
		// Update the button div to the correct class
		$('#past-current-btns').removeClass('btns-active').addClass('btns-inactive');
		// Unhid the GitHub link
		$('#git-hub-link').slideDown();
	} else {
		// Otherwise, always remove the active state
		// from the other element and add it to the new one
		otherBtn.removeClass('active');
		clickedBtn.addClass('active');
		// Inform the div that one of the buttons is active
		$('#past-current-btns').removeClass('btns-inactive').addClass('btns-active');
		// Hide the GitHub link
		$('#git-hub-link').slideUp();
	}
}

$(document).ready(function() {
	$('#past-btn').click(function() {
		setUpContent($(this));
	});

	$('#current-btn').click(function() {
		setUpContent($(this));
	});
});


