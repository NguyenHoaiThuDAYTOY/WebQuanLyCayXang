<?php
//check đăng nhập bằng checkuser
session_start();
ob_start();
include "../connect.php";

if (isset($_GET['action'])) {
    $connection = connectdb2();
    $nhienlieu = [];
    $sql = "SELECT * FROM cayxang_nhienlieu where iCayxangID = " . $_GET['id'];
    $result = mysqli_query($connection, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $nhienlieu[] = array(
                'iNhienlieuID' => $row['iNhienlieuID'],
                'iSoluong' => $row['iSoluong'],
            );
        }
    }

    exit(json_encode($nhienlieu));
}

$filter = array();
$data = [];
$total = 0;
$limit = 5;
$page = 1;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

if (isset($_SESSION['manage-cayxang'])) {
    $filter = $_SESSION['manage-cayxang'];
} else {
    $filter = array(
        'macayxang' => '',
        'diachi' => '',
    );
}

// Xử lý sự kiện tìm kiếm
if (isset($_GET['timkiem'])) {
    $filter['macayxang'] = $_GET['macayxang_filter'];
    $filter['diachi'] = $_GET['diachi_filter'];

    $_SESSION['manage-cayxang'] = $filter;
}

if (isset($_POST['themcayxang'])) {
    $diachi = $_POST['diachi_them'];

    $sql = "INSERT INTO cayxang (sDiachi)
        VALUES ('$diachi')";

    $connection = connectdb2();
    // Thực thi câu lệnh và kiểm tra kết quả
    if ($connection->query($sql) === TRUE) {
        echo "<script>alert('Thêm dữ liệu thành công')</script>";
    } else {
        echo "<script>Lỗi: " . $connection->error . " </script>";
    }
}

if (isset($_POST['capnhat'])) {
    $cayxang = $_POST['cayxang_sua'];
    $diachi = $_POST['diachi_sua'];

    $sql1 = "UPDATE cayxang
            SET sDiachi = '$diachi'
            WHERE Pk_CayxangID = '$cayxang'";

    $sql2 = "DELETE FROM cayxang_nhienlieu WHERE iCayxangID = '{$_POST['cayxang_sua']}'";
    $sql3 = "INSERT INTO cayxang_nhienlieu (iNhienlieuID, iCayxangID, iSoluong, isActive) VALUES ";    
    $unique = [];
    foreach ($_POST['nhienlieu'] as $key => $nl) {
        if (in_array($nl, $unique)) {
            continue;
        }

        $unique[] = $nl;

        $sql3 .= "($nl, {$_POST['cayxang_sua']}, {$_POST['soluong'][$key]}, 1),";
    }

    $connection = connectdb2();
    $connection->query($sql1);
    $connection->query($sql2);
    $connection->query(substr_replace($sql3 ,"", -1));
}

if (isset($_POST['xoacayxang'])) {
    $deleteCayxang = $_POST['macayxang_xoa'];

    $sql1 = "DELETE FROM cayxang_nhienlieu WHERE iCayxangID = '$deleteCayxang'";
    $sql2 = "DELETE FROM cayxang WHERE Pk_CayxangID = '$deleteCayxang'";

    $connection = connectdb2();
    $connection->query($sql1);
    $connection->query($sql2);
}

function getData()
{
    $connection = connectdb2();

    // Tạo truy vấn tìm kiếm
    $sql = "SELECT * FROM cayxang WHERE 1=1";
    $filter = $GLOBALS['filter'];

    if (!empty($filter['macayxang'])) {
        $sql .= " AND Pk_CayxangID = '{$filter['macayxang']}'";
    }

    if (!empty($filter['diachi'])) {
        $sql .= " AND sDiachi LIKE '%{$filter['diachi']}%'";
    }

    // Thực thi truy vấn và xử lý kết quả
    $result1 = mysqli_query($connection, $sql);

    $sql .= " limit {$GLOBALS['limit']} offset " . (($GLOBALS['page'] - 1) * $GLOBALS['limit']);
    $result2 = mysqli_query($connection, $sql);

    if ($result1) {
        $GLOBALS['total'] = mysqli_num_rows($result1);

        while ($row = mysqli_fetch_assoc($result2)) {
            $GLOBALS['data'][] = array(
                'Pk_CayxangID' => $row['Pk_CayxangID'],
                'sDiachi' => $row['sDiachi'],
            );
        }
    }
}

getData();

// Tìm kiếm nhiên liệu
$connection = connectdb2();
$nhienlieu = [];
$sql = "SELECT Pk_NhienlieuID, sTenNhienlieu FROM nhienlieu";
$result = mysqli_query($connection, $sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $nhienlieu[] = array(
            'Pk_NhienlieuID' => $row['Pk_NhienlieuID'],
            'sTenNhienlieu' => $row['sTenNhienlieu'],
        );
    }
}

include "./manage-cayxang.php";
