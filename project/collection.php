<?php
require_once '../config/config.php';
require_once 'function.php';
$music = query("SELECT * FROM tb_music");
// var_dump($music);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= baseUrl;   ?>assets/css/main.css">

    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Audio Collection</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="<?= baseUrl;   ?>  ">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="">Collection</a>
                <a class="nav-item nav-link" href="<?= baseUrl;   ?>project/upload.php  ">Upload</a>
                <a class="nav-item nav-link" href="#">Sign In</a>
            </div>
        </div>
    </nav>


    <div class="container">
        <div class="row">
            <div class="col-md-2 Pkartu">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum odio mollitia quae necessitatibus explicabo tempore ipsum laudantium dolorem nostrum, praesentium nobis accusantium fuga! Hic quod iste quo iure. Saepe, libero?</div>
            <div class="col-lg-10 kartu">
                <div class="box sort"></div>

                <?php foreach ($music as $lagu) : ?>



                    <div class="card box a">
                        <img src="<?= baseUrl;   ?>assets/img/<?= $lagu['thumbnail'];   ?>      " class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="<?= baseUrl;   ?>project/play.php?id=<?= $lagu['id'];   ?>  "><?= $lagu['judul'];   ?> </a>
                            <p><?= $lagu['deskripsi'];   ?> </p>
                            <div class="row content">
                                <div class="col artis"><?= $lagu['artis'];   ?> </div>
                                <div class="col like">3123</div>
                                <div class="col views">d</div>

                            </div>
                        </div>
                    </div>
                <?php endforeach ?>


            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="<?= baseUrl;   ?>assets/js/jquery-3.4.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="<?= baseUrl;   ?>assets/js/main.js"></script>
</body>

</html>