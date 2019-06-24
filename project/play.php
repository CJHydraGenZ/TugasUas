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

$SUM = query("SELECT SUM(visitor) FROM tb_music WHERE id")[0];
// var_dump($Pmusic);

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
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">



    <link rel="stylesheet" href="<?= baseUrl;   ?>assets/css/main.css">

    <title>Hello, world!</title>
</head>

<body id="body">

    <div class="container-fluid">
        <a href="<?= baseUrl;   ?>project/collection.php  ">Kembali Ke Collection</a>

        <div class="row pent">
            <div class="col-md-6">

                <form class="col s12" id="ajax" action="" method="post">
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="pesan" class="materialize-textarea"></textarea>
                            <label for="pesan">Pesan</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="kesan" class="materialize-textarea"></textarea>
                            <label for="kesan">Kesan</label>
                        </div>
                    </div>
                    <button id="pesan" type="submit" name="submit" class="btn">Kirim</button>
                </form>


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



    <div class="parallax-container">
        <div class="parallax"><img src="<?= baseUrl;   ?>assets/img/<?= $Pmusic['thumbnail'];   ?>"></div>
        <div class="container thumb">
            <h4 class="center light white-text">Thumbnail</h4>
        </div>
    </div>

    <div class="container">
        <div class="footerPlay center">
            <h4 class="center">Deskripsi</h4>
            <p><?= $Pmusic['deskripsi'];   ?> </p>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col m6">
                <h4>Judul</h4>
                <p><?= $Pmusic['judul'];   ?> </p>
                <h4>Artis</h4>
                <p><?= $Pmusic['artis'];   ?> </p>
                <h4>Music</h4>
                <p><?= $Pmusic['music'];   ?> </p>

            </div>
            <div class="col m6">
                <input class="totalviews" type="hidden" data-totalview="<?= $SUM['SUM(visitor)'];   ?>  ">
                <input class="views" type="hidden" data-views="<?= $Pmusic['visitor'];   ?> ">
                <canvas id="grap"></canvas>

            </div>
        </div>
    </div>


    <div class="footerEnd center">
        <p>Copyright</p>
    </div>

    <!-- <input class="buttons" id="audio-file" type="file" accept="audio/*" name="Upload"> <br><br> -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="<?= baseUrl;   ?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="<?= baseUrl;   ?>assets/js/main.js"></script>
    <script src="<?= baseUrl;   ?>assets/js/play.js  "></script>
</body>

</html>