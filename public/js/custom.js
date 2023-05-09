(function ($) {
    'use strict';

    $(document).on('ready', function () {
        // -----------------------------
        //  Testimonial Slider
        // -----------------------------
        $('.testimonial-slider').owlCarousel({
            loop: true,
            margin: 20,
            dots: true,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                400: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 2
                }
            }
        });
        // -----------------------------
        //  Story Slider
        // -----------------------------
        $('.about-slider').owlCarousel({
            loop: true,
            margin: 20,
            dots: true,
            autoplay: true,
            items: 1
        });
        // -----------------------------
        //  Quote Slider
        // -----------------------------
        $('.quote-slider').owlCarousel({
            loop: true,
            autoplay: true,
            items: 1
        });
        // -----------------------------
        //  On Click Smooth scrool
        // -----------------------------
        $('.scrollTo').on('click', function (e) {
            e.preventDefault();
            var target = $(this).attr('href');
            $('html, body').animate({
                scrollTop: ($(target).offset().top)
            }, 500);
        });
        // -----------------------------
        //  Client Slider
        // -----------------------------
        $('.client-slider').owlCarousel({
            loop: true,
            autoplay: true,
            margin: 50,
            autoplayHoverPause: true,
            autoplayTimeout:1200,
            responsive: {
                0: {
                    items: 1,
                    dots: false
                },
                400: {
                    items: 2,
                    dots: false
                },
                600: {
                    items: 2,
                    dots: false
                },
                1000: {
                    items: 4
                }
            }
        });
       

        // ----------------------------
        // AOS
        // ----------------------------
        AOS.init({
            once: true
        });

        // scroll
        $('.scrollTo').on('click', function(e) {
            e.preventDefault();
            var target = $(this).attr('href');
            $('html, body').animate({
              scrollTop: ($(target).offset().top)
            }, 500);
         });

    });

})(jQuery);