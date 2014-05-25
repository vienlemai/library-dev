$(document).ready(function() {
    $(document).on('click', '.btn-add-to-cart', function() {
        $_thisLink = $(this);
        $.ajax({
            type: 'POST',
            url: $_thisLink.data('url'),
            success: function(response) {
                var html = response.html;
            }
        });
    });
    $(document).on('click', '.btn-remove-from-cart', function() {
        $_thisLink = $(this);
        $.ajax({
            type: 'POST',
            url: $_thisLink.data('url'),
            success: function(response) {
                var html = response.html;
            }
        });
    });
});