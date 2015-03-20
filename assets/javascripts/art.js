$(document).ready(function() {
	/**
	 * Implement parallax scrolling
	 */
	$('#art-page-div').slideDown(200);

	/**
	 * Select all modals and add modal functionality
	 */
	$('div[id^="modal"]').click(function () {
		$(this).toggleClass("modal-active");
		$("body").toggleClass("blur");
	});
});
