<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <section>
        <div class="container my-5 py-5">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 m-auto">
                    <div class="card border-20 shadow">
                        <div class="card-body  px-5 py-5">
                            <h3 class="text-center">Đăng ký</h3>
                            <form action="index.php" method="post" class="needs-validation">
                                <div class="form-group was-validated">
                                    <input name="tentaikhoan" type="text" class="form-control my-4 py-2 " placeholder="Tên tài khoản"
                                        required />
                                    <div class="invalid-feedback">Tên tài khoản không được để trống</div>
                                </div>
                                <div class="form-group was-validated">
                                    <input name="matkhau" type="text" class="form-control my-4 py-2 " placeholder="Mật khẩu"
                                        required />
                                    <div class="invalid-feedback">Mật khẩu không được để trống</div>
                                </div>
                                <div class="form-group was-validated">
                                    <input name="hoten" type="text" class="form-control my-4 py-2 " placeholder="Họ tên" required />
                                    <div class="invalid-feedback">Họ tên không được để trống</div>
                                </div>
                                <div class="form-group was-validated">
                                    <input name="email" type="email" class="form-control my-4 py-2 " placeholder="Email" required />
                                    <div class="invalid-feedback">Email không được để trống</div>
                                </div>
                                <div class="form-group was-validated">
                                    <input name="sdt" type="text" class="form-control my-4 py-2 " placeholder="SDT" required />
                                    <div class="invalid-feedback">SDT không được để trống</div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" name="dangky" class="btn btn-primary">Đăng ký</button>
                                    <div class=" text-center pt-3 fs-6">
                                        <p>Bạn đã có tài khoản?<a href="../signin" class="nav-link col text-decoration-underline text-danger icon-link icon-link-hover">Đăng nhập</a> </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>