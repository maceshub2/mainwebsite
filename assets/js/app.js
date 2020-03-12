$(document).ready(function() {


    $('.filter-options__btn').on('click', function() {
        $('#search_popup').css('display', 'block');
    });

    $('.close-btn').on('click', function() {
        $('#search_popup').css('display', 'none');
    });

});