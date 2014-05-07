<hr class="divider">
<div class="span12">
    <h4>Kết quả thống kê:</h4>
    <div class="span5">
        <table class="table table-bordered" id="table-statistics-reader">
            <tbody>
                <?php if (isset($result['all_readers'])): ?>
                    <tr class="hide">
                        <td colspan="2">Thống kê bạn đọc thư viện - <?php echo date('d \T\h\á\n\g m, Y')?></td>
                    </tr>
                    <tr>
                        <td>Tổng số bạn đọc</td>
                        <td> <?php echo $result['all_readers'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if (isset($result['borrowing_readers'])): ?>
                    <tr> 
                        <td>Bạn đọc đang mượn</td>
                        <td><?php echo $result['borrowing_readers'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if (isset($result['borrowing_times'])): ?>
                    <tr>
                        <td>Số lượt mượn:</td>
                        <td><?php echo $result['borrowing_times'] ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="clearfix"></div>
    <br>
    <div>
        <div class='span3'>
            <a href="#" class='btn btn-primary btn-export-excel' data-table="table-statistics-reader" download="thong_ke_ban_doc.xls">
                <i class='i-printer'></i>
                Excel
            </a>
        </div>
    </div>
</div>