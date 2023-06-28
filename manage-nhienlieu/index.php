<?php
//check đăng nhập bằng checkuser
session_start();
ob_start();
include "../connect.php";

$filter = array();
$data = [];
$total = 0;
$limit = 5;
$page = 1;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

if (isset($_SESSION['manage-nhienlieu'])) {
    $filter = $_SESSION['manage-nhienlieu'];
} else {
    $filter = array(
        'tennhienlieu' => '',
        'loai' => '',
    );
}

// Xử lý sự kiện tìm kiếm
if (isset($_GET['timkiem'])) {
    $filter['tennhienlieu'] = $_GET['tennhienlieu-filter'];
    $filter['loai'] = $_GET['loainhienlieu-filter'];

    $_SESSION['manage-nhienlieu'] = $filter;
}

if (isset($_POST['themnhienlieu'])) {
    $ten = $_POST['tennhienlieu_them'];
    $loai = $_POST['loainhienlieu_them'];
    $donvi = $_POST['donvi_them'];
    $gia = $_POST['gia_them'];

    $sql = "INSERT INTO nhienlieu (sTenNhienlieu, sLoai, sDonvi, fGia)
        VALUES ('$ten', '$loai', '$donvi', '$gia')";

    $connection = connectdb2();
    // Thực thi câu lệnh và kiểm tra kết quả
    if ($connection->query($sql) === TRUE) {
        echo "<script>alert('Thêm dữ liệu thành công')</script>";
    } else {
        echo "<script>Lỗi: " . $connection->error . " </script>";
    }
}

if (isset($_POST['suanhienlieu'])) {
    $ten = $_POST['ten_capnhat'];
    $ma = $_POST['manhienlieu_capnhat'];
    $loai = $_POST['loainhienlieu_capnhat'];
    $gia = $_POST['gia_capnhat'];
    $donvi = $_POST['donvi_capnhat'];

    $sql = "UPDATE nhienlieu
            SET sTenNhienlieu = '$ten', sLoai = '$loai', sDonvi = '$donvi', fGia = '$gia'
            WHERE Pk_NhienlieuID = $ma";

    $connection = connectdb2();
    if ($connection->query($sql) === TRUE) {
        echo "<script>alert('Cập nhật tài khoản thành công')</script>";
    } else {
        echo "<script>Lỗi: " . $connection->error . " </script>";
    }
}

if (isset($_POST['xoanhienlieu'])) {
    $ma = $_POST['manhienlieu_xoa'];

    $sql = "DELETE FROM nhienlieu WHERE Pk_NhienlieuID = '$ma'";

    $connection = connectdb2();
    if ($connection->query($sql) === TRUE) {
        echo "<script>alert('Xóa tài khoản thành công')</script>";
    } else {
        echo "<script>Lỗi: " . $connection->error . " </script>";
    }
}

function getData()
{
    $connection = connectdb2();

    // Tạo truy vấn tìm kiếm
    $sql = "SELECT * FROM nhienlieu WHERE 1=1";
    $filter = $GLOBALS['filter'];

    if (!empty($filter['tennhienlieu'])) {
        $sql .= " AND sTenNhienlieu LIKE '%{$filter['tennhienlieu']}%'";
    }

    if (!empty($filter['loai'])) {
        $sql .= " AND sLoai LIKE '%{$filter['loai']}%'";
    }

    // Thực thi truy vấn và xử lý kết quả
    $result1 = mysqli_query($connection, $sql);

    $sql .= " limit {$GLOBALS['limit']} offset " . (($GLOBALS['page'] - 1) * $GLOBALS['limit']);
    $result2 = mysqli_query($connection, $sql);

    if ($result1) {
        $GLOBALS['total'] = mysqli_num_rows($result1);

        while ($row = mysqli_fetch_assoc($result2)) {
            $GLOBALS['data'][] = array(
                'Pk_NhienlieuID' => $row['Pk_NhienlieuID'],
                'sTenNhienlieu' => $row['sTenNhienlieu'],
                'sLoai' => $row['sLoai'],
                'sDonvi' => $row['sDonvi'],
                'fGia' => $row['fGia']
            );
        }
    }
}

getData();

include "./manage-nhienlieu.php";
