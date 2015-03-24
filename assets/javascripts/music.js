$(document).ready(function() {
    /**
     * Implement parallax scrolling
     */
     /**
     * Implement parallax scrolling
     */
    $(window).scroll(function() {
        var speed = 12;
        var img = new Image;
        img.src = $(document.body).css('background-image').replace('url', '').replace('(', '').replace(')', '').replace('"', '').replace('"', '');
        $(document.body).css('background-position', "50% " + (-window.pageYOffset / speed) + "px");
    });

    $('#music-page-div').slideDown(600);
});