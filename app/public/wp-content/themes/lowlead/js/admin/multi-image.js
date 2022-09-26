;(function ($) {

	"use strict";

	var file_frame, thumbnails;

	var multiImagesUpload = function () {
		$('a.multi-images-upload').each(function () {

			var button = jQuery(this),
				inputId = button.data('store');

			// clicking the upload button will open the media manager
			button.on('click', function (evt) {

				evt.preventDefault();

				// file frame already created, return
				if (file_frame) {
					file_frame.open();
					return;
				}

				// create the file frame
				file_frame = wp.media.frames.file_frame = wp.media({
					title: jQuery(this).data('uploader_title'),
					button: jQuery(this).data('uploader_button_text'),
					multiple: true,
					library: {
						type: 'image'
					}
				});

				// get the selected attachments when user confirms selection
				file_frame.on('select', function (evt) {
					var selected = file_frame.state().get('selection').toJSON(),
						store = jQuery(inputId),
						urls = [];

					for (var i = selected.length - 1; i >= 0; i--) {
						urls.push(selected[i].url);
					}

					// triggering change will activate the Save & Close button
					store.val(urls).trigger('change');

					// update the thumbnails using the new images
					store.trigger('updateThumbnails', {
						urls: urls
					});
				});
				// open the file frame
				file_frame.open();
			});
		});
	};

	var multiImagesRemove = function () {
		$('a.multi-images-remove').each(function () {
			var button = $(this),
				input = jQuery(button.data('store'));

			button.on('click', function (evt) {
				evt.preventDefault();

				// update the hidden input value and save
				input.val('').trigger('change');
				// also refresh the thumbnails list
				input.trigger('updateThumbnails', {
					urls: ''
				});
			});
		});
	};

	var multiInput = function () {
		$('input.multi-images-control-input').each(function () {

			var input = jQuery(this),
				thumbContainer = jQuery(input.data('thumbs-container'));

			input.on('updateThumbnails', function (evt, args) {
				var urls = args.urls;
				// remove old images
				thumbContainer.empty();
				// for each image url in the value create and append an image element to the list
				for (var i = urls.length - 1; i >= 0; i--) {
					var li = $('<li/>');
					li.attr('style', 'background-image:url(' + urls[i] + ');');
					li.attr('class', 'thumbnail');
					li.attr('data-src', urls[i]);
					thumbContainer.append(li);
				}
			});
		});
	};

	var multiImagesMove = function () {
		if($().sortable){
			$('.customize-control-multi-image .thumbnails').sortable({
				items: '> li',
				axis: 'y',
				opacity: 0.6,
				distance: 3,
				cursor: 'move',
				delay: 150,
				tolerance: 'pointer',
				update: function (evt, ui) {
					var t = $(this),
						urls = [],
						input;
					jQuery(t.find('li')).each(function () {
						urls.push($(this).data('src'));
					});
					input = $(t.data('store'));
					input.val(urls).trigger('change');
					t.sortable('refreshPositions');
				}
			}).disableSelection();
		}

	};

// Dom Ready
	$(function () {
		multiImagesUpload();
		multiImagesRemove();
		multiInput();
		multiImagesMove();
	});
})(jQuery);