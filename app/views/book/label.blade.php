<?php $len = count($bookItems) ?>
<table style="text-align: center;">
    <tbody>
        <?php for ($i = 0; $i < $len - 3; $i += 3): ?>
            <tr>
                <?php for ($j = $i; $j < $i + 3; $j++): ?>
                    <td style="padding: 20px">
                        <table style="text-align: center; border: 4px #151515 double;width: 120px; height: 140px">
                            <tbody>
                                <tr>
                                    <td>TV-T52</td>
                                </tr>
                                <tr>
                                    <td><?php echo $bookItems[$j]->book->type_number ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $bookItems[$j]->book->cutter ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo 'C' . $bookItems[$j]->sequence ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $bookItems[$j]->book->year_publish ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo $bookItems[$j]->dkcb ?></td>
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
                    <table style="text-align: center; border: 4px #151515 double;width: 120px; height: 140px">
                        <tbody>
                            <tr>
                                <td>TV-T52</td>
                            </tr>
                            <tr>
                                <td><?php echo $bookItems[$i]->book->type_number ?></td>
                            </tr>
                            <tr>
                                <td><?php echo $bookItems[$i]->book->cutter ?></td>
                            </tr>
                            <tr>
                                <td><?php echo 'C' . $bookItems[$i]->sequence ?></td>
                            </tr>
                            <tr>
                                <td><?php echo $bookItems[$i]->book->year_publish ?></td>
                            </tr>
                            <tr>
                                <td><?php echo $bookItems[$i]->dkcb ?></td>
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