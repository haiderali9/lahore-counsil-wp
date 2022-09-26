;(function($) {

	"use strict";

	var tf_accordion = function ($scope) {
		$scope.find('.tf-accordion').each(function () {
			var speed = {duration: 400};
			$(this).find('.accordion-content').hide();
			$(this).find('.tf-accordion-item .accordion-title.active').siblings('.accordion-content').show();
			$(this).find('.tf-accordion-item .accordion-title').on('click', function() {
				$(this).closest('.tf-accordion-item').siblings().find('.accordion-title').removeClass('active');
				$(this).toggleClass('active');
				$(this).closest('.tf-accordion-item').siblings().removeClass('active');
				$(this).closest('.tf-accordion-item').toggleClass('active');
				$(this).next().slideToggle(speed);
				if ($(this).is('.active')) {
					$(this).closest('.tf-accordion').find(".accordion-content").not($(this).next()).slideUp(speed);
				}
			});
		});
	};

	$(window).on('elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/tfaccordion.default', tf_accordion );
	});

})(jQuery);