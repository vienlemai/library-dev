(function($) {
	$('[btn-confirm="confirm"]').on('click', function() {
		var dataConfirm = $(this).attr('data-confirm');
		console.log(dataConfirm);
		if (typeof dataConfirm == "undefined") {
			dataConfirm = "Bạn có chắc chắn ?";
		}
		var dataUrl = $(this).attr('data-url');
		bootbox.confirm(dataConfirm, 'Hủy bỏ', 'Đồng ý', function(result) {
			if (result) {
				location.href = dataUrl;
			}
		});
		return false;
	});
	$('[data-modal="show-modal"]').on('click', function(e) {
		dataUrl = $(this).attr('data-url');
		$.get(dataUrl, function(result) {
			$(result).modal();
		});
		return false;
	});

	/**
	 * Circulation
	 * */
	$("#circulation-reader").on('change', '.barcode-scanner', function() {
		var barcode = $(this).val();
		var dataUrl = $(this).attr('data-url');
		if (barcode != "") {
			$.ajax({
				url: dataUrl,
				type: 'POST',
				dataType: 'json',
				data: {barcode: barcode},
				success: function(result) {
					if (result.status === true) {

					} else {
						bootbox.alert(result.message);
						return false;
					}
				},
				error: function() {
					bootbox.alert('Đã có lỗi xảy ra, vui lòng thử lại');
					$("#circulation-reader").find('.barcode-scanner').val("");
					return false;
				}

			});
		}
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
		contanerClass: '.table-container',
		$searchInput: $(".table-search-input"),
		init: function() {
			this.$tableContainer.each(function() {
				$container = $(this);
				//ajax pagination
				$(this).on('click', '.pagination a', function() {
					$paging = $(this);
					//call ajax to get html content for paging
					$.ajax({
						url: $(this).attr('href'),
						data: null,
						type: "GET",
						beforeSend: function() {
							$paging.parents(tableHandle.contanerClass).find('span.loading').show();
						},
						success: function(result) {
							$paging.parents(tableHandle.contanerClass).find('span.loading').hide();
							$paging.parents(tableHandle.contanerClass).html(result);
						},
						error: function() {
							bootbox.alert('Đã có lỗi xảy ra, vui lòng đăng nhập lại');
							return false;
						}
					});
					return false;

				});


				//seach on table
				$(this).on('change', '.table-search-input', function() {
					$input = $(this);
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
							$input.parents(tableHandle.contanerClass).find('span.loading').show();
						},
						success: function(result) {
							$input.parents(tableHandle.contanerClass).find('span.loading').hide();
							$input.parents(tableHandle.contanerClass).html(result);
						},
						error: function() {
							bootbox.alert('Đã có lỗi xảy ra, vui lòng đăng nhập lại');
							return false;
						}
					});
				});


				//checkall 
				$(this).on('click', 'input.checkall', function() {
					checked = $(this).prop('checked');
					$container = $(this).parents(tableHandle.contanerClass);
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
					$container = $(this).parents(tableHandle.contanerClass);
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
					$container = $(this).parents(tableHandle.contanerClass);
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

	/**
	 * Ajax upload image and preview
	 * */
	$(".form-upload-image").each(function() {
		var $form = $(this);
		var $uploadError = $form.siblings('.upload-error'),
				$uploadProgress = $form.siblings('.upload-progress'),
				uploadType = $form.attr('upload-type'),
				token = $form.children('.crsf-token').val(),
				$oldFile = $form.children('.old-file'),
				maxSize = 2000000,
				acceptFileTypes = /^image\/(gif|jpe?g|png)$/i,
				msgFileSize = 'Dung lượng ảnh quá lớn, chỉ cho phép dung lượng nhỏ hơn 2M',
				msgFileExt = 'Định dạng ảnh không hợp lệ, chỉ cho phép các định dạng gif, jpeg, jpg, png',
				msgUnsaved = 'Tiến trình upload ảnh chưa hoàn tất, bạn có chắc chắn muốn thoát ?',
				msgFail = 'Đã có lỗi xảy ra, vui lòng thử lại sau';
		uploadErrors = [];
		$form.fileupload({
			url: $form.attr('action'),
			type: 'POST',
			datatype: 'json',
			add: function(event, data) {
				uploadErrors = [];
				// Message on unLoad.
				window.onbeforeunload = function() {
					return msgUnsaved;
				};
				if (data.originalFiles[0]['type'].length && !acceptFileTypes.test(data.originalFiles[0]['type'])) {
					uploadErrors.push(msgFileExt);
				}
				if (data.originalFiles[0]['size'] > maxSize) {
					uploadErrors.push(msgFileSize);
				}
				if (uploadErrors.length > 0) {
					window.onbeforeunload = null;
					$uploadError.children('span').html(uploadErrors[0]);
					$uploadError.show();
				} else {
					data.formData = {'_token': token, 'uploadType': uploadType, 'oldFile': $oldFile.val()};
					data.submit();
				}
			},
			start: function() {
				$uploadProgress.show();
				$uploadError.hide();
				$uploadProgress.children('.bar').css('width', 0 + '%');
			},
			send: function(e, data) {
				// onSend
			},
			progress: function(e, data) {
				var percent = Math.round((data.loaded / data.total) * 100);
				$uploadProgress.children('.bar').css('width', percent + '%');
			},
			fail: function(e, data) {
				// Remove 'unsaved changes' message.
				bootbox.alert(msgFail);
				window.onbeforeunload = null;
			}, done: function(event, data) {
				$uploadError.hide();
				$uploadProgress.hide();
			},
			success: function(result) {
				window.onbeforeunload = null;
				if (result.status === true) {
					$form.find('.image-preview').attr('src', result.image_path);
					$form.find('.old-file').val(result.image_name);
					$('input.image_path').val(result.image_path);
				} else {
					$uploadError.show();
					$uploadError.children('span').html(result.message);
				}
			},
			error: function() {
				bootbox.alert(msgFail);
				window.onbeforeunload = null;
			}
		});
	});

	tableHandle.init();

})(jQuery);