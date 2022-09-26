;(function ($) {

	"use strict";

	var tfProgressBar = function () {
		if ($().appear) {
			var $section = $('.tf-progress-bar').appear(function () {

				function runBars() {
					var bar = $('.progress-animate');
					var bar_width = $(this);
					$(function () {
						$(bar).each(function () {
							bar_width = $(this).attr('data-valuenow');
							$(this).width(bar_width + '%');

							$(this).parents('.tf-progress-bar').find('.perc').width(bar_width + '%');
						});
					});
				}

				runBars();
			});
		}
		$(".tf-progress-bar-circle .progress-wrap").each(function () {
			var $value = $(this).attr('data-value');
			var $left = $(this).find('.progress-left .progress-bar');
			var $right = $(this).find('.progress-right .progress-bar');

			if ($value > 0) {
				if ($value <= 50) {
					$right.css('transform', 'rotate(' + percentageToDegrees($value) + 'deg)');
					$right.addClass('circle');
				} else {
					$right.css('transform', 'rotate(180deg)');
					$left.css('transform', 'rotate(' + percentageToDegrees($value - 50) + 'deg)');
					$left.addClass('circle');
				}
			}

		});

		function percentageToDegrees(percentage) {
			return percentage / 100 * 360
		}
	};

	$(window).on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction('frontend/element_ready/tf-progress-bar.default', tfProgressBar);
	});

})(jQuery);
