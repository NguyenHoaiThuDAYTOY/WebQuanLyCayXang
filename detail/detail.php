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
            <div class="row">
                <div class="row row-cols-3 row-cols-md-1 g-5 m-auto">
                    <div class="card m-auto pt-5 mt-5 pb-3 shadow-lg p-3 mb-5 bg-body-tertiary rounded border-0 card-hover"
                        style="width: 30rem;">
                        <form action="./index.php" method="post">
                        <div class="card-body d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                                class="bi bi-fuel-pump-diesel-fill" viewBox="0 0 16 16">
                                <path
                                    d="M4.974 9.806h.692c.306 0 .556.063.75.19.198.127.343.317.437.568.096.252.144.565.144.941 0 .284-.027.53-.083.74-.053.21-.133.386-.241.528a.986.986 0 0 1-.412.315 1.575 1.575 0 0 1-.595.103h-.692V9.806Z" />
                                <path
                                    d="M1 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v8a2 2 0 0 1 2 2v.5a.5.5 0 0 0 1 0V8h-.5a.5.5 0 0 1-.5-.5V4.375a.5.5 0 0 1 .5-.5h1.495c-.011-.476-.053-.894-.201-1.222a.97.97 0 0 0-.394-.458c-.184-.11-.464-.195-.9-.195a.5.5 0 0 1 0-1c.564 0 1.034.11 1.412.336.383.228.634.551.794.907.295.655.294 1.465.294 2.081V7.5a.5.5 0 0 1-.5.5H15v4.5a1.5 1.5 0 0 1-3 0V12a1 1 0 0 0-1-1v4h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V2Zm2 .5v5a.5.5 0 0 0 .5.5h5a.5.5 0 0 0 .5-.5v-5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0-.5.5ZM4 9v5h1.796c.496 0 .906-.099 1.23-.297.327-.197.571-.484.732-.86.161-.377.242-.828.242-1.356 0-.525-.08-.973-.242-1.344a1.775 1.775 0 0 0-.725-.85C6.71 9.098 6.296 9 5.796 9H4Z" />
                            </svg>
                            <?php
                        //đổ dữ liệu 
                        if(isset($cayxangs) && (count($cayxangs) > 0)){
                        ?>
                            <h5 class="card-title ps-5"><?= $cayxangs[0]['sDiachi']?></h5>
                            <?php
                            }
                        ?>
                        </div>
                        <ul class="list-group list-group-flush text-center">
                        <input type="hidden" id="nhot" name="nhot"/>
                        <?php
                        //đổ dữ liệu 
                        if(isset($cayxangs) && (count($cayxangs) > 0)){
                            foreach($cayxangs as $cayxang){
                        ?>
                            <li class="list-group-item">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="<?= $cayxang['Pk_CayxangNhienlieuID']?>"
                                    value="<?= $cayxang['Pk_CayxangNhienlieuID']?>">
                                <label class="form-check-label" for="<?= $cayxang['Pk_CayxangNhienlieuID']?>">
                                <?= $cayxang['sTenNhienlieu']?> - <?= $cayxang['fGia']?>đ
                                </label>
                            </li>
                        <?php
                            }
                        } else {
                        ?>
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="check-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                        </symbol>
                        <symbol id="info-fill" viewBox="0 0 16 16">
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                        </symbol>
                        <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </symbol>
                        </svg>
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div>
                                Hiện cây xăng không còn loại nhớt nào
                            </div>
                            </div>
                         <?php
                        }
                        ?>
                        </ul>
                    
                        <div class="card-body">
                            <div class="input-group mb-3 w-50">
                                <input type="text" class="form-control text-center" name="soluong" placeholder="Số lượng"
                                    aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-danger" type="submit" name="themgiohang"
                                    id="button-addon2">Thêm vào giỏ</button>
                            </div>
                        </div>
                        </form>
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