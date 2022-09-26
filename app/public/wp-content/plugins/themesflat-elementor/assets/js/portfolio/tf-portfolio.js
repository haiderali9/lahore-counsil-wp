;(function($) {

    "use strict";

    var porfolioPostsOwl = function() {
        if ( $().owlCarousel ) {
            $('.tf-portfolio-wrap.has-carousel .owl-carousel').each(function(){
                var
                $this = $(this),
                item = $this.data("column"),
                item2 = $this.data("column2"),
                item3 = $this.data("column3"),
                prev_icon = $this.data("prev_icon"),
                next_icon = $this.data("next_icon");

                var loop = false;
                if ($this.data("loop") == 'yes') {
                    loop = true;
                }

                var arrow = false;
                if ($this.data("arrow") == 'yes') {
                    arrow = true;
                } 

                var bullets = false;
                if ($this.data("bullets") == 'yes') {
                    bullets = true;
                }

                var auto = false;
                if ($this.data("auto") == 'yes') {
                    auto = true;
                }  

                $this.owlCarousel({
                    loop: loop,
                    margin: 0,
                    nav: arrow,
                    dots: bullets,
                    autoplay: auto,
                    autoplayTimeout: 5000,
                    smartSpeed: 850,
                    autoplayHoverPause: true,
                    navText : ["<i class=\""+prev_icon+"\"></i>","<i class=\""+next_icon+"\"></i>"],
                    responsive: {
                        0:{
                            items:item3
                        },
                        768:{
                            items:item2
                        },
                        1000:{
                            items:item
                        }
                    }
                });

            });
        }
    }

    var porfolioJustified = function() {        
        if ($('.justified_portfolio').length > 0) {
            $(".justified_portfolio").justifiedGallery();
            var $justifiedgallery = $('.justified_portfolio');
            $justifiedgallery.each(function () {
                var $element = $(this),
                rowHeight = $element.attr('data-rowHeight') || "200",
                margins = $element.attr('data-margins') || "10"             
                $element.appear(function () {
                    $element.justifiedGallery({
                        rowHeight: Number(rowHeight),
                        margins: Number(margins)
                    });
                });
            });
        };        
    }

    $(window).on('elementor/frontend/init', function() {        
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tfportfolio.default', porfolioPostsOwl );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tfportfolio.default', porfolioJustified );
    });

})(jQuery);