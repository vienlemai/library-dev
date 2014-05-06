<hr class="divider">
<div class="span12">
    <h4>Kết quả thống kê:</h4>
    <?php if (isset($result['all_readers'])): ?>
        <div>
            <div class='span3'>
                Tổng số bạn đọc:
            </div>
            <div class='span3'>
                <?php echo $result['all_readers'] ?>
            </div>
        </div>
        <div class="clearfix"></div>
    <?php endif; ?>
    <?php if (isset($result['borrowing_readers'])): ?>
        <div>
            <div class='span3'>
                Bạn đọc đang mượn:
            </div>
            <div class='span3'>
                <?php echo $result['borrowing_readers'] ?>
            </div>
        </div>
        <div class="clearfix"></div>
    <?php endif; ?>
    <?php if (isset($result['borrowing_times'])): ?>
        <div>
            <div class='span3'>
                Số lượt mượn:
            </div>
            <div class='span3'>
                <?php echo $result['borrowing_times'] ?>
            </div>
        </div>
        <div class="clearfix"></div>
    <?php endif; ?>
    <div>
        <div class='span3'>
            <button class='btn btn-primary'>
                <i class='i-printer'></i>
                In báo cáo
            </button>
        </div>
    </div
</div>