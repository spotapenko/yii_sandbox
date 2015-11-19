//modal image on click
$(".pop").on("click", function() {
    $('#imagepreview').attr('src', $(this).find('img').attr('data-url'));
    $('#imagemodal').modal('show');

});

$(function(){
    $(document).on('click', '.get-item-view', function(){
            //if modal isn't open; open it and load content
            $('#viewmodal').modal('show')
                .find('.modal-body')
                .load($(this).attr('data-url'));
            //dynamiclly set the header for the modal
          //  document.getElementById('modalHeader').innerHTML = '<h4>' + $(this).attr('title') + '</h4>';
      //  }
        return false;
    });
});
