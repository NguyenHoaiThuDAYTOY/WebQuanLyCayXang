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
        
        <div class="container mx-5 px-5">
            <div id="carouselExampleCaptions" class="carousel slide w-50 mx-auto mx-5">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner shadow-lg bg-body-tertiary rounded border-0 mt-5">
                    <div class="carousel-item active">
                    <img src="./img.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Giá xăng</h5>
                        <?php
                    //đổ dữ liệu 
                    if(isset($giaxangs) && (count($giaxangs) > 0)){
                        foreach($giaxangs as $giaxang){

                    ?>
                                <p><?php echo $giaxang['sTenNhienlieu'] ?>: <?php echo $giaxang['fGia'] ?>/<?php echo $giaxang['sDonvi'] ?></p>
                                <?php
                        }
                    }
                    ?>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="./img.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Giá dầu</h5>
                        <?php
                    //đổ dữ liệu 
                    if(isset($giadaus) && (count($giadaus) > 0)){
                        foreach($giadaus as $giadau){

                    ?>
                                <p><?php echo $giadau['sTenNhienlieu'] ?>: <?php echo $giadau['fGia'] ?>/<?php echo $giadau['sDonvi'] ?></p>
                                <?php
                        }
                    }
                    ?>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="./img.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Giá nhớt</h5>
                        <?php
                    //đổ dữ liệu 
                    if(isset($gianhots) && (count($gianhots) > 0)){
                        foreach($gianhots as $gianhot){

                    ?>
                                <p><?php echo $gianhot['sTenNhienlieu'] ?>: <?php echo $gianhot['fGia'] ?>/<?php echo $gianhot['sDonvi'] ?></p>
                                <?php
                        }
                    }
                    ?>
                    </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <form action="./index.php" method="post">
                <div class="row py-5 m-auto  justify-content-center">
                    <div class="col input-group mb-3">
                        <input name="loainhienlieu" id="loainhienlieu" type="hidden">
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="btnradio" value="xang" id="xang" autocomplete="off" onchange="getLoaiNhienLieu()" onclick="getCheckedXang()">
                            <label class="btn btn-outline-primary" for="xang">Còn xăng</label>

                            <input type="radio" class="btn-check" name="btnradio" value="dau" id="dau" autocomplete="off" onchange="getLoaiNhienLieu()" onclick="getCheckedDau()">
                            <label class="btn btn-outline-primary" for="dau">Còn dầu</label>

                            <input type="radio" class="btn-check" name="btnradio" value="nhot" id="nhot" autocomplete="off" onchange="getLoaiNhienLieu()" onclick="getCheckedNhot()">
                            <label class="btn btn-outline-primary" for="nhot">Còn nhớt</label>
                        </div>
                    </div>
                    <div class="col input-group mb-3 ">
                        <input name="search" value="<?php if(isset($_SESSION['filter_home_search'])) echo $_SESSION['filter_home_search']; ?>" type="text" class="form-control" placeholder="Tìm kiếm cây xăng"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button name="timkiem" class="btn btn-outline-secondary" type="submit" id="button-addon2">Tìm kiếm</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="row row-cols-1 row-cols-md-3 g-4 m-auto">
                <?php
            //đổ dữ liệu 
            if(isset($cayxangs) && (count($cayxangs) > 0)){
                foreach($cayxangs as $cayxang){

            ?>
                    <a href="../detail/index.php?id=<?php echo $cayxang['iCayxangID'] ?>" class="text-decoration-none text-dark">
                        <div class="card pt-5 pb-3 shadow-lg p-3 mb-5 bg-body-tertiary rounded border-0 card-hover">
                            <div class="icons m-auto">

                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                                    class="bi bi-fuel-pump-diesel-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M4.974 9.806h.692c.306 0 .556.063.75.19.198.127.343.317.437.568.096.252.144.565.144.941 0 .284-.027.53-.083.74-.053.21-.133.386-.241.528a.986.986 0 0 1-.412.315 1.575 1.575 0 0 1-.595.103h-.692V9.806Z" />
                                    <path
                                        d="M1 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v8a2 2 0 0 1 2 2v.5a.5.5 0 0 0 1 0V8h-.5a.5.5 0 0 1-.5-.5V4.375a.5.5 0 0 1 .5-.5h1.495c-.011-.476-.053-.894-.201-1.222a.97.97 0 0 0-.394-.458c-.184-.11-.464-.195-.9-.195a.5.5 0 0 1 0-1c.564 0 1.034.11 1.412.336.383.228.634.551.794.907.295.655.294 1.465.294 2.081V7.5a.5.5 0 0 1-.5.5H15v4.5a1.5 1.5 0 0 1-3 0V12a1 1 0 0 0-1-1v4h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V2Zm2 .5v5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 .5-.5v-5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0-.5.5ZM4 9v5h1.796c.496 0 .906-.099 1.23-.297.327-.197.571-.484.732-.86.161-.377.242-.828.242-1.356 0-.525-.08-.973-.242-1.344a1.775 1.775 0 0 0-.725-.85C6.71 9.098 6.296 9 5.796 9H4Z" />
                                </svg>
                            </div>
                            <div class="card-body px-4">
                                <h4 class="card-title"><?php echo $cayxang['sDiachi']; ?></h4>
                            </div>
                        </div>
                    </a>
                    <?php
                }
            }
            ?>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="./home.js"></script>
</body>

</html>