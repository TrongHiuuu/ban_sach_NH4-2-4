

<?php
    include_once "inc/header_signIn.php";
    extract($result);
?>
    <div class="container">
            <ul class="container-row">
                <div class="container-row1">
                    <li class="container-row1-items">
                        Trang chủ
                    </li>
                    <li class="container-row1-items">
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li class="container-row1-items">
                        Đăng nhập
                    </li>
                </div>
            </ul>
            <ul class="container-row">
                <div class="container-row2">
                    <li class="container-row1-items">
                        <h2>Đăng nhập vào tài khoản</h2>
                        <div class="container-row1-items-hr"></div>
                    </li>
                </div>
            </ul>
            <ul class="container-row">
                <div class="signIn-box">
                    <div class="signIn-box-row1">
                        Đăng nhập
                    </div>
                    <div class="signIn-box-row2">
                    </div>
                    <div class="signIn-box-row3">
                        <div class="signIn-box-row3-form">
                            <form action="?page=signIn" method="POST">
                                <div class="signIn-box-row3-form-items">
                                    <strong>Email<span style="color: #D64830">*</span></strong><input type="text" name="email" id="email">
                                </div>
                                <div class="signIn-box-row3-form-items">
                                    <strong>Mật khẩu<span style="color: #D64830">*</span></strong><input type="password" name="password" id="email">
                                </div>
                                <div class="signIn-box-row3-form-errorMssg">
                                    Tài khoản hoặc mật khẩu không hợp lệ, vui lòng kiểm tra lại.
                                </div>
                                <div class="signIn-box-row3-form-forgotPassword">
                                    <i>Bạn đã <a href="?page=forgotPassword1">quên mật khẩu?</a></i>
                                </div>
                                <div class="signIn-box-row3-right-button"> <button type="submit" name="sign_in"> ĐĂNG NHẬP</button></div>
                            </form>
                        </div>
                    </div>
                    <div class="signIn-box-row5">
                        Chưa có tài khoản? <a style="text-decoration: none; color: #0066C0" href="?page=signUp">Đăng ký ngay</a>
                    </div>
                </div>
            </ul>
        </div>
    <?php
        include_once "inc/footer.php";
    ?>