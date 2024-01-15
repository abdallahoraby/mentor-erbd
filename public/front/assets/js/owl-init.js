(function ($) {

    "use strict";

    $(document).ready(function () {
        $('.owl-companies').owlCarousel({
            loop: true,
            nav: true,
            rtl: true,
            dots:false,
            margin:20,
            autoHeight: false,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 2,
                },
                600: {
                    items: 2,

                },
                1000: {
                    items: 5,

                }
            }
        });
        $('.owl-students').owlCarousel({
            loop: true,
            nav: true,
            rtl: true,
            dots:false,
            margin:20,
            autoHeight: false,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 2,
                },
                600: {
                    items: 2,

                },
                1000: {
                    items: 5,

                }
            }
        });

        $(".owl-prev").html('<i class="fa fa-chevron-left"></i>');
        $(".owl-next").html('<i class="fa fa-chevron-right"></i>');

    });

})(jQuery);
