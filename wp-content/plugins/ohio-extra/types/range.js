!function ($) {

	$('#vc_ui-panel-edit-element').on('input', '.ohio_extra_range_block input[type="range"], .ohio_extra_range_block input[type="number"]', function (e) {
		const $input = $(this), $value_hidden_input = $(this).closest('.ohio_extra_range_block').find('input[type="hidden"]');
		$(this).closest('.ohio_extra_range_block').find('input').each(function () {
			$(this).val($input.val());
		});

		$value_hidden_input.trigger('change');
	});

}(window.jQuery);
