$(function () {

    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    });

    $('.remove-cart').click(function(e){
        e.preventDefault();

        $removeId = $(this).data('remove-cart');

        $(`form#remove-cart-${$removeId}`).submit();
    });

    $('.save-for-later').click(function(e){
        e.preventDefault();

        $saveId = $(this).data('save-for-later');

        $(`form#save-for-later-${$saveId}`).submit();
    });

    $('.move-to-cart').click(function(e){
        e.preventDefault();

        $moveId = $(this).data('move-to-cart');

        $(`form#move-to-cart-${$moveId}`).submit();
    });

    $('.remove-save-for-later').click(function(e){
        e.preventDefault();

        $removeId = $(this).data('remove-save-for-later');

        $(`form#remove-save-for-later-${$removeId}`).submit();
    });

    $('.ui.checkbox').checkbox();
    $('.ui.dropdown').dropdown();

    $('.message .close')
        .on('click', function () {
            $(this)
                .closest('.message')
                .transition('fade');
        });

    // Change Cart Quanitity
    $('.quantity').change(function(e){
        e.preventDefault();

        var id = $(this).data('id');
        var quantity = $(this).val();

        $.ajax({
            url: `/cart/${id}`,
            method: 'PATCH',
            data: {quantity: quantity},
            dataType: 'JSON'
        })
        .then(response => {
            if(response) {
                location.reload();
            }
        })
        .catch(error => {
            location.reload();
        });
    });

});
