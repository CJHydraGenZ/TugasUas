<?php

require_once 'config/config.php';
// require_once 'project/function.php';
require_once 'config/function.php';
session_start();


$result = query("SELECT * FROM tb_music");
// var_dump($result['visitor']);

$Res = mysqli_query($con, "SELECT * FROM tb_music");
$Mses = mysqli_query($con, "SELECT * FROM tb_message");
$Num_rows = mysqli_num_rows($Res);
$Mes_rows = mysqli_num_rows($Mses);
// var_dump($Num_rows);
// $arrViews = array($Num_rows, $Mes_rows);
// var_dump($arrViews);
// $Rsum = mysqli_query($con, "SELECT SUM(visitor) FROM tb_music WHERE id");
$SUM = query("SELECT SUM(visitor) FROM tb_music WHERE id")[0];


$arr = array();
$arrThumb = array();
foreach ($result as $getData) {

    // var_dump($getData);
    $filename = 'assets/music/' . $getData['music'];
    $filename1 = 'assets/img/' . $getData['thumbnail'];
    // var_dump($filename);
    $sise = filesize($filename);
    $sise1 = filesize($filename1);


    array_push($arr, $sise);
    array_push($arrThumb, $sise1);
}

// var_dump($arrThumb);
$arrG = array();
foreach ($result as $getGambar) {;
    // var_dump($getGambar['thumbnail']);
    array_push($arrG,  $getGambar['thumbnail']);
}

// echo json_encode($arrThumb, true);


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/mainIndex.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= baseUrl;   ?>  ">Audio Collection</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">

                <a class="nav-item nav-link" href="<?= baseUrl;   ?>">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="<?= baseUrl;   ?>project/collection.php  ">Collection</a>
                <a class="nav-item nav-link" href="<?= baseUrl;   ?>project/upload.php">Upload</a>

            </div>
        </div>
    </nav>


    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">

        <div class="carousel-inner">

            <div class="carousel-item active size">
                <img class="Gimg" src="<?= baseUrl;   ?>assets/img/<?= $arrG[0];   ?>   " class="d-block w-100" alt="...">
            </div>

            <?php foreach ($result as $gambar) : ?>
                <div class="carousel-item size">
                    <img class="Gimg" src="<?= baseUrl;   ?>assets/img/<?= $gambar['thumbnail'];   ?>" class="d-block w-100" alt="...">
                </div>
            <?php endforeach ?>




        </div>

    </div>
    <div class="about text-center">
        <h1>About</h1>
        <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio, dignissimos magnam quam iste repudiandae nulla quidem nostrum eius iure atque. Accusantium sint quos quibusdam placeat explicabo illum sapiente dolorum hic.
        </p>

    </div>

    <div class="progress">
        <div class="row pie">
            <input class="mes" type="hidden" data-mes="<?= $Mes_rows;   ?>  ">
            <input class="sizeG" type="hidden" data-gambar="<?= json_encode($arrThumb, true)   ?>">
            <div class="col-4 mt-3 numrows" data-num_rows="<?= $Num_rows;  ?>  "> <canvas class="char" id="grapik"></canvas></div>
            <div class="col-4 mt-3 sumV" data-sumvisitor="<?= $SUM['SUM(visitor)'];   ?>  "><canvas class="char" id="grapik1"></canvas></div>
            <div class="col-4 mt-3 total" data-totalfile="<?= json_encode($arr, true) ?>"><canvas class="char" id="grapik2"></canvas></div>
        </div>
        <div class="row pie1">
            <div class="col-lg mt-3"><canvas class="char1" id="grapik3"></canvas></div>
        </div>
    </div>
    <h1 class="text-center">Collection</h1>
    <div class="iconT">
        <div class="row text-center">

            <div class="col-4">
                <i class="fas fa-play-circle"></i>
            </div>
            <div class="col-4">
                <i class="fas fa-database"></i>
            </div>
            <div class="col-4">
                <i class="fab fa-github"></i>
            </div>
        </div>
    </div>



    <div class="content">

        <div class="isi" id="particles-js"></div>


        <footer class="isi">
            <div class="row footer">
                <div class="col">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste ut sit quaerat praesentium, nisi soluta earum ad saepe autem. Quos atque ad quae error illo magni doloremque rerum consequatur debitis.
                </div>
                <div class="col">
                    <form id="ajax" action="" method="post">
                        <label for="pesan">pesan</label>
                        <input type="text" name="pesan" id="pesan">
                        <label for="kesan">kesan</label>
                        <input type="text" name="kesan" id="kesan">

                        <button type="submit" name="submit">Kirim</button>
                    </form>
                </div>
            </div>
            <div class="copyright bg-dark">
                copyright ©
            </div>
        </footer>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <!-- <script src="assets/js/jquery-3.4.1.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="assets/js/patikel/particles.js-master/particles.js"></script>
    <script src="assets/js/patikel/particles.js-master/demo/js/app.js"></script>
    <script src="assets/js/mainIn.js"></script>

</body>

</html>