<div class='head'>
    <h2>Hiển thị {{$articles->count()}}/{{$articles->getTotal()}} thông báo</h2>
    <div class='toolbar-table-right'>
        <div class='input-append'>
            <input placeholder='Tìm kiếm ...' type="text" value="<?php echo isset($keyword) ? $keyword : '' ?>" class="table-search-input" data-url="{{route('article.search')}}">
            <button class="btn btn-book-search" type="button">
                <span class='icon-search'></span>
            </button>
        </div>
    </div>
</div>
<div class='content np table-sorting'>
    <table cellpadding='0' cellspacing='0' class='bordered-b sort' width='100%'>
        <thead>
            <tr>
                <th style='width:20%'>Tiêu đề</th>
                <th style='width:15%'>Ngày đăng</th>
                <th style='width:15%'>Người đăng</th>
                <th style='width:10%'>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $row): ?>
                <tr>
                    <td>
                        <a class='text-info' href="{{route('article.edit',$row->id)}}">{{$row->title}}</a>
                    </td>
                    <td>{{$row->created_at->format('H:i, d \t\h\á\n\g m, Y')}}</td>
                    <td>{{$row->creator->full_name}}</td>
                    <td>
                        <?php if ($row->isActive()): ?>
                            <a class="text-muted" href="{{route('article.unactive', array($row->id))}}">
                                <i class="icon-eye-close"></i> Ẩn
                            </a>
                        <?php else: ?>
                            <a  class="text-success" href="{{route('article.active', array($row->id)) }}">
                                <i class="icon-eye-open"></i> Hiện
                            </a>
                        <?php endif; ?>
                        &nbsp;
                        <a class='text-warning' href="{{route('article.edit',$row->id)}}">
                            <i class="i-pencil"></i>
                            Sửa
                        </a>
                        &nbsp;
                        <a class='text-error' href="{{route('article.delete',$row->id)}}" data-confirm="Bạn có chắc chắn muốn xóa thông báo {{$row->title}}" data-method="delete" data-token="{{csrf_token()}}">
                            <i class='i-cancel-2'></i>
                            Xóa
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>
<div class="footer">
    <span class="loading" style="margin-left: 50px; display: none">
        <img src="{{asset('public/img/loading.gif')}}"/>
        Đang tải . . .
    </span>
    <div class='side fr'>
        <div class='pagination'>
            {{$articles->links()}}
        </div>
    </div>
</div>