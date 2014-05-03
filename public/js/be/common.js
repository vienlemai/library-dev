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
	$(".select2").select2({
		width: 'resolve'
	});

	/* Auto hide error text and color if user typed */
	$('.control-group.error').on('keydown', 'input', function() {
		$(this).closest('.control-group').removeClass('error').find('.help-inline').fadeOut(300);
	});

	/* Date picket input */
	$('.datepicker').datepicker(AppConfig.defaultDateFormat);
});

