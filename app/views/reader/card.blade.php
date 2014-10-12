<style>
    table.titiem  {
        font-size: 10px;        
        border: solid 1px #000000; padding: 0px; margin: 0px
    }
    .text-center {
        text-align: center;
    }
    .card-header{ font-size: 9px; }
    .card-title {
        font-weight: bold; 
        font-size: 12px;
        margin-left: 15px;
    }
    .card-photo {
        width: 65px;
        height: 65px;
    }
    .card-number {
        font-weight: bold;
        text-align: center;
    }
    .name {
        font-weight: bold;
    }
    .barcode {
        height: 30px;
    }
    .barcode-number {
        padding-left: 30px;
    }
    table.titiem hr { margin: 0px; padding: 0px;}
</style>
<table class="titiem">
    <tbody>
        <tr class="card-header">
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
                <div class="card-number">{{$reader->card_number}}</div>
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
    </tbody>
</table>