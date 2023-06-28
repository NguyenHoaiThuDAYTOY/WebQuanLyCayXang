<?php
    //controller trang chủ
    session_start();
    ob_start();
    include "../connect.php";
    //lấy ra đơn hàng theo tên tài khoản
    function getDonhang ($tentaikhoan){
        $conn = connectdb();
        $where = [];
        $sql = "SELECT DISTINCT hd.Pk_HoadonID, nl.sTenNhienlieu, nl.fGia, gh.iSoluong
        FROM hoadon AS hd INNER JOIN giohang AS gh ON gh.iDonhangID = hd.Pk_HoadonID
        INNER JOIN cayxang_nhienlieu AS cxnl ON gh.iCayxangNhienlieuID = cxnl.Pk_CayxangNhienlieuID 
        INNER JOIN cayxang AS cx ON cxnl.iCayxangID = cx.Pk_CayxangID  
        INNER JOIN nhienlieu AS nl ON cxnl.iNhienlieuID = nl.Pk_NhienlieuID  
        WHERE gh.iTaikhoanID = '$tentaikhoan'";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $donhangs = $stmt->fetchAll();
        if($donhangs>0){
            return $donhangs;
        } else {
            return 0;
        }
    }
    if(isset($_SESSION['quyen']) && $_SESSION['quyen']=='khachhang'){
        $tentaikhoan = $_SESSION['tentaikhoan'];
        $donhangs = getDonhang($tentaikhoan);
    
        include "../header/index.php";
        include "./invoice.php";
        include "../footer/index.php";
    } 
?>
