@extends('layouts.admin')
@section('currentMenu','dashboard')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Trang chủ
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            <div class='span7'>
                <div class='block'>
                    <div class='head'>
                        <h2>Hoạt động gần nhất</h2>
                    </div>
                    <div class='content'>
                        <?php foreach ($activities as $activity) : ?>
                            <?php $author = $activity->author ?>
                            <?php $object = $activity->getObject() ?>
                            <p>
                                <span class='muted activity-time'>
                                    <?php echo $activity->getTime() ?>
                                </span>
                                <?php echo $author->group->name ?>
                                <span class='username'>
                                    <?php echo $author->full_name ?>
                                </span>
                                <?php echo $activity->actionInString() ?>
                                <span class='document-title'>
                                    <?php echo $object->representString() ?>
                                </span>
                            </p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class='span5'>
                <div class='block'>
                    <div class='head'>
                        <h2>
                            Thông tin tổng quát
                        </h2>
                    </div>
                    <div class='content'>
                        <div class='content-row'>
                            <div class='span5'>
                                Tổng số tài liệu
                            </div>
                            <div class='span5'>
                                4500
                            </div>
                        </div>
                        <div class='content-row'>
                            <div class='span5'>
                                Tổng số bạn đọc
                            </div>
                            <div class='span5'>
                                670
                            </div>
                        </div>
                        <div class='content-row'>
                            <div class='span5'>
                                Tổng số nhân viên
                            </div>
                            <div class='span5'>
                                15
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='row-fluid'>
            <div class='block'>
                <div class='head'>
                    <h2>Lịch sử lưu thông</h2>
                </div>
                <div class='content np'>
                    <table cellpadding='0' cellspacing='0' class='bordered-b' width='100%'>
                        <thead>
                            <tr>
                                <th>Bạn đọc</th>
                                <th>Thao tác</th>
                                <th>Tài liệu</th>
                                <th>Số lượng</th>
                                <th>Thời gian</th>
                                <th>Thủ thư</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Lê Anh Tuấn</td>
                                <td>Trả</td>
                                <td>Tắt đèn</td>
                                <td>3</td>
                                <td>11:11 AM 28/02/2014</td>
                                <td>Nguyễn Ánh Tuyết</td>
                            </tr>
                            <tr>
                                <td>Lê Anh Tuấn</td>
                                <td>Mượn</td>
                                <td>Đồi gió hú</td>
                                <td>4</td>
                                <td>11:39 AM 28/02/2014</td>
                                <td>Lê Văn Hải</td>
                            </tr>
                            <tr>
                                <td>Phạm Thanh Thảo</td>
                                <td>Mượn</td>
                                <td>Tập thơ Xuân Diệu</td>
                                <td>1</td>
                                <td>09:42 AM 28/02/2014</td>
                                <td>Phạm Trường Giang</td>
                            </tr>
                            <tr>
                                <td>Phạm Thanh Thảo</td>
                                <td>Trả</td>
                                <td>Đồi gió hú</td>
                                <td>3</td>
                                <td>09:59 AM 28/02/2014</td>
                                <td>Nguyễn Thị Hoa</td>
                            </tr>
                            <tr>
                                <td>Nguyễn Danh Hải</td>
                                <td>Mượn</td>
                                <td>Thám tử Shelock Home</td>
                                <td>2</td>
                                <td>11:22 AM 28/02/2014</td>
                                <td>Ngô Văn Hòa</td>
                            </tr>
                            <tr>
                                <td>Lê Anh Tuấn</td>
                                <td>Trả</td>
                                <td>Đắc nhân tâm</td>
                                <td>5</td>
                                <td>12:10 PM 28/02/2014</td>
                                <td>Ngô Văn Hòa</td>
                            </tr>
                            <tr>
                                <td>Thái Văn Thịnh</td>
                                <td>Mượn</td>
                                <td>Nhật ký trong tù</td>
                                <td>4</td>
                                <td>10:26 AM 28/02/2014</td>
                                <td>Lê Văn Hải</td>
                            </tr>
                            <tr>
                                <td>Mai Xuân Thành</td>
                                <td>Mượn</td>
                                <td>Nhật ký trong tù</td>
                                <td>2</td>
                                <td>11:55 AM 28/02/2014</td>
                                <td>Lê Văn Huy</td>
                            </tr>
                            <tr>
                                <td>Võ Thị Hiếu</td>
                                <td>Mượn</td>
                                <td>Tạp chí công nghệ số 17</td>
                                <td>2</td>
                                <td>12:27 PM 28/02/2014</td>
                                <td>Thái Thị Trinh</td>
                            </tr>
                            <tr>
                                <td>Phan Thành Quyết</td>
                                <td>Trả</td>
                                <td>Tắt đèn</td>
                                <td>1</td>
                                <td>09:24 AM 28/02/2014</td>
                                <td>Lê Văn Hải</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class='footer'>
                    <div class='side text-center'>
                        <a class='btn btn-primary' href='lich_su_kiem_ke.html'>Xem thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop