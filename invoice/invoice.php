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
        <div class="container py-5">
            <div class="row ">
                <div class="row row-cols-3 row-cols-md-1 g-5 m-auto">
                    <div class="card m-auto pt-5 mt-5 pb-3 pb-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded border-0 card-hover"
                        style="width: 30rem;">
                        <div class="card-body pb-5">
                            <h4>Lịch sử mua hàng</h4>
                        </div>
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                        <?php
                        //đổ dữ liệu 
                        if(isset($donhangs) && (count($donhangs) > 0)){
                            foreach($donhangs as $donhang){

                        ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#<?php echo $donhang['fGia']; ?>" aria-expanded="false"
                                        aria-controls="<?php echo $donhang['fGia']; ?>">
                                        Đơn hàng <?php echo $donhang['Pk_HoadonID']; ?>
                                    </button>
                                </h2>
                                <div id="<?php echo $donhang['fGia']; ?>" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul class="list-group list-group-flush text-center">
                                            <li class="list-group-item d-flex justify-content-between">
                                                <p><?php echo $donhang['sTenNhienlieu']; ?></p>
                                                <p><?php echo $donhang['fGia']; ?></p>
                                                <p><?php echo $donhang['iSoluong']; ?></p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="./detail.js"></script>
</body>

</html>