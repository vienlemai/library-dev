<div class="book-a">
    <div class="new_products">
        <?php foreach ($books as $book): ?>
            <div class="new_prod_box">
                <a href="details.html"><?php echo $book->title ?></a>
                <div class="new_prod_bg">

                </div>           
            </div>
        <?php endforeach; ?>
        <div class="pagination">
            <span class="disabled">&lt;&lt;</span><span class="current">1</span><a href="#?page=2">2</a><a href="#?page=3">3</a>…<a href="#?page=199">10</a><a href="#?page=200">11</a><a href="#?page=2">&gt;&gt;</a>
        </div>
    </div>        
</div>
