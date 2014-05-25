$(document).ready(function() {
    $(document).on('click', '.btn-add-to-cart, .btn-remove-from-cart', function() {
        $_booksCounter = $('#books-counter');
        $_thisLink = $(this);

        if ($_thisLink.hasClass('btn-add-to-cart')) {
            console.log('add');
        } else {
            console.log('remove');
        }

        var originalText = $_thisLink.text();
        var sendData = {book_id: $_thisLink.data('book-id')};
        $.ajax({
            type: 'POST',
            url: $_thisLink.data('url'),
            data: sendData,
            beforeSend: function() {
                $_thisLink.text('Đang xử lý ...');
            },
            complete: function() {
                $_thisLink.text(originalText);
            },
            success: function(response) {
                if (response.success) {
                    $_thisLink.toggleClass('hide');
                    if ($_thisLink.hasClass('btn-add-to-cart')) {
                        console.log('add');
                        $_thisLink.siblings('.btn-remove-from-cart').toggleClass('hide');
                    } else {
                        console.log('remove');
                        $_thisLink.siblings('.btn-add-to-cart').toggleClass('hide');
                    }
                    $_booksCounter.text(response.books_count);
                }
            }
        });
    });
});