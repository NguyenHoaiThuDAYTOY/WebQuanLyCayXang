<!DOCTYPE html>
<html>
<head>
    <title>Tài khoản cá nhân</title>
    <!-- Bước 1: Liên kết đến Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            padding-top: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Thông tin tài khoản</h2>
        <form id="accountForm" method="post">
            <div class="form-group">
                <label for="hoten">Họ và tên:</label>
                <input type="text" class="form-control" id="hoten" name="hoten" value="<?php echo $user['sHoten'] ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $user['sEmail'] ?>" required>
            </div>
            <div class="form-group">
                <label for="sdt">Số điện thoại:</label>
                <input type="text" class="form-control" id="sdt" name="sdt" value="<?php echo $user['sSDT'] ?>" required>
            </div>
            <div class="form-group">
                <label>Quyền:</label>
                <input type="text" disabled value="<?php echo $user['sQuyen'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" class="form-control" id="password" value="<?php echo $user['sMatkhau'] ?>" name="password"  required>
            </div>
            <div class="form-group">
                <label for="rePassword">Nhập lại mật khẩu:</label>
                <input type="password" class="form-control" id="rePassword" value="<?php echo $user['sMatkhau'] ?>" name="rePassword" required>
            </div>
            <div class="text-center">
                <button type="submit" name="update" class="btn btn-primary">Lưu thông tin</button>
            </div>
        </form>
    </div>

    <!-- Bước 2: Liên kết đến jQuery và Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
