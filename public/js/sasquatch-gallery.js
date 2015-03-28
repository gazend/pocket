(function ($) {

    'use strict';


    var nextImage,
        prevImage;

    $(function () {

        var galleryModal = $('#gallery-modal');

        $('#links a').on('click', function () {
            var image = $(this).attr('href');

            nextImage = $(this).next('a');
            prevImage = $(this).prev('a');

            if (!nextImage.length) {
                nextImage = $(this).parent().find('a:first');
            }

            if (!prevImage.length) {
                prevImage = $(this).parent().find('a:last');
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

        $('#comments-holder').html('').html('<div class="fb-comments" ' +
        'data-href="http://developers.facebook.com/docs/plugins/comments/" ' +
        'data-width="750" ' +
        'data-numposts="5" ' +
        'data-colorscheme="light">' +
        '</div>');

        setTimeout(function() {
            FB.XFBML.parse();
        }, 300);
    });

    $(document).on('gallery.go-next', function () {
        nextImage.click();
        $.event.trigger({type: 'gallery.image-shown'}, [nextImage.attr('data-image-id')]);
    });

    $(document).on('gallery.go-prev', function () {
        prevImage.click();
        $.event.trigger({type: 'gallery.image-shown'}, [prevImage.attr('data-image-id')]);
    });

})(window.jQuery);