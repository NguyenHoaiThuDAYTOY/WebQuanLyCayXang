<?php
    //controller trang chủ
    session_start();
    ob_start();
    include "../connect.php";
    function getCayxangNhienlieu ($diachi = '', $loai = ''){
        $conn = connectdb();
        $where = [];
        $sql = "SELECT DISTINCT cx.sDiachi
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
            // $total = count($cayxangs); 
            // $pages = ceil($total / $limit); 
            // $_SESSION['pages'] = $pages;
            // $page = isset($_GET['page']) ? $_GET['page'] : 1;
            // $_SESSION['page'] = $page;
            // $start = ($page - 1) * $limit;
            // $end = $start + $limit - 1;
            // $products = array_slice($cayxangs, $start, $limit);
            return $cayxangs;
        } else {
            return 0;
        }
    }
    if(isset($_SESSION['quyen']) && $_SESSION['quyen']=='khachhang'){
        if(isset($_POST['timkiem'])){
            $diachi = $_POST['search'];
            $_SESSION['filter_home_search'] = $_POST['search'];
            $loai = $_POST['loainhienlieu'];
            $cayxangs = getCayxangNhienlieu($diachi, $loai);   
        } 
        else {
            $cayxangs = getCayxangNhienlieu();
        }
        include "./home.php";
    } else {
        header('location: StatusBike.php');
    }
?>