(function($) {
	//wysiwyg
	tinymce.init({
		selector: ".editor",
		menubar: false,
		statusbar:false,
		toolbar:false,
		//toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});
	$("#storage").select2();
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

	$('[btn-confirm="confirm"]').on('click', function() {
		dataConfirm = $(this).attr('data-confirm');
		dataUrl = $(this).attr('data-url');
		bootbox.confirm(dataConfirm, 'Hủy bỏ', 'Đồng ý', function(result) {
			if (result) {
				location.href = dataUrl;
			}
		});
	});

	$("#btn-disapprove-book").on('click', function() {
		$("#form-disapprove-book").toggle(300);
	});
	/**
	 * ---------------------------------------------------------------------------------------------------------
	 * -------------------------------VALIDATION----------------------------------------------------------------
	 * */
	$("#form-disapprove-book").validate({
		rules: {
			reason: "required"
		},
		messages: {
			reason: "Bạn chưa nhập lý do báo lỗi"
		}
	});

	/**
	 * Handle ajax pagination,ajax search, checkall, uncheckall items
	 * */
	var tableHandle = {
		$tableContainer: $('.table-container'),
		$searchInput: $(".table-search-input"),
		init: function() {
			this.$tableContainer.each(function() {
				$container = $(this);
				//ajax pagination
				$(this).on('click', '.pagination a', function() {
					//call ajax to get html content for paging
					$.ajax({
						url: $(this).attr('href'),
						data: null,
						type: "GET",
						beforeSend: function() {
							$container.find('span.loading').show();
						},
						success: function(result) {
							$container.find('span.loading').hide();
							$container.html(result);
						}
					});
					return false;

				});


				//seach on table
				$(this).on('change', '.table-search-input', function() {
					searchParmas = {};
					ignoreArr = ['type', 'placeholder', 'class', 'id', 'data-url'];
					dataUrl = $(this).attr('data-url');
					//add keyword to search params
					searchParmas.keyword = $(this).val();
					for (k in this.attributes) {
						//get attributes that need to search, to build paramaters for search query
						if (typeof (this.attributes[k].value) != 'undefined' && $.inArray(this.attributes[k].name, ignoreArr) == -1) {
							attrName = this.attributes[k].name;
							attrValue = this.attributes[k].value;
							searchParmas[attrName] = attrValue;

						}
					}
					//make ajax request 
					$.ajax({
						url: dataUrl,
						type: "GET",
						data: searchParmas,
						beforeSend: function() {
							$container.find('span.loading').show();
						},
						success: function(result) {
							$container.find('span.loading').hide();
							$container.html(result);
						}
					});
				});


				//checkall 
				$(this).on('click', 'input.checkall', function() {
					checked = $(this).prop('checked');
					$checkItems = $container.find('.checkitem');
					numberOfChecked = 0;
					$checkItems.each(function() {
						$(this).prop('checked', checked);
						numberOfChecked++;
					});
					if (checked) {
						$container.find('.check-info').show().html("(Đã chọn " + numberOfChecked + " mục)");
					} else {
						$container.find('.check-info').hide();
					}

				});
				//check on item on table
				$(this).on('click', 'input.checkitem', function() {
					$checkItems = $container.find('.checkitem');
					numberOfChecked = 0;
					$checkItems.each(function() {
						if ($(this).prop('checked'))
							numberOfChecked++;
					});
					if (numberOfChecked > 0) {
						$container.find('.check-info').show().html("(Đã chọn " + numberOfChecked + " mục)");
					} else {
						$container.find('.check-info').hide();
					}
				});

				//submit after check
				$(this).on('click', '.btn-check-submit', function() {
					$checkItems = $container.find('.checkitem');
					numberOfChecked = 0;
					$checkItems.each(function() {
						if ($(this).prop('checked'))
							numberOfChecked++;
					});
					if (numberOfChecked > 0) {
						$container.find('.form-check').submit();
					} else {
						bootbox.alert('Bạn chưa chọn mục nào');
					}
				});
				//handle delete item, create form which delete method,then submit
				$(this).on('click', 'a[data-method="delete"]', function() {
					dataConfirm = $(this).attr('data-confirm');
					token = $(this).attr('data-token');
					action = $(this).attr('href');
					bootbox.confirm(dataConfirm, 'Hủy bỏ', 'Đồng ý', function(result) {
						if (result) {

							var form =
									$('<form>', {
										'method': 'POST',
										'action': action,
									});

							var tokenInput =
									$('<input>', {
										'type': 'hidden',
										'name': '_token',
										'value': token
									});

							var hiddenInput =
									$('<input>', {
										'name': '_method',
										'type': 'hidden',
										'value': 'delete'
									});
							form.append(tokenInput, hiddenInput).hide().appendTo('body').submit();
							//console.log(form.html());
						}
					});

					return false;
				});

			});
		}
	};

	tableHandle.init();

})(jQuery);