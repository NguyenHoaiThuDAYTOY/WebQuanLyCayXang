<?php
    //đăng ký tài khoản cho khách hàng bằng hàm themtaikhoan
    session_start();
    ob_start();
    include "./signup.php";
    include "../connect.php";
    function themtaikhoan($tentaikhoan, $matkhau, $quyen, $hoten, $email, $sdt){
        $conn = connectdb();
        $sql = "SELECT * FROM taikhoan WHERE Pk_TaikhoanID='$tentaikhoan'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        if (isset($kq[0])) {
            echo "<script>alert('Tên đăng nhập đã tồn tại');</script>";
        } else {
            $sql = "INSERT INTO taikhoan (Pk_TaikhoanID, sMatkhau, sQuyen, sHoten, sEmail, sSDT)
            VALUES ('$tentaikhoan', '$matkhau', '$quyen', '$hoten', '$email', '$sdt')";
            if ($conn->exec($sql)) {
                echo "<script>alert('Đăng ký thành công');</script>";
                header('location: ../signin/signin.php');
            } else {
                echo "<script>alert('Đăng ký thất bại');</script>";
            }
        }    
    }
    if(isset($_POST['dangky'])){
        $tentaikhoan = $_POST['tentaikhoan'];
        $matkhau = $_POST['matkhau'];
        $hoten = $_POST['hoten'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $quyen = 'khachhang';
        themtaikhoan($tentaikhoan, $matkhau, $quyen, $hoten, $email, $sdt);
    }
?>