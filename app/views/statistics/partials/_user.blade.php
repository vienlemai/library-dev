<div class="row-actions">
    <h4 class="text-left text-success">Các hoạt động của  <?php echo $userTitle . ' ' . $timeTitle ?></h4>
</div>
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
