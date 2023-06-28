<?php
    session_start();
    ob_start();
    include "../connect.php";
    //lấy dữ liệu giỏ hàng
    function getGiohang ($tentaikhoan, $nhot = ''){
        $conn = connectdb();
        $where = [];
        $sql = "SELECT DISTINCT gh.Pk_GiohangID, cx.sDiachi, nl.sTenNhienlieu, nl.fGia, gh.iSoluong
        FROM giohang AS gh INNER JOIN cayxang_nhienlieu AS cxnl ON gh.iCayxangNhienlieuID = cxnl.Pk_CayxangNhienlieuID 
        INNER JOIN cayxang AS cx ON cxnl.iCayxangID = cx.Pk_CayxangID  
        INNER JOIN nhienlieu AS nl ON cxnl.iNhienlieuID = nl.Pk_NhienlieuID  
        WHERE gh.iTaikhoanID = '$tentaikhoan' ";
        if($nhot != ''){
            array_push($where, "sTenNhienlieu LIKE '%$nhot%'");
        }
        if(count($where)){
                $sql .= " AND " . implode(" AND ", $where);
        }

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $giohangs = $stmt->fetchAll();
        if($giohangs>0){
            return $giohangs;
        } else {
            return 0;
        }
    }
    //xóa giỏ hàng theo mã
    function delGiohang($magiohang){
        $conn = connectdb();
        $sql = "DELETE FROM giohang WHERE Pk_GiohangID='$magiohang'";
        if ($conn->exec($sql)){
            echo "Xóa thành công";
        } else {
            echo "Xóa thất bại";
        }
    }
    //thực hiện thanh toán
    function thanhtoan($tentaikhoan, $payment, $note){
        $conn = connectdb();
        $sql = "INSERT INTO hoadon (sStatus, sPayment, sNote) VALUES ('Đã thanh toán', '$payment', '$note');
        SET @hoadonId = LAST_INSERT_ID();
        UPDATE giohang SET iDonhangID = @hoadonId WHERE iDonhangID IS NULL AND iTaikhoanID = '$tentaikhoan';";
        if ($conn->exec($sql)){
            echo "Thanh toán thành công";
        } else {
            echo "Thanh toán thất bại";
        }
    }
    //chỉ cho phép quyền khachhang
    if(isset($_SESSION['quyen']) && $_SESSION['quyen']=='khachhang'){
        //thực hiện tìm kiếm
        if(isset($_POST['timkiem'])){
            $nhot = $_POST['search'];
            $tentaikhoan = $_SESSION['tentaikhoan'];
            $_SESSION['filter_cart_search'] = $_POST['search'];
            $giohangs = getGiohang($tentaikhoan, $nhot); 
        } 
        //xóa giỏ hàng theo id
        if(isset($_GET['id'])){
            $magiohang = $_GET['id'];
            delGiohang($magiohang);
            header('location: ../cart');
        } 
        //thực hiện thanh toán
        if(isset($_POST['thanhtoan'])){
            $payment = $_POST['payment'];
            $note = $_POST['note'];
            $tentaikhoan = $_SESSION['tentaikhoan'];
            thanhtoan($tentaikhoan, $payment, $note);
            header('location: ../invoice');
        }
        else {
            $tentaikhoan = $_SESSION['tentaikhoan'];
            $giohangs = getGiohang($tentaikhoan);
        }
        include "../header/index.php";
        include "./cart.php";
        include "../footer/index.php";
    } 
?>