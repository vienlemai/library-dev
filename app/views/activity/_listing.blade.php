<div class='head'>
    <h2>Hoạt động thư viện</h2>
    <div class="toolbar-table-right">
        <a href="#" data-url="<?php echo route('activity.delete.all') ?>" class="btn btn-primary" btn-confirm="confirm" data-confirm="Bạn có chắc chắn muốn xóa ?">Xóa tất cả hoạt động</a>
    </div>
</div>
<div class='content np' id="activities-wrapper">
    <?php if ($activities->count() != 0) : ?>
        <table cellpadding='0' cellspacing='0' class='sort' width='100%'>
            <thead>
                <tr>
                    <th>Người dùng</th>
                    <th>Thao tác</th>
                    <th>Thời gian</th>
                </tr>
            </thead>
            <tbody>		
                <?php foreach ($activities as $activity) : ?>
                    <?php
                    $author = $activity->author;
                    $object = $activity->object;

                    ?>
                    <tr>
                        <td>
                            <?php echo $author->authorType() ?>
                            <span class='username'>
                                <?php echo $author->authorName() ?>
                            </span>
                        </td>
                        <td>
                            <?php echo $activity->actionInString() . ':' ?>
                            <span class="document-title">
                                <?php echo $object->representString() ?>
                            </span>
                        </td>
                        <td>
                            <?php echo $activity->getTime() ?> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>		
        </table>
    <?php else : ?>
        <!--<p class="text-warning">Không tìm thấy hoạt động nào!</p>-->
    <?php endif; ?>
</div>
<div class='footer'>
    <div class="side">
        <?php if ($activities->count() != 0) : ?>
            <div class='fl'>
                Hiển thị {{$activities->count()}}/{{$activities->getTotal()}} hoạt động
            </div>
        <?php endif; ?>
        <div class='fr'>
            <div class='pagination'>
                <?php $activities->setBaseUrl(route('activity.search')) ?>
                <?php echo $activities->links() ?>
            </div>
        </div>
    </div>
</div>



