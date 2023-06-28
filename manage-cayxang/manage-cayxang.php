<!DOCTYPE html>
<html>

<head>
    <title>Quản lý cây xăng</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="container">
        <h1>Quản lý cây xăng</h1>
        <hr>
        <div class="text-right mb-3">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addAccountModal">
                <i class="fas fa-plus"></i> Thêm cây xăng
            </button>
        </div>
        <form id="search-form">
            <div class="form-row justify-content-center mb-3">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="macayxang_filter">Mã cây xăng:</label>
                        <input type="text" id="macayxang_filter" name="macayxang_filter" class="form-control" value="<?php echo $filter['macayxang']; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="diachi_filter">Địa chỉ:</label>
                        <input type="text" id="diachi_filter" name="diachi_filter" class="form-control" value="<?php echo $filter['diachi']; ?>">
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
                    <th>Mã cây xăng</th>
                    <th>Địa chỉ</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $d) { ?>
                    <tr>
                        <td class="macayxang"><?php echo $d['Pk_CayxangID'] ?></td>
                        <td class="diachi"><?php echo $d['sDiachi'] ?></td>
                        <td>
                            <button type="button" class="btn btn-primary edit-button" data-toggle="modal" data-target="#updateCayXangModal">
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
                    <li class="page-item <?php if ($page == $i) echo 'active' ?>">
                        <button class="page-link" form="search-form" name="page" value="<?php echo $i ?>"><?php echo $i ?></button>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>

    <!-- Modal thêm -->
    <div class="modal fade" id="addAccountModal" tabindex="-1" role="dialog" aria-labelledby="addAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAccountModalLabel">Thêm cây xăng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addAccountForm" method="post" action="">
                        <div class="form-group">
                            <label for="diachi_them"></label>
                            <input type="text" class="form-control" id="diachi_them" name="diachi_them" placeholder="Địa chỉ">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" name="themcayxang" form="addAccountForm" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal sửa -->
    <div class="modal fade" id="updateCayXangModal" tabindex="-1" role="dialog" aria-labelledby="updateCayXangModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateCayXangModalLabel">Cập nhật cây xăng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updateCayXangForm" action="" method="post">
                        <input type="text" class="form-control d-none" id="macayxang_sua" name="cayxang_sua">
                        <div class="form-group">
                            <label for="diachi_sua">Địa chỉ:</label>
                            <input type="text" class="form-control" id="diachi_sua" name="diachi_sua" required>
                        </div>
                        <div class="form-group">
                            <label for="nhienLieuList">Nhiên liệu:</label>
                            <div id="nhienLieuList">
                                <!-- Các trường nhập liệu nhiên liệu sẽ được thêm vào đây -->
                            </div>
                            <button type="button" class="btn btn-primary" id="addNhienLieuButton">Thêm nhiên liệu</button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="submit" form="updateCayXangForm" name="capnhat" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal xóa -->
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
                var ma = $(this).closest("tr").find(".macayxang").text();
                var diachi = $(this).closest("tr").find(".diachi").text();

                $("#macayxang_sua").val(ma);
                $("#diachi_sua").val(diachi);
                $('#nhienLieuList').html('')

                $.ajax({
                    url: window.location.origin + window.location.pathname + '?action=layNhienLieuTheoId&id=' + ma,
                    method: "GET",
                    dataType: "json",
                    success: function(data) {
                        // Xử lý dữ liệu nhận được
                        data.forEach(function(nhienLieu) {
                            var nhienLieuList = $("#nhienLieuList");

                            // Tạo phần tử div chứa trường nhập liệu nhiên liệu
                            var nhienLieuDiv = $("<div></div>").addClass("nhien-lieu-item row mb-2");

                            // Tạo select box chọn nguyên liệu
                            var selectNguyenLieu = $("<select name='nhienlieu[]'></select>").addClass("form-control col-md-6 mr-2");

                            <?php foreach ($nhienlieu as $nl) { ?>
                                // Tạo các tùy chọn nguyên liệu
                                var option = $(`<option value='<?php echo $nl['Pk_NhienlieuID'] ?>' ${nhienLieu.iNhienlieuID == <?php echo $nl['Pk_NhienlieuID'] ?> ? 'selected' : ''}><?php echo $nl['sTenNhienlieu'] ?></option>`);
                                selectNguyenLieu.append(option);
                            <?php } ?>

                            // Tạo input nhập số lượng
                            var inputSoLuong = $(`<input name=soluong[] value='${nhienLieu.iSoluong}'></input>`).attr("type", "number").addClass("form-control col-md-4 mr-2");

                            // Tạo nút xóa
                            var deleteButton = $("<button></button>").addClass("btn btn-danger").text("Xóa");
                            deleteButton.click(function() {
                                nhienLieuDiv.remove();
                            });

                            // Thêm select box, input số lượng và nút xóa vào div chứa trường nhập liệu nhiên liệu
                            nhienLieuDiv.append(selectNguyenLieu);
                            nhienLieuDiv.append(inputSoLuong);
                            nhienLieuDiv.append(deleteButton);

                            // Thêm div chứa trường nhập liệu nhiên liệu vào danh sách
                            nhienLieuList.append(nhienLieuDiv);
                        });
                    },
                    error: function() {
                        console.log("Lỗi khi gọi API");
                    }
                });
            });

            $(".delete-button").click(function() {
                var accountName = $(this).closest("tr").find(".tentaikhoan").text();
                $("#tentaikhoan_xoa").val(accountName);
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#addNhienLieuButton").click(function() {
                var nhienLieuList = $("#nhienLieuList");

                // Tạo phần tử div chứa trường nhập liệu nhiên liệu
                var nhienLieuDiv = $("<div></div>").addClass("nhien-lieu-item row mb-2");

                // Tạo select box chọn nguyên liệu
                var selectNguyenLieu = $("<select name='nhienlieu[]'></select>").addClass("form-control col-md-6 mr-2");

                <?php foreach ($nhienlieu as $nl) { ?>
                    // Tạo các tùy chọn nguyên liệu
                    var option = $("<option value='<?php echo $nl['Pk_NhienlieuID'] ?>'><?php echo $nl['sTenNhienlieu'] ?></option>");
                    selectNguyenLieu.append(option);
                <?php } ?>

                // Tạo input nhập số lượng
                var inputSoLuong = $("<input name=soluong[]></input>").attr("type", "number").addClass("form-control col-md-4 mr-2");

                // Tạo nút xóa
                var deleteButton = $("<button></button>").addClass("btn btn-danger").text("Xóa");
                deleteButton.click(function() {
                    nhienLieuDiv.remove();
                });

                // Thêm select box, input số lượng và nút xóa vào div chứa trường nhập liệu nhiên liệu
                nhienLieuDiv.append(selectNguyenLieu);
                nhienLieuDiv.append(inputSoLuong);
                nhienLieuDiv.append(deleteButton);

                // Thêm div chứa trường nhập liệu nhiên liệu vào danh sách
                nhienLieuList.append(nhienLieuDiv);
            });
        });
    </script>
</body>

</html>