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
            <dd>Tạp chí/biểu mẫu</dd>
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
            <dt>Số tạp chí: </dt>
            <dd>{{!empty($book->magazine_number)?$book->magazine_number:'(trống)'}}</dd>
            <dt>Ngày ra tạp chí: </dt>
            <dd>{{!empty($book->magazine_publish_day)?$book->magazine_publish_day:'(trống)'}}</dd>
            <dt>Phụ trương: </dt>
            <dd>{{!empty($book->magazine_additional)?$book->magazine_additional:'(trống)'}}</dd>
            <dt>Số đặc biệt: </dt>
            <dd>{{!empty($book->magazine_special)?$book->magazine_special:'(trống)'}}</dd>
            <dt>Khu vực: </dt>
            <dd>{{!empty($book->magazine_local)?$book->magazine_local:'(trống)'}}</dd>
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
            <dt>Thông tin khác</dt>
            <dd>{{!empty($book->another_infor)?$book->another_infor:'(trống)'}}</dd>
        </dl>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>            
    </div>
</div>