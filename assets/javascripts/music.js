$(document).ready(function() {
    /**
     * Implement parallax scrolling
     */
    $(window).scroll(function() {
        var speed = 12;
        var img = new Image;
        img.src = $(document.body).css('background-image').replace('url', '').replace('(', '').replace(')', '').replace('"', '').replace('"', '');
        $(document.body).css('background-position', "50% " + (-window.pageYOffset / speed) + "px");
    });

    // Unhide the outer content div and the footer
    $('#music-page-div').toggle();
    $('#footer').slideDown();

    // Look for errors when YouTube videos are grabbed
    // and refresh if there is an error
    $('.music-video').bind('error', function() {
        window.location.reload();
    });
});