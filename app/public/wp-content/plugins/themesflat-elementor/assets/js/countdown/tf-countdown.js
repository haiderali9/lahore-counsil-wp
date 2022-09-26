;(function($) {

    "use strict";

    var tf_countdown = function() { 
        $('.tf-countdown').each(function() {
            var set_time    = $(this).data('date'),
                time_day    = $(this).find('.tf-countdown-days'),
                time_hours  = $(this).find('.tf-countdown-hours'),
                time_mins   = $(this).find('.tf-countdown-minutes'),
                time_secs   = $(this).find('.tf-countdown-seconds');
            if ($().countdown) {
                $(this).countdown(set_time, function(event) {
                  time_day.html(event.strftime('%D'));
                  time_hours.html(event.strftime('%H'));
                  time_mins.html(event.strftime('%M'));
                  time_secs.html(event.strftime('%S'));
                });
            } 
        }); 
    }

    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tf-countdown.default', tf_countdown );
    });

})(jQuery);
