<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign In</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,500,1,0" />
</head>

<body>
  <nav class="navbar navbar-expand-xl bg-dark navbar-dark py-3 ps-4">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        <?php
        //phân quyền hiển thị menu với quyền là admin
        if(($_SESSION['quyen']) =='admin'){ ?>
            <a class="nav-link fs-5" href="../manage-user">Quản lý tài khoản</a>
            <a class="nav-link fs-5" href="../manage-nhienlieu">Quản lý nhiên liệu</a>
            <a class="nav-link fs-5" href="../manage-cayxang">Quản lý cây xăng</a>
            <a class="nav-link fs-5" href="../user-info">Thông tin cá nhân</a>
            <a class="nav-link fs-5" href="../logout">Đăng xuất</a>
        <?php }
        //phân quyền hiển thị menu với quyền là khách hàng
         if(($_SESSION['quyen']) =='khachhang') { ?>
            <a class="nav-link fs-5" href="../home">Trang chủ</a>
            <a class="nav-link fs-5" href="../cart">Giỏ hàng</a>
            <a class="nav-link fs-5" href="../invoice">Đơn hàng</a>
            <a class="nav-link fs-5" href="../user-info">Thông tin cá nhân</a>
            <a class="nav-link fs-5" href="../logout">Đăng xuất</a>
        <?php 
        }
        ?>
        </div>
      </div>
    </div>
  </nav>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>
  <!-- <script src="./home.js"></script> -->
</body>

</html>