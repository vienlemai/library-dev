<style>
    table.titiem  {
        font-size: 10px;        
        border: solid 1px #000000; padding: 0px; margin: 0px
    }
</style>
<?php $len = count($barcodes) ?>
<table>
    <tbody>
        <?php for ($i = 0; $i < $len; $i += 2): ?>
            <tr>
<<<<<<< HEAD
                <?php for ($j = $i; $j <= $i + 1; $j++): ?>
                    <td style="padding: 20px;">
                        <table class="titiem">
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
                                        <img width="80" height="80" src="{{$readers[$j]->avatar}}"/>                
                                    </td>
                                    <td>Họ và tên: {{$readers[$j]->full_name}}</td>
                                </tr>
                                <?php if ($readers[$j]->isStudent()): ?>
                                    <tr>
                                        <td>
                                            Lớp: {{$readers[$j]->class}}
                                        </td>
                                    </tr>
                                <?php else : ?>
                                    <tr>
                                        <td>
                                            Đơn vị: {{$readers[$j]->department}}
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <td>
                                        Mã thẻ: {{$readers[$j]->card_number}}
                                    </td>
                                </tr>
                                <tr>			
                                    <td>Ngày tạo: {{$readers[$j]->created_at->format('d/m/Y')}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td rowspan="1">
                                        <img src="<?php echo asset($barcodes[$j]) ?>"/><br/>
                                        {{$readers[$j]->barcode}}
                                    </td>
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
                                    <img width="100" height="100" src="{{$readers[$i]->avatar}}"/>                
                                </td>
                                <td>Họ và tên: {{$readers[$i]->full_name}}</td>
                            </tr>
    <?php if ($readers[$i]->isStudent()): ?>
                                <tr>
                                    <td>
                                        Lớp: {{$readers[$i]->class}}
                                    </td>
                                </tr>
    <?php elseif ($readers[$i]->isStaff()): ?>
                                <tr>
                                    <td>
                                        Đơn vị: {{$readers[$i]->department}}
                                    </td>
                                </tr>
    <?php else: ?>
                                <tr>
                                    <td></td>
                                </tr>
    <?php endif; ?>
                            <tr>
                                <td>
                                    Mã thẻ: {{$readers[$i]->card_number}}
                                </td>
                            </tr>
                            <tr>			
                                <td>Ngày tạo: {{$readers[$i]->created_at->format('d/m/Y')}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td rowspan="1">
                                    <img src="<?php echo asset($barcodes[$i]) ?>"/><br/>
                                    {{$readers[$i]->barcode}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <?php
                $i++;
            }

            ?>
        </tr>
=======
                <td>
                    <?php
                    echo View::make('reader.card')
                            ->with('reader', $readers[$i])
                            ->with('barcode', $barcodes[$i])->render()
                    ?>
                </td>
                <td>
                    <?php
                    if (isset($readers[$i + 1])) {
                        echo View::make('reader.card')
                                ->with('reader', $readers[$i + 1])
                                ->with('barcode', $barcodes[$i + 1])
                                ->render();
                    }
                    ?>
                </td>
            </tr>
        <?php endfor; ?>
>>>>>>> a32e90adfd30645a482e404f100e6892916c6780
    </tbody>
</table>