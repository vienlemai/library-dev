<h4 style="font-weight: bold">Xin chào bạn đọc {{$full_name}}</h4>
<p>Thư viện xin thông báo về việc trả tài liệu</p>
<p>Bạn có {{$circulations->count()}} sắp đến hạn trả, vui lòng trả tài liệu đến trả đúng hạn.</p>
<table style="padding: 3px; border: solid #000 1px;">
    <thead>
        <tr>
            <th>Tên tài liệu</th>
            <th>Ngày mượn</th>
            <th>Hạn trả</th>
        </tr>
    </thead>
    <tbody style="padding: 3px;">
        <?php foreach ($circulations as $circulation): ?>
            <tr style="padding: 3px;">
                <td>{{$circulation->bookItem->book->title}}</td>
                <td>{{$circulation->created_at->format('H:i d \t\h\á\n\g m, Y')}}</td>
                <td>{{$circulation->expired_at->format('d \t\h\á\n\g m, Y').' ('.$circulation->expired_at->diffForHumans().')'}}</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
