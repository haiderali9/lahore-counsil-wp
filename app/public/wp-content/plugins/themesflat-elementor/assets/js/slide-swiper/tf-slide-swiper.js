;(function($) {

    "use strict";

    var tf_swiper_slider = function() {
        $('.tf-slide-swiper').each(function(){
            var container = $(this), 
                swiper_container = container.find('.swiper-container-primary'),
                swiper_container_gallery = container.find('.gallery-thumbs'),
                animation = container.data('animation'),
                effect = container.data('effect'),
                autoplay_speed = container.data('autoplay_speed'),
                autoplay = (container.data('autoplay') == 'yes') ? { delay: autoplay_speed } : false ,
                pause_on_interaction = container.data('pause_on_interaction'),
                infinite_loop = (container.data('infinite_loop') == 'yes')? true : false ,
                transition_speed = container.data('transition_speed'),
                bullets_type = container.data('bullets_type'),
                slide_type = container.data('slide_type'),
                direction = container.data('direction'),
                show_thumbs_gallery = container.data('show_thumbs_gallery'),
                slidesPerViewThumbs = swiper_container_gallery.data('slides_number_thumb');


            if (show_thumbs_gallery == 'yes') {
                var galleryThumbs = new Swiper(swiper_container_gallery, {
                    spaceBetween: 0,
                    slidesPerView: slidesPerViewThumbs,
                    freeMode: true,
                    watchSlidesVisibility: true,
                    watchSlidesProgress: true,
                });
            }

            var swiper = new Swiper(swiper_container, {
                // Optional parameters
                direction: direction, //vertica or horizontal                
                spaceBetween: 0,
                effect: effect,
                speed: transition_speed,
                loop: infinite_loop,
                autoplay: autoplay,
                parallax: true,         

                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                    type: bullets_type /*progressbar, bullets, fraction */,
                    clickable: true,
                },

                // Navigation arrows
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },

                thumbs: {
                    swiper: galleryThumbs
                },

                on: {
                    init: function () {
                        if(swiper_container.find('.swiper-slide-bg').hasClass('elementor-ken-burns')){
                            swiper_container.find('.swiper-slide-bg').removeClass('elementor-ken-burns--active');
                            swiper_container.find('.swiper-slide.swiper-slide-active .swiper-slide-bg').addClass('elementor-ken-burns--active');
                        }
                        swiper_container.find('.swiper-wrapper').addClass('active');
                    },
                },                
            });

            swiper.on('transitionStart', function () {
                if (animation != '') {
                    swiper_container.find('.swiper-slide-contents').hide();
                }
                swiper_container.find('.swiper-wrapper').removeClass('active');
            });

            swiper.on('transitionEnd', function () {
                if (animation != '') {
                    swiper_container.find('.swiper-slide-active .swiper-slide-contents').show();
                }
                swiper_container.find('.swiper-slide-contents').removeClass(animation);
                swiper_container.find('.swiper-slide-active .swiper-slide-contents').addClass(animation); 

                if(swiper_container.find('.swiper-slide-bg').hasClass('elementor-ken-burns')){
                    swiper_container.find('.swiper-slide-bg').removeClass('elementor-ken-burns--active');
                    swiper_container.find('.swiper-slide.swiper-slide-active .swiper-slide-bg').addClass('elementor-ken-burns--active');
                }
                swiper_container.find('.swiper-wrapper').addClass('active');                              
            });

            if (pause_on_interaction == 'yes') {
                swiper_container.on('mouseenter', function(e){
                    swiper.autoplay.stop();
                });
                swiper_container.on('mouseleave', function(e){
                    swiper.autoplay.start();
                });
            }

            swiper.on('slideChange', function(){  
                if(infinite_loop == false){                  
                    if(swiper.isEnd){
                        swiper.autoplay.stop();
                        swiper_container.on('mouseleave', function(e){
                            swiper.autoplay.stop();
                        });
                    }
                }
            });

            if (slide_type == 'slide-type-scale' ) {
                setTimeout(function() {
                    swiper_container.addClass('loaded');
                }, 200);
            }
        });
    };

    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-slide-swiper.default', tf_swiper_slider );
    });

})(jQuery);
