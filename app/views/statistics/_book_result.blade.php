<hr class="divider">
<div class="span12">
    <h4>Kết quả thống kê:</h4>
    <div class="span5">
        <table class="table table-bordered" id="table-statistics-reader">
            <tbody>
                <tr class="hide">
                    <td colspan="2">Thống kê tài liệu thư viện - <?php echo date('d \T\h\á\n\g m, Y') ?></td>
                </tr>
                <?php if (isset($result['all_books'])): ?>
                    <tr>
                        <td>Tổng số tài liệu</td>
                        <td> <?php echo $result['all_books'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if (isset($result['books'])): ?>
                    <tr>
                        <td>Sách</td>
                        <td> <?php echo $result['books'] ?></td>
                    </tr>
                <?php endif; ?>
                <?php if (isset($result['magazines'])): ?>
                    <tr>
                        <td>Tạp chí/Biểu mẫu</td>
                        <td> <?php echo $result['magazines'] ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="clearfix"></div>
    <br>
    <div>
        <div class='span3'>
            <a href="#" class='btn btn-primary btn-export-excel' data-table="table-statistics-reader" download="thong_ke_tai_lieu.xls">
                <i class='i-printer'></i>
                Excel
            </a>
        </div>
    </div>
</div>