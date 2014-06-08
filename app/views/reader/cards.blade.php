<?php $len = count($barcodes) ?>
<table>
    <tbody>
        <?php for ($i = 0; $i < $len - 2; $i += 2): ?>
            <tr>
                <?php for ($j = $i; $j <= $i + 1; $j++): ?>
                    <td style="padding: 20px;">
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
                                        <img width="100" height="100" src="{{$readers[$j]->avatar}}"/>                
                                    </td>
                                    <td>Họ và tên: {{$readers[$j]->full_name}}</td>
                                </tr>
                                <?php if ($readers[$j]->isStudent()): ?>
                                    <tr>
                                        <td>
                                            Lớp: {{$readers[$j]->class}}
                                        </td>
                                    </tr>
                                <?php elseif ($readers[$j]->isStaff()): ?>
                                    <tr>
                                        <td>
                                            Đơn vị: {{$readers[$j]->department}}
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <tr>
                                        <td></td>
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
    </tbody>
</table>