$(document).ready(function () {
    $('.exit-checkout-btn').click(function (e) { 
        e.preventDefault();
        window.location.href = 'cart.php';
    });

    $('#order-submit').on('click', function () {
        if($('#diachinhan').val() === '') {
            alert("Vui lòng nhập địa chỉ nhận hàng");
            $('#diachinhan').focus();
            return false;
        }
        else {
            return true;
        }
    });
});
