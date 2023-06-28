<!DOCTYPE html>
<html>

<head>
    <title>Quản lý nhiên liệu</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="container">
        <h1>Quản lý nhiên liệu</h1>
        <hr>
        <div class="text-right mb-3">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addAccountModal">
                <i class="fas fa-plus"></i> Thêm nhiên liệu
            </button>
        </div>
        <form id="search-form">
            <div class="form-row justify-content-center mb-3">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tennhienlieu-filter">Tên nhiên liệu:</label>
                        <input type="text" id="tennhienlieu-filter" name="tennhienlieu-filter" class="form-control" value="<?php echo $filter['tennhienlieu']; ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="loainhienlieu-filter">Loại nhiên liệu:</label>
                        <select id="loainhienlieu-filter" name="loainhienlieu-filter" class="form-control">
                            <option value="">-- Chọn loại nhiên liệu --</option>
                            <option value="xang" <?php if ($filter['loai'] == 'xang') {
                                                        echo 'selected';
                                                    } ?>>Xăng</option>
                            <option value="dau" <?php if ($filter['loai'] == 'dau') {
                                                    echo 'selected';
                                                } ?>>Dầu</option>
                            <option value="nhot" <?php if ($filter['loai'] == 'nhot') {
                                                        echo 'selected';
                                                    } ?>>Nhớt</option>
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
                    <th>Mã nhiên liệu</th>
                    <th>Tên nhiên liệu</th>
                    <th>Loại</th>
                    <th>Đơn vị</th>
                    <th>Giá</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $d) { ?>
                    <tr>
                        <td class="manhienlieu"><?php echo $d['Pk_NhienlieuID'] ?></td>
                        <td class="ten"><?php echo $d['sTenNhienlieu'] ?></td>
                        <td class="loai"><?php echo $d['sLoai'] ?></td>
                        <td class="donvi"><?php echo $d['sDonvi'] ?></td>
                        <td class="gia"><?php echo $d['fGia'] ?></td>
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
                    <li class="page-item <?php if ($page == $i) echo 'active' ?>">
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
                    <h5 class="modal-title" id="addAccountModalLabel">Thêm nhiên liệu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addAccountForm" method="post" action="">
                        <div class="form-group">
                            <label for="tennhienlieu_them">Tên nhiên liệu</label>
                            <input type="text" class="form-control" id="tennhienlieu_them" name="tennhienlieu_them" placeholder="Nhập tên nhiên liệu">
                        </div>
                        <div class="form-group">
                            <label for="loainhienlieu_them">Loại</label>
                            <select id="loainhienlieu_them" name="loainhienlieu_them" class="form-control">
                                <option value="xang">Xăng</option>
                                <option value="dau">Dầu</option>
                                <option value="nhot">Nhớt</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="donvi_them">Đơn vị</label>
                            <input type="text" class="form-control" id="donvi_them" name="donvi_them" placeholder="Nhập tên nhiên liệu">
                        </div>
                        <div class="form-group">
                            <label for="gia_them">Giá</label>
                            <input type="text" class="form-control" id="gia_them" name="gia_them" placeholder="Nhập tên nhiên liệu">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" name="themnhienlieu" form="addAccountForm" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal sửa tài khoản -->
    <div class="modal fade" id="editAccountModal" tabindex="-1" role="dialog" aria-labelledby="editAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAccountModalLabel">Sửa nhiên liệu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editAccountForm" method="post" action="">
                        <div class="form-group">
                            <label for="ten_capnhat">Tên nhiên liệu</label>
                            <input type="text" class="form-control" id="ten_capnhat" name="ten_capnhat">
                            <input type="text" class="form-control d-none" id="manhienlieu_capnhat" name="manhienlieu_capnhat">
                        </div>
                        <div class="form-group">
                            <label for="loainhienlieu_capnhat">Loại</label>
                            <select id="loainhienlieu_capnhat" name="loainhienlieu_capnhat" class="form-control">
                                <option value="xang">Xăng</option>
                                <option value="dau">Dầu</option>
                                <option value="nhot">Nhớt</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gia_capnhat">Giá</label>
                            <input type="text" class="form-control" id="gia_capnhat" name="gia_capnhat">
                        </div>
                        <div class="form-group">
                            <label for="donvi_capnhat">Đơn vị</label>
                            <input type="text" class="form-control" id="donvi_capnhat" name="donvi_capnhat">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" name="suanhienlieu" form="editAccountForm" class="btn btn-primary">Lưu</button>
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
                        <input type="text" class="form-control d-none" id="manhienlieu_xoa" name="manhienlieu_xoa">
                        <p>Bạn có chắc chắn muốn xóa tài khoản này?</p>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" form="deleteAccountForm" name="xoanhienlieu" class="btn btn-danger">Xóa</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".edit-button").click(function() {
                var manhienlieu = $(this).closest("tr").find(".manhienlieu").text();
                var ten = $(this).closest("tr").find(".ten").text();
                var loai = $(this).closest("tr").find(".loai").text();
                var donvi = $(this).closest("tr").find(".donvi").text();
                var gia = $(this).closest("tr").find(".gia").text();

                $("#manhienlieu_capnhat").val(manhienlieu);
                $("#ten_capnhat").val(ten);
                $("#loainhienlieu_capnhat").val(loai);
                $("#donvi_capnhat").val(donvi);
                $("#gia_capnhat").val(gia);
            });

            $(".delete-button").click(function() {
                var manhienlieu = $(this).closest("tr").find(".manhienlieu").text();
                $("#manhienlieu_xoa").val(manhienlieu);
            });
        });
    </script>
</body>

</html>