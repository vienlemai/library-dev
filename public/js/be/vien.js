(function($) {
	//Print barcode
	$("#btnPrintBarcode").on("click", function() {
		var dataUrl = $(this).attr('data-url');
		var bookId = $("#bookId").val();
		var number = $("#number").val();
		var title = $("#title").val();
		$.ajax({
			url: dataUrl,
			type: "POST",
			dataType: "html",
			data: {bookId: bookId, title: title, number: number},
			success: function(data) {
				var printWindow = window.open("", "", "width=400,height=600");
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