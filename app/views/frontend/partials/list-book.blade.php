<div id="books-list">
    <?php foreach ($books as $book): ?>
        <div class="book-box">
            <h4 class="book-title">
                <a href="details.html"> <?php echo $book->title ?></a>
            </h4>
            <div class="book-description">
                <ul class="">
                    <li>Thể loại:</li>
                    <li>Tác giả:</li>
                    <li>Năm XB:</li>
                    <li>Quốc gia:</li>
                    <li>Trạng thái</li>
                </ul>
            </div>        
            <div class="book-foot text-muted">
                Lượt mượn: 150
            </div>
        </div>
    <?php endforeach; ?>
    <div class="clearfix"></div>
    <div class="pagination">
        <span class="disabled">&lt;&lt;</span>
        <span class="current">1</span><a href="#?page=2">2</a><a href="#?page=3">3</a>…<a href="#?page=199">10</a><a href="#?page=200">11</a><a href="#?page=2">&gt;&gt;</a>
    </div>
</div>        