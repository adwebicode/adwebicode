!function($) {

    function ohioTypographySerialize($block, $hidden_input) {
        let result = {};

        result.font_size = $block.find('input[data-target="font-size"]').val();
        result.font_size_tablet = $block.find('input[data-target="font-size-tablet"]').val();
        result.font_size_mobile = $block.find('input[data-target="font-size-mobile"]').val();
        result.line_height = $block.find('input[data-target="line-height"]').val();
        result.line_height_tablet = $block.find('input[data-target="line-height-tablet"]').val();
        result.line_height_mobile = $block.find('input[data-target="line-height-mobile"]').val();
        result.letter_spacing = $block.find('input[data-target="letter-spacing"]').val();
        result.letter_spacing_tablet = $block.find('input[data-target="letter-spacing-tablet"]').val();
        result.letter_spacing_mobile = $block.find('input[data-target="letter-spacing-mobile"]').val();
        result.color = $block.find('input[data-target="color"]').val();
        result.weight = $block.find('select[data-target="weight"]').val();
        result.style = $block.find('select[data-target="font-style"]').val();
        result.use_custom_font = $block.find('input[data-target="use-custom-font"]').prop('checked');
        if ( result.use_custom_font ) {
            result.custom_font = $block.find('select[data-target="custom-font"]').val();
        }

        $hidden_input.val( JSON.stringify( result ) );
    }

    $('#vc_ui-panel-edit-element').on('change', '.ohio_extra_typography_block input, .ohio_extra_typography_block select', function(e){
        var $closest = $(this).closest('.ohio_extra_typography_block');
        var $value_hidden_input = $closest.find('.wpb_vc_param_value');
        ohioTypographySerialize( $closest, $value_hidden_input );
    });


    $('#vc_ui-panel-edit-element').on('change', '.ohio_extra_typography_block input[data-target="use-custom-font"]', function(e){
        if ($(this).prop('checked')) {
            $(this).closest('.ohio_extra_typography_block').find('.custom-font-panel').show();
        } else {
            $(this).closest('.ohio_extra_typography_block').find('.custom-font-panel').hide();
        }
    });

    $('#vc_ui-panel-edit-element .ohio_extra_typography_block input[data-target="color"]').wpColorPicker({
        change: function (e, ui) {
            $( e.target ).val( ui.color.toString() );
            $( e.target ).trigger('change');
        },
        clear: function (e, ui) {
            $(e.target).trigger('change');
        }
    });

    $('#vc_ui-panel-edit-element .ohio_extra_typography_block .devices-select li').on('click', function() {
        let elclass = $(this).attr('class');
        $(this).closest('.devices-select').attr('class', 'devices-select ' + elclass);

        $(this).closest('ul').css({'opacity': 0, 'height': 0});
        setTimeout(() => {
            $(this).closest('ul').css({'opacity': 1, 'height': 'auto'});
        }, 500);

        let type = elclass.replace('device-', '');
        $(this).closest('label').find('input').hide();
        if (type === 'desktop') {
            $(this).closest('label').find('input:first').show();
        } else {
            $(this).closest('label').find('input[data-target$="' + type + '"]').show();
        }

        return false;
    });

}(window.jQuery);