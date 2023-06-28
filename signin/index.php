<?php
    //check đăng nhập bằng checkuser
    session_start();
    ob_start();
    include "./signin.php";
    include "../connect.php";
    function checkuser($tentaikhoan, $matkhau){
        $conn = connectdb();
        $sql = "SELECT * FROM taikhoan WHERE Pk_TaikhoanID='$tentaikhoan' AND sMatkhau='$matkhau'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        if(isset($kq[0]['sQuyen'])){
            return $kq[0]['sQuyen'];
        } else {
            return 0;
        }
    }
    if(isset($_POST['dangnhap'])){
        $tentaikhoan = $_POST['tentaikhoan'];
        $matkhau = $_POST['matkhau'];
        $quyen = checkuser($tentaikhoan, $matkhau);
        $_SESSION['tentaikhoan'] = $tentaikhoan;
        $_SESSION['quyen'] = $quyen;
        if($quyen == 'khachhang') {
            header('location: ../home/index.php');
            exit();
        } if($quyen == 'admin') {
            header('location: ../manager-user/index.php');
            exit();
        } else {
            echo "<script>alert('Thông tin đăng nhập không đúng');</script>";
        }
    }
?>