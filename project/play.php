<?php
require_once '../config/function.php';
require_once '../config/config.php';
$id = $_GET['id'];
// var_dump($id);
// query data mahasiswa berdasarkan id
$Pmusic = query("SELECT * FROM tb_music WHERE id = $id")[0];


//visitor
$current_count =  $Pmusic['visitor'];
$new_count = $current_count + 1;
mysqli_query($con, "UPDATE tb_music SET visitor = '" . $new_count . "'WHERE id = $id");




?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
    <link rel="stylesheet" href="<?= baseUrl;   ?>assets/css/main.css">

    <title>Hello, world!</title>
</head>

<body id="body">

    <div class="container-fluid">
        <a href="<?= baseUrl;   ?>project/collection.php  ">Kembali Ke Collection</a>

        <div class="row pent">
            <div class="col-md-6">




            </div>
            <div class="col col-lg-2">
                <img src="<?= baseUrl;   ?>assets/img/<?= $Pmusic['thumbnail'];   ?>" alt="..." class="img-thumbnail">

            </div>
            <div class="col col-lg-2">
                <p><?= $Pmusic['artis'];   ?> </p>
                <p><?= $Pmusic['deskripsi'];   ?> </p>
                <p><?= $Pmusic['judul'];   ?> </p>
                <audio id="music" data-music="<?= $Pmusic['music'];   ?>">
                    <source src="<?= baseUrl;   ?>assets/music/<?= $Pmusic['music'];   ?>    " type="audio/mpeg">
                </audio>
                <p><?= $Pmusic['music'];   ?> </p>
            </div>
            <div class="col col-lg-2">

                <button id="btn" class="btn btn-primary">Play</button>
            </div>
        </div>
    </div>


    <!-- <h1 class="tqq">Play</h1> -->



    <div class="Tampil">

    </div>
    <!-- <button id="btnStop">Stop</button> -->



    <!-- <canvas id="canvas"></canvas> -->







    <!-- <input class="buttons" id="audio-file" type="file" accept="audio/*" name="Upload"> <br><br> -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="<?= baseUrl;   ?>assets/js/jquery-3.4.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="<?= baseUrl;   ?>assets/js/main.js"></script>
    <script src="<?= baseUrl;   ?>assets/js/play.js  "></script>
</body>

</html>