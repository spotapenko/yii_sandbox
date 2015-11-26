$(function () {
    initModalBookView();
<<<<<<< HEAD
    initModalImageView();
    initBookSearchReset();

});

function initModalImageView() {
    //modal image on click
    $(".pop").on("click", function () {
        $('#imagepreview').attr('src', $(this).find('img').attr('data-url'));
        $('#imagemodal').modal('show');
    });
}

=======
    initBookSearchReset();
    initImageZoom();

});

>>>>>>> develop
function initModalBookView() {
    $(document).on('click', '.get-item-view', function () {
        //if modal isn't open; open it and load content
        $('#viewmodal').modal('show')
            .find('.modal-body')
            .load($(this).attr('data-url'));
        return false;
    });
}

function initBookSearchReset() {
    $('.btn-reset').on('click', function () {
        $('.book-search form').find('input:text, input:password, select, textarea').val('');
        $('.book-search form').find('input:radio, input:checkbox').prop('checked', false);
    });
<<<<<<< HEAD
=======
}

function initImageZoom() {
    $(window).load(function() {
        $('body').nivoZoom();
    });
>>>>>>> develop
}