@extends('layouts.admin')
@section('content')
<div class="wrap">
    <div class='head'>
        <div class='page-title'>
            Chi tiết kiểm kê
        </div>
    </div>
    <div class='content'>
        <div class='row-fluid'>
            <div class='block'>
                <div class='content'>
                    <h4>Thông tin mô tả</h4>
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <td width="20%">Tiêu đề: </td>
                                <td>{{$inventory->title}}</td>
                            </tr>
                            <tr>
                                <td>Người tạo: </td>
                                <td>{{$inventory->creator->full_name}}</td>
                            </tr>
                            <tr>
                                <td>Lý do: </td>
                                <td>{{$inventory->reason}}</td>
                            </tr>
                            <tr>
                                <td>Ngày bắt đầu: </td>
                                <td>{{$inventory->created_at->format('H:i, d \t\h\á\n\g m, Y')}}</td>
                            </tr>
                            <tr>
                                <td>Ngày kết thúc: </td>
                                <td>{{$inventory->end_at->format('H:i, d \t\h\á\n\g m, Y')}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <h4>Thông tin chi tiết</h4>
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <td width="20%">Tổng số tài liệu ban đầu : </td>
                                <td>{{$bookTotal}}</td>
                            </tr>
                            <tr>
                                <td>Tổng số tài liệu trong kho : </td>
                                <td>{{$booksStored}}</td>
                            </tr>

                            <tr>
                                <td>Tổng số tài liệu chưa thu hồi: </td>
                                <td>{{$booksLended}}</td>
                            </tr>
                            <tr>
                                <td>Tổng số tài liệu đã quét: </td>
                                <td>
                                    <ul>
                                        <?php foreach ($booksScanned as $row): ?>
                                            <li><?php echo $row['name'] . ': ' . $row['count'] ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>Số tài liệu thất lạc</td>
                                <td><?php echo $bookLose ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop