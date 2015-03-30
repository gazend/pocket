(function ($) {

    'use strict';


    var nextImage,
        prevImage;

    $(function () {

        var galleryModal = $('#gallery-modal');

        $('#links img').on('click', function () {
            var image = $(this).attr('src');

            nextImage = $(this).next('img');
            prevImage = $(this).prev('img');

            if (!nextImage.length) {
                nextImage = $(this).parent().find('img:first');
            }

            if (!prevImage.length) {
                prevImage = $(this).parent().find('img:last');
            }

            galleryModal.find('.modal-body').html('<div style="text-align: center">' +
                '<img class="full-size-image" src="' + image + '" class="img-rounded">' +
            '</div>');
            galleryModal.modal('show');

            var description = $(this).attr('data-description');
            $('p.modal-description', galleryModal).text(description);

            $.event.trigger({type: 'gallery.image-shown'}, [$(this).attr('data-image-id')]);

            return false;
        });

    });

    $(document).on('gallery.image-shown', function (e, imageId) {

        var href = $('#server_name').val() + '/photo/' + imageId;

        $('#comments-holder').html('').html('<div class="fb-comments" ' +
        'data-width="750" ' +
        'data-numposts="5" ' +
        'data-href="' + href + '"' +
        'data-colorscheme="light">' +
        '</div>');

        setTimeout(function() {
            FB.XFBML.parse();
        }, 300);
    });

    $(document).on('gallery.go-next', function () {
        var id = nextImage.attr('data-image-id');
        nextImage.click();
    });

    $(document).on('gallery.go-prev', function () {
        var id = prevImage.attr('data-image-id');
        prevImage.click();
    });

})(window.jQuery);