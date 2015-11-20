$(function () {
    initModalBookView();
    initBookSearchReset();
    initImageZoom();

});

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
}

function initImageZoom() {
    $(window).load(function() {
        $('body').nivoZoom();
    });
}