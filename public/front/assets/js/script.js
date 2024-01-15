(function ($) {

    "use strict";

    $(document).ready(function () {

        // Custom Dropdown

        $('.dropdown-link').click(function (e) {
            e.preventDefault();
            $(this).next().toggleClass('active');
        })
        
        
        
        $('#to-bottom').click(function (e) {
            var secoundSectionOffset = $('.ms-companies').offset().top;
           $('body,html').animate({scrollTop: secoundSectionOffset + 50},300); 
        });
        
        
        $('#to-top').click(function (e) {
           $('body,html').animate({scrollTop: 0},300); 
        });

        $("[data-folder-id]").click(function (e) {
            e.preventDefault()
            $('[data-folder]:not([data-folder="/root"])').removeClass('nav-folder-active');
            $('[data-folder="/root"]').addClass('header-menu-nav-folder--open')
            $(`[data-folder='${this.getAttribute('data-folder-id')}']`).addClass('nav-folder-active')
        });

        // Back Button

        $('[data-action="back"]').click(function (e) {
            e.preventDefault()
            $('[data-folder]').removeClass('nav-folder-active')
            $('[data-folder="/root"]').addClass('nav-folder-active')
            $('[data-folder="/root"]').removeClass('header-menu-nav-folder--open')

        });
        
        $(window).scroll(function (e) {
            var nav = $('.ms-navbar')
            var navHeight = nav.innerHeight()
            var breadcrumbHeight = $('.ms-breadcrumb').length ? $('.ms-breadcrumb').innerHeight() : 50
            if($(window).scrollTop() >= (navHeight + breadcrumbHeight )) {
               nav.addClass('sticky')
           } else {
               nav.removeClass('sticky')
           }
        });

    });

})(jQuery);
