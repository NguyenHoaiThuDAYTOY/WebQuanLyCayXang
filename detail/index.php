<?php
    //controller trang chủ
    session_start();
    ob_start();
    include "../connect.php";
    //lấy dữ liệu cây xăng theo mã
    function getCayxangByID($macayxang){
        $conn = connectdb();
        $sql = "SELECT DISTINCT cx.sDiachi,  nl.sTenNhienlieu, nl.fGia, cxnl.Pk_CayxangNhienlieuID
        FROM cayxang_nhienlieu AS cxnl INNER JOIN nhienlieu AS nl ON cxnl.iNhienlieuID = nl.Pk_NhienlieuID INNER JOIN cayxang AS cx ON cxnl.iCayxangID = cx.Pk_CayxangID WHERE cxnl.iCayxangID = '$macayxang' AND nl.sLoai = 'nhớt'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $cayxangs = $stmt->fetchAll();
        return $cayxangs;
    }
    //thêm vào giỏ hàng
    function themgiohang($nhot, $tentaikhoan, $soluong){
        $conn = connectdb();
        $sql = "INSERT INTO giohang (iTaikhoanID, iCayxangNhienlieuID, iSoluong)
            VALUES ('$tentaikhoan', '$nhot', '$soluong');";
            if ($conn->exec($sql)) {
                echo "<script>alert('Thêm thành công');</script>";
            } else {
                echo "<script>alert('Thêm thất bại');</script>";
            }
    }
    //chỉ cho phép đặt nếu quyền là khách hàng
    if(isset($_SESSION['quyen']) && (($_SESSION['quyen']) =='khachhang')) {
        if(isset($_POST['themgiohang'])){
            $nhot = $_POST['nhot']; //xử lý lấy dữ liệu từ form theo name tương ứng
            $soluong = $_POST['soluong'];
            $tentaikhoan = $_SESSION['tentaikhoan'];
            $giohang = themgiohang($nhot, $tentaikhoan, $soluong);
            header('location: ../cart/index.php');
        }
    }
    if(isset($_GET['id'])){
        $macayxang = $_GET['id'];
        $cayxangs = getCayxangByID($macayxang);
    }
    include "../header/index.php";
    include "./detail.php";
    include "../footer/index.php";
?>