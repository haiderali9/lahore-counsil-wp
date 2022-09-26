;(function($) {

    "use strict";   

    var tfpiechart = function() {
        if ($('.tf-pie-chart .chart').length > 0) {
            var $pieChart = $('.tf-pie-chart .chart');
            $pieChart.each(function () {
            var $elem = $(this),
                  pieChartSize = $elem.attr('data-size') || "120",
                  pieChartAnimate = $elem.attr('data-animate') || "2100",
                  pieChartWidth = $elem.attr('data-width') || "6",
                  pieChartColor = $elem.attr('data-color') || "#2e52c2",
                  pieChartTrackColor = $elem.attr('data-trackcolor') || "rgba(0,0,0,0.1)";
            $elem.find('span, i').css({
                  'width': pieChartSize + 'px',
                  'height': pieChartSize + 'px',
                  'line-height': pieChartSize + 'px'
            });
            $elem.appear(function () {
                $elem.easyPieChart({
                      size: Number(pieChartSize),
                      animate: Number(pieChartAnimate),
                      trackColor: pieChartTrackColor,
                      lineWidth: Number(pieChartWidth),
                      barColor: pieChartColor,
                      scaleColor: false,
                      lineCap: 'round',
                      onStep: function (from, to, percent) {
                          $elem.find('span.percent').text(Math.round(percent));
                      }
                    });
                });
            });
        };
    };

    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/tfpiechart.default', tfpiechart );       
    });

})(jQuery);
