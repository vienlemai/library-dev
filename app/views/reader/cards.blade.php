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
        font-weight: 800; 
        font-size: 16px;
        margin-left: 15px;
    }
    .card-photo {
        width: 80px;
        height: 80px;
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
<?php $len = count($barcodes) ?>
<table>
    <tbody>
        <?php for ($i = 0; $i < $len - 2; $i += 2): ?>
            <tr>
                <?php for ($j = $i; $j <= $i + 1; $j++): ?>
                    <td style="padding: 15px;">
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
                                        <img class='card-photo' src="<?php echo asset($readers[$j]->avatar) ?>"/>                
                                    </td>
                                    <td class='card-title'  style='padding-left: 10px;'>THẺ THƯ VIỆN</td>
                                </tr>

                                <tr>
                                    <td  style='padding-left: 10px;'>Họ và tên: <span class='name'>{{$readers[$j]->full_name}}</span></td>
                                </tr>
                                <?php if ($readers[$j]->isStudent()): ?>
                                    <tr>
                                        <td style='padding-left: 10px;'>
                                            Lớp: {{$readers[$j]->class}}
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <tr>
                                        <td  style='padding-left: 10px;'>
                                            Đơn vị: {{$readers[$j]->department}}
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <td  style='padding-left: 10px;'>
                                        Ngày tạo: {{$readers[$j]->created_at->format('d/m/Y')}}
                                    </td>
                                </tr>
                                <tr>
                                    <td  style='padding-left: 10px;'>
                                        <img class='barcode' src="<?php echo asset($barcodes[$j]) ?>"/>
                                        <br>
                                        <span class='barcode-number'>{{$readers[$j]->barcode}}</span>
                                    </td>
                                </tr>
                                <tr>			
                                    <td class='card-number'>{{$readers[$j]->card_number}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </td> 
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
        <tr>
            <?php while ($i < $len) {

                ?><td style="padding: 20px">
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
                                    <img class='card-photo' src="<?php echo asset($readers[$i]->avatar) ?>"/>                
                                </td>
                                <td class='card-title'  style='padding-left: 10px;'>THẺ THƯ VIỆN</td>
                            </tr>

                            <tr>
                                <td  style='padding-left: 10px;'>Họ và tên: <span class='name'>{{$readers[$i]->full_name}}</span></td>
                            </tr>
                            <?php if ($readers[$i]->isStudent()): ?>
                                <tr>
                                    <td style='padding-left: 10px;'>
                                        Lớp: {{$readers[$i]->class}}
                                    </td>
                                </tr>
                            <?php else: ?>
                                <tr>
                                    <td  style='padding-left: 10px;'>
                                        Đơn vị: {{$readers[$i]->department}}
                                    </td>
                                </tr>
                            <?php endif; ?>
                            <tr>
                                <td  style='padding-left: 10px;'>
                                    Ngày tạo: {{$readers[$i]->created_at->format('d/m/Y')}}
                                </td>
                            </tr>
                            <tr>
                                <td  style='padding-left: 10px;'>
                                    <img class='barcode' src="<?php echo asset($barcodes[$i]) ?>"/>
                                    <br>
                                    <span class='barcode-number'>{{$readers[$i]->barcode}}</span>
                                </td>
                            </tr>
                            <tr>			
                                <td class='card-number'>{{$readers[$i]->card_number}}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <?php
                $i++;
            }

            ?>
        </tr>
    </tbody>
</table>