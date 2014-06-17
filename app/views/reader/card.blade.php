<style>
    table * {
        font-size: 10px;
    }
    .text-center {
        text-align: center;
    }
    .card-title {
        font-weight: 800; 
        font-size: 16px;
        margin-left: 20px;
    }
    .card-photo {
        width: 100px;
        height: 120px;
    }
    .card-number {
        font-weight: bold;
        text-align: center;
    }
    .name {
        font-weight: bold;
    }
    .barcode {
        height: 35px;
    }
    .barcode-number {
         padding-left: 30px;
    }
</style>
<table style="border: solid 1px #000000; padding: 5px">
    <tbody>
        <tr>
            <td>Trường TC CSGT</td>
            <td>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</td>
        </tr>
        <tr>
            <td style='padding-left: 20px'>Thư viện</td>
            <td class='text-center'>Độc lập - Tự do - Hạnh phúc</td>
        </tr>
        <tr>
            <td colspan="2">
                <hr>
            </td>
        </tr>
        <tr>
            <td rowspan="5">
                <img class='card-photo' src="<?php echo asset($reader->avatar) ?>"/>                
            </td>
            <td class='card-title'  style='padding-left: 10px;'>THẺ THƯ VIỆN</td>
        </tr>

        <tr>
            <td  style='padding-left: 10px;'>Họ và tên: <span class='name'>{{$reader->full_name}}</span></td>
        </tr>
        <?php if ($reader->isStudent()): ?>
            <tr>
                <td style='padding-left: 10px;'>
                    Lớp: {{$reader->class}}
                </td>
            </tr>
        <?php else: ?>
            <tr>
                <td  style='padding-left: 10px;'>
                    Đơn vị: {{$reader->department}}
                </td>
            </tr>
        <?php endif; ?>
        <tr>
            <td  style='padding-left: 10px;'>
                Ngày tạo: {{$reader->created_at->format('d/m/Y')}}
            </td>
        </tr>
        <tr>
            <td  style='padding-left: 10px;'>
                <img class='barcode' src="<?php echo asset($barcode) ?>"/>
                <br>
                <span class='barcode-number'>{{$reader->barcode}}</span>
            </td>
        </tr>
        <tr>			
            <td class='card-number'>{{$reader->card_number}}</td>
        </tr>
    </tbody>
</table>