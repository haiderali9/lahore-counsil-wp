;(function ($) {
	"use strict";

	jQuery(document).ready(function () {
		//Header
		elementor.settings.page.addChangeCallback('style_header', handleReloadPreview);
		elementor.settings.page.addChangeCallback('site_logo', handleReloadPreview);
		elementor.settings.page.addChangeCallback('header_absolute', handleReloadPreview);
		elementor.settings.page.addChangeCallback('header_sticky', handleReloadPreview);
		elementor.settings.page.addChangeCallback('header_search_box', handleReloadPreview);
		elementor.settings.page.addChangeCallback('header_sidebar_toggler', handleReloadPreview);
		//Page
		elementor.settings.page.addChangeCallback('sidebar_layout', handleReloadPreview);

		//Footer
		elementor.settings.page.addChangeCallback('show_footer_info', handleReloadPreview);
		elementor.settings.page.addChangeCallback('show_action_box', handleReloadPreview);
		elementor.settings.page.addChangeCallback('action_box_style', handleReloadPreview);
		elementor.settings.page.addChangeCallback('footer_style', handleReloadPreview);
		elementor.settings.page.addChangeCallback('bottom_style', handleReloadPreview);

	});

	function handleReloadPreview(newValue) {
		elementor.saver.saveEditor({
			status: elementor.settings.page.model.get('post_status'),
			onSuccess: () => {
				elementor.reloadPreview();

				elementor.once("preview:loaded", function () {
					elementor.getPanelView().setPage("page_settings");
				});
			}
		})
	}

})(jQuery);