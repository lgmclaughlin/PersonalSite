$(document).ready(function() {
    // Unhide footer
    $('#footer').css('visibility', 'visible');

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
