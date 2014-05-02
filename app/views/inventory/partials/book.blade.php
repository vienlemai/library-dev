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