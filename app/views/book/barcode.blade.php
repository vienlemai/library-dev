<?php $len = count($barcode) ?>
<table>
    <tbody>
        <tr>
            <td colspan='3' style="padding-bottom: 15px; text-align: center">
                Tài liệu: <span style='font-weight: bold'><?php echo $book->title ?></span>
            </td>
        </tr>
        <?php for ($i = 0; $i < $len - 3; $i += 3): ?>
            <tr style=""> 
                <td style="padding-left: 15px;padding-bottom: 15px; text-align: center">
                    <img src="<?php echo asset($barcode[$i]['barcode']) ?>"/><br/>
                    <?php echo $barcode[$i]['code'] ?>
                </td>
                <td style="padding-left: 15px;padding-bottom: 15px;; text-align: center">
                    <img src="<?php echo asset($barcode[$i + 1]['barcode']) ?>"/> <br/>
                    <?php echo $barcode[$i + 1]['code'] ?>
                </td>
                <td style="padding-left: 15px;padding-bottom: 15px;; text-align: center">
                    <img src="<?php echo asset($barcode[$i + 2]['barcode']) ?>"/><br/>
                    <?php echo $barcode[$i + 2]['code'] ?>
                </td>
            </tr>
        <?php endfor; ?>
        <tr>
            <?php while ($i < $len) {
                ?><td style="padding-left: 15px;padding-bottom: 15px;; text-align: center">
                    <img src="<?php echo asset($barcode[$i]['barcode']) ?>"/><br/>
                    <?php echo $barcode[$i]['code'] ?>
                </td>
                <?php
                $i++;
            }
            ?>
        </tr>
    </tbody>
</table>