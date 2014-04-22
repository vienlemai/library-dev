<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Danh sách các lần kiểm kê
        </div>
        <div class='page-tools'>
            <ul>
                <li>
                    <a class='btn btn-small btn-primary' href='{{route('inventory.create')}}'>
                        <i class='i-plus-2'></i>
                        Tạo mới kiểm kê
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            <div class='block'>
                <div class='head'>
                    <h2></h2>
                    <div class='toolbar-table-right'>
                        <div class='input-append'>
                            <input placeholder='Tìm kiếm ...' type="text" class="table-search-input" data-url="{{route('inventory.search')}}">
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
                                <th style='width:5%'>TT</th>
                                <th style='width:20%'>Tiêu đề</th>
                                <th style='width:15%'>Ngày bắt đầu</th>
                                <th style='width:15%'>Ngày kết thúc</th>
                                <th style='width:15%'>Người tạo</th>
                                <th style='width:10%'>Trạng thái</th>
                                <th style='width:10%'>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Kiểm kê lần 1 năm học 2013-2014</td>
                                <td>07:50, 12 Tháng 3, 2014</td>
                                <td>07:50, 12 Tháng 3, 2014</td>
                                <td>Nguyễn Văn A(Thủ thư)</td>
                                <td>Đang diễn ra</td>
                                <td>
                                    <div class='row-actions'>
                                        <a class='text-info' href='chi_tiet_kiem_ke.html'>
                                            <i class='i-zoom-in'></i>
                                            Chi tiết
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class='table-info fl'>
                        Đang hiển thị 4/15
                    </div>
                    <div class='side fr'>
                        <div class='pagination'>
                            <ul>
                                <li class='disabled'>
                                    <a href='#'>«</a>
                                </li>
                                <li class='active'>
                                    <a href='#'>1</a>
                                </li>
                                <li>
                                    <a href='#'>2</a>
                                </li>
                                <li class='disabled'>
                                    <a href='#'>...</a>
                                </li>
                                <li>
                                    <a href='#'>6</a>
                                </li>
                                <li>
                                    <a href='#'>7</a>
                                </li>
                                <li>
                                    <a href='#'>»</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>