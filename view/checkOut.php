<?php
    extract($result);
    include_once "inc/header_home.php";
?>
<link rel="stylesheet" href="asset/css/payMentCSS.css">
<form action="?page=checkOut" method="post">
                <section class="container">
                    <div class="container-row1">
                        <div class="container-row1-left">
                            <div class="container-row1-left-group1">
                                <div class="container-row1-title">
                                    <strong>THÔNG TIN NHẬN HÀNG</strong>
                                </div>
                                <!-- <form class="container-row3-form" action=""> -->
                                <div class="container-row3-form">
                                    <div class="container-row3-form-items">
                                        <strong>Địa chỉ nhận hàng <span style="color: #D64830">*</span></strong>
                                        <input type="text" id="diachinhan" name="diachinhan" placeholder="Số nhà, đường, phường/xã, quận/huyện, tỉnh/thành phố">
                                    </div>
                                </div>                                 
                                <!-- </form> -->
                            </div>
                        <div class="container-row1-right">
                            <div class="container-row2-right-payment">
                                <div class="container-row2-right-row1">
                                    CHI TIẾT THANH TOÁN
                                </div>
                                <div class="container-row2-right-row2">
                                    <div class="container-row2-right-row2-shippingPrice">
                                        <div class="container-row2-right-row2-shippingPrice-left">
                                            Phí vận chuyển
                                        </div>
                                        <div class="container-row2-right-row2-shippingPrice-right">
                                            Miễn phí
                                        </div>
                                    </div>
                                    <div class="container-row2-right-row2-paymentMethods">
                                        <div class="container-row2-right-row2-paymentMethods-txt">
                                            Hình thức thanh toán
                                        </div>
                                        <div class="container-row2-right-row2-paymentMethods-COD">
                                            Thanh toán khi nhận hàng
                                        </div>
                                    </div>
                                    <div class="container-row2-right-row2-total">
                                        <div class="container-row2-right-row2-total-left">
                                            <strong>TỔNG CỘNG</strong>
                                        </div>
                                        <div class="container-row2-right-row2-total-right">
                                            <span id="totalprice">
                                                <?=number_format($total_price, 0 , ',', '.').' VNĐ'?>
                                            </span>
                                            <input type="hidden" name="totalPrice" value="<?=$total_price?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-row4">
                        <div class="container-row4-backButton">
                            <button class="exit-checkout-btn"">QUAY LẠI</button>
                        </div>
                        <div class="container-row4-nextButton">
                            <input type="submit" id="order-submit" name="orderSubmit" value="ĐẶT HÀNG">
                        </div>
                    </div>
                </section>
            </form>
        </div>
        <script src="asset/js/checkout.js"></script>
<?php
    include_once     "inc/footer.php";
?>