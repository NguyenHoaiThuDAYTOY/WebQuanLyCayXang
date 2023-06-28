<?php
    //controller trang chủ
    session_start();
    ob_start();
    include "../connect.php";
    //lấy dữ liệu cây xăng
    function getCayxangNhienlieu ($diachi = '', $loai = ''){
        $conn = connectdb();
        $where = [];
        $sql = "SELECT DISTINCT cx.sDiachi, cxnl.iCayxangID
        FROM cayxang_nhienlieu AS cxnl INNER JOIN nhienlieu AS nl ON cxnl.iNhienlieuID = nl.Pk_NhienlieuID INNER JOIN cayxang AS cx ON cxnl.iCayxangID = cx.Pk_CayxangID WHERE cxnl.isActive=1 ";
        if($diachi != ''){
            array_push($where, "sDiachi LIKE '%$diachi%'");
        }
        if($loai != ''){
            array_push($where, "sLoai = '$loai'");
        }
        if(count($where)){
                $sql .= " AND " . implode(" AND ", $where);
        }

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $cayxangs = $stmt->fetchAll();
        if($cayxangs>0){
            return $cayxangs;
        } else {
            return 0;
        }
    }
    //lấy giá của từng loại nhiên liệu
    function getGia ($loai){
        $conn = connectdb();
        $where = [];
        $sql = "SELECT sTenNhienlieu, sDonvi, fGia
        FROM nhienlieu WHERE sLoai = '$loai' ";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $gia = $stmt->fetchAll();
        if($gia>0){
            return $gia;
        } else {
            return 0;
        }
    }
    // với quyền là khách hàng
    if(isset($_SESSION['quyen']) && $_SESSION['quyen']=='khachhang'){
        $giaxangs = getGia('xang');
        $giadaus = getGia('dau');
        $gianhots = getGia('nhot');
        //thực hiện tìm kiếm
        if(isset($_POST['timkiem'])){
            $diachi = $_POST['search'];
            $_SESSION['filter_home_search'] = $_POST['search'];
            $loai = $_POST['loainhienlieu'];
            $cayxangs = getCayxangNhienlieu($diachi, $loai);   
        } 
        else {
            $cayxangs = getCayxangNhienlieu();
        }
        include "../header/index.php";
        include "./home.php";
        include "../footer/index.php";
    } else {
        header('location: StatusBike.php');
    }
?>