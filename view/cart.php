<?
    include_once "../inc/header_home.php";
?>
           <section class="container">
                <div class="container-row1">
                    <strong>GIỎ HÀNG</strong>
                </div>
                <div class="container-row2">
                    <div class="container-row2-left">
                        <div class="container-row2-left-productList">
                            <div class="container-row2-left-productList-productCard">
                                <div class="container-row2-left-productList-productCard-row1">
                                    <strong>SẢN PHẨM</strong>
                                </div>
                                <div class="container-row2-left-productList-productCard-row2">
                                    <?php
                                        if(isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0)) {
                                            $i = 0; //biến dùng để lưu index của sản phẩm trong giỏ hàng
                                            foreach ($_SESSION['cart'] as $item) {
                                                $linkdel = "cart.php?delcart=true&index=".$i;
                                                echo '
                                                    <div class="container-row2-left-productList-productCard-row2-items">
                                                        <div class="container-row2-left-productList-productCard-row2-items1">
                                                            <div class="container-row2-left-productList-productCard-row2-items1-detail1">
                                                                <img src="upload/upload_product/'.$item[1].'" alt="">
                                                            </div>
                                                            <div class="container-row2-left-productList-productCard-row2-items1-detail2">
                                                                <div class="container-row2-left-productList-productCard-row2-items1-detail3">
                                                                    '.$item[2].'
                                                                </div>
                                                                <div class="container-row2-left-productList-productCard-row2-items1-detail4">
                                                                    <input type="button" class="minus qty-form updateQty" data-index="'.$i.'" value="-" onclick="updateQuantity(this)">
                                                                    <input type="text" name="input-qty" class="input-qty" min="1" data-index="'.$i.'" value="'.$item[5].'" onkeyup="validateInputQty()">
                                                                    <input type="button" class="plus qty-form updateQty" data-index="'.$i.'" value="+" onclick="updateQuantity(this)">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="container-row2-left-productList-productCard-row2-items2">
                                                            <div class="container-row2-left-productList-productCard-row2-items2-quantityPrice">
                                                                <span class="del-price">
                                                                    <del>'.number_format($item[3], 0, ',','.').'VNĐ'.'</del>
                                                                </span>
                                                                <span class="product-price">'.number_format($item[4], 0, ',','.').' VNĐ'.'</span>
                                                            </div>
                                                            <div>
                                                                <button class="del-from-cart-btn">
                                                                    <a href="'.$linkdel.'">
                                                                        <i class="fa-regular fa-trash-can"></i>
                                                                    </a>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                ';
                                                $i++;
                                            }
                                        }
                                        else {
                                            echo '
                                            <div class="empty-cart-container">
                                                <img src="../img/empty-cart.png" alt="Giỏ hàng trống" class="empty-cart-img">
                                                <h2 class="empty-cart-header">Không có sản phẩm nào trong giỏ hàng</h2>
                                            </div>
                                            ';
                                        }
                                    ?>     
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-row2-right">
                        <div class="container-row2-right-payment">
                            <div class="container-row2-right-row1">
                                TÓM TẮT ĐƠN HÀNG
                            </div>
                            <div class="container-row2-right-row2">
                                <div class="container-row2-right-row2-quantity">
                                    <div class="container-row2-right-row2-quantity-left">
                                        Sản phẩm
                                    </div>
                                    <div class="container-row2-right-row2-quantity-right">
                                        <span class="total-qty">
                                            <?php
                                                if(isset($_SESSION['cart'])) {
                                                    echo count($_SESSION['cart']);
                                                }
                                                else {
                                                    echo 0;
                                                }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="container-row2-right-row2-shippingPrice">
                                    <div class="container-row2-right-row2-shippingPrice-left">
                                        Phí vận chuyển
                                    </div>
                                    <div class="container-row2-right-row2-shippingPrice-right">
                                        Miễn phí
                                    </div>
                                </div>
                                <div class="container-row2-right-row2-total">
                                    <div class="container-row2-right-row2-total-left">
                                        <strong>TỔNG CỘNG</strong>
                                    </div>
                                    <div class="container-row2-right-row2-total-right">
                                        <span class="total-price">
                                            <?php
                                                $totalPrice = 0;
                                                if(isset($_SESSION['cart'])) {
                                                    $i = 0;
                                                    foreach ($_SESSION['cart'] as $item) {
                                                        $totalPrice += $item[4] * $item[5];
                                                    }
                                                }
                                                echo number_format($totalPrice, 0, ',', '.').' VNĐ';
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-row3">
                    <div class="container-row3-backButton">
                        <button class="exit-cart-btn" onclick="window.location.href = 'productDetail.php'">QUAY LẠI</button>
                    </div>
                    <div class="container-row3-paymentButton">
                        <?php
                            if(isset($_SESSION['cart'])) {
                                echo '<button class="checkout-btn" onclick="window.location.href = \'checkout.php\'">THANH TOÁN</button>';
                            }
                            else {
                                echo '<button class="checkout-btn disabled">THANH TOÁN</button>';
                            }
                        ?>   
                    </div>
                </div>
            </section>
        </div>
    </body>
    <footer class="footer">
        <div class="footer-row">
            <div class="footer-row2">
                <div class="footer-row2-content">
                    <div class="footer-row2-content-items">
                        <div class="footer-row2-content-items-left1">
                            <img src="../img/bocongthuong.png" alt="">
                        </div>
                        <div class="footer-row2-content-items-left2">
                            WEBSITE CÙNG HỆ THỐNG
                        </div>
                        <div class="footer-row2-content-items-left3"> 
                            <img class="footer-row2-content-items-left3-img1" src="../img/hotdeal.png" alt="">
                            <img class="footer-row2-content-items-left3-img2" src="../img/yesgo.png" alt="">
                        </div>
                    </div>
                    <div class="footer-row2-content-items">
                        <div class="footer-row2-content-items-right1">
                            CÔNG TY CỔ PHẦN THƯƠNG MẠI DỊCH VỤ MÊ KÔNG COM
                        </div>
                        <div class="footer-row2-content-items-right2">
                            Địa chỉ: Tiểu Vương Quốc Bình Chánh <br>
                            MST: 0303615027 do Sở Kế Hoạch Và Đầu Tư Tp.HCM cấp ngày 10/03/2011 <br>
                            Tel: 028.73008182 - Fax: 028.39733234 - Email: <a style="text-decoration: none; color: #0066C0" href="">hotro@vinabook.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="../js/cart.js"></script>
<?php
    include_once "../inc/footer.php";
?>