<?php
    //xử lý đăng xuất
    session_start();
    ob_start();
    //nếu tồn tại session
    if(isset($_SESSION['tentaikhoan'])){
        unset($_SESSION['quyen']); // xóa phiên session hiện có
        unset($_SESSION['tentaikhoan']);
    }
    header('location: ../signin');
?>