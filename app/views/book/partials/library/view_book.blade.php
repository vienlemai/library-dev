<div id="bModal" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="false" style="display: block;">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3>Thông tin tài liệu</h3>
	</div>
	<div class="modal-body">
		<h4 class="text-center">Tài liệu: {{$book->title}}</h4>
		<h5 class="text-info">Thông tin lưu hành</h5>
		<dl class="dl-horizontal">
            <dt>Thể loại: </dt>
            <dd>Sách</dd>
			<dt>Ngày nhập:</dt>
			<dd>{{$book->created_at->format('d \t\h\á\n\g m, Y').' ('.$book->created_at->diffForHumans().')'}}</dd>
			<dt>Người nhập:</dt>
			<dd>{{$book->cataloger->full_name}}</dd>
			<dt>Ngày lưu hành</dt>
			<dd>{{$book->published_at->format('d \t\h\á\n\g m, Y').' ('.$book->created_at->diffForHumans().')'}}</dd>
			<dt>Người kiểm duyệt:</dt>
			<dd>{{$book->moderator->full_name}}</dd>
		</dl>
		<hr>
		<h5 class="text-success">Thông tin tài liệu</h5>
		<dl class="dl-horizontal">
			<dt>Nhan đề: </dt>
			<dd>{{$book->title}}</dd>
			<dt>Nhan đề song song: </dt>
			<dd>{{!empty($book->sub_title)?$book->sub_title:'(trống)'}}</dd>
			<dt>Tác giả: </dt>
			<dd>{{$book->author}}</dd>
			<dt>Dịch giả: </dt>
			<dd>{{!empty($book->translator)?$book->translator:'(trống)'}}</dd>
			<dt>Thông tin xuất bản: </dt>
			<dd>{{!empty($book->publish_info)?$book->publish_info:'(trống)'}}</dd>
			<dt>Nhà xuất bản/Nơi xuất bản: </dt>
			<dd>{{!empty($book->publisher)?$book->publisher:'(trống)'}}</dd>
			<dt>Nhà in: </dt>
			<dd>{{!empty($book->printer)?$book->printer:'(trống)'}}</dd>
			<dt>Số trang: </dt>
			<dd>{{!empty($book->pages)?$book->pages:'(trống)'}}</dd>
			<dt>Khổ cỡ: </dt>
			<dd>{{!empty($book->size)?$book->size:'(trống)'}}</dd>
			<dt>Tài liệu đính kèm: </dt>
			<dd>{{!empty($book->attach)?$book->attach:'(trống)'}}</dd>
		</dl>
		<hr>
		<h5 class="text-warning">Thông tin kiểm soát</h5>
		<dl class="dl-horizontal">
			<dt>Mã cơ quan</dt>
			<dd>{{!empty($book->organization)?$book->organization:'(trống)'}}</dd>
			<dt>Ngôn ngữ</dt>
			<dd>{{!empty($book->language)?$book->language:'(trống)'}}</dd>
			<dt>Số cutter</dt>
			<dd>{{!empty($book->cutter)?$book->cutter:'(trống)'}}</dd>
			<dt>Số phân loại</dt>
			<dd>{{!empty($book->type_number)?$book->type_number:'(trống)'}}</dd>
			<dt>Giá tiền</dt>
			<dd>{{!empty($book->price)?$book->price:'(trống)'}}</dd>
			<dt>Nơi lưu trữ</dt>
			<dd>{{$path}}</dd>
			<dt>Số lượng</dt>
			<dd>{{$book->number}}</dd>
			<dt>Mức độ</dt>
			<dd>{{$book->level}}</dd>
            <dt>Phạm vi mượn</dt>
            <dd>{{$book->scopeName()}}</dd>
            <dt>Đối tượng được mượn</dt>
            <dd>{{$book->permissionName()}}</dd>
			<dt>Thông tin khác</dt>
			<dd>{{!empty($book->another_infor)?$book->another_infor:'(trống)'}}</dd>
		</dl>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>            
	</div>
</div>