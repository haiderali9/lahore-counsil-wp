;(function($) {

    "use strict";

    var tftabs = function() {   
     
        $('.tf-tabs').each( function() {
            
            $(this).find('.tf-tabnav ul > li').filter(':first').addClass('active').removeClass('inactive');
            $(this).find('.tf-tabcontent').children().filter(':first').addClass('active');

            
            if ( $(this).find('.tf-tabnav ul > li').hasClass('set-active-tab') ) {
                $(this).find('.tf-tabnav ul > li').siblings().removeClass('active');                
            }
            if ( $(this).find('.tf-tabcontent').children().hasClass('set-active-tab') ) {
                $(this).find('.tf-tabcontent').children().siblings().removeClass('active');
            }

            $(this).find('.tf-tabnav ul > li').on('click', function(){
                var tab_id = $(this).attr('data-tab');

                $(this).siblings().removeClass('active').removeClass('set-active-tab').addClass('inactive');
                $(this).closest('.tf-tabs').find('.tf-tabcontent').children().removeClass('active').removeClass('set-active-tab').addClass('inactive');

                $(this).addClass('active').removeClass('inactive');
                $(this).closest('.tf-tabs').find('.tf-tabcontent').children('#'+tab_id).addClass('active').removeClass('inactive');
            });

            if ( $().appear ) {
                var $section = $(this).find('.tf-tab-progress-bar').appear(function() {
                
                function runBars() {
                    var bar = $('.progress-animate');
                    var bar_width = $(this);
                    $(function(){
                      $(bar).each(function(){
                        bar_width = $(this).attr('data-valuenow');
                        $(this).width(bar_width + '%');

                        $(this).parents('.tf-tab-progress-bar').find('.perc').width(bar_width + '%');
                      });
                    });
                }

                runBars();
                });
            }
            
        });        
    }

    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tftabs.default', tftabs );
    });

})(jQuery);
