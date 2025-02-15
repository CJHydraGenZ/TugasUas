<?php
require_once '../config/config.php';
require_once '../config/function.php';

session_start();

$id = $_GET["id"];
$img = $_GET['thumb'];
$lagu = $_GET['lagu'];

// var_dump($thumb . $music);
// die;

// query data  berdasarkan id
$msc = query("SELECT * FROM tb_music WHERE id = $id")[0];
// var_dump($msc);



if (isset($_POST["submit"])) {
    // cek apakah data berasil di tambahkan / tidak
    if (ubah($_POST, $img, $lagu) > 0) {
        $_SESSION['pesan'] = 'berhasil Ubah';
        echo "
        <script>
         
            document.location.href = 'collection.php';
        </script>
    ";
    } else {
        $_SESSION['pesan'] = 'gagal di Ubah';
        echo "
    <script>
         
          document.location.href = 'upload.php';
     </script>
    ";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/main.css">

    <title>Ubah</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?= baseUrl;   ?>  ">Audio Collection</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="<?= baseUrl;   ?>">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="<?= baseUrl;   ?>project/collection.php  ">Collection</a>
                <a class="nav-item nav-link" href="<?= baseUrl;   ?>project/upload.php">Upload</a>

            </div>
        </div>
    </nav>



    <div class="container">


        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $msc["id"];   ?>  ">
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control" id="judul" placeholder="Masukan Judul Lagu" value="<?= $msc['judul'];   ?>  ">
            </div>
            <div class="form-group">
                <label for="artis">Artis</label>
                <input type="text" name="artis" class="form-control" id="artis" placeholder="Masukan Nama Artis" value="<?= $msc['artis'];   ?>  ">
            </div>


            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" value="<?= $msc['deskripsi'];   ?>  "><?= $msc['deskripsi'];   ?></textarea>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail file input</label>
                        <input type="file" name="thumbnail" class="form-control-file" id="thumbnail" value="<?= $msc['thumbnail'];   ?>  ">
                    </div>
                </div>


                <div class="col">
                    <div class="form-group">
                        <label for="music">Music file input</label>
                        <input type="file" name="music" class="form-control-file" id="music" value="<?= $msc['music'];   ?>  ">
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="submit">Upload Data</button>
        </form>



    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="<?= baseUrl;   ?>assets/js/jquery-3.4.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="<?= baseUrl;   ?>assets/js/main.js"></script>
</body>

</html>