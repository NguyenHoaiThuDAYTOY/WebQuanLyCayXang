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
    <section class="mx-5 px-5">
        <div class="container px-5">
            <form action="./index.php" method="post">
                <div class="row py-5 m-auto w-50 justify-content-start">
                    <div class="col input-group mb-3 ">
                        <input name="search" value="<?php if(isset($_SESSION['filter_cart_search'])) echo $_SESSION['filter_cart_search']; ?>" type="text" class="form-control" placeholder="Tìm kiếm tên nhớt"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button name="timkiem" class="btn btn-outline-secondary" type="submit" id="button-addon2">Tìm
                            kiếm</button>
                    </div>
                </div>
            <div class="row px-5 mx-5">
                <div class="row row-cols-1 row-cols-md-1 g-4 m-auto pb-5">
                <?php
            //đổ dữ liệu 
            if(isset($giohangs) && (count($giohangs) > 0)){
                foreach($giohangs as $giohang){
            ?>
                    <a href="" class="text-decoration-none text-dark" data-giohang="<?php echo $giohang['Pk_GiohangID']; ?>">
                        <div class="card px-5 mx-5 pb-3 shadow-lg p-3 bg-body-tertiary rounded border-0 card-hover">
                            <div class="card-body px-4 ">
                                <div class="card-body px-4">
                                    <h4 class="card-title"><?php echo $giohang['sDiachi']; ?></h4>
                                </div>
                                <div class="card-body px-4 d-flex justify-content-between">
                                    <p class="card-text"><?php echo $giohang['sTenNhienlieu']; ?></p>
                                    <p class="card-text"><?php echo $giohang['iSoluong']; ?></p>
                                    <p class="card-text"><?php echo $giohang['fGia']; ?></p>
                                </div>
                                <div class="card-body px-4">
                                    <a class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="./index.php?id=<?php echo $giohang['Pk_GiohangID']; ?>">Xóa</a>                                
                                </div>
                            </div>
                            
                            
                        </div>
                    </a>
                    <?php
                }
            }
            ?>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Đặt hàng
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thông tin đơn hàng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <?php
            //đổ dữ liệu 
            if(isset($giohangs) && (count($giohangs) > 0)){
                foreach($giohangs as $giohang){

            ?>
                <div class="card-body px-4 d-flex justify-content-between">
                    <p class="card-text"><?php echo $giohang['sTenNhienlieu']; ?></p>
                    <p class="card-text"><?php echo $giohang['iSoluong']; ?></p>
                    <p class="card-text"><?php echo $giohang['fGia']; ?></p>
                </div>
                    <?php
                }
            }
            ?>
            <div class="m-auto mb-4">
                <div class="form-check">
                <input name="payment" id="payment" type="hidden">
                <input class="form-check-input" type="radio" value="Tiền mặt" name="flexRadioDefault" id="tienmat" onchange="getPayment()">
                <label class="form-check-label" for="tienmat">
                    Tiền mặt
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" value="Chuyển khoản" name="flexRadioDefault" id="chuyenkhoan" onchange="getPayment()">
                <label class="form-check-label" for="chuyenkhoan">
                    Chuyển khoản
                </label>
                </div>
            </div>
            <div class="input-group">
            <span class="input-group-text">Ghi chú</span>
            <textarea class="form-control" aria-label="With textarea" name="note"></textarea>
            </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="thanhtoan" class="btn btn-primary w-25">Thanh toán</button>
                </div>
                </div>
            </div>
            </div>
                </div>
                
            </div>
        </div>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="./cart.js"></script>
</body>

</html>