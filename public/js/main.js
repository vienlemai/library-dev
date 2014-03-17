(function($) {
	$("#btnPrintBarcode").on("click", function() {
		var dataUrl = $(this).attr('data-url');
		$.ajax({
			url: dataUrl,
			type: "POST",
			dataType: "html",
			data: {number: 2},
			success: function(data) {
				var printWindow = window.open("","","width=400,height=600");
				printWindow.document.write('<html><head><title>my div</title>');
				/*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
				printWindow.document.write('</head><body >');
				printWindow.document.write(data);
				printWindow.document.write('</body></html>');

				//printWindow.print();
				//printWindow.close();
			},
			error: function() {

			},
		});
	});
})(jQuery);