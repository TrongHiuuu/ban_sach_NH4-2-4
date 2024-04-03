<?php
    require "../lib/connect.php";
    require "../lib/session.php";
    if(isset($_GET['page'])&&($_GET['page']!=="")){
        switch(trim($_GET['page'])){
            case 'home': {
                require_once "home.php";
                break;
            }
            case 'signIn':
                require_once "login.php";
                if (isset($_POST['sign_in'])) {
                    $inputEmail = $_POST['email'];
                    $inputPassword = $_POST['password'];
                    $sql = "SELECT * FROM taikhoan WHERE email= '$inputEmail' LIMIT 1";
                    $result = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    if (mysqli_num_rows($result) > 0) {
                        if(password_verify($inputPassword, $user['matkhau'])){
                            login_session($user['email'], $user['tenTK'], $user['phanquyen']);
                            $notif = "Đăng nhập thành công";
                            echo "<script>alert('{$notif}'')</script>";
                            switch ($user['phanquyen']) {
                                case "AD":
                                    header("Location:Admin/index.php");
                                    break;

                                case "BH":
                                    header("Location:BanHang/index.php");
                                    break;

                                case "TK":
                                    header("Location:ThuKho/index.php");
                                    break;

                                /*case "DN":
                                    header("Location:Admin/index.php");
                                    break;
                                */
                            }  
                        }  
                        else {
                            echo "<script>alert('Mật khẩu không đúng, vui lòng nhập lại')</script>";
                        }   
                    }
                    else {
                        echo "<script>alert('Tài khoản không tồn tại')</script>";
                    }
                }
                break;
            case 'forgotPassword':
                require_once "forgotPassword.php";
                if (isset($_POST['submit'])) {
                    $inputEmail = $_POST['email'];
                    $sql = "SELECT * FROM taikhoan WHERE email= '$inputEmail' LIMIT 1";
                    $result = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    if (mysqli_num_rows($result) > 0) {
                        $n_password = password_hash("1", PASSWORD_DEFAULT);
                        $sql = "UPDATE taikhoan SET matkhau= '$n_password' WHERE email='".$inputEmail."' LIMIT 1";
                        $sql_run = mysqli_query($conn, $sql);
                        echo "<script>alert('Đã đổi mật khẩu về 1')</script>";
                        header("location:index.php?page=signIn");
                    }
                    else {
                        echo "<script>alert('Tài khoản không tồn tại')</script>";
                    } 
                }
                break;  
        }
    }
    else {
        require_once "home.php";
    }
?>