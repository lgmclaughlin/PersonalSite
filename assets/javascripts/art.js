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

    $('#art-page-div').slideDown(600);

    /**
     * Select all modals and add modal functionality
     */
    $('.art-sketch').click(function() {
        var imgSrc = $(this).attr('src');
        var html = '<img src="' + imgSrc + '" class="modal-active" />\n';
        var insertDiv = $('#active-modal-div');

        // Empty the modal div, insert the clicked image,
        // unhide the modal div, and blur the background
        insertDiv.empty();
        insertDiv.append(html);
        insertDiv.removeClass('hidden');
        $('#main-container').addClass('blur');
    });

    $('#active-modal-div').click(function () {
        var insertDiv = $('#active-modal-div');

        // Empty the modal div, hide it, and remove background blur
        insertDiv.empty();
        insertDiv.addClass('hidden');
        $('#main-container').removeClass('blur');
    });
});
