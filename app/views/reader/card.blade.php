<table style="border: solid 1px #000000; padding: 5px">
    <tbody>
        <tr>
            <td>Trường TC CSGT</td>
            <td>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</td>
        </tr>
        <tr>
            <td>Thư viện</td>
            <td>Thẻ thư viện</td>
        </tr>
        <tr>
            <td rowspan="4">
                <img width="100" height="100" src="<?php echo asset($reader->avatar) ?>"/>                
            </td>
            <td>Họ và tên: {{$reader->full_name}}</td>
        </tr>
        <?php if ($reader->isStudent()): ?>
            <tr>
                <td>
                    Lớp: {{$reader->class}}
                </td>
            </tr>
        <?php elseif ($reader->isStaff()): ?>
            <tr>
                <td>
                    Đơn vị: {{$reader->department}}
                </td>
            </tr>
        <?php else: ?>
            <tr>
                <td></td>
            </tr>
        <?php endif; ?>
        <tr>
            <td>
                Mã thẻ: {{$reader->card_number}}
            </td>
        </tr>
        <tr>			
            <td>Ngày tạo: {{$reader->created_at->format('d/m/Y')}}</td>
        </tr>
        <tr>
            <td></td>
            <td rowspan="1">
                <img src="<?php echo asset($barcode) ?>"/><br/>
                {{$reader->barcode}}
            </td>
        </tr>
    </tbody>
</table>