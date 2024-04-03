<?php
    session_start();
    if(!isset($_SESSION)) {
        $_SESSION['user'] = ['username' => '', 'fullname' => '', 'phanquyen' => ''];
    }
    function login_session($inputUserName, $inputFullName, $phanquyen) {
        $temp = explode(' ', $inputFullName);
        $_SESSION['user']['username'] = $inputUserName;
        $_SESSION['user']['fullname'] = $temp[sizeof($temp) - 1];
        $_SESSION['user']['phanquyen'] = $phanquyen;

    }
    function login_session_unset() {
        $_SESSION['user'] = ['username' => '', 'fullname' => '', 'phanquyen' => ''];
    }
    function reset_password_session($inputEmail) {
        $_SESSION['reset_password'] = ['username' => '', 'verify_code' => ''];
        $_SESSION['reset_password']['username'] = $inputEmail;
        $randomize = random_int(100000, 999999);
        $_SESSION['reset_password']['verify_code'] = strval($randomize);
    }
    function reset_password_session_unset() {
        $_SESSION['reset_password'] = ['username' => '', 'verify_code' => ''];
    }
    function advance_search_session($idCategory, $priceFrom, $priceTo) {
        $_SESSION['advance_search']['idCategory'] = $idCategory;
        $_SESSION['advance_search']['priceFrom'] = $priceFrom;
        $_SESSION['advance_search']['priceTo'] = $priceTo;
    }
?>
