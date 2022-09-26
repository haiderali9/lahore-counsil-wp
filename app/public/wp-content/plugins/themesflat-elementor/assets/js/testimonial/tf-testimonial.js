;(function ($) {

    "use strict";

    var testimonial_Carousel = function () {
        if ($().owlCarousel) {
            $('.tf-testimonial-carousel.has-carousel').each(function () {
                var
                    $this = $(this),
                    item = $this.data("column"),
                    item2 = $this.data("column2"),
                    item3 = $this.data("column3"),
                    spacer = Number($this.data("spacer")),
                    prev_icon = '<i class="fa fa-chevron-left"></i>',
                    next_icon = '<i class="fa fa-chevron-right"></i>',
                    index_active = $this.data("index_active");

                var loop = false;
                if ($this.data("loop") === 'yes') {
                    loop = true;
                }

                var arrow = false;
                if ($this.data("arrow") === 'yes') {
                    arrow = true;
                }

                var bullets = false;
                if ($this.data("bullets") === 'yes') {
                    bullets = true;
                }

                var auto = false;
                if ($this.data("auto") === 'yes') {
                    auto = true;
                }

                $this.find('.owl-carousel').owlCarousel({
                    loop: loop,
                    margin: spacer,
                    nav: arrow,
                    dots: bullets,
                    autoplay: auto,
                    autoplayTimeout: 5000,
                    smartSpeed: 850,
                    autoplayHoverPause: true,
                    navText: [prev_icon, next_icon],
                    responsive: {
                        0: {
                            items: item3
                        },
                        768: {
                            items: item2
                        },
                        1000: {
                            items: item
                        }
                    }
                });

                indexActiveAddClasses();

                $this.find('.owl-carousel').on('translated.owl.carousel', function (event) {
                    indexActiveAddClasses();
                });

                function indexActiveAddClasses() {
                    /*var total = $this.find('.owl-carousel .owl-stage .owl-item.active').length;
                    $this.find('.owl-carousel .owl-stage .owl-item').removeClass('firstActiveItem lastActiveItem'); 
                    $this.find('.owl-carousel .owl-stage .owl-item.active').each(function(index){ 
                        if (index === 0) {
                            $(this).addClass('firstActiveItem');
                        }
                        if (index === total - 1 && total>1) {
                            $(this).addClass('lastActiveItem');
                        }
                    }); */
                    $this.find('.owl-carousel .owl-stage .owl-item').removeClass('indexActiveItem');
                    $this.find('.owl-carousel .owl-stage .owl-item.active').each(function (index) {
                        if (index === index_active) {
                            $(this).addClass('indexActiveItem');
                        }
                    });
                }

            });
        }
    }

    var testimonialTypeGroup_Carousel = function () {
        if ($().owlCarousel) {
            $('.tf-testimonial-carousel-type-group').each(function () {
                var
                    $this = $(this),
                    spacer = Number($this.data("spacer")),
                    prev_icon = '<i class="fa fa-chevron-left"></i>',
                    next_icon = '<i class="fa fa-chevron-right"></i>';

                var arrow = false;
                if ($this.data("arrow") === 'yes') {
                    arrow = true;
                }

                var auto = false;
                if ($this.data("auto") === 'yes') {
                    auto = true;
                }

                var loop = false;
                if ($this.data("loop") === 'yes') {
                    loop = true;
                }

                var testimonial = $this.find('.owl-carousel.testimonial');
                var thumbs = $this.find('.owl-carousel.thumbs');
                var syncedSecondary = true;
                testimonial.owlCarousel({

                    autoplay: auto,
                    margin: spacer,
                    items: 1,
                    loop: loop,
                    autoplayTimeout: 5000,
                    smartSpeed: 850,
                    slideSpeed: 500,
                    nav: arrow,
                    dots: false,
                    navText: [prev_icon, next_icon]
                });

            });
        }
    }

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/tf-testimonial-carousel.default', testimonial_Carousel);
        elementorFrontend.hooks.addAction('frontend/element_ready/tf-testimonial-carousel-type-group.default', testimonialTypeGroup_Carousel);
    });

})(jQuery);
