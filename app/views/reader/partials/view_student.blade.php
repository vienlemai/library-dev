<table class="table table-bordered">
    <tr>
        <td>Mã thẻ</td>
        <td>{{$reader->card_number}}</td>
    </tr>
    <tr>
        <td>Họ tên</td>
        <td>{{$reader->full_name}}</td>
    </tr>
    <tr>
        <td>Ngày sinh</td>
        <td>{{$reader->year_of_birth}}</td>
    </tr>
    <tr>
        <td>Quê quán</td>
        <td>{{$reader->hometown}}</td>
    </tr>
    <tr>
        <td>Lớp</td>
        <td>{{$reader->class}}</td>
    </tr>
    <tr>
        <td>Niên khóa</td>
        <td>{{$reader->school_year}}</td>
    </tr>
    <tr>
        <td>Chuyên ngành</td>
        <td>{{$reader->subject}}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>{{$reader->email}}</td>
    </tr>
    <tr>
        <td>Điện thoại</td>
        <td>{{$reader->phone}}</td>
    </tr>
</table>