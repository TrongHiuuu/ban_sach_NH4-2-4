<?php
    if (!empty($_SESSION['user']['id'])){
        //Xóa một sản phẩm trong giỏ hàng
        if(isset($_GET['index']) && ($_GET['index'] >= 0)) {
            array_splice($_SESSION['cart'], $_GET['index'], 1); //xóa phần tử thứ index khỏi mảng
            header("location:index.php?page=cart");
        }

        //Cập nhật số lượng sản phẩm
        if(isset($_POST['pro_index']) && isset($_POST['quantity'])) {
            $pro_index = $_POST['pro_index'];
            $newQty = $_POST['quantity'];

            $_SESSION['cart'][$pro_index][5] = $newQty;
            $totalQty = count($_SESSION['cart']);
            $totalPrice = 0;
            if(isset($_SESSION['cart'])) {
                $i = 0;
                foreach ($_SESSION['cart'] as $item) {
                    $totalPrice += $item[4] * $item[5];
                }
            }

            echo json_encode(array('status' => 'success', 'totalQty' => $totalQty, 'totalPrice' => number_format($totalPrice, 0, ',', '.')." VNĐ"));
            exit();
        }
        $result = getLimitProductBestSeller(12);
        $category = getAllCategory();
        require_once "view/cart.php";
    }
    else {
        $title = "Lưu ý!!!";
        $text = "Bạn cần đăng nhập để có thể vào giỏ hàng";
        $icon = "warning";
        $button = "Tôi đã hiểu";
        notif($title, $text, $icon, $button);
        header("Location:index.php?page=signIn");
    }
?>
