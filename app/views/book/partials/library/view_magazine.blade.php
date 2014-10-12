<div id="bModal" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="false" style="display: block;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3>Thông tin tài liệu</h3>
    </div>
    <div class="modal-body">
        <ul class='nav nav-tabs'>
            <li class='active'>
                <a data-toggle='tab' href='#content-{{$book->id}}'>Mô tả</a>
            </li>
            <li>
                <a data-toggle='tab' href='#dkcb-{{$book->id}}'>Trạng thái</a>
            </li>
        </ul>
        <div class='tab-content' id="book-catalog">
            <div class='tab-pane active' id='content-{{$book->id}}'>
                <div class='block table-container'>
                    <h4 class="text-center">Tài liệu: {{$book->title}}</h4>
                    <h5 class="text-info">Thông tin lưu hành</h5>
                    <table class="table table-bordered">
                        <tr>
                            <td>Thể loại</td>
                            <td>Tạp chí/Biểu mẫu</td>
                        </tr>
                        <tr>
                            <td>Ngày nhập</td>
                            <td>{{$book->created_at->format('d \t\h\á\n\g m, Y').' ('.$book->created_at->diffForHumans().')'}}</td>
                        </tr>
                        <tr>
                            <td>Người nhập</td>
                            <td>{{$book->cataloger->full_name}}</td>
                        </tr>
                        <tr>
                            <td>Ngày lưu hành</td>
                            <td>{{$book->published_at->format('d \t\h\á\n\g m, Y').' ('.$book->published_at->diffForHumans().')'}}</td>
                        </tr>
                        <tr>
                            <td>Người kiểm duyệt</td>
                            <td>{{$book->moderator->full_name}}</td>
                        </tr>
                    </table>
                    <h5 class="text-success">Thông tin tài liệu</h5>
                    <table class="table table-bordered">
                        <tr>
                            <td>Nhan đề</td>
                            <td>{{$book->title}}</td>
                        </tr>
                        <tr>
                            <td>Số tạp chí</td>
                            <td>{{$book->magazine_number}}</td>
                        </tr>
                        <tr>
                            <td>Ngày ra tạp chí</td>
                            <td>{{$book->magazine_publish_day}}</td>
                        </tr>
                        <tr>
                            <td>Phụ trương</td>
                            <td>{{$book->magazine_additional}}</td>
                        </tr>
                        <tr>
                            <td>Số đặc biệt</td>
                            <td>{{$book->magazine_special}}</td>
                        </tr>
                        <tr>
                            <td>Khu vực</td>
                            <td>{{$book->magazine_local}}</td>
                        </tr>
                    </table>
                    <h5 class="text-warning">Thông tin kiểm soát</h5>
                    <table class="table table-bordered">
                        <tr>
                            <td>Đề mục chủ đề</td>
                            <td>{{$book->subject}}</td>
                        </tr>
                        <tr>
                            <td>Mã cơ quan</td>
                            <td>{{$book->organization}}</td>
                        </tr>
                        <tr>
                            <td>Ngôn ngữ</td>
                            <td>{{$book->language}}</td>
                        </tr>
                        <tr>
                            <td>Số cutter</td>
                            <td>{{$book->cutter}}</td>
                        </tr>
                        <tr>
                            <td>Số phân loại</td>
                            <td>{{$book->type_number}}</td>
                        </tr>
                        <tr>
                            <td>Giá tiền</td>
                            <td>{{$book->price}}</td>
                        </tr>
                        <tr>
                            <td>Nơi lưu trữ</td>
                            <td>{{$path}}</td>
                        </tr>
                        <tr>
                            <td>Số lượng</td>
                            <td>{{$book->number}}</td>
                        </tr>
                        <tr>
                            <td>Mức độ</td>
                            <td><?php echo Book::$LEVELS[$book->level] ?></td>
                        </tr>
                        <tr>
                            <td>Phạm vi mượn</td>
                            <td>{{$book->scopeName()}}</td>
                        </tr>
                        <tr>
                            <td>Đối tượng được mượn</td>
                            <td>{{$book->permissionName()}}</td>
                        </tr>
                        <tr>
                            <td>Thông tin khác</td>
                            <td>{{$book->another_infor}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class='tab-pane' id='dkcb-{{$book->id}}'>
                <div class='block table-container'>
                    <h4 class="text-center">Tài liệu: {{$book->title}}</h4>
                    <table class="table table-bordered">
                        <tr>
                            <th>Mã vạch</th>
                            <th>Số ĐKCB</th>
                            <th>Trạng thái</th>
                        </tr>
                        <?php foreach ($book->bookItems as $bookItem): ?>
                            <tr>
                                <td><?php echo $bookItem->barcode ?></td>
                                <td><?php echo $bookItem->dkcb ?></td>
                                <td><?php echo $bookItem->statusLabel(); ?></td>
                            </tr>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>            
    </div>
</div>