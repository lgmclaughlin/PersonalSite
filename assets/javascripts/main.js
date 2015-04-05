$(document).ready(function() {    
    function isMobile() {
        return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    }

    /**
     * Implement parallax scrolling if not mobile device
     */
    if (!isMobile()) {
        $(window).scroll(function() {
            var speed = 12;
            var img = new Image;
            img.src = $(document.body).css('background-image').replace('url', '').replace('(', '').replace(')', '').replace('"', '').replace('"', '');
            $(document.body).css('background-position', "50% " + (-window.pageYOffset / speed) + "px");
        });
    }
});