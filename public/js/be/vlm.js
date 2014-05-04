(function($) {
	$('[btn-confirm="confirm"]').on('click', function() {
		var dataConfirm = $(this).attr('data-confirm');
		console.log(dataConfirm);
		if (typeof dataConfirm === "undefined") {
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
	$('[btn-confirm="post-confirm"]').on('click', function() {
		var dataConfirm = $(this).attr('data-confirm');
		var $form = $(this).parent('form');
		if (typeof dataConfirm === "undefined") {
			dataConfirm = "Bạn có chắc chắn ?";
		}
		bootbox.confirm(dataConfirm, 'Hủy bỏ', 'Đồng ý', function(result) {
			if (result) {
				$form.submit();
			}
		});
		return false;
	});
	$('[data-modal="show-modal"]').on('click', function(e) {
		var dataUrl = $(this).attr('data-url');
		$.get(dataUrl, function(result) {
			$(result).modal();
		});
		return false;
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
	 * Circulation
	 * */
	var cirHandle = {
		$circulationReader: $("#circulation-reader"),
		$circulationBook: $("#circulation-book"),
		$circulationListBook: $("#circulation-list-book"),
		ajaxFailMsg: 'Đã có lỗi xảy ra, vui lòng thử lại',
		readerId: 0,
		bookItemId: 0,
		focusOnBook: function() {
			cirHandle.$circulationBook.find('input.barcode-scanner').focus();
		},
		focusOnReader: function() {
			cirHandle.$circulationReader.find('input.barcode-scanner').focus();
		},
		init: function() {
			this.$circulationReader.find('input.barcode-scanner').focus();
			//cirHandle.$circulationBook.find('input.barcode-scanner').attr('disabled','disabled');
			var defaultCirReader = this.$circulationReader.html(),
					defaultCirBook = this.$circulationBook.html(),
					defaultListBook = this.$circulationListBook.html();
			this.$circulationReader.on('change', '.barcode-scanner', function() {
				var barcode = $(this).val();
				var dataUrl = $(this).attr('data-url');
				if (barcode !== "") {
					$.ajax({
						url: dataUrl,
						type: 'POST',
						dataType: 'json',
						data: {barcode: barcode},
						success: function(result) {
							if (result.status === true) {
								cirHandle.focusOnBook();
								cirHandle.readerId = result.reader_id;
								cirHandle.$circulationReader.html(result.reader_html);
								cirHandle.$circulationListBook.html(result.list_book_html);
							} else {
								bootbox.alert(result.message);
								cirHandle.readerId = 0;
								cirHandle.focusOnReader();
								cirHandle.$circulationReader.html(defaultCirReader);
								cirHandle.$circulationListBook.html(defaultListBook);
								cirHandle.$circulationBook.html(defaultCirBook);
								return false;
							}
						},
						error: function() {
							bootbox.alert(cirHandle.ajaxFailMsg);
							cirHandle.readerId = 0;
							cirHandle.focusOnReader();
							cirHandle.$circulationReader.html(defaultCirReader);
							cirHandle.$circulationBook.html(defaultCirBook);
							cirHandle.$circulationListBook.html(defaultListBook);
							return false;
						}

					});
				} else {
					cirHandle.readerId = 0;
					cirHandle.$circulationReader.html(defaultCirReader);
					cirHandle.$circulationBook.html(defaultCirBook);
					cirHandle.$circulationListBook.html(defaultListBook);
					cirHandle.focusOnReader();
					return false;
				}
			});

			this.$circulationBook.on('change', '.barcode-scanner', function() {
				var barcode = $(this).val();
				var dataUrl = $(this).attr('data-url');
				if (barcode != "") {
					$.ajax({
						url: dataUrl,
						type: 'POST',
						dataType: 'json',
						data: {barcode: barcode, readerId: cirHandle.readerId},
						success: function(result) {
							if (result.status === true) {
								cirHandle.bookItemId = result.book_item_id;
								cirHandle.$circulationBook.html(result.book_html);
								cirHandle.focusOnBook();
							} else {
								bootbox.alert(result.message);
								cirHandle.bookItemId = 0;
								cirHandle.$circulationBook.html(defaultCirBook);
								cirHandle.focusOnBook();
								return false;
							}
						},
						error: function() {
							bootbox.alert(cirHandle.ajaxFailMsg);
							cirHandle.bookItemId = 0;
							cirHandle.$circulationBook.html(defaultCirBook);
							cirHandle.focusOnBook();
							return false;
						}

					});
				} else {
					cirHandle.bookItemId = 0;
					cirHandle.$circulationBook.html(defaultCirBook);
					cirHandle.focusOnBook();
					return false;
				}
			});

			this.$circulationBook.on('click', '#btn-borrow-book', function() {
				if (cirHandle.bookItemId !== 0 && cirHandle.readerId !== 0) {
					var dataUrl = $(this).attr('data-url');
					$.ajax({
						url: dataUrl,
						type: "POST",
						dataType: "JSON",
						data: {readerId: cirHandle.readerId, bookItemId: cirHandle.bookItemId},
						success: function(result) {
							cirHandle.$circulationListBook.html(result.list_book_html);
							cirHandle.$circulationBook.html(defaultCirBook);
							cirHandle.focusOnBook();
						},
						error: function() {
							bootbox.alert(cirHandle.ajaxFailMsg);
							cirHandle.$circulationBook.html(defaultCirBook);
							cirHandle.focusOnBook();
							return false;
						}
					});
				} else {
					bootbox.alert('Thao tác mượn tài liệu không hợp lệ, vui lòng thử lai');
					cirHandle.$circulationBook.html(defaultCirBook);
					cirHandle.focusOnBook();
					return false;
				}
			});
			this.$circulationBook.on('click', '#btn-return-book', function() {
				if (cirHandle.bookItemId !== 0 && cirHandle.readerId !== 0) {
					var dataUrl = $(this).attr('data-url');
					$.ajax({
						url: dataUrl,
						type: "POST",
						dataType: "JSON",
						data: {readerId: cirHandle.readerId, bookItemId: cirHandle.bookItemId},
						success: function(result) {
							cirHandle.$circulationListBook.html(result.list_book_html);
							cirHandle.$circulationBook.html(defaultCirBook);
							cirHandle.focusOnBook();
						},
						error: function() {
							bootbox.alert(cirHandle.ajaxFailMsg);
							cirHandle.$circulationBook.html(defaultCirBook);
							cirHandle.focusOnBook();
							return false;
						}
					});
				} else {
					bootbox.alert('Thao tác mượn tài liệu không hợp lệ, vui lòng thử lai');
					cirHandle.$circulationBook.html(defaultCirBook);
					cirHandle.focusOnBook();
					return false;
				}

			});

			this.$circulationBook.on('click', '#btn-extra-book', function() {
				if (cirHandle.bookItemId !== 0 && cirHandle.readerId !== 0) {
					var dataUrl = $(this).attr('data-url');
					$.ajax({
						url: dataUrl,
						type: "POST",
						dataType: "JSON",
						data: {readerId: cirHandle.readerId, bookItemId: cirHandle.bookItemId},
						success: function(result) {
							cirHandle.$circulationListBook.html(result.list_book_html);
							cirHandle.$circulationBook.html(defaultCirBook);
							cirHandle.focusOnBook();
						},
						error: function() {
							bootbox.alert(cirHandle.ajaxFailMsg);
							cirHandle.$circulationBook.html(defaultCirBook);
							cirHandle.focusOnBook();
							return false;
						}
					});
				} else {
					bootbox.alert('Thao tác gia hạn tài liệu không hợp lệ, vui lòng thử lai');
					cirHandle.$circulationBook.html(defaultCirBook);
					cirHandle.focusOnBook();
					return false;
				}
			});

			this.$circulationReader.on('click', '#reader-history', function() {
				var dataUrl = $(this).attr('data-url');
				$.get(dataUrl, function(result) {
					$(result).modal();
				});
				return false;
			});
		}
	};

	/**
	 * Handle inventory execute
	 * */
	var inventory = {
		$container: $("#inventory-container"),
		$bookInfor: $("#book-infor"),
		bookItems: [{"barcode": "8931855070028"}, {"barcode": "8931855070035"}, {"barcode": "8931855070042"}, {"barcode": "8931855070059"}, {"barcode": "8931855070066"}, {"barcode": "8931855070073"}, {"barcode": "8931855070080"}, {"barcode": "8931855070097"}, {"barcode": "8931855070103"}, {"barcode": "8934568070019"}, {"barcode": "8934568070033"}, {"barcode": "8934568070040"}, {"barcode": "8934568070057"}, {"barcode": "8934568070064"}, {"barcode": "8934568070071"}, {"barcode": "8934568070088"}, {"barcode": "8934568070095"}, {"barcode": "8934568070101"}, {"barcode": "8934568070118"}, {"barcode": "8934568070125"}, {"barcode": "8934568070132"}, {"barcode": "8934568070149"}, {"barcode": "8934568070156"}, {"barcode": "8934568070163"}, {"barcode": "8934568070170"}, {"barcode": "8934568070187"}, {"barcode": "8934568070194"}, {"barcode": "8932894880012"}, {"barcode": "8932894880029"}, {"barcode": "8932894880036"}, {"barcode": "8932894880043"}, {"barcode": "8932894880050"}, {"barcode": "8932894880067"}, {"barcode": "8932894880074"}, {"barcode": "8932894880081"}, {"barcode": "8932894880098"}, {"barcode": "8932894880104"}, {"barcode": "8932894880111"}, {"barcode": "8932894880128"}, {"barcode": "8932894880135"}, {"barcode": "8932894880142"}, {"barcode": "8932894880159"}, {"barcode": "8932894880166"}, {"barcode": "8932894880173"}, {"barcode": "8932894880180"}, {"barcode": "8932894880197"}, {"barcode": "8932894880203"}, {"barcode": "8931097310012"}, {"barcode": "8931097310036"}, {"barcode": "8931097310043"}, {"barcode": "8931097310050"}, {"barcode": "8931097310067"}, {"barcode": "8931097310074"}, {"barcode": "8931097310081"}, {"barcode": "8931097310098"}, {"barcode": "8931097310104"}, {"barcode": "8932368030011"}, {"barcode": "8932368030028"}, {"barcode": "8932368030035"}, {"barcode": "8932368030042"}, {"barcode": "8932368030066"}, {"barcode": "8932368030073"}, {"barcode": "8932368030080"}, {"barcode": "8932368030097"}, {"barcode": "8932368030103"}, {"barcode": "8931816590015"}, {"barcode": "8931816590022"}, {"barcode": "8931816590039"}, {"barcode": "8931816590046"}, {"barcode": "8931816590053"}, {"barcode": "8931816590060"}, {"barcode": "8931816590077"}, {"barcode": "8931816590084"}, {"barcode": "8931816590091"}, {"barcode": "8931816590107"}, {"barcode": "8932566200018"}, {"barcode": "8932566200025"}, {"barcode": "8932566200032"}, {"barcode": "8932566200049"}, {"barcode": "8932566200056"}, {"barcode": "8932566200063"}, {"barcode": "8932566200070"}, {"barcode": "8932566200087"}, {"barcode": "8932566200094"}, {"barcode": "8932566200100"}, {"barcode": "8935203890016"}, {"barcode": "8935203890023"}, {"barcode": "8935203890030"}, {"barcode": "8935203890047"}, {"barcode": "8935203890054"}, {"barcode": "8935203890061"}, {"barcode": "8935203890078"}, {"barcode": "8935203890085"}, {"barcode": "8935203890092"}, {"barcode": "8935203890108"}, {"barcode": "8935203890115"}, {"barcode": "8935203890122"}, {"barcode": "8935203890139"}, {"barcode": "8935203890146"}, {"barcode": "8935203890153"}, {"barcode": "8935203890160"}, {"barcode": "8935203890177"}, {"barcode": "8935203890184"}, {"barcode": "8935203890191"}, {"barcode": "8935203890207"}, {"barcode": "8935203890214"}, {"barcode": "8935203890221"}, {"barcode": "8935203890238"}, {"barcode": "8935203890245"}, {"barcode": "8935203890252"}, {"barcode": "8935203890269"}, {"barcode": "8935203890276"}, {"barcode": "8935203890283"}, {"barcode": "8935203890290"}, {"barcode": "8935203890306"}, {"barcode": "8935203890313"}, {"barcode": "8935203890320"}, {"barcode": "8935203890337"}, {"barcode": "8935203890344"}, {"barcode": "8935203890351"}, {"barcode": "8935203890368"}, {"barcode": "8935203890375"}, {"barcode": "8935203890382"}, {"barcode": "8935203890399"}, {"barcode": "8935203890405"}, {"barcode": "8935203890412"}, {"barcode": "8935203890429"}, {"barcode": "8935203890436"}, {"barcode": "8935203890443"}, {"barcode": "8935203890450"}, {"barcode": "8935203890467"}, {"barcode": "8935203890474"}, {"barcode": "8935203890481"}, {"barcode": "8935203890498"}, {"barcode": "8935203890504"}, {"barcode": "8935203890511"}, {"barcode": "8935203890528"}, {"barcode": "8935203890535"}, {"barcode": "8935203890542"}, {"barcode": "8935203890559"}, {"barcode": "8935203890566"}, {"barcode": "8935203890573"}, {"barcode": "8935203890580"}, {"barcode": "8935203890597"}, {"barcode": "8935203890603"}, {"barcode": "8935203890610"}, {"barcode": "8935203890627"}, {"barcode": "8935203890634"}, {"barcode": "8935203890641"}, {"barcode": "8935203890658"}, {"barcode": "8935203890665"}, {"barcode": "8935203890672"}, {"barcode": "8935203890689"}, {"barcode": "8935203890696"}, {"barcode": "8935203890702"}, {"barcode": "8935203890719"}, {"barcode": "8935203890726"}, {"barcode": "8935203890733"}, {"barcode": "8935203890740"}, {"barcode": "8935203890757"}, {"barcode": "8935203890764"}, {"barcode": "8935203890771"}, {"barcode": "8935203890788"}, {"barcode": "8935203890795"}, {"barcode": "8935203890801"}, {"barcode": "8935203890818"}, {"barcode": "8935203890825"}, {"barcode": "8935203890832"}, {"barcode": "8935203890849"}, {"barcode": "8935203890856"}, {"barcode": "8935203890863"}, {"barcode": "8935203890870"}, {"barcode": "8935203890887"}, {"barcode": "8935203890894"}, {"barcode": "8935203890900"}, {"barcode": "8935203890917"}, {"barcode": "8935203890924"}, {"barcode": "8935203890931"}, {"barcode": "8935203890948"}, {"barcode": "8935203890955"}, {"barcode": "8935203890962"}, {"barcode": "8935203890979"}, {"barcode": "8935203890986"}, {"barcode": "8935203890993"}, {"barcode": "8935203891006"}, {"barcode": "8931751240013"}, {"barcode": "8931751240020"}, {"barcode": "8931751240037"}, {"barcode": "8931751240044"}, {"barcode": "8931751240051"}, {"barcode": "8931751240068"}, {"barcode": "8931751240075"}, {"barcode": "8931751240082"}, {"barcode": "8931751240099"}, {"barcode": "8931751240105"}, {"barcode": "8931751240112"}, {"barcode": "8931751240129"}, {"barcode": "8931751240136"}, {"barcode": "8931751240143"}, {"barcode": "8931751240150"}, {"barcode": "8931751240167"}, {"barcode": "8931751240174"}, {"barcode": "8931751240181"}, {"barcode": "8931751240198"}, {"barcode": "8931751240204"}, {"barcode": "8932648970013"}, {"barcode": "8932648970020"}, {"barcode": "8932648970037"}, {"barcode": "8932648970044"}, {"barcode": "8932648970051"}, {"barcode": "8932648970068"}, {"barcode": "8932648970075"}, {"barcode": "8932648970082"}, {"barcode": "8932648970099"}, {"barcode": "8932648970105"}, {"barcode": "8932648970112"}, {"barcode": "8932648970129"}, {"barcode": "8935839820012"}, {"barcode": "8935839820029"}, {"barcode": "8935839820036"}, {"barcode": "8935839820043"}, {"barcode": "8935839820050"}, {"barcode": "8935839820067"}, {"barcode": "8935839820074"}, {"barcode": "8935839820081"}, {"barcode": "8935839820098"}, {"barcode": "8935839820104"}, {"barcode": "8935839820111"}, {"barcode": "8935839820128"}, {"barcode": "8935839820135"}, {"barcode": "8935839820142"}, {"barcode": "8935839820159"}, {"barcode": "8935839820166"}, {"barcode": "8935839820173"}, {"barcode": "8935839820180"}, {"barcode": "8935839820197"}, {"barcode": "8935839820203"}, {"barcode": "8935839820210"}, {"barcode": "8935839820227"}, {"barcode": "8935839820234"}, {"barcode": "8935839820241"}, {"barcode": "8935839820258"}, {"barcode": "8935839820265"}, {"barcode": "8935839820272"}, {"barcode": "8935839820289"}, {"barcode": "8935839820296"}, {"barcode": "8935839820302"}, {"barcode": "8931315180014"}, {"barcode": "8931315180021"}, {"barcode": "8931315180038"}, {"barcode": "8931315180045"}, {"barcode": "8931315180052"}, {"barcode": "8931315180069"}, {"barcode": "8931315180076"}, {"barcode": "8931315180083"}, {"barcode": "8931315180090"}, {"barcode": "8931315180106"}, {"barcode": "8931653720019"}, {"barcode": "8931653720026"}, {"barcode": "8931653720033"}, {"barcode": "8931653720040"}, {"barcode": "8931653720057"}, {"barcode": "8931653720064"}, {"barcode": "8931653720071"}, {"barcode": "8931653720088"}, {"barcode": "8931653720095"}, {"barcode": "8931653720101"}, {"barcode": "8932551600014"}, {"barcode": "8932551600021"}, {"barcode": "8932551600038"}, {"barcode": "8932551600045"}, {"barcode": "8932551600052"}, {"barcode": "8932551600069"}, {"barcode": "8932551600076"}, {"barcode": "8932551600083"}, {"barcode": "8932551600090"}, {"barcode": "8932551600106"}, {"barcode": "8931488360015"}, {"barcode": "8931488360022"}, {"barcode": "8931488360039"}, {"barcode": "8931488360046"}, {"barcode": "8931488360053"}, {"barcode": "8931488360060"}, {"barcode": "8931488360077"}, {"barcode": "8931488360084"}, {"barcode": "8931488360091"}, {"barcode": "8931488360107"}],
		ajaxFailMsg: 'Đã có lỗi xảy ra, vui lòng thử lại',
		focusOnInput: function() {
			this.$container.find('.barcode-scanner').val('').focus();
		},
		showError: function(msg) {
			this.$container.find('.alert-error').show().find('span').html(msg);
		},
		hideError: function() {
			this.$container.find('.alert-error').hide();
		},
		scan: function(i) {
			var barcode = this.bookItems[i].barcode;
			inventory.$container.find('.barcode-scanner').val(barcode).trigger('change');
		},
		autoTest: function() {
			var len = this.bookItems.length;
			for (var i = 0; i < 100; i++) {
				setTimeout(inventory.scan(i), 1000 + 1000 * i);
			}

		},
		init: function() {
			var defaultBookInfor = this.$bookInfor.html();
			inventory.focusOnInput();
			//scan barcode
			this.$container.on('change', '.barcode-scanner', function() {
				var barcode = $(this).val();
				var dataUrl = $(this).attr('data-url');
				var storage = inventory.$container.find('.storage').val();
				if (barcode !== '') {
					$.ajax({
						url: dataUrl,
						type: 'POST',
						dataType: 'JSON',
						data: {barcode: barcode, storage: storage},
						success: function(result) {
							if (result.status === true) {
								inventory.hideError();
								inventory.$bookInfor.html(result.book_info);
								var num = inventory.$container.find('.book-scanned-count').html();
								inventory.$container.find('.book-scanned-count').html(parseInt(num) + 1);
								inventory.focusOnInput();
								inventory.hideError();
							} else {
								inventory.showError(result.message);
								inventory.$bookInfor.html(defaultBookInfor);
								inventory.focusOnInput();
							}
						},
						error: function() {
							inventory.$bookInfor.html(defaultBookInfor);
							inventory.hideError();
							bootbox.alert(inventory.ajaxFailMsg);
						}
					});
				} else {
					inventory.$bookInfor.html(defaultBookInfor);
					inventory.hideError();
				}
			});
		}
	};

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
						success: function(result) {
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
						if (typeof (this.attributes[k].value) !== 'undefined' && $.inArray(this.attributes[k].name, ignoreArr) === -1) {
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
						success: function(result) {
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
				$(this).on('click', '[data-modal="show-modal"]', function() {
					var dataUrl = $(this).attr('data-url');
					$.get(dataUrl, function(result) {
						$(result).modal();
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
	cirHandle.init();
	inventory.init();
	//inventory.autoTest();
})(jQuery);