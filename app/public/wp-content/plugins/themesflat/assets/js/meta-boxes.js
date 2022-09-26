(function( $ ) {
    "use strict";
   
    
    function togglePostFormatMetaBoxes() {

        var $input = $('input[name=post_format]'),
            $metaBoxes = $('#blog-options [id^="themesflat-options-control-"]').hide();

        // Don't show post format meta boxes for portfolio
        if ($('#post_type').val() == 'members')
            return;

        if ($('#post_type').val() == 'food')
            return;

        $input.change(function() {
            $metaBoxes.hide();
            if ($(this).val() == 'gallery' || $(this).val() == 'video' || $(this).val() == 'audio') {
                $('[id*="themesflat-options-control-' + $(this).val() + '"]').show();
            } else $('#themesflat-options-control-blog_heading').show();

        });
        $input.filter(':checked').trigger('change');

        //Gutenberg
        jQuery(document).on('change', 'select[id*="post-format"]',function(){             
            $metaBoxes.hide();
            if ($(this).val() == 'gallery' || $(this).val() == 'video' || $(this).val() == 'audio') {
                $('[id*="themesflat-options-control-' + $(this).val() + '"]').show();
            } else $('#themesflat-options-control-blog_heading').show(); 
        });
    }

    $(function() {
        togglePostFormatMetaBoxes();
    })

})(jQuery);