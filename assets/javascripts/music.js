$(document).ready(function() {
    // Unhide footer
    $('#footer').css('visibility', 'visible');
    
    // Look for errors when YouTube videos are grabbed
    // and refresh if there is an error
    $('.music-video').bind('error', function() {
        window.location.reload();
    });
});