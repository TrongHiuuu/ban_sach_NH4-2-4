<?php
    extract($result);
    include_once "inc/header_home.php";
?>
<link rel="stylesheet" href="asset/css/customerDetailOderCSS.css">
                <div class="container-bottom">
                    <div class="container-content-left">
                        <div class="container-content-left-user">
                            <b><?php echo $user_info['tenTK'];?></b>
                        </div>
                        <div class="container-content-left-userInfo">
                            <i class="fa-regular fa-user"></i>
                            <a href="?page=customerInfo" style="text-decoration: none !important; color: green;">Thông tin cá nhân</a>
                        </div>
                        <div class="container-content-left-order">
                            <i class="fa-regular fa-clipboard"></i>
                            <a href="?page=customerOrders" style="text-decoration: none !important; color: green;">Lịch sử đơn hàng</a>
                        </div>
                    </div>
                    <div class="container-content-right">
                        <div class="container-content-right-row3"> <!-- productList -->
                            <div class="container-content-right-row3-Orders">
                                <div class="container-content-right-row3-Orders-status">
                                    <div class="container-content-right-row3-Orders-status-item1">
                                        <strong>Trạng thái đơn hàng</strong>
                                    </div>
                                    <div class="container-content-right-row3-Orders-status-item2">
                                        <i class="fa-solid fa-truck"></i>
                                        Giao hàng thành công
                                    </div>
                                </div>
                                <div class="container-content-right-row3-Orders-customerInfo">
                                    <p><i class="fa-regular fa-compass"></i> Thông tin nhận hàng</p>
                                    <div id="customer-name">
                                        Lê Ngọc Quỳnh Hương
                                    </div>
                                    <div id="customer-phone">
                                        0704421999
                                    </div>
                                    <div id="customer-address">
                                        Tiểu vương quốc Bình Chánh, TP. Hồ Chí Minh
                                    </div>
                                </div>
                                <div class="container-content-right-row3-Orders-productList">
                                    <div class="container-content-right-row3-Orders-productOrder">
                                        <div class="container-content-right-row3-Orders-productOrder-img">
                                            <img src="asset/img/book878.jpg" alt="">
                                        </div>
                                        <div class="container-content-right-row3-Orders-productOrder-detail">
                                            <div class="container-content-right-row3-Orders-productOrder-detail-title">
                                                Đám Trẻ Ở Đại Dương Đen
                                            </div>
                                            <div class="container-content-right-row3-Orders-productOrder-detail-author">
                                                Tác giả: <span id="author">Châu Sa Đáy Mắt</span>
                                            </div>
                                            <div class="container-content-right-row3-Orders-productOrder-detail-quantity">
                                                x<span id="quantity">1</span>
                                            </div>
                                            <div class="container-content-right-row3-Orders-productOrder-detail-price">
                                                <span id="price">80.000</span> đ
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container-content-right-row3-Orders-productOrder">
                                        <div class="container-content-right-row3-Orders-productOrder-img">
                                            <img src="asset/img/book878.jpg" alt="">
                                        </div>
                                        <div class="container-content-right-row3-Orders-productOrder-detail">
                                            <div class="container-content-right-row3-Orders-productOrder-detail-title">
                                                Đám Trẻ Ở Đại Dương Đen
                                            </div>
                                            <div class="container-content-right-row3-Orders-productOrder-detail-author">
                                                Tác giả: <span id="author">Châu Sa Đáy Mắt</span>
                                            </div>
                                            <div class="container-content-right-row3-Orders-productOrder-detail-quantity">
                                                x<span id="quantity">1</span>
                                            </div>
                                            <div class="container-content-right-row3-Orders-productOrder-detail-price">
                                                <span id="price">80.000</span> đ
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container-content-right-row3-Orders-productOrder">
                                        <div class="container-content-right-row3-Orders-productOrder-img">
                                            <img src="asset/img/book878.jpg" alt="">
                                        </div>
                                        <div class="container-content-right-row3-Orders-productOrder-detail">
                                            <div class="container-content-right-row3-Orders-productOrder-detail-title">
                                                Đám Trẻ Ở Đại Dương Đen
                                            </div>
                                            <div class="container-content-right-row3-Orders-productOrder-detail-author">
                                                Tác giả: <span id="author">Châu Sa Đáy Mắt</span>
                                            </div>
                                            <div class="container-content-right-row3-Orders-productOrder-detail-quantity">
                                                x<span id="quantity">1</span>
                                            </div>
                                            <div class="container-content-right-row3-Orders-productOrder-detail-price">
                                                <span id="price">80.000</span> đ
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-content-right-row3-Orders-productOrder-totalPrice">
                                    <div class="container-content-right-row3-Orders-productOrder-totalPrice-text">
                                        Thành tiền:
                                    </div>
                                    <div class="container-content-right-row3-Orders-productOrder-totalPrice-price">
                                        <strong>100.000đ</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    <?php
        include_once "inc/footer.php";
    ?>