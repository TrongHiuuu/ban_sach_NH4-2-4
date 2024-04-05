<?php
include 'config/config.php';
include 'lib/connect.php';
require 'model/product.php';
require 'model/category.php';
require 'model/order.php';
include 'lib/session.php';
include "model/customer.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require "view/vendor/autoload.php";


if(isset($_GET['page'])&&($_GET['page']!=="")){
    switch(trim($_GET['page'])){
        case 'home':
            $result = getLimitProductBestSeller(12);
            $category = getAllCategory();
            require_once 'view/home.php'; 
            break;

        case 'bestseller':
            $result = getAllProductBestSeller();
            $category = getAllCategory();
            $title = "Sách Bán Chạy";
            $thingToSearch = "category";
            $thingToSearchVal = -1;
            require_once 'view/search.php';
            break;

        case 'category':
            if(isset($_GET['idTL'])){
                $idTL = $_GET['idTL'];
                $category = getAllCategory();   
                // sach thuoc the loai can tim
                $result = getAllProductByCategory($idTL);
                // thong tin the loai can tim
                $categorySearch = getCategoryByID($idTL);
                $title = $categorySearch['tenTL'];
                $thingToSearch = "category";
                $thingToSearchVal = $idTL;
                if($result!=null) require_once 'view/search.php';
                else require_once 'view/noFound.php';
            }
            break;

        case 'search':
            if(isset($_POST['search'])){
                $kyw = $_POST['kyw'];
                if($kyw !== ""){
                $result = searchProduct($kyw);
                $category = getAllCategory();
                $title = $kyw;
                $thingToSearch = "basic";
                $thingToSearchVal = $kyw;
                if($result!=null) require_once 'view/search.php';
                else require_once 'view/noFound.php';
                }
                else header("Location: ?page=home");
            }
            break;

        case 'filter':
            if(isset($_POST['filter-btn'])){
                $minPrice = $_POST['minPrice'];
                $maxPrice = $_POST['maxPrice'];
                $thingToSearch = $_POST['thingToSearchInput'];
                $thingToSearchVal = $_POST['thingToSearchValInput'];
                $title = $_POST['title'];
                $result = null;
                $category = getAllCategory();

                // kyw - price
                if($thingToSearch == "basic")
                    $result = filterProductByKeyword($thingToSearchVal, $minPrice, $maxPrice);
                else if($thingToSearch == "category"){
                    
                    // bestseller - price
                    if($thingToSearchVal == -1)
                        $result = filterBestsellerProduct($minPrice, $maxPrice);

                    // category - price
                    else $result = filterCategoryProduct($thingToSearchVal, $minPrice, $maxPrice);
                }

                if($result!=null) require_once 'view/search.php';
                else require_once 'view/noFound.php';
            }
            break;
        
        case 'productDetail':
            if(isset($_GET['idSach'])){
                $result = getProductById($_GET['idSach']);
                $tenTL = "";
                if(isset($_GET['idTL'])){
                    $theloai = getCategoryById($_GET['idTL']);
                    $tenTL = $theloai['tenTL'];
                }
                $category = getAllCategory();   
                require_once 'view/productDetail.php';
            }
            break;

        case 'order':
            $idTK = 1;
            $result = getOneOrderByIdTK($idTK);
            $category = getAllCategory();   
            require_once 'view/order.php';
            break;

        case 'orderDetail':
            if(isset($_GET['idDH'])){
                $idDH = $_GET['idDH'];
                $idTK = 1;
                $customer = getOneCustomerById($idTK);
                $detail = getDetailOrderByIdDH($idDH);
                $order = getOrderByIdDH($idDH);
                $category = getAllCategory();   
                require_once 'view/orderDetail.php';
            }
            break;

        case 'cancelOrder':
            if(isset($_GET['idDH']) && isset($_POST['cancel'])){
                $idDH = $_GET['idDH'];
                orderCancelledByCustomer($idDH);
                $category = getAllCategory();
                require_once 'view/orderCancel.php';
            }
            break;
        
            //Cua Hieu neeee
        
        case 'signIn':
            require "view/signIn.php";
            break;

        case 'signInProcess':
            if (isset($_POST['sign_in'])) {
                $inputEmail = $_POST['email'];
                $inputPassword = $_POST['password'];
                $sql = "SELECT * FROM taikhoan WHERE email= '$inputEmail' LIMIT 1";
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if (mysqli_num_rows($result) > 0) {
                    if(password_verify($inputPassword, $user['matkhau'])){
                        login_session($user['email'], $user['tenTK'], $user['phanquyen']);
                        $result = getLimitProductBestSeller(12);
                        $category = getAllCategory();
                        $notif = "Đăng nhập thành công";
                        echo "<script>alert('{$notif}'')</script>";
                        require_once 'view/home.php';    
                    }  
                    else {
                        echo "<script>alert('Mật khẩu không đúng, vui lòng nhập lại')</script>";
                        require_once 'view/signIn.php';
                    }   
                }
                else {
                    echo "<script>alert('Tài khoản không tồn tại')</script>";
                    require_once 'view/signIn.php';
                }
            }
            break;

        case 'signUp':
            require "view/signUp.php";
            break;

        case 'signUpProcess':
            $errors = [ 'email' => ['isEmpty' => '', 'invalid' => '', 'existed' => ''], 
                'password' => ['isEmpty' => ''],
                'r_password' => ['isEmpty' => '', 'unmatched' => ''], 
                'fullname' => ['required' => '']
            ];

            if(isset($_POST['sign_up'])) {
        
                $errors['email']['isEmpty'] =  check_isEmpty($_POST['email']);
                $errors['email']['invalid'] = check_email_is_valid($_POST['email']);
                $errors['email']['existed'] = check_email_is_existed($_POST['email']);
                
                $errors['password']['isEmpty'] =  check_isEmpty($_POST['password']);
        
                $errors['r_password']['isEmpty'] =  check_isEmpty($_POST['r_password']);
                $errors['r_password']['unmatched'] = check_password_is_unmatched($_POST['password'], $_POST['r_password']);
        
                $errors['fullname']['isEmpty'] = check_isEmpty($_POST['fullname']);
        
                $is_able_to_sign_up = true;
        
                foreach($errors as $error) {
                    foreach($error as $error_element) {
                        if ($error_element) {
                            $is_able_to_sign_up = false;
                            break;
                        }
                    }
                }
        
                if ($is_able_to_sign_up){
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $fullname = $_POST['fullname'];
                    $phone = $_POST['phone'];
        
                    $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
                    $sql = "INSERT INTO taikhoan (email, matkhau, tenTK, dienthoai, phanquyen) VALUES (?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                    $phanquyen = "KH";
                    
                    if($prepareStmt) {  
                        mysqli_stmt_bind_param($stmt, "sssss", $email, $password_hash, $fullname, $phone, $phanquyen);
                        mysqli_stmt_execute($stmt);
                        $notif = "Đăng kí thành công";
                        if (isset($notif)) {
                            echo "<script>alert('{$notif}')</script>";
                        }
                    }
                    else {
                        $notif = 'Đã có lỗi xảy ra, vui lòng thử lại sau';
                    }
                    $result = getLimitProductBestSeller(12);
                    $category = getAllCategory();
                    require_once 'view/home.php';   
                }
                /*else {
                    $result = getLimitProductBestSeller(12);
                    $category = getAllCategory();
                    require_once 'view/home.php';
                }*/
            }
            break;

        case 'signOut':
            login_session_unset();
            $result = getLimitProductBestSeller(12);
            $category = getAllCategory();
            require 'view/home.php';
            break;

        case 'forgotPassword': 
            require "view/forgotPasswordPage1.php";
            break;
        
        case "forgotPassword1":
            if (isset($_POST['submit'])) {
                $email = $_POST['email'];
                $sql = "SELECT email FROM taikhoan WHERE email='$email' LIMIT 1";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    reset_password_session($email);

                    //code gửi mail
                    $mail = new PHPMailer(true);

                    $mail->isSMTP(); 
                    $mail->SMTPAuth   = true;
                    //$mail->setLanguage('vi','vendor/phpmailer/phpmailer/language/phpmailer.lang-vi.php');  

                    $mail->Host       = 'smtp.gmail.com';                                         
                    $mail->Username   = 'doannhom4.pttkhttt@gmail.com';               
                    $mail->Password   = 'ewvd stdf afap kckz';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    
                    $mail->Port       = 587; 

                    $mail->setFrom('doannhom4.pttkhttt@gmail.com', 'Nhà Sách Vinabook');
                    $mail->addAddress($_SESSION['reset_password']['email']);
                    
                    $mail->isHTML(true);
                    $mail->Subject = "Mã xác nhận cho tài khoản Vinabook của bạn";

                    $email_template = "
                        <h2>Xin chào bạn</h2>
                        <h3>Đây là mã xác nhận cho tài khoản Vinabook của bạn, tuyệt đối không chia sẻ cho bất kì ai: {$_SESSION['reset_password']['verify_code']}</h3>
                    ";
                    $mail->Body = $email_template;
                    $mail->send();
                    require "view/forgotPasswordPage2.php";
                }
                else {
                    $notif = 'Chúng tôi không tìm thấy địa chỉ email này.';
                    echo "<script>alert('{$notif}')</script>";
                    require "view/forgotPasswordPage1.php";
                }
            }
            break;
            
        case 'forgotPassword2':
            if (isset($_POST['submit_verify'])) {
                $maxacnhan = $_POST['maxacnhan'];
                if ($maxacnhan === $_SESSION['reset_password']['verify_code']) {
                    require_once "view/forgotPasswordPage3.php";
                }
                else {
                    $notif = 'Mã xác nhận không đúng';
                    echo "<script>alert('{$notif}')</script>";
                    require "view/forgotPasswordPage2.php";
                }
            }
            break;
        case 'forgotPassword3':
            if (isset($_POST['submit_password'])) {
                $password = $_POST['password'];
                $r_password = $_POST['r_password'];
                if (!check_password_is_unmatched($password, $r_password)) {
                    $password_hash = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "UPDATE taikhoan SET matkhau='".$password_hash."'WHERE email='".$_SESSION['reset_password']['email']."' LIMIT 1";
                    $result = mysqli_query($conn, $sql);
        
                    if($result) {
                        reset_password_session_unset();
                        $notif = 'Đổi mật khẩu thành công';
                        echo "<script>alert('{$notif}')</script>";
                        $result = getLimitProductBestSeller(12);
                        $category = getAllCategory();
                        require_once "view/home.php";
                    }
                    else {
                        $notif = 'Có lỗi xảy ra, vui lòng thử lại sau...';
                        echo "<script>alert('{$notif}')</script>";
                    }
                }
                else {
                    $notif = 'Mật khẩu không trùng khớp';
                    echo "<script>alert('{$notif}')</script>";
                    require "view/forgotPasswordPage3.php";
                }
            }
            break;

        case 'customerInfo':
            $sql = "SELECT * FROM taikhoan where email='".$_SESSION['user']['email']."' LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $user_info = mysqli_fetch_array($result);
            require_once "view/customerInfo.php";
            if(isset($_POST['submit_info'])) {
                $tenTK = $_POST['tenTK'];
                if (isset($tenTK) && !empty($tenTK)) {
                    $sql = "UPDATE taikhoan SET tenTK='".$tenTK."' WHERE email='".$_SESSION['user']['email']."' LIMIT 1";
                    $sql_run = mysqli_query($conn, $sql);
                    $notif = 'Thay đổi họ và tên thành công';
                    //Nếu họ tên được chỉnh sửa, cập nhật lại session user
                    login_session_set_name($tenTK);
                    echo "<script>alert('{$notif}')</script>";
                    echo "<meta http-equiv='refresh' content='0'>";
                }
        
                $email = $_POST['email'];
                if (isset($email) && !empty($email)) {
                    $sql = "UPDATE taikhoan SET email='".$email."' WHERE email='".$_SESSION['user']['email']."' LIMIT 1";
                    $sql_run = mysqli_query($conn, $sql);
                    $notif = 'Thay đổi email thành công';
                    //Nếu email được chỉnh sửa, cập nhật lại session user
                    login_session_set_email($email);
                    echo "<script>alert('{$notif}')</script>";
                    echo "<meta http-equiv='refresh' content='0'>";
                }
        
                $phone = $_POST['phone'];
                if (isset($phone) && !empty($phone)) {
                    $sql = "UPDATE taikhoan SET dienthoai='".$phone."' WHERE email='".$_SESSION['user']['email']."' LIMIT 1";
                    $sql_run = mysqli_query($conn, $sql);
                    $notif = 'Thay đổi số điện thoại thành công';
                    echo "<script>alert('{$notif}')</script>";
                    echo "<meta http-equiv='refresh' content='0'>";
                }
                header("Location:index.php?page=customerInfo");
            }
            if(isset($_POST['submit_password'])) {
                $c_password = $_POST['c_password'];
                $n_password = $_POST['n_password'];
                $r_n_password = $_POST['r_n_password'];
                
                if(password_verify($c_password, $user_info['matkhau'])) {
                    if (!check_password_is_unmatched($n_password, $r_n_password) && !empty($n_password) && !empty($r_n_password)) {
                        $password_hash = password_hash($n_password, PASSWORD_DEFAULT);
                        $sql = "UPDATE taikhoan SET matkhau='".$password_hash."' WHERE email='".$_SESSION['user']['email']."' LIMIT 1";
                        $sql_run = mysqli_query($conn, $sql);
                        if($sql_run) {
                            $notif = 'Thay đổi mật khẩu thành công';
                            echo "<script>alert('{$notif}')</script>";
                            //require "view/customerInfo.php";
                        }
                        else {
                            $notif = 'Đã có lỗi xảy ra';
                            echo "<script>alert('{$notif}')</script>";
                        }
                    }
                    else {
                        $notif = 'Mật khẩu mới không trùng khớp với nhau';
                        echo "<script>alert('{$notif}')</script>";
                    }
                }
                else {
                    $notif = 'Mật khẩu hiện tại không đúng';
                    echo "<script>alert('{$notif}')</script>";
                }
            }
            //echo "<meta http-equiv='refresh' content='0'>"; dòng này để đây là bị lỗi
            break;

        // Hieu toi day ne
        
        default:
        $result = getLimitProductBestSeller(12);
        $category = getAllCategory();
        require_once 'view/home.php';
        break;
    }
}
else{
    $result = getLimitProductBestSeller(12);
    $category = getAllCategory();
    require_once 'view/home.php';
}

?>