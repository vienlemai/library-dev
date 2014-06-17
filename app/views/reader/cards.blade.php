<style>
    table * {
        font-size: 10px;
    }
</style>
<?php $len = count($barcodes) ?>
<table>
    <tbody>
        <?php for ($i = 0; $i < $len; $i += 2): ?>
            <tr>
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
    </tbody>
</table>