<?php
session_start();
include "../connect.php";
$connection = connectdb2();

if (!isset($_SESSION['tentaikhoan'])) {
    header('location: ../signin');
}

if (isset($_POST['update'])) {
    $ten = $_POST['hoten'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $password = $_POST['password'];
    $rePassword = $_POST['rePassword'];

    if ($password == $rePassword) {
        $sql = "UPDATE taikhoan
        SET sHoten = '$ten', sEmail = '$email', sSDT = '$sdt', sMatkhau = '$password'
        WHERE Pk_TaikhoanID = '{$_SESSION['tentaikhoan']}'";

        $connection = connectdb2();
        if ($connection->query($sql) === TRUE) {
            echo "<script>alert('Cập nhật tài khoản thành công')</script>";
        } else {
            echo "<script>Lỗi: " . $connection->error . " </script>";
        }
    } else {
        echo "<script>alert('Mật khẩu khác mật khẩu nhập lại')</script>";
    }
}

$sql = "SELECT * FROM taikhoan WHERE Pk_TaikhoanID = '{$_SESSION['tentaikhoan']}'";
$result = mysqli_query($connection, $sql);
$user = array();

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $user = array(
            'Pk_TaikhoanID' => $row['Pk_TaikhoanID'],
            'sMatkhau' => $row['sMatkhau'],
            'sQuyen' => $row['sQuyen'],
            'sHoten' => $row['sHoten'],
            'sEmail' => $row['sEmail'],
            'sSDT' => $row['sSDT'],
        );
    }
}

include "../header/index.php";
include "./user-info.php";
include "../footer/index.php";
