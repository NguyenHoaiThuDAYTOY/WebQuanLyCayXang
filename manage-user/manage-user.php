<!DOCTYPE html>
<html>

<head>
    <title>Quản lý tài khoản</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="container">
        <h1>Quản lý tài khoản</h1>
        <hr>
        <div class="text-right mb-3">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addAccountModal">
                <i class="fas fa-plus"></i> Thêm tài khoản
            </button>
        </div>
        <form id="search-form">
            <div class="form-row justify-content-center mb-3">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tentaikhoan-filter">Tên tài khoản:</label>
                        <input type="text" id="tentaikhoan-filter" name="tentaikhoan-filter" class="form-control" value="<?php echo $filter['tentaikhoan']; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="sdt-filter">Số điện thoại:</label>
                        <input type="text" id="sdt-filter" name="sdt-filter" class="form-control" value="<?php echo $filter['sdt']; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="email-filter">Email:</label>
                        <input type="text" id="email-filter" name="email-filter" class="form-control" value="<?php echo $filter['email']; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="quyen-filter">Bộ lọc quyền:</label>
                        <select class="form-control" id="quyen-filter" name="quyen-filter">
                            <option value="">Tất cả</option>
                            <option value="admin">Quản trị viên</option>
                            <option value="customer">Khách hàng</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row justify-content-center mb-3">
                <div class="col-auto">
                    <button type="submit" name="timkiem" class="btn btn-primary">
                        <i class="fas fa-search"></i> Tìm kiếm
                    </button>
                </div>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>Tên tài khoản</th>
                    <th>Quyền</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($taikhoan as $tk) { ?>
                    <tr>
                        <td class="tentaikhoan"><?php echo $tk['Pk_TaikhoanID'] ?></td>
                        <td class="quyen"><?php echo $tk['sQuyen'] ?></td>
                        <td class="hoten"><?php echo $tk['sHoten'] ?></td>
                        <td class="email"><?php echo $tk['sEmail'] ?></td>
                        <td class="phone"><?php echo $tk['sSDT'] ?></td>
                        <td>
                            <button type="button" class="btn btn-primary edit-button" data-toggle="modal" data-target="#editAccountModal">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-danger delete-button" data-toggle="modal" data-target="#deleteAccountModal">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <nav class="d-flex justify-content-center mt-4">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $total / $limit + ($total % $limit != 0); $i++) { ?>
                    <li class="page-item <?php if($page == $i) echo 'active' ?>">
                        <button class="page-link" form="search-form" name="page" value="<?php echo $i ?>"><?php echo $i ?></button>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>

    <!-- Modal thêm tài khoản -->
    <div class="modal fade" id="addAccountModal" tabindex="-1" role="dialog" aria-labelledby="addAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAccountModalLabel">Thêm tài khoản</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addAccountForm" method="post" action="">
                        <div class="form-group">
                            <label for="tentaikhoan">Tên tài khoản</label>
                            <input type="text" class="form-control" id="tentaikhoan" name="tentaikhoan" placeholder="Nhập tên tài khoản">
                        </div>
                        <div class="form-group">
                            <label for="matkhau">Mật khẩu</label>
                            <input type="text" class="form-control" id="matkhau" name="matkhau" placeholder="Nhập tên tài khoản">
                        </div>
                        <div class="form-group">
                            <label for="hoten">Họ và tên</label>
                            <input type="text" class="form-control" id="hoten" name="hoten" placeholder="Nhập tên tài khoản">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Nhập tên tài khoản">
                        </div>
                        <div class="form-group">
                            <label for="sdt">Số điện thoại</label>
                            <input type="text" class="form-control" id="sdt" name="sdt" placeholder="Nhập tên tài khoản">
                        </div>
                        <div class="form-group">
                            <label for="quyen">Quyền</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="quyen" id="roleAdmin" value="admin" selected>
                                <label class="form-check-label" for="roleAdmin">
                                    Quản trị viên
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="quyen" id="roleUser" value="customer">
                                <label class="form-check-label" for="roleUser">
                                    Người dùng
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" name="themtaikhoan" form="addAccountForm" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal sửa tài khoản -->
    <div class="modal fade" id="editAccountModal" tabindex="-1" role="dialog" aria-labelledby="editAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAccountModalLabel">Sửa tài khoản</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editAccountForm" method="post" action="">
                        <div class="form-group">
                            <label for="tentaikhoan_capnhat">Tên tài khoản</label>
                            <input type="text" class="form-control" id="tentaikhoan_capnhat" placeholder="Nhập tên tài khoản" disabled>
                            <input type="text" class="form-control d-none" name="tentaikhoan_capnhat">
                        </div>
                        <div class="form-group">
                            <label for="quyen_capnhat">Quyền</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="quyen_capnhat" id="editRoleAdmin" value="admin">
                                <label class="form-check-label" for="editRoleAdmin">
                                    Quản trị viên
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="quyen_capnhat" id="editRoleCustomer" value="customer">
                                <label class="form-check-label" for="editRoleCustomer">
                                    Khách hàng
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="matkhau_capnhat">Mật khẩu</label>
                            <input type="text" class="form-control" id="matkhau_capnhat" name="matkhau_capnhat" placeholder="Nhập họ tên">
                        </div>
                        <div class="form-group">
                            <label for="hoten_capnhat">Họ tên</label>
                            <input type="text" class="form-control" id="hoten_capnhat" name="hoten_capnhat" placeholder="Nhập họ tên">
                        </div>
                        <div class="form-group">
                            <label for="email_capnhat">Email</label>
                            <input type="text" class="form-control" id="email_capnhat" name="email_capnhat" placeholder="Nhập địa chỉ email">
                        </div>
                        <div class="form-group">
                            <label for="sdt_capnhat">Số điện thoại</label>
                            <input type="tel" class="form-control" id="sdt_capnhat" name="sdt_capnhat" placeholder="Nhập số điện thoại">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" name="suataikhoan" form="editAccountForm" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal xóa tài khoản -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" role="dialog" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAccountModalLabel">Xóa tài khoản</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="deleteAccountForm" method="post" action="">
                        <input type="text" class="form-control d-none" id="tentaikhoan_xoa" name="tentaikhoan_xoa">
                        <p>Bạn có chắc chắn muốn xóa tài khoản này?</p>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" form="deleteAccountForm" name="xoataikhoan" class="btn btn-danger">Xóa</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".edit-button").click(function() {
                var accountName = $(this).closest("tr").find(".tentaikhoan").text();
                var role = $(this).closest("tr").find(".quyen").text();
                var fullName = $(this).closest("tr").find(".hoten").text();
                var email = $(this).closest("tr").find(".email").text();
                var phone = $(this).closest("tr").find(".phone").text();

                $("#tentaikhoan_capnhat").val(accountName);
                $("[name=tentaikhoan_capnhat]").val(accountName);

                if (role === "admin") {
                    $("#editRoleAdmin").prop("checked", true);
                } else if (role === "Khách hàng") {
                    $("#editRoleCustomer").prop("checked", true);
                }

                $("#hoten_capnhat").val(fullName);
                $("#email_capnhat").val(email);
                $("#phone_capnhat").val(phone);
            });

            $(".delete-button").click(function() {
                var accountName = $(this).closest("tr").find(".tentaikhoan").text();
                $("#tentaikhoan_xoa").val(accountName);
            });
        });
    </script>
</body>

</html>