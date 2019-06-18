<?php
require_once '../config/config.php';
require_once 'function.php';

$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$msc = query("SELECT * FROM tb_music WHERE id = $id")[0];
var_dump($msc);



if (isset($_POST["submit"])) {
    // cek apakah data berasil di tambahkan / tidak
    if (ubah($_POST) > 0) {
        echo "
                    <script>
                        alert('data berasil Diubah');
                        document.location.href = 'collection.php';
                    </script>
                ";
    } else {
        echo "
                <script>
                      alert('data gagal di Diubah');
                      document.location.href = 'update.php'
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
                <a class="nav-item nav-link" href="<?= baseUrl;   ?>project/collection.php  ">Collection</a>
                <a class="nav-item nav-link" href="<?= baseUrl;   ?>project/upload.php">Upload</a>
                <a class="nav-item nav-link" href="#">Sign In</a>
            </div>
        </div>
    </nav>



    <div class="container">

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $msc["id"];   ?>  ">
            <label for="judul">judul</label>
            <input type="text" name="judul" id="judul" value="<?= $msc['judul'];   ?>  ">

            <label for="artis">artis</label>
            <input type="text" name="artis" id="artis" value="<?= $msc['artis'];   ?>  ">

            <label for="deskripsi">deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" value="<?= $msc['deskripsi'];   ?>  ">

            <label for="thumbnail">thumbnail</label>
            <input type="file" name="thumbnail" id="thumbnail" value="thumbnail">

            <label for="music">music</label>
            <input type="file" name="music" id="music" value="music">


            <button type="submit" name="submit">Ubah</button>
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