/*
 * This file contains the common scripts, example: datepicker, select2, texteditor ... 
 * Please do not using DOM id here
 */
$(function() {
	//wysiwyg
	tinymce.init({
		selector: ".editor",
		menubar: false,
		statusbar: false,
		toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright"
	});
	/* width:resolve option for makes select2 same width with select tag*/
	$(".select2").each(function() {
		options = {
			width: 'resolve'
		};
		if ($(this).attr('data-no-search'))
			options['minimumResultsForSearch'] = -1; // Hide the seach box
		$(this).select2(options);
	});

	/* Auto hide error text and color if user typed */
	$('.control-group.error').on('keydown', 'input', function() {
		$(this).closest('.control-group').removeClass('error').find('.help-inline').fadeOut(300);
	});

	/* Date picket input */
	$('.datepicker').datepicker(AppConfig.defaultDatepickerOptions);

	$(document).on('change', '.submit-on-change', function() {
		$(this).closest('form').trigger('submit');
	});

	/* Toggle loading indicator */
	$(document).ajaxStart(function() {
		Helper.togglePageLoadingIndicator(true);
	});
	$(document).ajaxComplete(function() {
		Helper.togglePageLoadingIndicator(false);
	});
});

