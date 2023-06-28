<?php
//check đăng nhập bằng checkuser
session_start();
ob_start();
include "../connect.php";

$filter = array();
$taikhoan = [];
$total = 0;
$limit = 5;
$page = 1;

if(isset($_GET['page'])){
    $page = $_GET['page'];
}

if (isset($_SESSION['manage-user'])) {
    $filter = $_SESSION['manage-user'];
} else {
    $filter = array(
        'tentaikhoan' => '',
        'sdt' => '',
        'email' => '',
        'quyen' => '',
    );
}

// Xử lý sự kiện tìm kiếm
if (isset($_GET['timkiem'])) {
    $filter['tentaikhoan'] = $_GET['tentaikhoan-filter'];
    $filter['sdt'] = $_GET['sdt-filter'];
    $filter['email'] = $_GET['email-filter'];
    $filter['quyen'] = $_GET['quyen-filter'];

    $_SESSION['manage-user'] = $filter;
}

if (isset($_POST['themtaikhoan'])) {
    $tentaikhoan = $_POST['tentaikhoan'];
    $matkhau = $_POST['matkhau'];
    $hoten = $_POST['hoten'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $quyen = $_POST['quyen'];

    $sql = "INSERT INTO taikhoan (Pk_TaikhoanID , sMatkhau, sQuyen, sHoten, sEmail, sSDT)
        VALUES ('$tentaikhoan', '$matkhau', '$quyen', '$hoten', '$email', '$sdt')";

    $connection = connectdb2();
    // Thực thi câu lệnh và kiểm tra kết quả
    if ($connection->query($sql) === TRUE) {
        echo "<script>alert('Thêm dữ liệu thành công')</script>";
    } else {
        echo "<script>Lỗi: " . $connection->error . " </script>";
    }
}

if (isset($_POST['suataikhoan'])) {
    $editAccountName = $_POST['tentaikhoan_capnhat'];
    $editRole = $_POST['quyen_capnhat'];
    $editFullName = $_POST['hoten_capnhat'];
    $editEmail = $_POST['email_capnhat'];
    $editPhone = $_POST['sdt_capnhat'];
    $editPassword = $_POST['matkhau_capnhat'];

    $sql = "UPDATE taikhoan
            SET sQuyen = '$editRole', sHoten = '$editFullName', sEmail = '$editEmail', sSDT = '$editPhone', sMatkhau = '$editPassword'
            WHERE Pk_TaikhoanID = '$editAccountName'";

    $connection = connectdb2();
    if ($connection->query($sql) === TRUE) {
        echo "<script>alert('Cập nhật tài khoản thành công')</script>";
    } else {
        echo "<script>Lỗi: " . $connection->error . " </script>";
    }
}

if (isset($_POST['xoataikhoan'])) {
    $deleteAccountName = $_POST['tentaikhoan_xoa'];
    
    $sql = "DELETE FROM taikhoan WHERE Pk_TaikhoanID = '$deleteAccountName'";

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
    $sql = "SELECT * FROM taikhoan WHERE 1=1";
    $filter = $GLOBALS['filter'];

    if (!empty($filter['tentaikhoan'])) {
        $sql .= " AND Pk_TaikhoanID LIKE '%{$filter['tentaikhoan']}%'";
    }

    if (!empty($filter['sdt'])) {
        $sql .= " AND sSDT LIKE '%{$filter['sdt']}%'";
    }

    if (!empty($filter['email'])) {
        $sql .= " AND sEmail LIKE '%{$filter['email']}%'";
    }

    if (!empty($filter['quyen'])) {
        $sql .= " AND sQuyen = '{$filter["quyen"]}'";
    }


    // Thực thi truy vấn và xử lý kết quả
    $result1 = mysqli_query($connection, $sql);

    $sql .= " limit {$GLOBALS['limit']} offset " . (($GLOBALS['page'] - 1)*$GLOBALS['limit']);
    $result2 = mysqli_query($connection, $sql);

    if ($result1) {
        $GLOBALS['total'] = mysqli_num_rows( $result1 );

        while ($row = mysqli_fetch_assoc($result2)) {
            $GLOBALS['taikhoan'][] = array(
                'Pk_TaikhoanID' => $row['Pk_TaikhoanID'],
                'sQuyen' => $row['sQuyen'],
                'sHoten' => $row['sHoten'],
                'sEmail' => $row['sEmail'],
                'sSDT' => $row['sSDT']
            );
        }
    }
}
getData();

include "../header/index.php";
include "./manage-user.php";
include "../footer/index.php";
